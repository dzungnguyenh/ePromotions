<?php

namespace App\Repositories\Business;

interface BusinessRepositoryInterface
{
    /**
     * Get all businesss
     *
     * @param int $role [role of user]
     *
     * @return Reponse
     */
    public function getBusiness($role);

    /**
     * Paginate in view
     *
     * @param int $limit [limit records per page]
     *
     * @return array
     */
    public function paginate($limit);

    /**
     * Find a business
     *
     * @param int $id [id of business]
     *
     * @return Business
     */
    public function find($id);

    /**
     * Delete a business
     *
     * @param int $id [id of business delete]
     *
     * @return boolean
     */
    public function delete($id);
}
