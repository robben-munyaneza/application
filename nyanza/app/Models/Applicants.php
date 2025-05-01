<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
 use HasFactory;

 protected $table = "applicants";
 protected $primaryKey = "id";

 protected $fillable = [
    'FirstName',
    'LastName',
    'Email',
    'ContactNumber',
    'ApplicationDate',
    
 ];

}
