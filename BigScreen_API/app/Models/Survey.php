<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'responseOne',
        'responseTwo',
        'responseThree',
        'responseFour',
        'responseFive',
        'responseSix',
        'responseSeven',
        'responseEight',
        'responseNine',
        'responseTen',
        'responseEleven',
        'responseTwelve',
        'responseThirteen',
        'responseFourteen',
        'responseFifteen',
        'responseSixteen',
        'responseSeventeen',
        'responseEighteen',
        'responseNineteen',
        'responseTwenty',
    ];
}
