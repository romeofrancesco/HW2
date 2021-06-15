<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Esame extends Model {

    protected $table = "esame";
    protected $primaryKey = "ID_Esame";


    protected $fillable = [
        'Studente', 'Data_esame', 'Voto','Lode', 'Codice_Materia',
    ];
    public function EsameMateria(){
        return $this->belongsTo("App\Models\Materia");
    }
    public function EsameStudente(){
        return $this->belongsTo("App\Models\Studente");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>