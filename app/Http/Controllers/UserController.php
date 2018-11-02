<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'username', 'type')
            ->orderBy('name')
            ->get();

        return view('user.index', compact('users'));
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'type' => ['required', Rule::in(array_keys(User::TYPES))]
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()
            ->route('user.index')
            ->with('message.success', __('messages.update.success'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'username' => ['required', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|nullable|min:8|confirmed',
            'type' => ['required', Rule::in(array_keys(User::TYPES))]
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }
        else {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return back()
            ->with('message.success', __('messages.update.success'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return back()
            ->with('message.success', __('messages.delete.success'));
    }
}
