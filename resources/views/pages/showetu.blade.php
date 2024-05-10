@extends('welcome')

@section('title','Informations')

@section('content')

    <div class="card mb-3  col-md-6 mx-auto" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$student->nom}} {{$student->prenom}} || {{$student->matricule}}</h5>
              <p class="card-text">
                <ul class="list-group">
                    <li class="list-group-item"><b>Email : </b>{{$student->email}}</li>
                    <li class="list-group-item"><b>Téléphone : </b>{{$student->telephone}}</li>
                    <li class="list-group-item"><b>Sexe : </b>{{$student->sexe}}</li>
                    <li class="list-group-item"><b>Date : </b>{{$student->datetudiant}}</li>
                    <li class="list-group-item"><b>Filière: </b>{{$student->filiere}}</li>
                </ul>
              </p>
              <p class="card-text"><small class="text-muted">Vos données personnelles...</small></p>
            </div>
          </div>
        </div>
      </div>
@endsection
