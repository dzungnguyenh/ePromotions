<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Constructor for category repository
     *
     * @param Category $category App\Models\Category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get all categories
     *
     * @return array List of categories
     */
    public function all()
    {
        $list = $this->model->all()->toTree();
        $data = Category::recursiveTree($list, false, false);
        return $data;
    }

    /**
     * Get all categories only have name
     *
     * @return array List of categories
     */
    public function allName()
    {
        $list = $this->model->all()->toTree();
        $data = Category::recursiveTree($list, true, true);
        return $data;
    }

    /**
     * Get descendants of node by id
     *
     * @param Integer $id Id of root node
     *
     * @return array     List of descendant of node
     */
    public function findDescendants($id)
    {
        $list = $this->model->descendantsOf($id)->toTree();
        return $list;
    }

    /**
     * Get all categories is root
     *
     * @return array List root categories
     */
    public function allRoot()
    {
        $list = $this->model->whereIsRoot()->get()->toTree();
        return $list;
    }

    // /**
    //  * Update a category
    //  *
    //  * @param  array $inputs Array values for update
    //  * @param  integer $id     Id of category
    //  *
    //  * @return Category         Category
    //  */
    // public function update($inputs, $id)
    // {
    //     // $category = $this->model->find($id);
    //     $category = $this->model->where('id', $id);
    //     $category->id = ;
    //     return $category;
    // }
}
