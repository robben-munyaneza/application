<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentStages extends Model
{

    use HasFactory;

    protected $primaryKey = 'StageId';
    protected $table = 'recruitment_stages';

    protected $fillable = [
        'ApplicationId',
        'StageName',
        'StageStatus',
        'CompletionDate',
    ];

    public function application() {
        return $this->belongsTo(Applications::class, 'id');
    }
}
