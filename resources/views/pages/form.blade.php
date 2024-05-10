{{-- @php
    use App\Models\Student;

    $student=new Student();
@endphp --}}
@extends('welcome')

@section('title', 'Formulaire_inscription')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <div class="card">
                    <div class="card-body border border-1 p-3">
                        <h2 class="text-center mb-3 ">Formulaire d'enregistrement</h2>
                        <form action="{{isset($student) ? route('edit_etudiant', $student->id):route('store_etudiant')}}" method="POST" id="formEtudiant">
                            @csrf

                           <div class="mb-3 col-md-12 mt-3 ">
                            <label for="matricule-stu" class="col col-form-label">Matricule</label>
                              <input type="text" class="form-control " name="matricule" id="matricule-stu" placeholder="Votre matricule..."  autofocus value= "{{isset($student) ? $student->matricule:old('matricule')}}">
                            <small class="text-danger" id="error_register_matricule"></small>
                          </div>

                          <div class="mb-3 col-md-12 mt-3 row">
                            <label for="nom-stu" class="col col-form-label">Nom</label>
                              <input type="text" class="form-control" id="nom-stu" name="nom" placeholder="Votre nom..."  value="{{isset($student) ? $student->nom:old('nom')}}">
                            <small class="text-danger" id="error_register_nom"></small>
                        </div>

                          <div class="mb-3 col-md-12 mt-3 row">
                            <label for="prenom-stu" class="col col-form-label">Prénom</label>
                              <input type="text" class="form-control" id="prenom-stu" name="prenom" placeholder="Votre prénom..."  value="{{isset($student) ? $student->prenom:old('prenom')}}">
                            <small class="text-danger" id="error_register_prenom"></small>
                        </div>

                          <div>
                                <label class="form-label mt-5 mr-5 mb-5">Genre</label>
                                <input class="form-check-input ml-5 mt-5 m-3" type="radio" id="Homme" value="Homme" name="sexe"> Homme
                                <input class="form-check-input ml-5 mt-5 m-3" type="radio" id="Femme" value="Femme" name="sexe"> Femme
                          </div>


                          <label for="filiere-stu" class="form-label">Filière</label>
                          <input class="form-control" list="datalistOptions" id="filiere-stu" name="filiere" placeholder="Votre filière" value="{{isset($student) ? $student->filiere:old('filiere')}}">
                          <datalist id="datalistOptions">
                            <option value="IG">
                            <option value="STAT">
                            <option value="GFC">
                            <option value="GTL">
                            <option value="GBA">
                            <option value="DESCOGEF">
                          </datalist>

                          <div class="mb-3 col-md-12 mt-3 row">
                            <label for="date-stu" class="col col-form-label">Date</label>
                            <div class="col-md-12">
                              <input max="<?php echo date('Y-m-d');?>" type="date" class="form-control" id="date-stu" name="datetudiant" placeholder="La date..."  value="{{isset($student) ? $student->datetudiant:old('datetudiant')}}">
                            </div>
                          </div>


                          <div class="mb-3 col-md-12 mt-3 row input-group">
                            <div class="col-md-12 mb-3 mt-3 row">
                            <label for="telephone-stu" class="col col-form-label">Téléphone</label>
                            <input type="text" class="col-8 form-control" id="telephone-stu" name="telephone" placeholder="Numéro..."  value="{{isset($student) ? $student->telephone:old('telephone')}}">
                            </div>

                            {{-- <label for="telephone" class="col col-form-label">Téléphone</label>
                            <input type="text" class="col-4 form-control" id="telephone" name="telephone[]" placeholder="(+229) ou (00229)"  value="{{old('telephone[0]')}}">
                            <input type="text" class="col-8 form-control" id="telephone" name="telephone[]" placeholder="Numéro..."  value="{{old('telephone[1]')}}"> --}}
                            <small class="text-danger" id="error_register_telephone"></small>
                          </div>

                          <div class="mb-3 col-md-12 mt-3 row">
                            <label for="email-stu" class="col col-form-label">Email</label>
                              <input type="email" class="form-control" id="email-stu" name="email" placeholder="Votre email..."  value="{{isset($student) ? $student->email:old('email')}}">
                            <small class="text-danger" id="error_register_email"></small>
                          </div>

                          <div class="col">
                            <button id="submit" type="submit" class="btn btn-success mr-5">{{ isset($student) ? 'Modifier' : 'Envoyer' }}</button>

                            <button id="reset" type="reset" class="btn btn-danger " style=" margin-left:50%; ">Supprimer</button>
                          </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<br>
