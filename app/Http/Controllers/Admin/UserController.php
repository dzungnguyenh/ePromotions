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
        $user = $this->userRepository->getUser($role);
        return view('admin.user.index', compact('user', 'sort'));
    }
}
