<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    /**
     * Get all Users
     *
     * @return Reponse
     */
    public function all();

    /**
     * Create a new User
     *
     * @param array $inputs [values input text]
     *
     * @return User
     */
    public function create($inputs);

    /**
     * Find a User
     *
     * @param int $id [id of User update]
     *
     * @return User
     */
    public function find($id);

    /**
     * Update a User
     *
     * @param array $inputs [values input text]
     * @param int   $id     [id of User]
     *
     * @return boolean
     */
    public function update($inputs, $id);

    /**
     * Delete a User
     *
     * @param int $id [id of User delete]
     *
     * @return boolean
     */
    public function delete($id);

    /**
     * Block a user
     *
     * @param int $id [id of user]
     *
     * @return boolean
     */
    public function blockUser($id);
    
    /**
     * Check status user
     *
     * @return void
     */
    public function checkLogin();
}
