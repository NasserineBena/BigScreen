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
        $allSurveyUser = SurveyUser::All();
        return response()->json($allSurveyUser);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request['request'], true);
        foreach($data as $mydata)
        {
            if($mydata==""){
                return response()->json("Tous les champs doivent être remplis");
            }

        }
        if(filter_var($data[1], FILTER_VALIDATE_EMAIL)){
            // return is_numeric($data[2]);
            if(is_numeric($data[2]) && (int)$data[2]<100 && (int)$data[2]>5){
                $a =  SurveyUser::where('email','=', $data[1]) -> first();
                // return "true";
                if(!$a){
                    $faker= app(Generator::class);
                    $surveyUser = new SurveyUser;
                    $surveyUser->email = $data[1];
                    $surveyUser->token= $faker->regexify('[A-Za-z0-9]{20}');
                    $surveyUser->save();
                    return response()->json($surveyUser);
                }
                else{
                    return response()->json("Cet email existe déjà");
                }
            }
            else{
                return response()->json("L'âge doit être numeric et plus grand que 5 ans ");
            }
        }
        else{
            return response()->json("Cet email n'est pas au bon format");
        }
        
        // $faker= app(Generator::class);
        // $surveyUser = new SurveyUser;
        // $surveyUser->email = $request->email;
        // $surveyUser->token= $faker->regexify('[A-Za-z0-9]{20}');
        // $surveyUser->save();
        // return response()->json($surveyUser);
        // $faker= app(Generator::class);
        // $validator = $this->validate($request,[
        //      'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',]);
        // $validator = \Validator::make($request, [
        //     'email' => 'required|email'])
        // $this->validate($request, [
        //     "1" => 'required|email'
        // ]);
        // if(is_numeric($request->2)){
        //     return response()->json(true)
        // }
        // // return response()->json($validate);
        // $faker= app(Generator::class);
        // $surveyUser = new SurveyUser;
        // $surveyUser->email = $request->email;
        // $surveyUser->token= $faker->regexify('[A-Za-z0-9]{20}');
        // $surveyUser->save();
       
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyUser  $surveyUser
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        $userSurvey = SurveyUser::where('token','=',$token) -> first();
        return response()->json($userSurvey);

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
