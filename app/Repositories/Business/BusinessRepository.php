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
     * @param int $role [role of business]
     *
     * @return array
     */
    public function getBusiness($role)
    {
        $data = User::where('role_id', $role)->paginate(trans('business.limit'));

        return $data;
    }

    /**
     * Block a business
     *
     * @param int $id [id of business]
     *
     * @return boolean
     */
    public function blockBusiness($id)
    {
        try {
            $data = User::where('id', $id)->update([
                'role_id' => config('constants.BLOCK_USER'),
            ]);
        } catch (Exception $e) {
            return view('/business')->withError(trans('user.error_when_block_user'));
        }
        if (!$data) {
            throw new Exception(trans('user.block_user_error'));
        }
        return $data;
    }
}

