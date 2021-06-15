<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = "post";
    protected $primaryKey = "ID";

    protected $fillable = [
        'Titolo', 'text', 'CF' , 'Nome' , 'Cognome' , 'datapost' ,
    ];
    public function MipiacePost() {
        return $this->hasMany("App\Models\Mipiace");
    } 
    public function CommentiPost() {
        return $this->hasMany("App\Models\Commenti");
    }
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>