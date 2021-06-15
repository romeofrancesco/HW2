<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insegnamenti extends Model {

    protected $table = "insegnamenti";
    protected $primaryKey = "ID";

    protected $fillable = [
        'Professore', 'Codice_Materia' , 'Codice_CDL',
    ];
    public function AppartieneCDL() {
        return $this->belongsTo("App\Models\CorsoDiLaurea");
    }
    public function Insegnata() {
        return $this->belongsTo("App\Models\Docente");
    }  
    public function Materia(){
        return $this->belongsTo("App\Models\Materia");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>