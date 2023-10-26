<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function connect()
    {
        return view('login');
    }

    public function logOut()
    {
        session_unset();
        return redirect("/admin");
    }

    public function Login(Request $request)
    {
        $select = DB::table("admins")
            ->select("*")
            ->where("mail", "=", $request->email)
            ->where("mot_passe", "=", $request->password)
            ->get();

        if (count($select) > 0) {
            session()->put("NomPrenom", $select[0]->nom_admin . " " . $select[0]->prenom_admin);
            session()->put("mail", $select[0]->mail);
            echo json_encode(["error" => false, "message" => "Connexion établie !"]);
        } else {
            echo json_encode(["error" => true, "message" => "Login ou mot de passe incorrect !"]);
        }
    }

    public function selectParticipant()
    {
        $select = DB::table('participants')
            ->select('participants.*', "categories.libelle as libelle_cat", "courses.libelle as libelle_course")
            ->leftJoin("categories", "Categories", "=", "id_categories")
            ->leftJoin("courses", "Courses", "=", "id_courses")
            ->leftJoin("moyenpaiements", "idMoyenPaie", "=", "idMoyenPaie")
            ->orderBy("participants.created_at", "desc")
            ->get();

        echo json_encode($select);
    }

    public function triParticipant(Request $request)
    {
        $select = DB::table('participants')
            ->select('participants.*', "categories.libelle as libelle_cat", "courses.libelle as libelle_course",  "courses.montant as montantCourses", "moyenpaiements.libelleMoyenPaie")
            ->leftJoin("categories", "Categories", "=", "id_categories")
            ->leftJoin("courses", "Courses", "=", "id_courses")
            ->leftJoin("moyenpaiements", "participants.idMoyenPaie", "=", "moyenpaiements.idMoyenPaie");
                if ($request->genre != "0") $select->where("Genre", "=", $request->genre);
                if ($request->etat != "0") $select->where("etat_paiement", "=", $request->etat);
                if ($request->course != "0") $select->where("Courses", "=", $request->course);
        $result = $select ->orderBy("participants.created_at", "desc")->get();

        echo json_encode($result);
    }
}
