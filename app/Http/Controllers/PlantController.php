<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use App\Rules\NotNullChecker;
use Illuminate\Http\Response;
use App\Rules\StringRangeChecker;
use App\Http\Requests\StorePlantRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PlantController extends Controller
{
    public function __construct()
    {
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Plant::filter(request('search'))->orderBy('name', 'asc')->paginate(6);

        foreach($results as $result) {
            if($result->images) {
                $tempImages = explode('||', $result->images);
                foreach($tempImages as $tempImage) {
                    Storage::delete('public/plants/'.$tempImage);
                }
            }
        }

        $response = [
            'message' => 'List Plants',
            'data' => $results
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlantRequest $request)
    {
        try {
            // Create Plant
            $plant = Plant::create([
                'name' => request('name'),
                'type' => request('type'),
                'origin' => request('origin'),
                'family' => request('family'),
                'growt_rate' => request('growt_rate'),
                'light_demand' => request('light_demand'),
                'co2_demand' => request('co2_demand'),
                'hardness_tolerance' => request('hardness_tolerance'),
                'placement_area' => request('placement_area'),
                'ph_tolerance' => request('ph_tolerance'),
                'temperature' => request('temperature'),
                'growth_height' => request('growth_height'),
                'growth_width' => request('growth_width'),
                'demands' => request('demands'),
                'description' => request('description'),
            ]);

            //Upload Images
            if($request->file('file')) {
                $images = $request->file('file');
                if(!is_array($images)){
                    $imageName = $plant->id.'-'.$images->hashName();
                    Storage::disk('dropbox')->putFileAs('plants', $images, $imageName);
                    $this->dropbox->createSharedLinkWithSettings('plants', $imageName);
                    $imageNames=$imageName;
                }else {
                    $tempNames = [];
                    foreach($images as $image){ 
                        $imageName = $plant->id.'-'.$image->hashName();
                        Storage::disk('dropbox')->putFileAs('plants', $image, $imageName);
                        array_push($tempNames,$imageName);
                    }
                    $imageNames = implode('||',$tempNames);
                }
                $plant->update([
                    'images' => $imageNames,
                ]);
            }

            $response = [
                'message' => 'Plant added successfully'
            ];
            return response()->json($response, Response::HTTP_CREATED);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], Response::HTTP_CONFLICT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = Plant::where('id', $id)->firstOrFail();

            if($result->images != null) {
                $tempImages = explode('||', $result->images);
                $urlImages = [];
                foreach($tempImages as $tempImage) {
                    $link = Storage::disk('dropbox')->url('plants/'. $tempImage);
                    array_push($urlImages,$link);
                }
                $response = [
                    'message' => 'Plant Details',
                    'data' => $result,
                    'imageUrl' => $urlImages,
                ];
            } else{
                $response = [
                    'message' => 'Plant Details',
                    'data' => $result,
                ];                
            }

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $result = Plant::where('id', $id)->firstOrFail();

            //Update Images
            $newTemp = [];

            //Old Images
            if($result->images) {
                $oldImages = explode('||', $result->images);
                if($request->oldImage) {
                    $newImages = explode('||', $request->oldImage);
    
                    //Delete Temp Preview files
                    foreach($oldImages as $old) {
                        if(!in_array($old, $newImages)) {
                            Storage::disk('dropbox')->delete('plants/'.$old);
                        } else {
                            array_push($newTemp, $old);
                        }
                        Storage::delete('public/plants/'.$old);
                    }
                } else {
                    foreach($oldImages as $old) {
                        Storage::disk('dropbox')->delete('plants/'.$old);
                        Storage::delete('public/plants/'.$old);
                        $newTemp = null;
                        $result->update([
                            'images' =>  $newTemp,
                        ]);
                    }
                };
            }

            //New Images
            if($request->file('file')) {
                $images = $request->file('file');
                if(!is_array($images)){
                    $imageName = $result->id.'-'.$images->hashName();
                    Storage::disk('dropbox')->putFileAs('plants', $images, $imageName);
                    $this->dropbox->createSharedLinkWithSettings('plants', $imageName);
                    if($request->oldImage) {
                        array_push($newTemp, $imageName);
                    } else {
                        $newTemp = $imageName;
                    }
                }else {
                    foreach($images as $image){ 
                        $imageName = $result->id.'-'.$image->hashName();
                        Storage::disk('dropbox')->putFileAs('plants', $image, $imageName);
                        array_push($newTemp,$imageName);
                    }
                }
            }

            //Save Images
            if($request->oldImage || $request->file('file')) {
                $newTemp = implode('||',$newTemp);
                $result->update([
                    'images' =>  $newTemp,
                ]);
            }

            //Update data
            $rules = [
                'name' => 'required',
                'type' => 'required', 'string',
                'placement_area' => 'required', 'string',
                'light_demand' => 'required', 'string',
                'co2_demand' => 'required', 'string',
                'hardness_tolerance' => 'required', 'string',
                'ph_tolerance' => 'required', new NotNullChecker, new StringRangeChecker,
                'temperature' => 'required', 'numeric', 'min:10', 'max:32', new NotNullChecker, new StringRangeChecker,
                'growth_height' => 'nullable',
                'growth_width' => 'nullable',
                'growt_rate' => 'required',
                'demands' => 'required',
            ];

            if ($request->name && $request->name != $result->name) {
                $rules['name'] = 'unique:plants,name';
            }

            $validator = Validator::make(
                $request->all(),
                $rules
            );

            if ($validator->fails()) {
                return response([
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if ($request->name != $result->name) {
                $result->update(['name' => $request->name]);
            }

            $result->update([
                'type' => $request->type,
                'origin' => $request->origin,
                'family' => $request->family,
                'growt_rate' => $request->growt_rate,
                'light_demand' => $request->light_demand,
                'co2_demand' => $request->co2_demand,
                'hardness_tolerance' => $request->hardness_tolerance,
                'placement_area' => $request->placement_area,
                'ph_tolerance' => $request->ph_tolerance,
                'temperature' => $request->temperature,
                'growth_height' => $request->growth_height,
                'growth_width' => $request->growth_width,
                'demands' => $request->demands,
                'description' => $request->description,
            ]);

            $response = [
                'message' => 'Data updated successfully !',
                'data' => $result,
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            $result = Plant::where('id', $id)->firstOrFail();

            if($result->images) {
                $oldImages = explode('||', $result->images);

                foreach($oldImages as $old) {
                    Storage::disk('dropbox')->delete('plants/'.$old);
                }
            }

            $result->delete();

            $response = [
                'message' => 'Plant data has been deleted',
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function showImage($id, $images, $edit)
    {
        try {
            $tempImages = explode('||', $images);
            if($edit=="true") {
                $allData = [];
                $data = [];
                foreach($tempImages as $tempImage) {
                    $imageURL = Storage::disk('dropbox')->url('plants/'. $tempImage);
                    $size = Storage::disk('dropbox')->size('plants/'. $tempImage);
                    $extension = Storage::disk('dropbox')->getMimetype('plants/'. $tempImage);

                    // array_push($urlImages,$imageURL);
                    $data['imageName'] = $tempImage;
                    
                    
                    // $data->urlImage = $imageURL;
                    // $data->size = $size;
                    // $data->extension = $extension;

                    $contents = file_get_contents($imageURL);
                    Storage::put('public/plants/'. $tempImage, $contents);
                    $data['size'] = Storage::size('public/plants/'. $tempImage);
                    $data['extension'] = 'image/jpg';
                    array_push($allData, $data);
                    // $tempPath = tempnam(sys_get_temp_dir(), $imageURL);
                    // copy($imageURL, $tempPath);
                }

                $objectData = (object) $allData;

                $response = [
                    'data' => $objectData,
                ];
            } else {
                $imageURL = Storage::disk('dropbox')->url('plants/'. $tempImages[0]);
                $size = Storage::disk('dropbox')->size('plants/'. $tempImages[0]);
                $extension = Storage::disk('dropbox')->getMimetype('plants/'. $tempImages[0]);
    
                $response = [
                    'id' => $id,
                    'imageURL' => $imageURL,
                    'size' => $size,
                    'extension' => $extension,
                ];

            }

            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], Response::HTTP_CONFLICT);
        }
    }
}
