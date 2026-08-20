<?php

namespace App\Models;

use Database\Factories\SpecialistFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    /** @use HasFactory<SpecialistFactory> */
    use HasFactory;


    protected $fillable = ['name', 'image', 'hospital_id', 'specialization_id', 'rate', 'description', 'price'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
}
