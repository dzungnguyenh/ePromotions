<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Repositories\VoteProduct\VoteProductRepository;
use Session;

class UserController extends Controller
{
    /**
     * The UserRepository instance
     *
     * @var UserRepository
     */
    protected $UserRepository;
    
    /**
     * The VoteProductRepository instance
     *
     * @var voteProRepository
     */
    protected $voteProRepository;

   /**
    * Create a new UserRepository instance
    *
    * @param UserRepository        $userRepository    description
    * @param VoteProductRepository $voteProRepository description
    *
    * @return void
    */
    public function __construct(UserRepository $userRepository, VoteProductRepository $voteProRepository)
    {
        $this->userRepository = $userRepository;
        $this->voteProRepository = $voteProRepository;
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
        Session::flash('msg', trans('user.delete_successfully'));
        return redirect(route('users.index'));
    }

    /**
     * Show detail a user
     *
     * @param int $id user
     *
     * @return table
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Sesion::flash('msg', trans('user.not_user'));
            return redirect(route('users.index'));
        }
        return view('admin.user.show', compact('user'));
    }

    /**
     * Update a user when block
     *
     * @param int $id [id of user]
     *
     * @return boolean
     */
    public function update($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Session::flash('msg', trans('user.user_not_found'));
        }
        $user = $this->userRepository->blockUser($id);
    }

    /**
     * Display users has been block
     *
     * @return Reponse
     */
    public function getBlockUser()
    {
        $users = $this->userRepository->getBlockUser();
        return view('admin.user_block.index', compact('users'));
    }

    /**
     * Unlock for a user account
     *
     * @param int $id [id of user]
     *
     * @return void
     */
    public function unlock($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Session::flash('msg', trans('user.user_not_found'));
        }
        $this->userRepository->unlockUser($id);
    }

    /**
     * Get list history voted
     *
     * @return mixed
     */
    public function getHistoryVoted()
    {
        $listHistoryVotes = $this->voteProRepository->getHistoryVoted();
        return view('user.history.index', compact('listHistoryVotes'));
    }
}
