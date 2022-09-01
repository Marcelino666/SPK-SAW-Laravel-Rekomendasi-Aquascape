<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRankingRequest;
use App\Models\Plant;
use App\Models\Ranking;
use App\Models\Ranking_Detail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RankingController extends Controller
{
    //convertBobot
    public function convertBobot($bobot) {
        if($bobot == 1) {
            return "Very Unimportant";
        } else if($bobot == 2) {
            return "Not important";
        } else if($bobot == 3) {
            return "Quite Important";
        } else if($bobot == 4) {
            return "Important";
        } else {
            return "Very Important";
        }
    }

    //convertTDS
    public function convertTDS($value) {
        if($value == "Soft") {
            return "Soft (0 - 70 ppm)";
        } else if($value == "Soft - Medium") {
            return "Soft - Medium (70 - 140 ppm)";
        } else if($value == "Medium") {
            return "Medium (140 - 210 ppm)";
        } else if($value == "Medium - Hard") {
            return "Medium - Hard (210 - 320 ppm)";
        } else {
            return "Hard (320 - 530 ppm)";
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $user_id = $request->user()->id;

            $ranks = Ranking::select('id as ID', 
            'growt_rate_weight_value as Growt Rate', 
            'light_demand_weight_value as Light Demand', 
            'co2_demand_weight_value as CO2 Demand', 
            'hardness_tolerance_weight_value as Hardness Tolerance', 
            'demands_weight_value as Demands',
            'temperature_weight_value as Water Temperature', 
            'created_at as Date and Time'
            )->where('user_id','=',$user_id)
            ->orderBy('created_at','DESC')->paginate(5);

            foreach($ranks as $rank) {
                $rank->{'Growt Rate'} = $this->convertBobot($rank->{'Growt Rate'});
                $rank->{'Light Demand'} = $this->convertBobot($rank->{'Light Demand'});
                $rank->{'CO2 Demand'} = $this->convertBobot($rank->{'CO2 Demand'});
                $rank->{'Hardness Tolerance'} = $this->convertBobot($rank->{'Hardness Tolerance'});
                $rank->{'Demands'} = $this->convertBobot($rank->{'Demands'});
                $rank->{'Water Temperature'} = $this->convertBobot($rank->{'Water Temperature'});
            }

            $response = [
                'message' => 'List Rank',
                'data' => $ranks,
            ];
    
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRankingRequest $request)
    {
        try {
            $user_id = $request->user()->id;
            $rankUser = Ranking::create([
                'user_id' => $user_id,
                'growt_rate_weight_value' => request('growt_rate_weight_value'),
                'light_demand_weight_value' => request('light_demand_weight_value'),
                'co2_demand_weight_value' => request('co2_demand_weight_value'),
                'hardness_tolerance_weight_value' => request('hardness_tolerance_weight_value'),
                'demands_weight_value' => request('demands_weight_value'),
                'temperature_weight_value' => request('temperature_weight_value'),
                'tank_length' => request('tank_length'),
                'tank_width' => request('tank_width'),
                'tank_height' => request('tank_height'),
                'lighting' => request('lighting'),
                'co2' => request('co2'),
                'temperature' => request('temperature'),
                'ph' => request('ph'),
                'hardness_tolerance' => request('hardness_tolerance'),
            ]);

//------------------------------------------------------ SPK ------------------------------------------------------------------------

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Filter PLants ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            //light Demand
            $divisor = (
                $request->tank_length * 
                $request->tank_width * 
                $request->tank_height
            ) / $request->lighting;

            if ($divisor == 2500) {
                //Medium Light
                $filter1 = 'Low - High';
            }else if ($divisor <= 1250 || ($divisor >= 1250 && $divisor <= 2500)) {
                //Medium - High Light
                $filter1 = 'Medium - High';
                $filter2 = 'Medium';
                $filter3 = 'High';
            } else if ($divisor >= 2500) {
                //Low - Medium Light
                $filter1 = 'Low - Medium';
                $filter2 = 'Low';
                $filter3 = 'Medium';
            } 

            //Hardness tolerance
            if($request->hardness_tolerance == 'Soft' || 
                $request->hardness_tolerance == 'Soft - Medium') {
                $filter4 = 'Soft';
                $filter5 = 'Medium';
                $filter6 = 'Soft - Medium';
            } else if ($request->hardness_tolerance == 'Hard'  || 
                $request->hardness_tolerance == 'Medium - Hard') {
                $filter4 = 'Hard';
                $filter5 = 'Medium';
                $filter6 = 'Medium - Hard';
            }

            //CO2
            if($request->co2 == 'Low' || 
                $request->co2 == 'Low - Medium') {
                $filter7 = 'Low';
                $filter8 = 'Medium';
                $filter9 = 'Low - Medium';
            } else if ($request->co2 == 'High'  || 
                $request->co2 == 'Medium - High') {
                $filter7 = 'High';
                $filter8 = 'Medium';
                $filter9 = 'Medium - High';
            }

            //Get Plants
            if ( $request->hardness_tolerance == 'Medium' || 
                $request->hardness_tolerance == 'Soft - Hard' ) {
                if (
                    $request->co2 == 'Medium' || 
                    $request->co2 == 'Low - High' ) {
                    if ($filter1 == 'Low - High') {
                        $plants = Plant::all();
                    }else {
                        $plants = Plant::all()
                                    ->whereIn('light_demand', 
                                        [$filter1,$filter2,$filter3]);
                    }
                } else {
                    if ($filter1 == 'Low - High') {
                        $plants = Plant::all()
                                    ->whereIn('co2_demand', 
                                        [$filter7,$filter8,$filter9]);
                    }else {
                        $plants = 
                        Plant::all()
                            ->whereIn('light_demand', 
                                [$filter1,$filter2,$filter3])
                            ->whereIn('co2_demand', 
                                [$filter7,$filter8,$filter9]);
                    }
                }
            } else {
                if ( $request->co2 == 'Medium' || $request->co2 == 'Low - High' ) {
                    if ($filter1 == 'Low - High') {
                        $plants = Plant::all()
                                    ->whereIn('hardness_tolerance', 
                                        [$filter4,$filter5,$filter6]);
                    }else {
                        $plants = Plant::all()
                                    ->whereIn('light_demand', 
                                        [$filter1,$filter2,$filter3])
                                    ->whereIn('hardness_tolerance', 
                                        [$filter4,$filter5,$filter6]);
                    }
                } else {
                    if ($filter1 == 'Low - High') {
                        $plants = Plant::all()
                                    ->whereIn('hardness_tolerance', 
                                        [$filter4,$filter5,$filter6])
                                    ->whereIn('co2_demand', 
                                        [$filter7,$filter8,$filter9]);

                    }else {
                        $plants = Plant::all()
                                    ->whereIn('light_demand', 
                                        [$filter1,$filter2,$filter3])
                                    ->whereIn('hardness_tolerance', 
                                        [$filter4,$filter5,$filter6])
                                    ->whereIn('co2_demand', 
                                        [$filter7,$filter8,$filter9]);
                    }
                }
            }
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



    //```````````````````````````````Pembobotan Alternatif````````````````````````````````
            foreach($plants as $plant) {
                // Growt rate weighting
                if($plant->growt_rate == 'Slow') {
                    $growt_rate_weight = 2;
                }else if($plant->growt_rate == 'Medium') {
                    $growt_rate_weight = 4;
                }else { $growt_rate_weight = 6; }

                // Light demand weighting
                if($plant->light_demand == 'Low') {
                    $light_demand_weight = 1;
                }else if($plant->light_demand == 'Low - Medium') {
                    $light_demand_weight = 2;
                }else if($plant->light_demand == 'Medium') {
                    $light_demand_weight = 3;
                }else if($plant->light_demand == 'Medium - High') {
                    $light_demand_weight = 4;
                }else if($plant->light_demand == 'High') {
                    $light_demand_weight = 5;
                }else { $light_demand_weight = 6; }

                // Co2 demand weighting
                if($plant->co2_demand == 'Low') {
                    $co2_demand_weight = 1;
                }else if($plant->co2_demand == 'Low - Medium') {
                    $co2_demand_weight = 2;
                }else if($plant->co2_demand == 'Medium') {
                    $co2_demand_weight = 3;
                }else if($plant->co2_demand == 'Medium - High') {
                    $co2_demand_weight = 4;
                }else if($plant->co2_demand == 'High') {
                    $co2_demand_weight = 5;
                }else { $co2_demand_weight = 6; }

                // Hardness tolerance weighting
                if($plant->hardness_tolerance == 'Soft') {
                    $hardness_tolerance_weight = 1;
                }else if($plant->hardness_tolerance == 'Soft - Medium') {
                    $hardness_tolerance_weight = 2;
                }else if($plant->hardness_tolerance == 'Medium') {
                    $hardness_tolerance_weight = 3;
                }else if($plant->hardness_tolerance == 'Medium - Hard') {
                    $hardness_tolerance_weight = 4;
                }else if($plant->hardness_tolerance == 'Hard') {
                    $hardness_tolerance_weight = 5;
                }else { $hardness_tolerance_weight = 6; }

                // Demands weighting
                if($plant->demands == 'Easy') {
                    $demands_weight = 2;
                }else if($plant->demands == 'Medium') {
                    $demands_weight = 4;
                }else { $demands_weight = 6; }

                // Temperature weighting
                $parts = explode(" - ", $plant->temperature); //convert to array
                $min_temperature = (float)array_shift($parts); //get min temperature
                if($min_temperature >=  10 && $min_temperature <= 13) {
                    $temperature_weight = 2;
                }else if($min_temperature >= 14 && $min_temperature <= 18) {
                    $temperature_weight = 4;
                }else { $temperature_weight = 6; }

                //Save bobot alternatif
                Ranking_Detail::create([
                    'rank_id' => $rankUser->id,
                    'plant_id' => $plant->id,
                    'growt_rate_weight' => $growt_rate_weight,
                    'light_demand_weight' => $light_demand_weight,
                    'co2_demand_weight' => $co2_demand_weight,
                    'hardness_tolerance_weight' => $hardness_tolerance_weight,
                    'temperature_weight' => $temperature_weight,
                    'demands_weight' => $demands_weight,
                ]);
            }
    //```````````````````````````````````` // ````````````````````````````````````````````



    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Normalisasi Alternatif ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            // Get Min and Max criteria
            $ranks = Ranking_Detail::all()->where('rank_id','=',$rankUser->id);

            $max_growt_rate = $ranks->max('growt_rate_weight'); //benefit
            $min_light_demand = $ranks->min('light_demand_weight'); //cost
            $min_co2_demand = $ranks->min('co2_demand_weight'); //cost
            $max_hardness_tolerance = $ranks->max('hardness_tolerance_weight'); //benefit
            $min_demands = $ranks->min('demands_weight'); //cost
            $max_temperature = $ranks->max('temperature_weight'); //benefit

            // Normalisasi alternatif
            foreach($ranks as $rank) {
                // Growt Rate (benefit)
                $growt_rate_normalization_weight = 
                    $rank->growt_rate_weight/$max_growt_rate; 
                
                // Light Demand (cost)
                $light_demand_normalization_weight = 
                    $min_light_demand/$rank->light_demand_weight;

                // CO2 Demand (cost)
                $co2_demand_normalization_weight = 
                    $min_co2_demand/$rank->co2_demand_weight;

                // Hardness Tolerance (benefit)
                $hardness_tolerance_normalization_weight = 
                    $rank->hardness_tolerance_weight/$max_hardness_tolerance;

                // Demands (cost)
                $demands_normalization_weight = 
                    $min_demands/$rank->demands_weight;

                // Temperature (benefit)
                $temperature_normalization_weight = 
                    $rank->temperature_weight/$max_temperature;

                // Save Normalization
                $rank->update([
                    'growt_rate_normalization_weight' => $growt_rate_normalization_weight,
                    'light_demand_normalization_weight' => $light_demand_normalization_weight,
                    'co2_demand_normalization_weight' => $co2_demand_normalization_weight,
                    'hardness_tolerance_normalization_weight' => $hardness_tolerance_normalization_weight,
                    'demands_normalization_weight' => $demands_normalization_weight,
                    'temperature_normalization_weight' => $temperature_normalization_weight,
                ]);
            }
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~||~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



    //`````````````````````````````````````````` Normalisasi bobot preferensi dari user `````````````````````````````````````
            $sum = $request->growt_rate_weight_value + 
                    $request->light_demand_weight_value + 
                    $request->co2_demand_weight_value + 
                    $request->hardness_tolerance_weight_value +
                    $request->demands_weight_value +
                    $request->temperature_weight_value;

            $normalisasi_growt_rate =  $request->growt_rate_weight_value / $sum;
            $normalisasi_light_demand = $request->light_demand_weight_value / $sum;
            $normalisasi_co2_demand = $request->co2_demand_weight_value / $sum;
            $normalisasi_hardness_tolerance = $request->hardness_tolerance_weight_value / $sum;
            $normalisasi_demands = $request->demands_weight_value / $sum;
            $normalisasi_temperature = $request->temperature_weight_value / $sum;
    //````````````````````````````````````````````````````````` || ``````````````````````````````````````````````````````````



    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Menentukan nilai akhir Alternatif ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            foreach($ranks as $rank) {
                $total =    
                    ($normalisasi_growt_rate * $rank->growt_rate_normalization_weight) + 
                    ($normalisasi_light_demand * $rank->light_demand_normalization_weight) + 
                    ($normalisasi_co2_demand * $rank->co2_demand_normalization_weight) + 
                    ($normalisasi_hardness_tolerance * $rank->hardness_tolerance_normalization_weight) + 
                    ($normalisasi_demands * $rank->demands_normalization_weight) +
                    ($normalisasi_temperature * $rank->temperature_normalization_weight);

                $rank->update(['total' => $total]);
            }
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ || ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            $response = [
                'message' => 'Recommendation has been successful',
                'rank_id' => $rankUser->id,
                // 'plant' => $ranks->sortByDesc('total'),
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        try {
            $user_id = $request->user()->id;
            $rank = Ranking::select(
                'id',
                'user_id',
                'growt_rate_weight_value',
                'light_demand_weight_value',
                'co2_demand_weight_value',
                'hardness_tolerance_weight_value',
                'demands_weight_value',
                'temperature_weight_value',
                'tank_length',
                'tank_width',
                'tank_height',
                'lighting',
                'co2',
                'temperature',
                'ph',
                'hardness_tolerance',
                'created_at'
                )
                ->where('id','=',$id)
                ->where('user_id','=',$user_id)
                ->firstOrFail();

            $rank->growt_rate_weight_value = $this->convertBobot($rank->growt_rate_weight_value);
            $rank->light_demand_weight_value = $this->convertBobot($rank->light_demand_weight_value);
            $rank->co2_demand_weight_value = $this->convertBobot($rank->co2_demand_weight_value);
            $rank->hardness_tolerance_weight_value = $this->convertBobot($rank->hardness_tolerance_weight_value);
            $rank->demands_weight_value = $this->convertBobot($rank->demands_weight_value);
            $rank->temperature_weight_value = $this->convertBobot($rank->temperature_weight_value);

            $rank->hardness_tolerance = $this->convertTDS($rank->hardness_tolerance);

            $details = Ranking_Detail::select(
                'id',
                'plant_id'
            )->where('rank_id','=',$id)
            ->orderBy('total','DESC')->get();

            $ranking = 0;
            foreach($details as $detail) {
                $detail->plant_name = Plant::select('name')->where('id','=', $detail->plant_id)->pluck('name')->firstOrFail();
                $detail->images = Plant::select('images')->where('id','=', $detail->plant_id)->pluck('images')->firstOrFail();
                $detail->rank = $ranking + 1;
                $ranking++;
            }

            $pages = Ranking_Detail::select(
                'id',
                'plant_id',
                'total',
                'growt_rate_weight',
                'light_demand_weight',
                'co2_demand_weight',
                'hardness_tolerance_weight',
                'demands_weight',
                'temperature_weight',
                'growt_rate_normalization_weight',
                'light_demand_normalization_weight',
                'co2_demand_normalization_weight',
                'hardness_tolerance_normalization_weight',
                'demands_normalization_weight',
                'temperature_normalization_weight',
            )->where('rank_id','=',$id)->orderBy('total','DESC')->orderBy('plant_id','ASC')->paginate(6);

            //Convert SubCriteria
            function convertGrowtRate($bobot) {
                if($bobot == 2) {
                    return "Slow (2)";
                } else if($bobot == 4) {
                    return "Mendium (4)";
                } else {
                    return "Fast (6)";
                }
            }
            function convertLightDemandCO2Demand($bobot) {
                if($bobot == 1) {
                    return "Low (1)";
                } else if($bobot == 2) {
                    return "Low - Medium (2)";
                } else if($bobot == 3) {
                    return "Medium (3)";
                } else if($bobot == 4) {
                    return "Medium - High (4)";
                } else if($bobot == 5){
                    return "High (5)";
                } else {
                    return "Low - High (6)";
                }
            }
            function convertWaterHardness($bobot) {
                if($bobot == 1) {
                    return "Soft (1)";
                } else if($bobot == 2) {
                    return "Soft - Medium (2)";
                } else if($bobot == 3) {
                    return "Medium (3)";
                } else if($bobot == 4) {
                    return "Medium - Hard (4)";
                } else if($bobot == 5){
                    return "Hard (5)";
                } else {
                    return "Soft - Hard (6)";
                }
            }
            function convertDemands($bobot) {
                if($bobot == 2) {
                    return "Easy (2)";
                } else if($bobot == 4) {
                    return "Mendium (4)";
                } else {
                    return "Difficult (6)";
                }
            }
            function convertTemperature($bobot) {
                if($bobot == 2) {
                    return "10°C - 13°C (2)";
                } else if($bobot == 4) {
                    return "14°C - 18°C (4)";
                } else {
                    return "19°C - 22°C (6)";
                }
            }


            $this->convertBobot($rank->growt_rate_weight_value);

            foreach($pages as $page) {
                    foreach($details as $detail) {
                    if($page->id == $detail->id) {
                        $page->growt_rate_weight =  convertGrowtRate($page->growt_rate_weight);
                        $page->light_demand_weight =  convertLightDemandCO2Demand($page->light_demand_weight);
                        $page->co2_demand_weight =  convertLightDemandCO2Demand($page->co2_demand_weight);
                        $page->hardness_tolerance_weight =  convertWaterHardness($page->hardness_tolerance_weight);
                        $page->demands_weight =   convertDemands($page->demands_weight);
                        $page->temperature_weight =  convertTemperature($page->temperature_weight);
                        $page->plant_name = $detail->plant_name;
                        $page->images = $detail->images;
                        $page->rank = $detail->rank;
                    }
                }
            }

            $response = [
                'message' => 'Rank Details',
                'rank' => $rank,
                'details' => $pages,
            ];
            
            return response()->json($response, Response::HTTP_OK);
        }catch(\Exception $exception) {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
