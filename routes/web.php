<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Pagine lato libero
Route::get('Home_Universitaria', "Home_UniversitariaController@index");

Route::get('Dipartimenti', "DipartimentiController@index");

Route::get('Servizi', "ServiziController@index");

Route::get('Contatti', "ContattiController@index");

Route::get('ScopriDiPiù', "ScopriDiPiùController@index");

//Contenuti lato libero
Route::get('Home_Universitaria/Notizie', "Home_UniversitariaController@Notizie");
Route::get('Home_Universitaria/Eventi', "Home_UniversitariaController@Eventi");
Route::get('Home_Universitaria/Meteo', "Home_UniversitariaController@Meteo");

Route::get('Dipartimenti/Info', "DipartimentiController@MostraDipartimenti");
Route::get('Dipartimenti/MostraDip/{Name}', "DipartimentiController@MostraDip");

Route::get('Servizi/Spotify/{Content}', "ServiziController@Spotify");

Route::get('Servizi/News', "ServiziController@News");

Route::get('Contatti/Pins', "ContattiController@Pins");

// Pagine lato utente
Route::get('Registrazione', "RegistrazioneController@index");
Route::post('Registrazione', "RegistrazioneController@Registrazione");

Route::get('Login', "LoginController@index");
Route::post('Login', "LoginController@Login");
Route::get("Logout", "LoginController@Logout");

Route::get('Home_Portale', "Home_PortaleController@index");

Route::get('AreaPersonaleDocente', "AreaPersonaleController@Docente");
Route::get('AreaPersonaleStudente', "AreaPersonaleController@Studente");
Route::get('AreaPersonaleTutor', "AreaPersonaleController@Tutor");

//Contenuti lato utente
Route::get('Registrazione/email/{email}', "RegistrazioneController@checkEmail");
Route::get('Registrazione/CF/{CF}', "RegistrazioneController@checkCF");

Route::get('Home_Portale/CaricaPost', "Home_PortaleController@CaricaPost");
Route::get('Home_Portale/CreaPost/{Titolo}/{Testo}', "Home_PortaleController@CreaPost");
Route::get('Home_Portale/RimuoviPost/{ID}', "Home_PortaleController@RimuoviPost");
Route::get('Home_Portale/MostraCommenti/{ID}', "Home_PortaleController@MostraCommenti");
Route::get('Home_Portale/CaricaCommento/{ID}/{Testo}', "Home_PortaleController@CaricaCommento");
Route::get('Home_Portale/RimuoviCommento/{ID}', "Home_PortaleController@RimuoviCommento");
Route::get('Home_Portale/AggiungiLike/{ID}', "Home_PortaleController@AggiungiLike");
Route::get('Home_Portale/RimuoviLike/{ID}', "Home_PortaleController@RimuoviLike");

Route::get('AreaPersonaleDocente/DatiPersonali', "AreaPersonaleController@DatiPersonaliDocente");
Route::get('AreaPersonaleDocente/CaricaVoto/{Studente}/{Data_Esame}/{Voto}/{Lode}/{Materia}', "AreaPersonaleController@CaricaVoto");
Route::get('AreaPersonaleDocente/Materie', "AreaPersonaleController@Materie");
Route::post('AreaPersonaleDocente', "AreaPersonaleController@CambiaPassword");

Route::get('AreaPersonaleStudente/DatiPersonali', "AreaPersonaleController@DatiPersonaliStudente");
Route::get('AreaPersonaleStudente/Voti', "AreaPersonaleController@Voti");
Route::get('AreaPersonaleStudente/Materie', "AreaPersonaleController@MaterieCDL");
Route::post('AreaPersonaleStudente', "AreaPersonaleController@CambiaPassword");

Route::get('AreaPersonaleTutor/DatiPersonali', "AreaPersonaleController@DatiPersonaliTutor");
Route::get('AreaPersonaleTutor/Materie', "AreaPersonaleController@Tutorati");
Route::post('AreaPersonaleTutor', "AreaPersonaleController@CambiaPassword");

