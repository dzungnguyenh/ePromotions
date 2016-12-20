<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    protected $table = 'book_details';
    protected $fillable = ['quantity', 'book_id', 'product_id', 'price', 'status'];
}
