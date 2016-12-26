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

    /**
     * Get chilren of product
     *
     * @return array Promotions
     */
    public function promotion()
    {
        return $this->hasMany('App\Models\Promotion');
    }

    /**
     * Get chilren of product
     *
     * @return array VoteProducts
     */
    public function voteProducts()
    {
        return $this->hasMany('App\Models\VoteProduct');
    }
}
