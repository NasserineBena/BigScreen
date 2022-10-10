<?php

namespace App\Http\Controllers\API;
use Faker\Generator;

use App\Http\Controllers\Controller;
use App\Models\SurveyUser;

use Illuminate\Http\Request;

class SurveyUserController extends Controller
{
    public function sendError($error, $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];
        return response()->json($response, $code);
    }
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
        // check survey and save new userSurvey
        $data = json_decode($request['request'], true);
        foreach($data as $mydata)
        {
            if($mydata == ""){
                return $this->sendError('Il faut remplir tous les champs!');
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
                    return $this->sendError('Cet email existe déjà');
                }
            }
            else{

                return $this->sendError('Le champs âge doit comporter un nombre entre 5 et 120 !');
            }
        }
        else{
            return $this->sendError("Cet email n'est pas au bon format");
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyUser  $surveyUser
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
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
