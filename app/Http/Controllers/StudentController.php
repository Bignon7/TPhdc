<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create() {
        return view('pages.form');
    }

    public function store(Request $request){  //pour enregistrer les élèves dans la base de données
        $request->validate([
            'matricule'=> 'required',
            'nom'=> 'required',
            'prenom'=> 'required',
            'sexe'=> 'required',
            'filiere'=> 'required',
            'datetudiant'=> 'required',
            'telephone'=> 'required',
            'email'=> 'required',
        ]);
        $student = new Student();

        $student->matricule = $request->matricule;
        $student->nom = $request->nom;
        $student->prenom = $request->prenom;
        $student->sexe = $request->sexe;
        $student->filiere = $request->filiere;
        $student->datetudiant = $request->datetudiant;
        $student->telephone = $request->telephone;
        $student->email = $request->email;
        //dd($student);
        //Student::create($request->all());
        $student->save();
        //session()->forget({Student});
        return redirect()->route('recap')->with('success','Un nouvel étudiant a bien été ajouté!'); // redirect() ou to_route()
    }

    public function index() {
        $students = Student::all();
        return view('pages.etu', ['students' => $students]);
    }

    // public function validationMail() {
    //     $mail_etu = $this->request()->input('email');
    //     $user = User::where('email', $mail_etu)->first();
    //     $answer = "";
    //     $answer = $user ? "L'email existe":"L'email n'existe pas";
    //     return response()->json(['$response' =>$answer]);
    // }

    public function show($id) {
        $student = Student::find($id);

        return view('pages.showetu', ['student' =>$student]);
    }


    public function edit( $id) {
        //$data = $request->validated();
        $student = Student::findOrFail($id);
        // //$student = Student::find($id);
        // $stu = json_decode(json_encode($student), true);
        // //$stu = (array)$student;
        // //print_r($stu);
        // var_dump($stu);
        // //var_dump($data);
        // //print_r($student);
        // $email = old('email');
        // print($stu['matricule']);

        // $student->fill([
        //     'matricule'=> $stu['matricule'],
        //     'nom'=> $stu['nom'],
        //     'prenom'=> $student->prenom,
        //     'sexe'=> $student->sexe,
        //     'datetudiant'=> $student->datetudiant,
        //     'filiere'=> $student->filiere,
        //     'telephone'=> $student->telephone,
        //     'email'=> $student->email,
        // ]);
        return view('pages.form', compact('student'));
        //$student->save();
    }


    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);
        $request->validate([
            'matricule'=> 'required',
            'nom'=> 'required',
            'prenom'=> 'required',
            'sexe'=> 'required',
            'filiere'=> 'required',
            'datetudiant'=> 'required',
            'telephone'=> 'required',
            'email'=> 'required',
        ]);
        $student->update($request->all());
        $student->save();
        return redirect()->route('recap')->with('success','L\'étudiant a bien été modifié!');
    }

    public function destroy($id) {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
        return redirect()->route('recap')->with('success','L\'étudiant a bien été supprimé');
        }
        else {
            echo "L\' etudiant n'existe pas";
        }
    }


}