<br>
<br>
<br>

<script>

    // let p1 = document.getElementById('text_1');
    // console.log(p1.innerHTML);

    document.getElementById('formEtudiant').addEventListener('submit', function(event) {
        //event.preventDefault();
        let matricule = document.getElementById('matricule-stu').value;
        let nom = document.getElementById('nom-stu').value;
        let prenom = document.getElementById('prenom-stu').value;
        let telephone = document.getElementById('telephone-stu').value;
        let email = document.getElementById('email-stu').value;

        let regexMat = /^\d{4,8}$/;
        let regexNom =/[A-Z\-]/;
        let regexPrenom = /^[A-Za-zÀ-äâàïîüûùçöôÿéèêë\-]{2,20}$/;
        //let regexTel =  /^(?:\d{10}|\(\d{3}\)\s*\d{3}-\d{4})$/;
        let regexTel = /^\+?\d+( \d+)?$/;
        let regexMail =/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        let toTest =/[0-9]{8,12}/;


        if ((matricule !=null) && regexMat.test(matricule)) {
            document.getElementById('matricule-stu').classList.remove('is-invalid');
            document.getElementById('matricule-stu').classList.add('is-valid');
            document.getElementById('error_register_matricule').innerText="";
            // alert("Bonjour");

            if ((nom !=null) && (regexNom.test(nom))) {
                document.getElementById('nom-stu').classList.remove('is-invalid');
                document.getElementById('nom-stu').classList.add('is-valid');
                document.getElementById('error_register_nom').innerText="";

                if ((prenom !=null) && (regexPrenom.test(prenom))) {
                    document.getElementById('prenom-stu').classList.remove('is-invalid');
                    document.getElementById('prenom-stu').classList.add('is-valid');
                    document.getElementById('error_register_prenom').innerText="";

                    if ((telephone !=null) && (regexTel.test(telephone))) {
                        document.getElementById('telephone-stu').classList.remove('is-invalid');
                        document.getElementById('telephone-stu').classList.add('is-valid');
                        document.getElementById('error_register_telephone').innerText="";


                        if ((email !=null) && (regexMail.test(email))) {
                            document.getElementById('email-stu').classList.remove('is-invalid');
                            document.getElementById('email-stu').classList.add('is-valid');
                            document.getElementById('error_register_email').innerText="";
                        }
                        else {
                            document.getElementById('email-stu').classList.add('is-invalid');
                            document.getElementById('email-stu').classList.remove('is-valid');
                            document.getElementById('error_register_email').innerText="Votre adresse email est incorrecte";
                        }
                    }
                    else {
                        document.getElementById('telephone-stu').classList.add('is-invalid');
                        document.getElementById('telephone-stu').classList.remove('is-valid');
                        document.getElementById('error_register_telephone').innerText="Votre numéro est invalide";
                    }
                }
                else {
                document.getElementById('prenom-stu').classList.add('is-invalid');
                document.getElementById('prenom-stu').classList.remove('is-valid');
                document.getElementById('error_register_prenom').innerText="Votre prénom doit être en majuscule";
                }
            }
            //document.getElementById('formEtudiant').submit()
            else {
                document.getElementById('nom-stu').classList.add('is-invalid');
                document.getElementById('nom-stu').classList.remove('is-valid');
                document.getElementById('error_register_nom').innerText="Votre nom doit être en majuscule";
            }
        }
        else {
            document.getElementById('matricule-stu').classList.add('is-invalid');
            document.getElementById('matricule-stu').classList.remove('is-valid');
            document.getElementById('error_register_matricule').innerText="Votre matricule doit comporter au moins quatre chiffres et huit chiffres au plus";
            // alert("Au revoir");
        }
    });

</script>

@endsection
