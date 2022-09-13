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
        QuestionType::create(['question'=>'Quel marque de casque VR utilisez-vous ?','response_possibility'=>json_encode(['Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'Valve index']),'type'=>'A']);
        QuestionType::create(['question'=>'Sur quel magasin d’application achetez vous des contenus VR ?','response_possibility'=>json_encode(['SteamVR', 'Occulus store', 'Viveport', 'Windows store']),'type'=>'A']);
        QuestionType::create(['question'=>'Quel casque envisagez-vous d’acheter dans un futur proche ?','response_possibility'=>json_encode(['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'PSVR', 'Autre','Aucun']),'type'=>'A']);
        QuestionType::create(['question'=>'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder
        Bigscreen ?','type'=>'C']);
        QuestionType::create(['question'=>'Vous utilisez principalement Bigscreen pour :','response_possibility'=>json_encode(['regarder la TV en direct', 'regarder des films', 'travailler',
        'jouer en solo', 'jouer en équipe']),'type'=>'A']);
        QuestionType::create(['question'=>'Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?','type'=>'C']);
        QuestionType::create(['question'=>'Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?','type'=>'C']);
        QuestionType::create(['question'=>'Combien donnez-vous de point pour la connexion réseau de Bigscreen ?','type'=>'C']);
        QuestionType::create(['question'=>'Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?','type'=>'C']);
        QuestionType::create(['question'=>'Combien donnez-vous de point pour la qualité audio dans Bigscreen ?','type'=>'C']);
        QuestionType::create(['question'=>'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 'response_possibility'=>json_encode(['Oui','Non']),'type'=>'A']);
        QuestionType::create(['question'=>'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?','response_possibility'=>json_encode(['Oui','Non']),'type'=>'A']);
        QuestionType::create(['question'=>'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?','type'=>'C']);
        QuestionType::create(['question'=>'Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?','type'=>'C']);
        QuestionType::create(['question'=>'Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?','type'=>'B']);
    }
}
