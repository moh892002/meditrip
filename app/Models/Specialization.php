<?php

namespace App\Models;

use Database\Factories\SpecializationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    /** @use HasFactory<SpecializationFactory> */
    use HasFactory;

    protected $fillable = ["name", "image"];

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_specialization', 'specialization_id', 'hospital_id');
    }

    public function specialists()
    {
        return $this->hasMany(Specialist::class, 'specialization_id');
    }
}
