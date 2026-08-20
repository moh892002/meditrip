<?php

namespace App\Models;

use Database\Factories\HospitalFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    /** @use HasFactory<HospitalFactory> */
    use HasFactory;


    protected $fillable = [
        "name", "city", "country", "image", "logo", "images", "about",
        "services", "facilities", "beds_num", "founded_year",
        "doctors_count", "staff_count", "operations_count"
    ];

    protected $casts = [
        'services' => 'array',
        'images' => 'array',
    ];

    protected $primaryKey = "id";

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'hospital_specialization', 'hospital_id', 'specialization_id');
    }

    public function specialists()
    {
        return $this->hasMany(Specialist::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function averageRate()
    {
        return $this->rates()->avg('rating');
    }
}
