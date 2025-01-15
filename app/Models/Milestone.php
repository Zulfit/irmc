<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    /** @use HasFactory<\Database\Factories\MilestoneFactory> */
    use HasFactory;

    protected $fillable = ['project_id','name','target_complete_date','deliverable','status','remark'];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
