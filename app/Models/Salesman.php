<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;
   
   public function product()
{
    return $this->belongsTo('App\Models\Product', 'houseNumber_id', 'id');
}
    
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'projectName_id', 'id');
    }
     public function getzone()
    {
        return $this->belongsTo('App\Models\AddZone', 'zone','id');
    }
   
}
