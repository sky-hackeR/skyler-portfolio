<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'image',
    ];

    public function project(){
        
        return $this->belongsTo(Project::class);
    }
}
