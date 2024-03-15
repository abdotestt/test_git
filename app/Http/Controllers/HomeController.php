<?php

namespace App\Http\Controllers;

use App\Models\CaisseJournaliere;
use App\Models\Categorie;
use App\Models\Ticket;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $date = now()->toDateString();
        $total_caisse = (int) CaisseJournaliere::whereDate('date_caissse', $date)->sum('montant_total');
        // modification pour la 2eme version
        $categories = Categorie::all();
        $mc = Ticket::where(['categorie_id' => 1, 'date_achat' => $date])->sum('montant');
        $wc = Ticket::where(['categorie_id' => 2, 'date_achat' => $date])->sum('montant');
        $k4c = Ticket::where(['categorie_id' => 3, 'date_achat' => $date])->sum('montant');
        $k5c = Ticket::where(['categorie_id' => 4, 'date_achat' => $date])->sum('montant');
        $k6c = Ticket::where(['categorie_id' => 5, 'date_achat' => $date])->sum('montant');



        //fin modification pour la 2eme version
        return view('index3',compact('total_caisse','categories','k4c','k5c','k6c','mc','wc'));
    }
}
