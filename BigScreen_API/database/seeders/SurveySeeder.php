<?php

namespace Database\Seeders;
use Illuminate\Support\Arr;
use Faker\Generator;
use App\Models\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SurveySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function randomData($arrayData){
        $key = array_rand($arrayData);
        return $key;
    }

    public function getSurveys(){
        for($i=0; $i<20; $i++){
        }
    }
    public function run()
    {
        $faker = app(Generator::class);
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
        while($j<3){
            for($i=1; $i<21; $i++){
                switch($i){
                    case 1:
                        break;
                    case 2:
                        Survey::create(['question_id' => $i, 'survey_user_id'=> $j,'response' => rand(10,100)]);
                        break;
                    case 3:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $responseThreeRandom[$this->randomData($responseThreeRandom)],
                        ]);
                        break;
                    case 4:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 5:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $faker->sentence(5),
                        ]);
                        break;
                    case 6:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $responseSixRandom[$this->randomData($responseSixRandom)],
                        ]);
                        break;
                    case 7:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $responseSevenRandom[$this->randomData($responseSevenRandom)],
                        ]);
                        break;
                    case 8:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $responseEightRandom[$this->randomData($responseEightRandom)],
                        ]);
                        break;
                    case 9:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 10:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $responseTenRandom[$this->randomData($responseTenRandom)],
                        ]);
                        break;
                    case 11:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 12:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 13:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 14:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 15:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 16:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $responseSixteenSeventeenRandom[$this->randomData($responseSixteenSeventeenRandom)],
                        ]);
                        break;
                    case 17:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $responseSixteenSeventeenRandom[$this->randomData($responseSixteenSeventeenRandom)],
                        ]);
                        break;
                    case 18:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 19:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => rand(0, 5),
                        ]);
                        break;
                    case 20:
                        Survey::create(
                        [
                        'question_id' => $i,
                        'survey_user_id'=> $j,
                        'response' => $faker->paragraph(),
                        ]);
                        break;

                }
            }
            $j++;
        }
       // Survey::factory(1)->create();
    }
}
