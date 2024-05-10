@extends('welcome')

@section('title', 'Récapitulatif')

@section('content')
<div class="btn-toolbar row container-fluid mx-20 mt-5 mb-5" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group me-2" role="group" aria-label="First group">
      <button type="button" class="btn btn-info mb-5"><a href="{{route('ig')}}" style="text-decoration:none; color:black">IG</a></button>
      <button type="button" class="btn btn-info mb-5"><a href="{{route('stat')}}" style="text-decoration:none; color:black">STAT</a></button>
      <button type="button" class="btn btn-info mb-5"><a href="{{route('descogef')}}" style="text-decoration:none; color:black">DESCOGEF</a></button>
      <button type="button" class="btn btn-info mb-5"><a href="{{route('gfc')}}" style="text-decoration:none; color:black">GFC</a></button>
      <button type="button" class="btn btn-info mb-5"><a href="{{route('gba')}}" style="text-decoration:none; color:black">GBA</a></button>
      <button type="button" class="btn btn-info mb-5"><a href="{{route('gtl')}}" style="text-decoration:none; color:black">GTL</a></button>
    </div>


@if ($students->isEmpty())
<div class="alert alert-success" role="alert">
    A simple success alert—check it out!
  </div>

@else
<table class="table table-striped col-lg-10">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Matricule</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Sexe</th>
        <th scope="col">Filière</th>
        <th scope="col">Date</th>
        <th scope="col">Numéro</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
    {{-- {{$student->nom}} : {{$student->filiere}} <br> --}}
        <tr>
          <th scope="row">{{$student->id}}</th>
          <td>{{$student->matricule}}</td>
          <td>{{$student->nom}}</td>
          <td>{{$student->prenom}}</td>
          <td>{{$student->sexe}}</td>
          <td>{{$student->filiere}}</td>
          <td>{{$student->datetudiant}}</td>
          <td>{{$student->telephone}}</td>
          <td>{{$student->email}}</td>
          <td>
            <a class="btn btn-success me-2" href="{{route('showstudent',['id'=>$student->id])}}" role="button" id="showbtn-{{$student->id}}"><i class="bi bi-zoom-in" ></i></a>
            <a class="btn btn-warning me-2" href="{{route('editstudent',['id'=>$student->id])}}" role="button" id="editbtn-{{$student->id}}"><i class="bi bi-pencil-square"></i></</a>
            <a class="btn btn-danger" href="{{route('delstudent',['id'=>$student->id])}}" role="button" id="delbtn-{{$student->id}}"><i class="bi bi-trash"></i></</a>

        </tr>
    @endforeach

</tbody>
</table>
@endif


@endsection
