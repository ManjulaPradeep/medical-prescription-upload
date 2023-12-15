<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use RegistersUsers;

    // protected $redirectTo;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
        // $this->redirectTo = route('customer_dashboard'); // Default redirection path
        $this->redirectTo = route('landing'); // Default redirection path

    }

    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('pages.common.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function register(Request $request)
    {

        $this->validator($request->all())->validate();
        $user = $this->create($request->all());

        // Assign role based on user type (customer or staff)
        $userType = $request->input('user_type');

        if ($userType === 'staff') {
            $user->assignRole('staff');
            $this->redirectTo = route('staff_dashboard'); // Redirect to staff dashboard
        } else {
            $user->assignRole('customer');// Assinging role by Spatie
            $this->redirectTo = route('customer_dashboard'); // Redirect to customer dashboard
        }

        // $this->guard()->login($user);
        Auth::logout();

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());


    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:12'],
            'dob' => ['required', 'date'],
            'user_type' => ['required', 'in:customer,staff'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'contact' => $data['contact'],
            'dob' => $data['dob'],
            'role' => $data['user_type'],
        ]);
    }
}


