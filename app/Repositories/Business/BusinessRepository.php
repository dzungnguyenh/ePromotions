<?php

namespace App\Repositories\Business;

use App\Repositories\BaseRepository;
use App\Repositories\Business\BusinessRepositoryInterface;
use App\User;

class BusinessRepository extends BaseRepository implements BusinessRepositoryInterface
{
    /**
     * The business instance
     *
     * @param Business $business [description]
     *
     * @return void
     */
    public function __construct(User $business)
    {
        $this->model = $business;
    }

    /**
     * Get list business
     *
     * @param  int $role [role of business]
     *
     * @return array
     */
    public function getBusiness($role)
    {
        $data = User::where('role_id', $role)->get();

        return $data;
    }
}
