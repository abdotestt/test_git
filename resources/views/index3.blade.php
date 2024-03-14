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
        <style>
            .title-word {
            animation: color-animation 4s linear infinite;
            }

            .title-word-1 {
            --color-1: #DF8453;
            --color-2: #3D8DAE;
            --color-3: #E4A9A8;
            }

            .title-word-2 {
            --color-1: #DBAD4A;
            --color-2: #ACCFCB;
            --color-3: #17494D;
            }

            .title-word-3 {
            --color-1: #ACCFCB;
            --color-2: #E4A9A8;
            --color-3: #ACCFCB;
            }

            .title-word-4 {
            --color-1: #3D8DAE;
            --color-2: #DF8453;
            --color-3: #E4A9A8;
            }

            @keyframes color-animation {
            0%    {color: var(--color-1)}
            32%   {color: var(--color-1)}
            33%   {color: var(--color-2)}
            65%   {color: var(--color-2)}
            66%   {color: var(--color-3)}
            99%   {color: var(--color-3)}
            100%  {color: var(--color-1)}
            }

            /* Here are just some visual styles. 🖌 */

            .container {
            display: grid;
            place-items: center;
            text-align: center;
            height: 20vh
            }

            .title {
            font-family: "Montserrat", sans-serif;
            font-weight: 800;
            font-size: 2.5vw;
            text-transform: uppercase;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 text-center">
                        {{-- <h1 class="mt-4">   </h1> --}}
                        <div class="container">
                            <h2 class="title">
                                <span class="title-word title-word-1">Systeme</span>
                                <span class="title-word title-word-2">de</span>
                                <span class="title-word title-word-3">gestion</span>
                            </h2>
                        </div>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">caisse actuel </li>
                        </ol> -->
                        <div class="row ">
                                @foreach ($categories as $categorie )
                                    <div  class="col-xl-4 col-md-6" data-toggle="modal" data-target="#myModal" >
                                        <div class="card bg-secondary text-white mb-4" onclick="getPrix('{{ $categorie->prix }}')">
                                            <div><img src="./assets/img/{{ $categorie->libelle }}.png" alt=""  width="100px" height="120px"></div>
                                            <div class="card-body text-center"><span id="libelle">{{ $categorie->libelle }}</span></div>
                                            {{-- <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="#">Choisir</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                            </div> --}}
                                            @php
                                                $i=$categorie->libelle;
                                            @endphp
                                        </div>
                                        <a href="{{ route('info',$categorie->id) }}" class="btn btn-primary">Ticket</a>

                                    </div>



                                @endforeach

                                {{-- <div class="col-xl-4 col-md-" data-toggle="modal" data-target="#myModal">
                                    <div class="card bg-warning text-white mb-4" onclick="getPrix('femme')">
                                        <div><img src="./assets/img/woman.png" alt="" width="100px" height="120px"></div>
                                        <div class="card-body">Femme</div>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-success text-white mb-4" data-toggle="modal" data-target="#myModal" onclick="getPrix('child')">
                                        <div><img src="./assets/img/b.png" alt="" width="100px" height="120px"></div>

                                        <div class="card-body">Enfant</div>

                                    </div>
                                </div> --}}

                        </div>

                        <div class="container">
                            <h2 class="title">
                                <span class="title-word title-word-1">Details</span>
                                <span class="title-word title-word-2">de</span>
                                <span class="title-word title-word-3">vente</span>
                            </h2>
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
                             <div class="card  text-black mb-4">
                                <table>
                                        <tr>                                    <th>
                                            categori1
                                        </th>
                                        <th>categorie2</th>
                                        <th>categorie3</th>
                                        <th>categorie4</th>
                                    </tr>
                                    <tr>
                                        <td>{{$sum_cat1}}</td>
                                        <td>{{$sum_cat2}}</td>
                                        <td>{{$sum_cat3}}</td>
                                        <td>{{$sum_cat4}}</td>
                                    </tr>


                                </table>
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
            {{-- <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="container">
                            <h2>Acheter un Ticket</h2>
                            <form action="{{ route('acheter-ticket') }}" method="post">
                                @csrf

                                    <script>
                                        function getPrix(valeur){
                                            document.getElementById('prix').value=valeur;
                                        }
                                    </script>
                                <div class="form-group">

                                    <div class="form-group">

                                        <input value="0"  id="prix" name="montant" hidden />


                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Acheter le Ticket</button>
                            </form>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div> --}}

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
