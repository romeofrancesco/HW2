<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model {

    protected $table = "docente";
    protected $primaryKey = "CF";
    protected $autoIncrement = false;
    protected $keyType = "string";


    protected $fillable = [
         'email', 'password' , 'Nome' , 'Cognome' , 'Città' ,'Data' , 'età' , 'Salario' , 'n_materie' , 'Codice_CDL',
    ];
    public function Insegna(){
        return $this->hasMany("App\Models\Insegnamenti");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>