<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationAccount;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

class RegisterController extends Controller
{
  public $table = 'user';
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data request data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      return Validator::make($data, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data request data
     *
     * @return User
     */
    protected function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        ]);
    }
    
    /**
     * Notification register
     *
     * @param Request $request array $user
     *
     * @return string           status
     */
    public function register(Request $request)
    {
      $this->validator($request->all())->validate();
      event(new Registered($user = $this->create($request->all())));
      Mail::to($user->email)->send(new ConfirmationAccount($user));
      return back()->with(trans('confirmation.confirm'), trans('confirmation.link') );
      $this->guard()->login($user);
      return redirect($this->redirectPath());
    }

    /**
     * Confirm a use's email address
     *
     * @param string $token request token
     *
     * @return mixed
     */
    public function confirmEmail($token)
    {
      User::whereToken($token)->firstOrFail()->confirmEmail();
      return redirect('login')->with( trans('confirmation.status'), trans('confirmation.notification') );
    }
  }
