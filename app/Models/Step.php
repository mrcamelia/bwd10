<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'recipe_id',
        'list_step',
    ];
    public function recipes()
    {
        return $this->belongsTo('App\Models\Recipe','recipe_id','id')->withDefault([
            'name' =>'',
        ]);
    }
}
