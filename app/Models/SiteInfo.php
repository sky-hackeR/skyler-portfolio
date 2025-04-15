<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'site_name',
        'logo_bottom',
        'logo_top',
        'description',
        'favicon',
        'cv',
    ];
}
