<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicianFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'staff_number', 'college', 'department', 'position'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ledProjects()
    {
        return $this->hasMany(Project::class, 'project_id');
    }

    public function memberProjects()
    {
        return $this->belongsToMany(Project::class, 'project_members', 'academician_id', 'project_id');
    }
}
