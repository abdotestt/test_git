<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsCaisseJournaliere extends Model
{
    use HasFactory;
    protected $table = 'details_caisse_journaliere';
    protected $primaryKey = 'detail_id';
    public $timestamps = false;

    protected $fillable = [
        'caisse_id', 'ticket_id'
    ];

    public function caisseJournaliere()
    {
        return $this->belongsTo(CaisseJournaliere::class, 'caisse_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
