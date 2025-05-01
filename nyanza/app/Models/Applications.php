<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Applicants; 
use App\Models\JobPosition;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    // If your table name is not the plural of the model name, uncomment this:
    // protected $table = 'applications';
    protected $table = "applications";
    protected $primaryKey = "id";

    protected $fillable = [
        'applicant_id',
        'job_id',
        'ApplicationStatus',
        'ReviewDate',
    ];

    // Relationships
    public function applicant()
    {
        return $this->belongsTo(Applicants::class);
    }

    public function job()
    {
        return $this->belongsTo(JobPosition::class, 'job_id');
    }
}
