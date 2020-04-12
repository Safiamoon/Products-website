<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['nom', 'user_id', 'media', 'description'];
    //protected $guarded=[];

    public function vendeur(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
