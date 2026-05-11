<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'categorie',
        'prix',
        'prestataire_id',
    ];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
