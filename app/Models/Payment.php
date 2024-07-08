<?php

// app/Models/Payment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'amount',
        'type',
        'card_id',
        'boleto_id',
        'status',
    ];

    // Definindo os relacionamentos
    public function boleto()
    {
        return $this->belongsTo(Boleto::class, 'boleto_id');
    }

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
