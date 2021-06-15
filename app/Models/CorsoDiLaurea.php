<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorsoDiLaurea extends Model {

    protected $table = "corso_di_laurea";
    protected $primaryKey = "Codice";
    protected $autoIncrement = false;
    protected $keyType = "integer";

    protected $fillable = [
        'Nome', 'Codice_DIP',
    ];
    public function Appartiene() {
        return $this->belongsTo("App\Models\Dipartimento");
    } 
    public function Iscritto(){
        return $this->hasMany("App\Models\Studente");
    }
    public function InsegnamentiCDL(){
        return $this->hasMany("App\Models\Insegnamenti");
    }
    public function Tutor(){
        return $this->hasMany("App\Models\Tutor");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>