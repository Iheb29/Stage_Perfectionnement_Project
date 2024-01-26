<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;

class ProduitApiController extends Controller
{
    public function getproduit(){
        $produits=produit::All();
        return response()->json(["data"=>$produits],200);
    }

    public function addProduit(Request $request){

        $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');

        produit::create([
            "nom"=>$request->nom,
            "prix"=>$request->prix,
            'image'=>'/storage/' . $image,
        ]);
        return response()->json(["message"=>"ProduitAdded"],201);
    }

    public function deleteProduit($id){
        $produits= produit::find($id);
        $message ="";
        if($produits==null){
            $message="produit with $id not found";
            return response()->json(["message"=>$message],404);
        }
        else{
            $produits->delete();
            return response()->json(["message"=>"Produit deleted"],200);
        }
    }
    public function UpdateProduit(Request $request, $id){

        $produits=produit::find($id);

        if($request->uploadphoto){
            $file_name = time() . '_' . $request->photo->getClientOriginalName();
            $image = $request->file('photo')->storeAs('images', $file_name, 'public');

            $produits->update([
                "nom"=>$request->nom,
                "prix"=>$request->prix,
                'image'=>'/storage/' . $image,
            ]);

        }else{

            $produits->update([
                "nom"=>$request->nom,
                "prix"=>$request->prix,
            ]);

        }
      
        return response()->json(["message"=>"Update Produit terminé"],200);
    }
    public function getProduitById($id){
        $produits=produit::find($id);
        return response()->json(["data"=>$produits],200);
    }
    
    
    //
}
