<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'parent_id', 'lft', '_rgt'];

    /**
     * Get the children for category
     *
     * @return array List of child categories
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get parent that owns category
     *
     * @return Category Parent
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Convert list categories to tree
     *
     * @param array   $nodes  List of categories
     * @param boolean $isRoot Root node is true, if not false
     * @param boolean $idFlag Get all attributes of category is true, only get name is false
     *
     * @return array               List of categories
     */
    public static function recursiveTree($nodes, $isRoot = true, $idFlag = true)
    {
        if ($isRoot) {
            $results[0] = 'Root';
        }

        $traverse = function ($categories, $prefix = '*') use (&$traverse, &$results) {
            foreach ($categories as $key => $category) {
                $category->name = PHP_EOL.$prefix.' '.$category->name;
                $results[$category->id] =$category->name;
                $traverse($category->children, $prefix.'*');
            }
        };

        $traverse($nodes);

        return $idFlag == true ?  $results : $nodes ;
    }
}
