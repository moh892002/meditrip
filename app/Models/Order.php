<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory;


    protected $fillable = [
        "user_id", "hospital_id", "specializtion_id", "status",
        "notes", "files", "patient_name", "patient_email",
        "patient_phone", "disease_description"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specializtion::class, 'specializtion_id');
    }
}
