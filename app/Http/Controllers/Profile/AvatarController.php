<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        // auth()->user()->update(['avatar' => 'test']);
        // dd(auth()->user());
        $path = $request->file('avatar')->store('avatars');

        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
        
    }
}
