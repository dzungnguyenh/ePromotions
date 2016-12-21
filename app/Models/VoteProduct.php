<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteProduct extends Model
{
    protected $table = 'vote_products';
    protected $fillable = ['user_id', 'product_id'];
}
