@include('Layouts.Log')
<head>
        <title>Iscrizione</title>
        <script src='{{ url("js/ScriptRegistrazione.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/Registrazione.css")}}'>
</head>
<section>
        <div id="Foto">
            <strong>ISCRIVITI</strong>
            <div id="Contenitore">
                <form action="Registrazione" name="Iscrizione" id="login" method="POST">
                <input type="hidden" name='_token' value='".csrf_toke()"'>
                    <div>
                    <div class="label">Nome <input type="text" name="nome" value='{{ old("nome") }}' ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">Cognome <input type="text" name="cognome" value='{{ old("cognome") }}' ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">CF <input type="text" name="CF" value='{{ old("CF") }}' ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">Data di nascita <input type="date" name="data" value='{{ old("data") }}' ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">Città di nascita <input type="text" name="citta" value='{{ old("citta") }}' ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">Email <input type="text" name="email" value='{{ old("email") }}' ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">Password <input type="password" name="pw" id="pw" ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">Conferma password <input type="password" name="confpw" ></div>
                    <span></span>
                    </div>
                    <div>
                    <div class="label">Seleziona il corso di Laurea
                    <select name = 'CDL' id='CDL'>
                            <option value='00'></option>
                            <option value='01'>Ingegneria Informatica</option>
                            <option value='02'>Ingegneria Elettronica</option>
                            <option value='03'>Ingengeria Elettrica</option>
                            <option value='15'>Psicologia</option>
                            <option value='16'>Scienze dell'educazione e della formazione</option>
                            <option value='23'>Economia aziendale</option>
                            <option value='34'>Informatica</option>
                            <option value='45'>Fisioterapia</option>
                    </select>
                    </div>
                    <span></span>
                    </div>
                    <div class="label" id="submit"><input type="submit" value="Registrati" id="invio"></div>
                </form>
                @if(count($errors) > 0)
                        @foreach ($errors as $error)
                            <span class="error">{{$error}}</span>
                        @endforeach
                @endif
                <p>Sei già iscritto?<a href="Login">Effettua il login</a> </p>
            </div>
            </div>   
        </section>