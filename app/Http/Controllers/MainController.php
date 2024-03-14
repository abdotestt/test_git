<?php

namespace App\Http\Controllers;

use App\Models\CaisseJournaliere;
use App\Models\Categorie;
use App\Models\DetailsCaisseJournaliere;
// use App\Models\DetailsCaisseJournaliere;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function info_ticket($id){
        $dateAchat = now();
        $heureDebut = now()->tz('Europe/Paris')->format('H:i:s');
        $montant = Categorie::where('id', $id)->value('prix');
        $libelle = Categorie::where('id', $id)->value('libelle');
        $ticketNumber = Ticket::get()->count()+1;

        // $montant = $request->input('montant');


        return view('confirmation',compact('dateAchat','heureDebut','montant','libelle','ticketNumber'));
        // return dd($id);
    }

    public function acheterTicket(Request $request)
    {
        // Supposons que vous avez un formulaire avec les champs nécessaires
        $user_id = Auth::user()->id;
        $dateAchat = now();
        $heureDebut = now()->tz('Europe/Paris')->format('H:i:s');
        $montant = $request->input('montant');

        // Créer une ligne de ticket
        $ticket = Ticket::create([
            'user_id' => $user_id,
            'date_achat' => $dateAchat,
            'heure' => $heureDebut,
            'montant' => $montant,
        ]);
        // // Créer une ligne de détails associée
        // $idC = $this->getCaisseId();
        // DetailsCaisseJournaliere::create([
        //     'caisse_id' => $idC,
        //     'ticket_id' => $ticket->ticket_id,
        // ]);
        // Mise à jour du montant dans la table CaisseJournaliere
        $this->updateCaisseJournaliere($montant);
        // Redirection ou affichage de la vue appropriée
        return redirect()->to("/");
    }

    protected function getCaisseId()
    {
        // Obtenez la caisse journalière pour aujourd'hui, créez si elle n'existe pas encore
        $date = now()->toDateString();

        $caisse = CaisseJournaliere::where('date_caissse', $date)->first();

        // If the record doesn't exist, create a new one
        if (!$caisse) {
            $caisse = CaisseJournaliere::create([
                'date_caissse' => $date,
                'montant_total' => 0,
            ]);
        }


        return $caisse->caissse_id;
    }

    protected function updateCaisseJournaliere($montant)
    {
        // Obtenez la caisse journalière pour aujourd'hui, créez si elle n'existe pas encore
        $date = now()->toDateString();

$caisse = CaisseJournaliere::where('date_caissse', $date)->first();

// If the record doesn't exist, create a new one
if (!$caisse) {
    $caisse = CaisseJournaliere::create([
        'date_caissse' => $date,
        'montant_total' => 0,
    ]);
}


        // Mettez à jour le montant total
        $caisse->montant_total += $montant;
        $caisse->save();
}
}

