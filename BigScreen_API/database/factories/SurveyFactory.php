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

    return $surveyResponseData;
    }


}
