<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commande;

class CommandeApiController extends Controller
{
    public function getCommandes(){
        $commandes=commande::All();
        return response()->json(["data"=>$commandes],200);
    }
    public function addCommande(Request $request){

        $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');

        commande::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "adresse_email"=>$request->adresse_email,
            "ville"=>$request->ville,
            "prix_total"=>$request->prix_total,
            
        ]);
        return response()->json(["message"=>"CommandeAdded"],201);
    }
    public function deleteCommande($id){
        $commandes= commande::find($id);
        $message ="";
        if($commandes==null){
            $message="commandes with $id not found";
            return response()->json(["message"=>$message],404);
        }
        else{
            $commandes->delete();
            return response()->json(["message"=>"Commande deleted"],200);
        }
    }
    public function UpdateCommande(Request $request, $id){
        $commandes=commande::find($id);
        $commandes->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "adresse_email"=>$request->adresse_email,
            "ville"=>$request->ville,
            "prix_total"=>$request->prix_total,
        ]);
        return response()->json(["message"=>"Update Commande terminé"],200);
    }
    public function getCommandeById($id){
        $commandes=commande::find($id);
        return response()->json(["data"=>$commandes],200);
    }
    //
}
