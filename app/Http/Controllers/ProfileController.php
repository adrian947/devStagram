<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    // el middlewate protege la navegacion para que solo usuarios autenticados puedan acceder a la url
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }
    public function store(Request $request)
    {
        $rules = [
            'username' => [
                'required',
                'min:3',
                'max:20',
                'unique:users,username,' . auth()->user()->id,
                'not_in:edit-profile',
            ],
        ];


        $this->validate($request, $rules);

        if ($request->image) {
            $image = $request->file('image');
            $imageName = Str::uuid() . "." . $image->extension();

            $imageServer = Image::make($image);
            $imageServer->fit(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $imageName;
            $imageServer->save($imagePath);
        }
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $imageName ?? auth()->user()->image ?? null;
        $user->save();

        return redirect()->route('posts', $user->username);
    }
}
