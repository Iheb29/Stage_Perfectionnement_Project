<?php

namespace App\Http\Controllers;

use App\Models\ligneCommande;
use Illuminate\Http\Request;
use App\Models\commande;

class CommandeApiController extends Controller
{
    public function getCommandes()
    {
        $commandes = commande::All();
        return response()->json(["data" => $commandes], 200);
    }
    public function addCommande(Request $request)
    {

        $commande = commande::create([
            "nom" => $request->user['nom'],
            "prenom" => $request->user['prenom'],
            "adresse_mail" => $request->user['adresse_mail'],
            "ville" => $request->user['ville'],
            "prix_total" => $request->prix_total,
            "status" => 0,
            "code_commande" => $request->code_Commande,
            "user_id" => $request->user['userid']
        ]);

        $data=json_decode($request->product,true);

        for($i=0;$i<count($data);$i++){
            $lignCommande=new ligneCommande();
            $lignCommande->quantite =  $data[$i]['qte'];
            $lignCommande->commande_id = $commande->id;
            $lignCommande->prix_ligne_commande =  $data[$i]['product']['prix'] *  $data[$i]['qte'];
            $lignCommande->produit_id = $data[$i]['product']['id'];
            $lignCommande->save();
        }

        return response()->json(["data" => $commande], 201);

    }
    public function deleteCommande($id)
    {
        $commandes = commande::find($id);
        $message = "";
        if ($commandes == null) {
            $message = "commandes with $id not found";
            return response()->json(["message" => $message], 404);
        } else {
            $commandes->delete();
            return response()->json(["message" => "Commande deleted"], 200);
        }
    }
    public function UpdateCommande(Request $request, $id)
    {
        $commandes = commande::find($id);
        $commandes->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "adresse_email" => $request->adresse_email,
            "ville" => $request->ville,
            "prix_total" => $request->prix_total,
        ]);
        return response()->json(["message" => "Update Commande terminé"], 200);
    }
    public function getCommandeById($id)
    {
        $commandes = commande::find($id);
        return response()->json(["data" => $commandes], 200);
    }
    //
}
