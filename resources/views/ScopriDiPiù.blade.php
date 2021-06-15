@include('Layouts.Università_header')
    <head>
        <title>Scopri di più</title>
        <script src='{{ url("js/ScriptScopriDiPiù.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/ScopriDiPiù.css")}}'>
    </head>
        <section>
            <span id="Descrizione">
                   <strong>
                       Università degli studi di Romeo
                   </strong>
                   <p>
                    Una vita universitaria vivace e stimolante, una formazione di alto livello e una didattica al passo coi tempi, una ricerca all’avanguardia e un legame forte con le aziende del territorio, sedi prestigiose e poli tecnologici moderni.
                    L'Università di Catania è un ateneo antichissimo, forte di una tradizione che risale al 1434, ma che vuole guardare avanti, capace di reagire al cambiamento sociale, organizzativo e tecnologico, e che sa ascoltare.
                   </p>
             </span>  
            <div id="Player"></div>
        </section>
@include('Layouts.Università_footer')