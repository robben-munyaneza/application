<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
  use HasFactory;

  protected $table = "job_positions";
  protected $primaryKey = "id";

protected $fillable = [
    'Title',
    'Department',
    'Description',
    'RequiredQualifications',
];

public function applications(){
  return $this->hasMany(Applications::class, 'id');
}


}
