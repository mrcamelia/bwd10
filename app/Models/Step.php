<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'resep_id',
        'langkah_resep',
    ];
    public function recipes()
    {
        return $this->belongsTo('App\Models\Recipe','resep_id','id')->withDefault([
            'name' =>'',
        ]);
    }
}
