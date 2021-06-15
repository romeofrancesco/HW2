<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class ServiziController extends Controller {

    public function index() {
        return view('Servizi');
    }

    public function News() {
        $json = Http::get('https://content.guardianapis.com/search', [
            'page' => "1" , 
            'q' => "university" , 
            'show-fields' => "thumbnail",
            'api-key' => env('NEWS_APIKEY'),
        ]);
        if ($json->failed()) abort(500);

        return $json;
    }

    public function Spotify($Content) {
        $token = Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('SPOTIFY_CLIENT_ID').':'.env('SPOTIFY_CLIENT_SECRET')),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);
        if ($token->failed()) abort(500);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token['access_token']
        ])->get('https://api.spotify.com/v1/search', [
            'type' => 'playlist',
            'q' => $Content
        ]);
        if($response->failed()) abort(500);

        return $response->body();
    }
}
?>