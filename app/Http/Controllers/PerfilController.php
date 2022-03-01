<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePerfilRequest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function update(UpdatePerfilRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        if ($request->hasFile('avatar')) {

            $request->file('avatar')->storeAs(
                'avatares',
                $request->user()->id . '.jpg',
                'local',
            );
            $img = Image::make(storage_path('app/avatares/' . $request->user()->id . '.jpg'));
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::makeDirectory('public/avatares');
            $img->save(public_path('storage/avatares/' . $request->user()->id . '.jpg'));
        }

        return redirect()->route('perfil')->with('success', 'Profile saved successfully.');
    }
}
