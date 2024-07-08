<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'card_number',
        'card_name',
        'card_expiration',
        'card_cvv',
        // Outros campos que deseja permitir atribuição em massa
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
