<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'slug',
        'description',
        'image',
    ];
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id')->withDefault([
            'name' =>'',
        ]);
    }
    public function steps()
    {
        return $this->hasMany('App\Models\Step');
    }
    public function ingredients()
    {
        return $this->hasMany('App\Models\Ingredient');
    }
    public function Favorites()
    {
        return $this->hasMany('Favorite::class');
    }
}
