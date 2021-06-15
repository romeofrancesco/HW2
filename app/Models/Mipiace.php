<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mipiace extends Model {

    protected $table = "mipiace";
    protected $primaryKey = "ID";

    protected $fillable = [
        'Post_ID', 'CF',
    ];
    public function MiPiace() {
        return $this->belongsTo("App\Models\Post");
    } 
}
// 1-N hasMany 1-N inversa belongsTo
// 1-1 hasOne 1-1 inversa belongsTo
// N-N belongsToMany 
?>