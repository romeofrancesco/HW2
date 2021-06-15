<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dipartimento extends Model {

    protected $table = "dipartimento";
    protected $primaryKey = "Codice";
    protected $autoIncrement = false;
    protected $keyType = "integer";

    protected $fillable = [
        'Nome', 'Descrizione', 'img_src',
    ];
    public function Comprende() {
        return $this->hasMany("App\Models\CorsoDiLaurea");
    }
    public function SiTrova() {
        return $this->hasOne("App\Models\Sede");
    }  
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>

