@include('Layouts.Università_header')
    <head>
        <title>Servizi</title>
        <script src='{{ url("js/ScriptServizi.js") }}' defer></script>
        <link rel="stylesheet" href='{{url("css/Servizi.css")}}'>
    </head>
    <section>
        <h1>Notizie del giorno</h1>
        <div id="News">
            
        </div>
        <form id='Ricerca_playlist'>
			<h1>Scegli il tuo mood</h1>
            <strong>Ti consigliamo la playlist adatta <br></strong>
			<select id='Mood' name="Mood">
                <option value=''></option>
				<option value='Coding'>Coding</option>
				<option value='Relaxing'>Relaxing</option>
				<option value='Focussing'>Focussing</option>
			</select>
			<label>&nbsp;<input class="submit" type='submit' value="Cerca!"></label>		
		</form>
        <div id="Contenitore">

        </div>
    </section>
@include('Layouts.Università_footer')