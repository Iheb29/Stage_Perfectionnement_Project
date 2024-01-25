<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligneCommande extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function commande(){
        $this->belongsTo(commande::class);
    }
    public function produit(){
        $this->belongsTo(produit::class);
    }
}
