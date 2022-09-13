<?php

namespace Database\Seeders;
use App\Models\QuestionType;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre age','type'=>'B']);
        QuestionType::create(['question'=>'Votre sexe','response_possibility'=>json_encode(['Homme', 'Femme', 'Préfère ne pas répondre']),'type'=>'A']);
        QuestionType::create(['question'=>'Nombre de personne dans votre foyer (adulte & enfants)','type'=>'C']);
        QuestionType::create(['question'=>'Votre profession','type'=>'B']);
        QuestionType::create(['question'=>'Quel marque de casque VR utilisez-vous ?','response_possibility'=>json_encode(['Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed
Reality', 'Valve index']),'type'=>'A']);
        QuestionType::create(['question'=>'Sur quel magasin d’application achetez vous des contenus VR ?','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
        QuestionType::create(['question'=>'Votre adresse mail','type'=>'B']);
    }
}
