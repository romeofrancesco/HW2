<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model {

    protected $table = "tutor";
    protected $primaryKey = "CF";
    protected $autoIncrement = false;
    protected $keyType = "string";

    protected $fillable = [
        'email', 'password' , 'Nome' , 'Cognome' , 'Città' , 'Data' , 'età' , 'Utilità' , 'Codice_CDL',
    ];
    public function Tutorati(){
        return $this->hasMany("App\Models\Materia");
    }
    public function InsegnaCDL(){
        return $this->belongsTo("App\Models\CorsoDiLaurea");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>