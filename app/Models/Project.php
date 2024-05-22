<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'client',
        'year',
        'services',
        'project_type',
        'description',
        'about_project',
        'about_client',
    ];

    public function images(){

        return $this->hasMany(ProjectImage::class);
    }
}
