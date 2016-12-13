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
}
