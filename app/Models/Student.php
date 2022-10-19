<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date_of_birth', 'gender', 'hobbies1', 'hobbies2', 'hobbies3', 'nationality'];
}
