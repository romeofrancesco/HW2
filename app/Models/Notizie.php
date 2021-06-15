<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notizie extends Model {

    protected $table = "notizie";
    protected $primaryKey = "ID";

    protected $fillable = [
        'titolo', 'Descrizione', 'img_src' , 'data_notizia',
    ];
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>