<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Course;
use App\Models\Moyenpaiement;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Symfony\Contracts\Service\Attribute\Required;
use Throwable;

class ParticipantController extends Controller
{
    public function insertParticipant(Request $request)
    {
        $codePaiement = substr($request->nom, 3) . substr($request->prenom, 3) . date("YmdHms");
        try {
            $participant = new Participant();

            $participant->Nom = $request->nom;
            $participant->Prenom = $request->prenom;
            $participant->Adresse = $request->adresse;
            $participant->Profession = $request->profession;
            $participant->Date_de_Naissance = $request->dateNaissance;
            $participant->Courses = $request->course;
            $participant->Categories = $request->categories;
            $participant->Nationalite = $request->nationnalite;
            $participant->Telephone = $request->telephone;
            $participant->Nom_equipe = $request->equipe;
            $participant->Genre = $request->genre;
            $participant->code_paiement = $codePaiement;
            $participant->password = $request->mdpConfirm;

            $etat = $participant->save();

            $select = DB::table('participants')
                ->select('participants.*', "categories.libelle as libelle_cat", "courses.libelle as libelle_course", "courses.montant as courseMontant")
                ->leftJoin("categories", "Categories", "=", "id_categories")
                ->leftJoin("courses", "Courses", "=", "id_courses")
                ->where("participants.Telephone", "=", $request->telephone)
                ->orderBy("participants.created_at", "desc")
                ->get();

            echo json_encode(["error" => false, "message" => $etat, "codePaiement" => $codePaiement, "data" => $select]);
        } catch (Throwable $th) {
            echo json_encode(["error" => true, "message" => $th->getMessage(), "code" => $th->getCode()]);
        }
    }

    public function DetailParticipant()
    {
        $numero = session()->get("numero");
        $select = DB::table('participants')
            ->select('participants.*', "categories.libelle as libelle_cat", "courses.libelle as libelle_course", "courses.montant as courseMontant")
            ->leftJoin("categories", "Categories", "=", "id_categories")
            ->leftJoin("courses", "Courses", "=", "id_courses")
            ->where("participants.Telephone", "=", $numero)
            ->orderBy("participants.created_at", "desc")
            ->get();

        $moyenpaie = new Moyenpaiement();
        $course = new Course();
        $categories = new Categorie();

        echo json_encode([
            "detailParticipant" => $select,
            "moyenPaie" => $moyenpaie::all(),
            "listeCourse" => $course::all(),
            "listeCategorie" => $categories::all()
        ]);
    }

    public function Participant()
    {
        return view("client.dashboard");
    }

    public function paiementMAJ(Request $request)
    {
        try {
            $upade = DB::table("participants")
                ->where("Id_participant", "=", $request->refParticipant)
                ->update(["reference_paiement" => $request->ref, "idMoyenPaie" => $request->moyenPaie, "etat_paiement" => 2]);
            echo json_encode(["error" => false, "message" => $upade]);
        } catch (Throwable $th) {
            echo json_encode(["error" => true, "message" => $th->getMessage(), "code" => $th->getCode()]);
        }
    }

    public function updateParticipant(Request $request)
    {
        try {
            $upade = DB::table("participants")
                ->where("Id_participant", "=", $request->idParpaticipant)
                ->update([
                    "Categories" => $request->categories,
                    "code_paiement" => $request->codePaie,
                    "Courses" => $request->courses,
                    "Date_de_Naissance" => $request->date_naiss,
                    "Genre" => $request->genre,
                    "Adresse" => $request->email,
                    "Nationalite" => $request->nationnalite,
                    "Nom" => $request->nom,
                    "Prenom" => $request->prenom,
                    "Nom_equipe" => $request->nom_equipe,
                    "Profession" => $request->profession,
                    "Telephone" => $request->telephone,
                ]);

            echo json_encode(["error" => false, "message" => $upade]);
        } catch (Throwable $th) {
            echo json_encode(["error" => true, "message" => $th->getMessage(), "code" => $th->getCode()]);
        }
    }

    public function loginParticipant(Request $request)
    {
        try {
            $select = DB::table("participants")
                ->select("*")
                ->where("Telephone", "=", $request->email)
                ->orWhere("Adresse", "=", $request->email)
                ->where("password", "=", $request->password)
                ->limit(1)
                ->get();

            if (count($select) > 0) {
                session()->put("numero", $select[0]->Telephone);
                session()->put("NomPrenom", $select[0]->Nom . " " . $select[0]->Prenom);
                session()->put("mdp", $select[0]->password);
                echo json_encode(["error" => false, "message" => "Connexion établie !"]);
            } else {
                echo json_encode(["error" => true, "message" => "Login ou mot de passe incorrect !"]);
            }
        } catch (Throwable $th) {
            echo json_encode(["error" => true, "message" => "Login ou mot de passe incorrect !"]);
        }
    }

    public function deleteParticipation(Request $request)
    {
        try {
            $select = DB::table('participants')->where("Id_participant", $request->id)->delete();
            echo json_encode(["error" => false, "message" => $select]);
        } catch (Throwable $th) {
            echo json_encode(["error" => true, "message" => $th->getMessage(), "code" => $th->getCode()]);
        }
    }

    public function logOut()
    {
        session_unset();
        return redirect("/participant/connect");
    }


}
