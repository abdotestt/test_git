<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaisseJournaliere extends Model
{
    use HasFactory;
    protected $table = 'caisse_journaliere';
    protected $primaryKey = 'id';
    // public $timestamps = false;

    protected $fillable = [
        'date_caissse', 'montant_total'
    ];
}
