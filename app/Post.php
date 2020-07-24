<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = []; 

     //DEFINE RELATIONSHIPS
     public function category()
     {
         //Post reference ke table Category
         return $this->belongsTo(Category::class);
     }

     public function detail()
     {
         //Invoice memiliki hubungan hasMany ke table invoice_detail
         return $this->hasMany(Invoice_detail::class);
     }
}
