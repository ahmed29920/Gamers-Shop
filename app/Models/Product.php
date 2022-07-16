<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Carts;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description' , 'image','category_id' , 'price' , 'discount'
      ];
      public function category()
      {
          return $this->belongsTo(Categorie::class ,'category_id','id');
      }
      public function cart(){
        return $this->hasMany(Carts::class);
    }
}
