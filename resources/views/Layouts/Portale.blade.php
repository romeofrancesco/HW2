<!DOCTYPE html>
<html>
    <head>
        <title>Home portale</title>
        <link rel="icon" href="Foto/Logo.png">
        <script src='{{ url("js/ScriptHome_Portale.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/Home_Portale.css")}}'>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Gothic+A1&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
    <header>
    <nav>
            <div id="Logo">
                <img src="Foto/Logo.png">
            </div>
                <div id="links">
                    <a href = "{{'AreaPersonale'.session('utente_tipologia')}}">Area personale</a>
                    <a href="Logout">Logout</a>
                </div>
            <div id="menu">
            <div></div>
            <div></div>
            <div></div>
            </div>
        </nav>
        <span id="Principale">
            <strong>Università degli studi di Romeo</strong>
        </span>
    </header>

    <section>
        <button id = "CreaPost" value = "Crea_post">Crea nuovo post</button>
        <div id="Carica"class = "hidden">
                <input type="text" name = "Titolo" placeholder = "Inserisci il titolo..." maxlength="250">
                <textarea id="Testo" name = "Testo" placeholder = "Inserisci il testo..." maxlength="500"></textarea>
                <button id = "CaricaPost" value = "Crea_post">Crea nuovo post</button>
                <p class = 'hidden'> Riempi entrambi i campi. </p>
        </div>
        <div id = "post">

        </div>
    </section>
</body>
</html>