<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use Input;
use Auth;
use File;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * The User instance
     *
     * @param User $user [description]
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Update a user information
     *
     * @param array $input [value enter input]
     * @param int   $id    [id of user]
     *
     * @return boolean
     */
    public function update($input, $id)
    {
        try {
            if (isset($input['avatar'])) {
                $input['avatar'] = $this->uploadAvatar();
            } else {
                $input['avatar'] = Auth::user()->avatar;
            }
            if (empty($input['password'])) {
                unset($input['password']);
            } else {
                $input['password'] = bcrypt($input['password']);
            }
            $data = User::where('id', $id)->update($input);
        } catch (Exception $e) {
            return view('/home')->withError(trans('user.error_when_update'));
        }
        if (!$data) {
            throw new Exception(trans('user.update_profile_error'));
        }
        return $data;
    }

    /**
     * Upload avatar
     *
     * @return string           [name new avatar]
     */
    public function uploadAvatar()
    {
        $file = Input::file('avatar');
        $destinationPath = public_path() . trans('user.avatar_path');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        Input::file('avatar')->move($destinationPath, $fileName);
        if (!empty(Auth::user()->avatar) && file_exists(public_path() . trans('user.avatar_path').DIRECTORY_SEPARATOR.Auth::user()->avatar)) {
            File::delete(public_path() . trans('user.avatar_path').DIRECTORY_SEPARATOR .Auth::user()->avatar);
        }
        return $fileName;
    }

    /**
     *Get list useer
     *
     *@param int $role description
     *
     *@return array
     */
    public function getUser($role)
    {
        $data = User::where('role_id', $role)->paginate(trans('business.limit'));
        return $data;
    }
}
