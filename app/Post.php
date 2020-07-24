<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = []; 

     public function detail()
     {
         //Invoice memiliki hubungan hasMany ke table invoice_detail
         return $this->hasMany(Category::class);
     }
     public function category()
    {
        return $this->belongsTo('App\Category', 'id_kategori', 'id');
    }
}
