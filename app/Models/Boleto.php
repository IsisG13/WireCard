<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'numero_boleto',
        // Outros campos que deseja permitir atribuição em massa
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
