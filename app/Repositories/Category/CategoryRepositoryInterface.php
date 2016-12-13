<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    /**
     * Get all categories
     *
     * @return array List of categories
     */
    public function all();

    /**
     * Get all categories only have name
     *
     * @return array List of categories
     */
    public function allName();

    /**
     * Get all nodes is root
     *
     * @return array Root Caterories
     */
    public function allRoot();

    /**
     * Get descendants of node by id
     *
     * @param Integer $id Id of root node
     *
     * @return array     List of descendant of node
     */
    public function findDescendants($id);

    /**
     * Add a new category
     *
     * @param array $inputs Array values for create
     *
     * @return Category         Category
     */
    public function create($inputs);

    /**
     * Update a category
     *
     * @param array   $inputs Array values for update
     * @param integer $id     Id of category
     *
     * @return Category         Category
     */
    public function update($inputs, $id);

    /**
     * Delete a category
     *
     * @param integer $id Id of category
     *
     * @return boolean     True is successfull, false is error
     */
    public function delete($id);
}
