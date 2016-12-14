<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Session;

class UserController extends Controller
{
    protected $UserRepository;
  
  /**
   * Create a new UserRepository instance
   *
   * @param UserRepository $userRepository description
   *
   * @return void
   */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

  /**
   * Display users
   *
   * @return Respone description
   */
    public function index()
    {
        $sort = config('constants.USER');
        $role = config('constants.ROLEUSER');
        $users = $this->userRepository->getUser($role);
        return view('admin.user.index', compact('users', 'sort'));
    }

    /**
     * Delete a user
     *
     * @param int $id description
     *
     * @return Reponse
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Session::flash('msg', trans('user.not_uset'));
            return redirect(route('users.index'));
        }
        $this->userRepository->delete($id);
        Session::flash('msg', trans('user.delete_sucessfully'));
        return redirect(route('users.index'));
    }
}
