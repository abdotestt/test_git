<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Impression de ticket
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
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
    </style>

    <script>
        // Optionally, you can add a script to trigger the print dialog when the page loads
        function print_page(){

                window.print();
                setDateTime();

        }

        // Function to set the date and time in the table
        function setDateTime() {
            var currentDate = new Date();
            var formattedDate = currentDate.toLocaleDateString('en-GB'); // Format: d/m/y
            var formattedTime = currentDate.toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' }); // Format: h:m

            // Set the formatted date and time in respective td elements
            document.getElementById('dateTd').innerHTML = formattedDate;
            document.getElementById('timeTd').innerHTML = formattedTime;
        }
    </script>
    <div class="container">
        <h2 class="title">
            <span class="title-word title-word-1">Ticket N° {{ $ticketNumber }}</span>
        </h2>
    </div>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Categorie</th>
                <th scope="col">Prix</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $libelle }}</td>
                <td>{{ $montant }}</td>
                <td id="dateTd">{{ $dateAchat }}</td>
                <td id="timeTd">{{ $heureDebut }}</td>
            </tr>
        </tbody>
    </table>

    <div class="container">
        <h2 class="title">
            <span class="title-word title-word-1">Merci de votre visite</span>

        </h2>
    </div>
    <div>
        <div style="text-align: center">
            <form action="{{ route('acheter-ticket') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $montant }}" name="montant" />
                <button type="submit" class="btn btn-success" onclick="print_page()">Confrmer et imprimmer ticket</button>
            </form>
        </div>
    </div>

</body>
</html>
