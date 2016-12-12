<?php

namespace App\Repositories\Business;

interface BusinessRepositoryInterface
{
    /**
     * Get all businesss
     *
     * @return Reponse
     */
    public function getBusiness($role);
}
