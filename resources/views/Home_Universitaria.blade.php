@include('Layouts.Università_header')
    <head>
        <title>Università degli studi di Romeo</title>
        <script src='{{ url("js/ScriptHome_Universitaria.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/Home_Universitaria.css")}}'>
    </head>
        <section>

            <div id="Notizie">  
                    <strong id="Titolo">NOTIZIE PRINCIPALI</strong>        
            </div>

            <div id="Eventi">
                <div id="Meteo">

                </div>
                    <strong id="TitoloEventi">EVENTI PRINCIPALI</strong>
            </div>

        </section>
@include('Layouts.Università_footer')