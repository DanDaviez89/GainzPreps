<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\menuItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function account() {
        if(auth()->check()) {
            $user = auth()->user();

            return view("user.account", [
                'user' => $user,
            ]);
        }
        else {
            return view("user.account-guest");
        }
    }

    public function registerForm() {
        return view("user.register");
    }

    public function loginForm() {
        return view("user.login");
    }

    public function submitRegister(Request $request) {
        $formFields = $request->validate([
            'firstName' => ['required', 'min:3'],
            'lastName' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
            'isAdmin' => 'required'
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create([
            'firstName' => $formFields['firstName'],
            'lastName' => $formFields['lastName'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'isAdmin' => $formFields['isAdmin']
        ]);

        //Login User
        auth()->login($user);

        return redirect("/")->with('message', "Registered User");
    }

    public function submitLogin(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect("/")->with('message', 'Logged In');
        }

        return back()->withErrors(["email" => "Invalid Details"])->onlyInput('email');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged Out');
    }

    public function edit($id) {
        $user = User::findOrFail($id);

        return view ('user.edit', [
            'user' => $user
        ]);
    }

    public function submitEdit($id, Request $request) {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
        ]);

        return redirect('/user/account')->with('message', 'Edit Successful');
    }

    public function postReview($id, Request $request) {
        $request->validate([
            'description' => "required|min:3"
        ]);

        Review::create([
            'description' => $request->description,
            'user_id' => auth()->id(),
            'menu_item_id' => $id
        ]);

        return back()->with('message', 'Review Successfully Uplaoded');
    }
}
