@include('Layouts.Università_header')
<head>
        <title>Dipartimenti</title>
        <script src='{{ url("js/ScriptDipartimenti.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/Dipartimenti.css")}}'>
</head>
<section>
                <strong id="Titolo">I NOSTRI DIPARTIMENTI</strong>  
                    <input type="text" id="Barra-ricerca" placeholder="Cerca" onkeyup="cerca()">
        <div id="Contenitore">
        
        </div>

        <div class="Hidden" id="SalvatiPerDopo">
            <strong>I tuoi salvati per dopo:</strong>
            <div id="Box">

            </div>
        </div>

</section>
@include('Layouts.Università_footer')