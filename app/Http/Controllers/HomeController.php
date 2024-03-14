<?php

namespace App\Http\Controllers;

use App\Models\CaisseJournaliere;
use App\Models\Categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $date = now()->toDateString();
        $total_caisse = (int) CaisseJournaliere::whereDate('date_caissse', $date)->sum('montant_total');
        // modification pour la 2eme version
        $categories = Categorie::all();
        //fin modification pour la 2eme version
        return view('index3',compact('total_caisse','categories'));
    }
}
