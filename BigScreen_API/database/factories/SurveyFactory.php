<?php

namespace Database\Factories;

use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{




    public function randomData($arrayData){
        $key = array_rand($arrayData);
        return $key;
    }

    public function getSurveys(){
        for($i=0; $i<20; $i++){
        }
    }

    public function definition()
    {
        $responseThreeRandom = [
            'Homme', 'Femme', 'Préfère ne pas répondre'
        ];

        $responseSixRandom = [
            'Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'Valve index'
        ];

        $responseSevenRandom = [
            'SteamVR', 'Occulus store', 'Viveport', 'Windows store'
        ];

        $responseEightRandom = [
            'Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'PSVR', 'Autre', 'Aucun'
        ];

        $responseTenRandom = [
            'regarder la TV en direct', 'regarder des films', 'travailler', 'jouer en solo', 'jouer en équipe'
        ];

        $responseSixteenSeventeenRandom = [
            'Oui', 'Non'
        ];
        $surveyResponseData = [];

        $j = 1;

        // while($j<3){
        //     $surveyResponseDataByUser = [];
        //     for($i=0; $i<20; $i++){
        //         switch($i){
        //             case 0:
        //                 continue;
        //             case 1:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(10,100),
        //                 ]);
        //             case 2:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $responseThreeRandom[$this->randomData($responseThreeRandom)],
        //                 ]);
        //             case 3:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 4:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $this->faker->sentence(5),
        //                 ]);
        //             case 5:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $responseSixRandom[$this->randomData($responseSixRandom)],
        //                 ]);
        //             case 6:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $responseSevenRandom[$this->randomData($responseSevenRandom)],
        //                 ]);
        //             case 7:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $responseEightRandom[$this->randomData($responseEightRandom)],
        //                 ]);
        //             case 8:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 9:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $responseTenRandom[$this->randomData($responseTenRandom)],
        //                 ]);
        //             case 10:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 11:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 12:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 13:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 14:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 15:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $responseSixteenSeventeenRandom[$this->randomData($responseSixteenSeventeenRandom)],
        //                 ]);
        //             case 16:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $responseSixteenSeventeenRandom[$this->randomData($responseSixteenSeventeenRandom)],
        //                 ]);
        //             case 17:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 18:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => rand(0, 5),
        //                 ]);
        //             case 19:
        //                 array_push($surveyResponseDataByUser,
        //                 [
        //                 'question_id' => $i,
        //                 'survey_user_id'=> $j,
        //                 'response' => $this->faker->paragraph(),
        //                 ]);

        //         }
        //     }
        //     array_push($surveyResponseData,$surveyResponseDataByUser);
        //     $j++;
        // }
    return $surveyResponseData;
    }


}
