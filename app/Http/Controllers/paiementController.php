<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moyenpaiement;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class paiementController extends Controller
{
    public function paiementUpdate(Request $request)
    {

        $validation = Validator::make($request->all(), [
            "id_order" => "required|string",
            "status_order" => "required|string",
            "id_transaction" =>  "required|string",
        ]);

        if ($validation->fails()) {
            return response()->json(['isSuccess' => false, 'errors' => $validation->errors(), 'data' => $request->all()], 411);
        }

        if(DB::table("participants")->where("code_paiement","=",$request->id_transaction)->count() <= 0){
            return response()->json(['isSuccess' => false, 'errors' => "Cette ligne n'existe pas ", 'data' => $request->all()], 411);
        }

        $etatTraitement = DB::table("participants")->where("code_paiement","=",$request->id_transaction)->update(["reference_paiement"=>$request->id_order, "etat_paiement"=>$this->getEtat($request->status_order)]);
        return response()->json(['isSuccess' => true, 'etatTraitement' => $etatTraitement , 'data' => $request->all()], 201);
    }


    public function getEtat($variable){
        switch ($variable) {
            case 'success':
                return 2;
                break;

            case 'failed':
                return 3;
                break;

            case 'interrupted':
                return 4;
                break;
        }
    }
}
