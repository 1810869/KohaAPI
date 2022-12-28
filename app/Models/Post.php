<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'posts';

    protected $fillable = [
        'matric_no',
        'name_key',
        'user_key',
        'id'
    ];

    public $validator = null;

    protected function failedValidation($validator)
    {
       $this->validator = $validator;
    }
}
