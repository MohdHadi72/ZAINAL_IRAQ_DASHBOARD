<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
     use HasFactory;
     
     public $timestamps = true;
    
    
   public function project()
    {
        return $this->belongsTo('App\Models\Project', 'projectName', 'id');
    }

 
    
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'phone',
        'salesman',
        'address',
        'occupation',
        'projectName',
        'desc',
        'Assigned',
        'Status',
    ];
}
