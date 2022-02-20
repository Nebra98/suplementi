<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitamin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'generalDescription', 
        'found',
        'antiAgingRole',
        'deficiencySymptoms',
        'therapeuticDoses',
        'maximumSafeLevel',
        'sideEffects',
        'contraindications',
        'interactions',
        'highRiskGroups',
        'compositionFormulas',
        'otherRemarks',
        'lang',
        'slug',
        'image',
    ];

}
