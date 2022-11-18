<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'recipe_id',
    ];
    public function recipes()
    {
        return $this->belongsTo('App\Models\Recipe','recipe_id','id')->withDefault([
            'name' =>'',
        ]);
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id')->withDefault([
            'name' =>'',
        ]);
    }
}
