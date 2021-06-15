<!DOCTYPE html>
<html>
    <head>
        <title>Area personale</title>
        <link rel="icon" href="Foto/Logo.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Gothic+A1&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{url("css/AreaPersonale.css")}}'>
    </head>
<body>
    <header>
    <nav>
            <div id="Logo">
                <img src="Foto/Logo.png">
            </div>
                <div id="links">
                    <a href="Home_Portale">Home</a>
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
    <div id="ALL">
        <div class="Contenitore">
                <h1>MODIFICA PASSWORD</h1>
                <form action="AreaPersonaleDocente" name="Password" id="Password" method="POST">
                <input type="hidden" name='_token' value='".csrf_toke()"'>
                <div class="item"> <p>Password attuale: </p> <input type="password" name= "oldPw" > </div>
                <div class="item"> <p>Nuova password: </p> <input type="password" name= "newPw" > </div>
                <div class="item"> <p>Nuova password: </p> <input type="password" name= "confPw" > </div>
                <div class="Invio"><input type="submit" value="Cambia password" ></div>
                </form>
                @if(count($errors) > 0)
                        @foreach ($errors as $error)
                            <span class="error">{{$error}}</span>
                        @endforeach
                @endif
                @if(session('ok'))
                    <span class="ok">{{session('ok')}}</br></span>
                @endif
        </div>
        </div>
    </section>
</body>
</html>