<?php

use Illuminate\Routing\Controller;
use App\Models\Docente;
use App\Models\Esame;
use App\Models\Studente;
use App\Models\Tutor;


class AreaPersonaleController extends Controller {

    public function Docente() {
        if(session('utente_CF') != null) {
            return view("AreaPersonaleDocente");
        }
        else {
            return redirect('Login')
            ->with('csrf_token', csrf_token());
        }
    }

    public function Studente() {
        if(session('utente_CF') != null) {
            return view("AreaPersonaleStudente");
        }
        else {
            return view('Login')
            ->with('csrf_token', csrf_token());
        }
    }

    public function Tutor() {
        if(session('utente_CF') != null) {
            return view("AreaPersonaleTutor");
        }
        else {
            return redirect('Login')
            ->with('csrf_token', csrf_token());
        }
    }

    public function DatiPersonaliDocente() {
        $dati = Docente::where('CF' , session('utente_CF'))->first();
        return $dati;
    }

    public function DatiPersonaliStudente() {
        $dati = Studente::where('CF' , session('utente_CF'))->first();
        return $dati;
    }

    public function DatiPersonaliTutor() {
        $dati = Tutor::where('CF' , session('utente_CF'))->first();
        return $dati;
    }

    public function CaricaVoto($Studente , $Data_Esame , $Voto , $Lode , $Materia) {
        if((strcmp($Lode, "SI") != 0) && (strcmp($Lode, "NO") !=  0)){
            return json_encode("Controlla che il campo lode sia inserito correttamente.");
        }
        if((strcmp($Lode, "SI") == 0) && ($Voto != 30)){
            return json_encode("Il voto deve essere pari a 30 per inserire la lode.");
        }
        if($Voto > 30 || $Voto < 18){
            return json_encode("Controlla che il campo voto sia inserito correttamente.");
        }
        $controllo = Docente::join('Insegnamenti','docente.CF','=','Insegnamenti.Professore')->join('Materia', 'Materia.Codice', '=', 'Insegnamenti.Codice_Materia')->join('corso_di_laurea' , 'Insegnamenti.Codice_CDL' , '=' , 'corso_di_laurea.Codice')->where('Docente.CF',session('utente_CF'))->where('Materia.Codice', $Materia)->first();
        if($controllo == null){
            return json_encode("Ricontrolla il codice materia.");
        }  
        $query =  Esame::create([
            'ID_Esame' => null,
            'Studente' => $Studente,
            'Data_esame' => $Data_Esame,
            'Voto' => $Voto,
            'Lode' => $Lode,
            'Codice_Materia' => $Materia ,
            ]);
            if ($query != null ){
                return json_encode("Voto caricato con successo.");
            }else{
                return json_encode("Errore di connessione al database.");
            }
    }

    public function Voti() {
        $voti = Studente::join('Esame','Studente.Matricola','=','Esame.Studente')->join('Materia', 'Materia.Codice', '=', 'Esame.Codice_Materia')->where('Studente.CF',session('utente_CF'))->select('Materia.Nome as Nome' , 'Esame.Voto as Voto' , 'Esame.Lode as Lode')->get();
        return $voti;
    }

    public function Materie() {
        $materie = Docente::join('Insegnamenti','docente.CF','=','Insegnamenti.Professore')->join('Materia', 'Materia.Codice', '=', 'Insegnamenti.Codice_Materia')->join('corso_di_laurea' , 'Insegnamenti.Codice_CDL' , '=' , 'corso_di_laurea.Codice')->where('Docente.CF',session('utente_CF'))->select('corso_di_laurea.Nome as CDL' , 'Materia.Nome as Nome' , 'Materia.Codice as Codice')->get();
        return $materie;
    }

    public function MaterieCDL() {
        $MaterieCDL = Studente::join('Insegnamenti','Studente.Codice_CDL','=','Insegnamenti.Codice_CDL')->join('Materia', 'Materia.Codice', '=', 'Insegnamenti.Codice_Materia')->join('Corso_di_laurea' , 'Corso_di_laurea.Codice' , '=' , 'Studente.Codice_CDL')->join('Dipartimento' , 'Dipartimento.Codice' , '=' , 'Corso_di_laurea.Codice_DIP')->where('Studente.CF',session('utente_CF'))->select('Materia.Nome as Nome' , 'Corso_di_laurea.Nome as CDL' , 'Dipartimento.Nome as DIP')->get();
        return $MaterieCDL;
    }

    public function Tutorati() {
        $Tutorati = Tutor::join('MAteria','Materia.Tutor','=','Tutor.CF')->join('Insegnamenti', 'Materia.Codice', '=', 'Insegnamenti.Codice_Materia')->join('Corso_di_laurea' , 'Corso_di_laurea.Codice' , '=' , 'Insegnamenti.Codice_CDL')->where('Tutor.CF',session('utente_CF'))->select('Materia.Nome as Nome' , 'Corso_di_laurea.Nome as CDL')->get();
        return $Tutorati;
    }

    public function CambiaPassword() {
        $request = request();
        $errors = $this->countErrors($request);
        $tipo = session('utente_tipologia');
        if(count($errors) === 0) {
        $password = Hash::make($request['newPw'], [
            'rounds' => 12,
        ]);
        $newPw = ['password'=> $password];
        $update = DB::table($tipo)->where('CF', session('utente_CF'))->update($newPw);
        $user = DB::table($tipo)->where('CF', session('utente_CF'));
        $user->update(['updated_at' => now()]);
        if($update !== null) {
            $ok = 'Password cambiata correttamente';
            return redirect('AreaPersonale'.session('utente_tipologia'))
            ->with('ok' , $ok);
        }else{
            $errors[] ="Errore di connessione al database.";
            return redirect('AreaPersonale'.session('utente_tipologia'))->with('errors' , $errors)->withInput();
        }
        }else{
            return redirect('AreaPersonale'.session('utente_tipologia'))->with('errors' , $errors)->withInput();
        }
    }
    private function countErrors($data) {
        $errors = array();
        //Controllo che la password corrisponde con quella passata 
        $tipo = session('utente_tipologia');
        $password = DB::table($tipo)->where('CF', session('utente_CF'))->value('password');
        if (!(Hash::check($data['oldPw'] , $password))){
            $errors[] ="La passowrd inserita non è corretta";
        }
        //CHECK PASSWORD
        if (strlen($data['newPw']) < 8) {
            $errors[] = "La password non rispetta le regole.";
        } 
        //CHECK CONFERMA PASSWORD
        if (strcmp($data['newPw'], $data['confPw']) != 0) {
            $errors[] = "Le password non coincidono.";
        }
        //Controllo che tutti i campi sono inseriti
        if(!$data['oldPw'] || !$data['newPw'] || !$data['confPw'])
        {
            $errors = array();
            $errors[] ="Riempi tutti i campi";
        }
        return $errors;
    }
}
?>