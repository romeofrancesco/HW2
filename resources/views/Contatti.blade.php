@include('Layouts.Università_header')
<head>
        <title>Chi siamo</title>
        <script src='{{ url("js/ScriptContatti.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/Contatti.css")}}'>
        <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
    </head>
<section>
            <span id="contatti">
                <h1>I NOSTRI CONTATTI</h1>
                <span>
                    <strong>Direttore:</strong>
                    <p>Prof. Francesco Romeo</p>
                </span>
                <span>
                    <strong>Ufficio:</strong>
                    <p>Edificio 4 -3° piano</p>
                </span>
                <span>
                    <strong>Email:</strong>  
                    <p>fraromeo69@gmail.com</p>
                </span>
                <span>
                    <strong>Telefono:</strong>  
                    <p>+39 0953443336</p>
                </span>
            </span>
            <div id="Mappa">
                <h1>Ecco dove sono i nostri dipartimenti</h1>
                <div id="TheMap">
            </div>
            </div>

        </section>
@include('Layouts.Università_footer')