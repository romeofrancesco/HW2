<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {

    protected $table = "materia";
    protected $primaryKey = "Codice";
    protected $autoIncrement = false;
    protected $keyType = "integer";

    protected $fillable = [
        'Nome', 'Tutor',
    ];
    public function TutorMateria(){
        return $this->belongsTo("App\Models\Tutor");
    }
    public function InsegnamentiMateria(){
        return $this->hasMany("App\Models\Insegnamenti");
    }
    public function Esaminazione(){
        return $this->hasMany("App\Models\Esame");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>