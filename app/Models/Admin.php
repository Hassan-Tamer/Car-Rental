<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'ssn';
    protected $fillable = [
        'fname',
        'lname',
        'office_id',
        'email',
        'password',
    ];
}