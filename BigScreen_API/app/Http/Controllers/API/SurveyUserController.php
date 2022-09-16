<?php

namespace App\Http\Controllers\API;
use Faker\Generator;
use App\Http\Controllers\Controller;
use App\Models\SurveyUser;
use Illuminate\Http\Request;

class SurveyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveyUser= SurveyUser::all();
        return $surveyUser;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $faker= app(Generator::class);
        $surveyUser = new SurveyUser;
        $surveyUser->email = $request->email;
        $surveyUser->token= $faker->regexify('[A-Za-z0-9]{20}');
        $surveyUser->save();
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyUser  $surveyUser
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyUser $surveyUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyUser  $surveyUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyUser $surveyUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyUser  $surveyUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyUser $surveyUser)
    {
        //
    }
}
