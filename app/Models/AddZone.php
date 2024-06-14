<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddZone extends Model
{
    use HasFactory;

    public function getProject()
    {
        return $this->belongsTo('App\Models\Project','projectName_id');
    }

    protected $fillable=['projectName_id','zone'];
}
