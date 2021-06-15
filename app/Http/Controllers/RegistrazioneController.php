<?php

use Illuminate\Routing\Controller;
use App\Models\Studente;
use App\Models\Iscritti;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RegistrazioneController extends Controller {

    public function index() {
        if( session('utente_CF') != null){
            return redirect('Home_Portale');
        }else{
            return view('Registrazione')
               ->with('csrf_token' , csrf_token());
        }
    }

    protected function Registrazione() {
        $request = request();
        $errors = $this->countErrors($request);
        if(count($errors) === 0) {
            $password = Hash::make($request['pw'], [
                'rounds' => 12,
            ]);
            $newStudente =  Studente::create([
            'Matricola' => null,
            'Nome' => $request['nome'],
            'Cognome' => $request['cognome'],
            'CF' => $request['CF'],
            'Data_di_nascita' => $request['data'] ,
            'Età' => "18" ,
            'Citta_di_nascita' => $request['citta'],
            'Email' => $request['email'],
            'password' => $password,
            'Tipo' => "Regolare" ,
            'Codice_CDL' => $request['CDL']
            ]);
            if ($newStudente) {
                Session::put('utente_CF', $newStudente->CF);
                Session::put('utente_tipologia', "Studente");
                return redirect('Home_Portale');
            }else {
                $errors[] = "Errore di connessione al database.";
                return redirect('Registrazione')->with('errors' , $errors)->withInput();
            }
        }else 
            return redirect('Registrazione')->with('errors' , $errors )->withInput();
    }

    private function countErrors($data) {
        $errors = array();
        //CHECK CF
        if(strlen($data["CF"]) != 16) {
            $errors[] = "Il codice fiscale non contiene 16 caratteri.";
        } else {
            $CF = Studente::where('CF', $data['CF'])->first();
            if ($CF !== null) {
                $errors[] = "Codice fiscale già in utilizzo.";
            }
        }
        //CHECK PASSWORD
        if (strlen($data['pw']) < 8) {
            $errors[] = "La password non rispetta le regole.";
        } 
        //CHECK CONFERMA PASSWORD
        if (strcmp($data['pw'], $data['confpw']) != 0) {
            $errors[] = "Le password non coincidono.";
        }
        //CHECK EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email non valida.";
        } else {
            $email = Studente::where('email', $data['email'])->first();
            if ($email !== null) {
                $errors[] = "Email già in utilizzo.";
            }
        }
        //CHECK ETA
        $nascita = new DateTime($data['data']);
        $now = new DateTime();
        $interval = $now->diff($nascita);
        $eta = $interval->y;
        if($eta < 17){
            $errors[] = "Età non valida.";
        }
        //CHECK CDL
        $CDL = $data['CDL'];
        if($CDL == 00){
            $errors[] = "Corso di laurea non valido.";
        }
        //CHECK ISCRIZIONE
        $controllo = Iscritti::where('CF' , $data['CF'])->first();
        if($controllo == null)
        {
            $errors[] ="Codice fiscale non iscritto all'università";
        }
        //TUTTI I CAMPI
        if(!$data['nome'] || !$data['cognome'] || !$data['CF'] || !$data['data'] || !$data['citta'] || !$data['email'] || !$data['pw'] || !$data['confpw'] || !$data['CDL'])
        {
            $errors = array();
            $errors[] ="Riempi tutti i campi";
        }

        return $errors;
    }

    public function checkEmail($email) {
        $exist = Studente::where('email', $email)->exists();
        return ['exists' => $exist];
    }

    public function checkCF($CF) {
        $exist = Studente::where('CF', $CF)->exists();
        return ['exists' => $exist];
    }
    
}
?>