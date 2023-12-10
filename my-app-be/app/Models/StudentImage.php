<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentImage extends Model
{
    use HasFactory;

    protected $fillable = ['data_url'];

    protected $table = 'student_images';
}
