<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iscritti extends Model {

    protected $table = "iscritti";
    protected $primaryKey = "CF";
    protected $autoIncrement = false;
    protected $keyType = "string";
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>