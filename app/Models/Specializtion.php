<?php

namespace App\Models;

use Database\Factories\SpecializtionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specializtion extends Model
{
    /** @use HasFactory<SpecializtionFactory> */
    use HasFactory;

    protected $fillable = ["name", "image"];

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_specialization', 'specializtion_id', 'hospital_id');
    }

    public function specialists()
    {
        return $this->hasMany(Specialist::class, 'specializtion_id');
    }
}
