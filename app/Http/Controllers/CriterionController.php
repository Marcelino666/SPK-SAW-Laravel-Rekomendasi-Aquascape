<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Criterion;
use App\Models\Subcriterion;

class CriterionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcriteria = Subcriterion::all();
        $subcriteria1 = $subcriteria->where('criteria_id','=',1);
        $subcriteria2 = $subcriteria->where('criteria_id','=' ,2);
        $subcriteria3 = $subcriteria->where('criteria_id','=',3);
        $subcriteria4 = $subcriteria->where('criteria_id','=',4);
        $subcriteria5 = $subcriteria->where('criteria_id','=',5);
        $subcriteria6 = $subcriteria->where('criteria_id','=',6);

        foreach($subcriteria6 as $sub6) {
            if($sub6->weight_value == 2) {
                $sub6->subcriteria_name = "10°C - 13°C";
            } else if($sub6->weight_value == 4) {
                $sub6->subcriteria_name = "14°C - 18°C";
            } else {
                $sub6->subcriteria_name = "19°C - 22°C";
            }
        }

        $response = [
            'message' => 'List Criteria',
            'criteria' => Criterion::get(),
            'subcriteria_1' => $subcriteria1,
            'subcriteria_2' => $subcriteria2,
            'subcriteria_3' => $subcriteria3,
            'subcriteria_4' => $subcriteria4,
            'subcriteria_5' => $subcriteria5,
            'subcriteria_6' => $subcriteria6,
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
