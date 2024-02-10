<?php

namespace App\Http\Controllers;

use App\Events\NotifEvent;
use App\Models\ligneCommande;
use App\Models\notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\commande;

class CommandeApiController extends Controller
{
    public function getCommandes(Request $request)
    {
        $commandes = commande::with("lignecommande")->where("status",$request->status)->get();
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

        $user=User::where("IsAdmin",1)->get();
        $notif=new notification();
        $notif->message= $request->user['nom']." Add Commande";
        $notif->user_id=  $user[0]->id;
        $notif->save();

        broadcast(new NotifEvent("test"));
        
        return response()->json(["data" => $commande  ], 201);

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
    public function AccepteCommande($id)
    {
        $commandes = commande::find($id);
        $commandes->update([
            "status" => 1,
        ]);

        $user=User::find($commandes->user_id);

        $notif=new notification();
        $notif->message= "Commande With ".$commandes->code_commande." Accepted";
        $notif->user_id= $user->id;
        $notif->save();
        broadcast(new NotifEvent("test"));
        return response()->json(["message" => "Update Commande Accepted"], 200);
    }

    public function RejectComande($id)
    {
        $commandes = commande::find($id);
        $commandes->update([
            "status" => 2,
        ]);
        $user=User::find($commandes->user_id);

        $notif=new notification();
        $notif->message= "Commande With ".$commandes->code_commande." Rejected";
        $notif->user_id= $user->id;
        $notif->save();
        broadcast(new NotifEvent("test"));

        return response()->json(["message" => "Update Commande Rejected"], 200);
    }
    public function getCommandeById($id)
    {
        $commandes = commande::find($id);
        return response()->json(["data" => $commandes], 200);
    }
    public function getMyCommandes($id)
    {
        $commandes = commande::with("lignecommande")->where("user_id",$id)->get();
        return response()->json(["data" => $commandes], 200);
    }
  
}
