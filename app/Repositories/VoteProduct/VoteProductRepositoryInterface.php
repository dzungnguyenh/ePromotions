<?php

namespace App\Repositories\VoteProduct;

interface VoteProductRepositoryInterface
{
    /**
     * Get all voteProduct
     *
     * @return Reponse
     */
    public function all();

    /**
     * Create a new voteProduct
     *
     * @param array $inputs [values input text]
     *
     * @return voteProduct
     */
    public function create($inputs);

    /**
     * Find a voteProduct
     *
     * @param int $id [id of voteProduct update]
     *
     * @return voteProduct
     */
    public function find($id);

    /**
     * Update a voteProduct
     *
     * @param array $inputs [values input text]
     * @param int   $id     [id of voteProduct]
     *
     * @return boolean
     */
    public function update($inputs, $id);

    /**
     * Delete a voteProduct
     *
     * @param int $id [id of voteProduct delete]
     *
     * @return boolean
     */
    public function delete($id);
}
