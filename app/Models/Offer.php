<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description' , 'image','product_id'
      ];

      public function products(){
        return $this->hasMany(Products::class);
    }
}
