<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

   protected $fillable = ['user_id', 'category_id', 'name', 'price', 'unit', 'img_url'];

   public function invoiceProduct(){
      return $this->hasMany(InvoiceProduct::class,'product_id', 'id');
   }

}
