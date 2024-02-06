<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class commande extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function lignecommande(){
       return $this->hasMany(ligneCommande::class);
        
     }
     public function user(){
       return $this->belongsTo(User::class);
     }

}
