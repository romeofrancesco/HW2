<?php

use Illuminate\Routing\Controller;
use App\Models\Notizie;
use App\Models\Eventi;
use Illuminate\Support\Facades\Http;


class Home_UniversitariaController extends Controller {

    public function index() {
        return view('Home_Universitaria');
    }

    public function Notizie() {
        $Notizie = Notizie::all();
        return $Notizie;
    }

    public function Eventi() {
        $Eventi = Eventi::all();
        return $Eventi;
    }

    public function Meteo() {
        $Meteo = Http::get('http://api.weatherstack.com/current', [
            'access_key' => env('METEO_APIKEY'),
            'query' => 'Catania',
        ]);
        if (($Meteo)->failed()) abort(500);

        return ($Meteo);
    }
    
}
?>