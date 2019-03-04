<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'first_name', 'last_name', 'username', 'type')
            ->orderBy('first_name')
            ->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
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
        if (auth()->user()->cannot('delete', $user)) {
            return back()
                ->with('message_state', 'danger')
                ->with('message_text', __('messages.unauthorized'));
        }

        $user->delete();
        return back()
            ->with('message.success', __('messages.delete.success'));
    }
}
