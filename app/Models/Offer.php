<?php

namespace App\Models;

use Database\Factories\OfferFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /** @use HasFactory<OfferFactory> */
    use HasFactory;


    protected $fillable = ["name", "image", "price", "offer_price", "hospital_id", "description", "valid_until"];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
