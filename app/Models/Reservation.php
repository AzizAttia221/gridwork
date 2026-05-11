<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_client',
        'email_client',
        'date_reservation',
        'statut',
        'service_id',
    ];

    protected $casts = [
        'date_reservation' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
