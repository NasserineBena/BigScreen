<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];
    public function questions(){
        return $this-> hasOne(QuestionType::class);
    }
    public function surveyUser(){
        return $this-> hasOne(SurveyUser::class);
    }
}
