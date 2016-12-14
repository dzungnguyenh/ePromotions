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

    /**
     * Show detail a user
     * @param  int $id id user
     * 
     * @return table
     */
     public function show($id){
      $user = $this->userRepository->find($id);
      if(empty($user)) {
        Sesion::flash('msg', trans('user.not_user'));
        return redirect(route('users.index'));
      }
      switch ($user['gender']) {
        case '1': $user['gender'] ="Male";
        break;
        case '2': $user['gender'] ="Female";
        break;
        case '3': $user['gender'] ="Other";
        break;
      }
      return view('admin.user.show', compact('user'));
    }
}
