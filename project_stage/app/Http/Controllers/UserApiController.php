<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserApiController extends Controller
{

    public function getUsers(){
        $users=User::where("IsAdmin",0)->get();
        return response()->json(["data"=>$users],200);
    }
    public function addUser(Request $request){

        $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');

        User::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "password"=>$request->password,
            "email"=>$request->email,
            "num_tlf"=>$request->num_tlf,
            'image'=>'/storage/' . $image,
        ]);
        return response()->json(["message"=>"User Added"],201);
    }
    public function deleteUSer($id){
        $Users= User::find($id);
        $message ="";
        if($Users==null){
            $message="User with $id not found";
            return response()->json(["message"=>$message],404);
        }
        else{
            $Users->delete();
            return response()->json(["message"=>"User deleted"],200);
        }
    }
    public function UpdateUser(Request $request, $id){
        
        $users=User::find($id);
        $users->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "email"=>$request->email,
            "num_tlf"=>$request->num_tlf,
            'photo'=>$request->image,
        ]);
        return response()->json(["message"=>"Update User terminé"],200);
    }
    public function getUserById($id){
        $users=User::find($id);
        return response()->json(["data"=>$users],200);
    }
    //
}
