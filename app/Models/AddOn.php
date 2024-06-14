<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{
    use HasFactory;
    
    public function project()
{
    return $this->belongsTo('App\Models\Project', 'projectName', 'id');
}

public function product()
{
    return $this->belongsTo(Product::class, 'houseNumber_id');
}

    protected $fillable=[
        'name',
        'price',
        'detail',
        'projectName'
    ];
}
