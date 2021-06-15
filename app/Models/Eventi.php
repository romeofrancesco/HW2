<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventi extends Model {

    protected $table = "eventi";
    protected $primaryKey = "ID";

    protected $fillable = [
        'Titolo', 'Descrizione',
    ];
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>