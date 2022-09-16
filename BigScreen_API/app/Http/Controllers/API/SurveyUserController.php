<?php

namespace App\Http\Controllers\API;
<<<<<<< HEAD
use Faker\Generator;
=======

>>>>>>> d127543262757a87089419729149f8cad2cbf782
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
<<<<<<< HEAD
        $surveyUser= SurveyUser::all();
        return $surveyUser;
=======
        $allSurveyUser = SurveyUser::All();
        return response()->json($allSurveyUser);
>>>>>>> d127543262757a87089419729149f8cad2cbf782
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
<<<<<<< HEAD
    {   
        $faker= app(Generator::class);
        $surveyUser = new SurveyUser;
        $surveyUser->email = $request->email;
        $surveyUser->token= $faker->regexify('[A-Za-z0-9]{20}');
        $surveyUser->save();
        return response()->json($request);
=======
    {
        //
>>>>>>> d127543262757a87089419729149f8cad2cbf782
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
