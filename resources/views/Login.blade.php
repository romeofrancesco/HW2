@include('Layouts.Log')
<head>
        <title>Login</title>
        <script src='{{ url("js/ScriptLogin.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/Login.css")}}'>
    </head>
<section>
        <div id="Foto">
            <div id="Accesso">
            <form id='Prof_Studente' action='Login' method='POST'>
            <input type="hidden" name='_token' value='".csrf_toke()"'>
                <div id="Dati">
                    <input type="text" name="CF" placeholder="Codice fiscale..." value='{{ old("CF") }}' >
                    <input type="password" name="PW" placeholder="Password..." value='{{ old("PW") }}' >
                    <span></span>
                </div>
                <div id="Dati1">
                    <label><input type="radio" name="accesso" value="Docente">Docente</label>
                    <label><input type="radio" name="accesso" value="Tutor">Tutor</label>
                    <label><input type="radio" name="accesso" value="Studente">Studente</label>
                <label>&nbsp;<input id="Accedi" type='submit' value="Accedi" name="Credenziali"></label>		
                </div>
            </form>
            @if(count($errors) > 0)
                        @foreach ($errors as $error)
                            <span class="error">{{$error}}</span>
                        @endforeach
            @endif
            <p>Non sei ancora iscritto? Scopri come iscriverti qui: <a href="Registrazione">Registrati</a> </p>
            </div>
        </div>
    </section>