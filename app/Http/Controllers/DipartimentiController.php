<?php

use Illuminate\Routing\Controller;
use App\Models\Dipartimento;

class DipartimentiController extends Controller {

    public function index() {
        return view('Dipartimenti');
    }

    public function MostraDipartimenti() {
        $Dipartimenti = Dipartimento::all();
        return $Dipartimenti;
    }

    public function MostraDip($Name) {
        $Dipartimento = Dipartimento::where('Nome' , $Name)->get();
        return $Dipartimento;
    }

}
?>