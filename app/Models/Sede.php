<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model {

    protected $table = "sede";
    protected $primaryKey = "ID_Sede";
    protected $autoIncrement = false;
    protected $keyType = "integer";

    protected $fillable = [
        'Nome', 'Latitudine', 'Longitudine' , 'Colore' , 'Codice_DIP',
    ];
    public function HaCDL() {
        return $this->belongsTo("App\Models\Dipartimento");
    } 
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>