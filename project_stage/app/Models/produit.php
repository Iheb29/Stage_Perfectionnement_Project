<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function lignecommande(){
       return $this->hasMany(ligneCommande::class);
     }
}
