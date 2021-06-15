<?php

use Illuminate\Routing\Controller;
use App\Models\Studente;
use App\Models\Docente;
use App\Models\Tutor;
use App\Models\Post;
use App\Models\Mipiace;
use App\Models\Commento;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Home_PortaleController extends Controller {

    public function index() {
        if( session('utente_CF') != null){
            return view('Home_Portale');
        }else{
            return view('Registrazione')
               ->with('csrf_token' , csrf_token());
        }
    }

    public function CaricaPost() {
        //Post_totali
        $CDL = DB::table(session('utente_tipologia'))->where('CF', session('utente_CF'))->value('Codice_CDL');
        $query = Studente::where('Codice_CDL', $CDL)->get('CF');
        $query1 = Docente::where('Codice_CDL', $CDL)->get('CF');
        $query2 = Tutor::where('Codice_CDL', $CDL)->get('CF');
        $Post = Post::whereIn('CF', $query)->orWhereIn('CF', $query1)->orWhereIn('CF',$query2)->get();
        $posts = Post::whereIn('CF', $query)->orWhereIn('CF', $query1)->orWhereIn('CF',$query2)->OrderByDesc('ID')->select('ID')->get();
        //Num_mipiace
        $Num = Mipiace::groupBy('Post.id')->rightJoin('Post', 'Mipiace.Post_ID', '=', 'Post.ID')->whereIn('Post.CF', $query)->orWhereIn('Post.CF', $query1)->orWhereIn('Post.CF',$query2)
        ->selectRaw('count(Mipiace.Post_ID) as conta')
        ->get();
        //Nomi
        $Nomi = Mipiace::rightJoin('post', 'Mipiace.Post_ID', '=', 'post.ID')->whereIn('Post.CF', $query)->orWhereIn('Post.CF', $query1)->orWhereIn('Post.CF',$query2)->select('mipiace.CF' , 'post.ID')->distinct('mipiace.CF')->get();
        return  ["CF" => session('utente_CF') , "Risultati"=> $Post , "mipiace" => $Num , "nomi" => $Nomi];
    }

    public function CreaPost($Titolo , $Testo) {
        $Nome = DB::table(session('utente_tipologia'))->where('CF', session('utente_CF'))->value('Nome');
        $Cognome = DB::table(session('utente_tipologia'))->where('CF', session('utente_CF'))->value('Cognome');
        $now = date("Y-m-d");
            $newPost =  Post::create([
                'ID' => null,
                'Titolo' => $Titolo,
                'text' => $Testo,
                'CF' => session('utente_CF') , 
                'Nome' => $Nome ,
                'Cognome' => $Cognome ,
                'datapost' => $now,
                ]);
            $ret = Post::OrderByDesc('ID')->first();
            if ($ret) {
                return ($ret);
            }else{
                return json_encode("Errore");
            }
    }

    public function RimuoviPost($ID) {
        $Commento = Commento::where('Post_ID' , $ID)->get();
        if($Commento !== '[]'){
            Commento::where('Post_ID', $ID)->delete();
        }
        $Mipiace = Mipiace::where('Post_ID' , $ID)->get();
        if($Mipiace !== '[]'){
            Mipiace::where('Post_ID', $ID)->delete();
        }
        $delete = Post::destroy($ID);
        if($delete){
            return json_encode($ID);
        }else{
            return json_encode("Errore");
        }
    }

    public function MostraCommenti($ID) {
            $Commenti = Commento::where('Post_ID' , $ID)->get();
            if ($Commenti != '[]') {
                return ['ID'=> session('utente_CF') , 'Risultati' => $Commenti];
            }else{
                return ['Risultato'=> '0' , 'ID' => $ID];
            }
    }

    public function CaricaCommento($ID , $Testo) {
        $Nome = DB::table(session('utente_tipologia'))->where('CF', session('utente_CF'))->value('Nome');
        $Cognome = DB::table(session('utente_tipologia'))->where('CF', session('utente_CF'))->value('Cognome');
        $now = date('Y-m-d H:i:s');
            $newComment =  Commento::create([
                'ID' => null,
                'Post_ID' => $ID,
                'CF' => session('utente_CF') , 
                'Nome' => $Nome ,
                'Cognome' => $Cognome ,
                'text' => $Testo,
                'datacommento' => $now,
                ]);
            $ret = Commento::OrderByDesc('ID')->first();
            if($ret){
                return $ret;
            }else{
                return json_encode("Errore");
            }
    }

    public function RimuoviCommento($ID) {
        $delete = Commento::destroy($ID);
        if($delete){
            return json_encode($ID);
        }else{
            return json_encode("Errore");
        }
    }

    public function AggiungiLike($ID) {
        $newLike =  Mipiace::create([
            'ID' => null,
            'Post_ID' => $ID,
            'CF' => session('utente_CF') , 
            ]);
        if($newLike){
        return json_encode($ID);
        }else{
            return json_encode("Errore");
        }
    }

    public function RimuoviLike($ID) {
        $delete = Mipiace::where('Post_ID', $ID)->where('CF' , session('utente_CF'))->delete();
        if($delete){
            return json_encode($ID);
        }else{
            return json_encode("Errore");
        }
    }
    
}
?>