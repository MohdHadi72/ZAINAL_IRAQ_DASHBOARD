<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function addOn()
    {
        return $this->belongsTo('App\Models\AddOn', 'addOn', 'id');
    }
     public function stageSecondDocs()
    {
        return $this->hasMany(StageSecondDoc::class);
    }
   
    protected $fillable=[
        'name',
        'location',
        'phone',
        'email',
        'zone',
        'addOn',
    ];
}
