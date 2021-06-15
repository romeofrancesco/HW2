<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studente extends Model {

    protected $table = "studente";
    protected $primaryKey = "Matricola";

    protected $fillable = [
        'Nome', 'Cognome', 'CF' , 'Data_di_nascita' , 'Età' , 'Citta_di_nascita' , 'Email' , 'password' , 'Tipo' , 'Tipo' , 'Codice_CDL',
    ];
    public function IscrittoCDL() {
        return $this->belongsTo("App\Models\CorsoDiLaurea");
    } 
    public function Sostiene() {
        return $this->hasMany("App\Models\Esame");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>