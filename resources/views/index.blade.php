<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>systeme de gestion </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 text-center">
                        <h1 class="mt-4">Systeme de gestion </h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">caisse actuel </li>
                        </ol> -->
                        <div class="row ">
                                <div class="col-xl-4 col-md-6" data-toggle="modal" data-target="#myModal">
                                    <div class="card bg-secondary text-white mb-4">
                                        <div><img src="./assets/img/man.png" alt=""  width="100px" height="120px"></div>
                                        <div class="card-body text-center">Homme</div>
                                        {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">Choisir</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-" data-toggle="modal" data-target="#myModal">
                                    <div class="card bg-warning text-white mb-4">
                                        <div><img src="./assets/img/woman.png" alt="" width="100px" height="120px"></div>
                                        <div class="card-body">Femme</div>
                                        {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">Choisir</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-success text-white mb-4" data-toggle="modal" data-target="#myModal">
                                        <div><img src="./assets/img/b.png" alt="" width="100px" height="120px"></div>

                                        <div class="card-body">Enfant</div>
                                        {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">Choisir</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div> --}}
                                    </div>
                                </div>

                        </div>
                        <div>
                            <h1 class="p-4">Details de vente</h1>
                        </div>
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        L'historique des vente
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6">

                                <div class="card  text-black mb-4">
                                    <div class="card-body">La Date Du Jour</div>
                                    <div class="card-footer">
                                       <p id="date">14/12/2023</p>
                                    </div>
                                </div>
                                <div class="card  text-black mb-4">
                                    <div class="card-body">Total vente du jour</div>
                                    <div class="card-footer d">
                                        <div class="small text-black"><span id="caisse" name="caisse">{{ $total_caisse }}</span>DH</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Abdelmoughit 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>


            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="container">
                            <h2>Acheter un Ticket</h2>
                            <form action="{{ route('acheter-ticket') }}" method="post">
                                @csrf

                                {{-- <div class="form-group">
                                    <label for="utilisateur_id">Utilisateur</label>
                                    <input name="utilisateur_id" value="{{ Auth::user()->id }}" class="form-control" readonly/>
                                </div> --}}
{{--
                                <div class="form-group">
                                    <label for="heure_debut">Heure de début:</label>
                                    <input type="time" name="heure_debut" class="form-control" placeholder="Heure de début">
                                </div> --}}



                                {{-- <div class="form-group">
                                    <label for="montant">Montant:</label>
                                    <input type="text" name="montant" class="form-control" placeholder="Montant">
                                </div> --}}

                                <button type="submit" class="btn btn-primary">Acheter le Ticket</button>
                            </form>
                        </div>


                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Bootstrap JS and Popper.js -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            </body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
