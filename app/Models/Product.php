<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'product_name', 'price', 'description', 'quantity', 'picture', 'category_id', 'user_id'
    ];

    /**
    *Method relationship
    *
    *@return relationship
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
    *Method relationship
    *
    *@return relationship
    */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
