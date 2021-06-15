<?php

use Illuminate\Routing\Controller;
use App\Models\Studente;
use App\Models\Tutor;
use App\Models\Docente;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller {

    public function index() {
        if(session('utente_CF') != null) {
            return redirect("Home_Portale");
        }
        else {
            return view('Login')
            ->with('csrf_token', csrf_token());
        }
    }

    public function Logout() {
        Session::flush();
        return redirect('Login');
    }

    public function Login() {
        $request = request();
        $errors = $this->countErrors($request);
        $tipo = $request['accesso'];
        if(count($errors) === 0) {
            Session::put('utente_CF', $request['CF']);
            Session::put('utente_tipologia', $tipo);
            return redirect('Home_Portale');
        }else{
            return redirect('Login')->with('errors' , $errors)->withInput();
        }
    }
    private function countErrors($data) {
        $errors = array();
        //Controllo che tutti i campi sono inseriti
        if(!$data['CF'] || !$data['PW'] || !$data['accesso'])
        {
            $errors[] ="Riempi tutti i campi";
        }
        //Controllo username
        if(count($errors) === 0 ){
        $utente = DB::table($data['accesso'])->where('CF', request('CF'))->first();
        if(!$utente){
            $errors[] ="Nome utente errato";
        }
        if($utente){
        $password = $utente->password;
        if(!(Hash::check($data['PW'] , $password))){
            $errors[] ="Password errata";
            }
        }
        }
        return $errors;
    }
    
}
?>