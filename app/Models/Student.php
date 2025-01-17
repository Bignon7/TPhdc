<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'filiere',
        'datetudiant',
        'telephone',
        'email',
    ];
}
