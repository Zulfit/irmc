<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ['academician_id','grantAmount','grantProvider','title','startDate','duration'];

    public function leader()
    {
        return $this->belongsTo(Academician::class, 'academician_id');
    }

    public function members()
    {
        return $this->belongsToMany(Academician::class, 'project_members', 'project_id', 'academician_id');
    }

    public function milestone()
    {
        return $this->hasOne(Milestone::class);
    }
}
