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

        return [
            'responseOne' => $this->faker->email,
            'responseTwo'=> rand(10,100),
            'responseThree'=> $responseThreeRandom[$this->randomData($responseThreeRandom)],
            'responseFour' => rand(0, 5),
            'responseFive' => $this->faker->sentence(5),
            'responseSix' => $responseSixRandom[$this->randomData($responseSixRandom)],
            'responseSeven' => $responseSevenRandom[$this->randomData($responseSevenRandom)],
            'responseEight' => $responseEightRandom[$this->randomData($responseEightRandom)],
            'responseNine' => rand(0, 5),
            'responseTen' => $responseTenRandom[$this->randomData($responseTenRandom)],
            'responseEleven' => rand(0, 5),
            'responseTwelve' => rand(0, 5),
            'responseThirteen' => rand(0, 5),
            'responseFourteen' => rand(0, 5),
            'responseFifteen' => rand(0, 5),
            'responseSixteen' => $responseSixteenSeventeenRandom[$this->randomData($responseSixteenSeventeenRandom)],
            'responseSeventeen' => $responseSixteenSeventeenRandom[$this->randomData($responseSixteenSeventeenRandom)],
            'responseEighteen' => rand(0, 5),
            'responseNineteen' => rand(0, 5),
            'responseTwenty'  => $this->faker->paragraph(),
        ];
    }


}
