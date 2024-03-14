<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'date_achat', 'heure','montant'
    ];

    public function utilisuserateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
