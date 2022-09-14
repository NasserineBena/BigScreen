<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$allResponses = Survey::all();

        // On retourne les informations des utilisateurs en JSON
        //return response()->json($allResponses);
        $allResponses = Survey::where('responseOne','howard76@hotmail.com')->firstOrFail();
        return $allResponses;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey = new Survey;
        $survey->responseOne = $request->responseOne;
        $survey->responseTwo = $request->responseTwo;
        $survey->responseThree = $request->responseThree;
        $survey->responseFour = $request->responseFour;
        $survey->responseFive = $request->responseFive;
        $survey->responseSix = $request->responseSix;
        $survey->responseSeven = $request->responseSeven;
        $survey->responseEight = $request->responseEight;
        $survey->responseNine = $request->responseNine;
        $survey->responseTen = $request->responseTen;
        $survey->responseEleven = $request->responseEleven;
        $survey->responseTwelve = $request->responseTwelve;
        $survey->responseThirteen = $request->responseThirteen;
        $survey->responseFourteen = $request->responseFourteen;
        $survey->responseFifteen = $request->responseFifteen;
        $survey->responseSixteen = $request->responseSixteen;
        $survey->responseSeventeen = $request->responseSeenteen;
        $survey->responseEighteen = $request->responseEighteen;
        $survey->responseNineteen = $request->responseNineteen;
        $survey->responseTwenty = $request->responseTwenty;

        $survey->save();
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
