<div class="container">
        <h2>Acheter un Ticket</h2>
        <form action="{{ route('acheter-ticket') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="utilisateur_id">Utilisateur</label>
                <input name="utilisateur_id" value="{{ Auth::user()->id }}" class="form-control" readonly/>
            </div>

            <div class="form-group">
                <label for="heure_debut">Heure de début:</label>
                <input type="time" name="heure_debut" class="form-control" placeholder="Heure de début">
            </div>



            <div class="form-group">
                <label for="montant">Montant:</label>
                <input type="text" name="montant" class="form-control" placeholder="Montant">
            </div>

            <button type="submit" class="btn btn-primary">Acheter le Ticket</button>
        </form>
    </div>
