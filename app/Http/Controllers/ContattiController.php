<?php

use Illuminate\Routing\Controller;
use App\Models\Sede;

class ContattiController extends Controller {

    public function index() {
        return view('Contatti');
    }

    public function Pins() {
        $Pins = Sede::join('Dipartimento','sede.Codice_DIP','=','Dipartimento.Codice')->select('Dipartimento.Nome as Nome' , 'Sede.Latitudine as Latitudine' ,  'Sede.Longitudine as Longitudine' ,'Sede.Colore as Colore')->get();
        return $Pins;
    }

}
?>