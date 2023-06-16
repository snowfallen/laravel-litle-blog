<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $users = User::paginate(5)
        ;
        return view('users.index', ['users' => $users]);
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('users.create');
    }

    /**
     * @param UserRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(UserRequest $request): Redirector|RedirectResponse|Application
    {
        User::create($request->all());

        return redirect('user')->with('success', 'Success! User has been created.');
    }

    /**
     * @param User $user
     * @return Factory|View|Application
     */
    public function edit(User $user): Factory|View|Application
    {
        return view('users.edit',['user' => $user]);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return Redirector|Application|RedirectResponse
     */
    public function update(UserRequest $request, User $user): Redirector|Application|RedirectResponse
    {
        $password =  $request->password ? $request->password : $user->password;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);

        return redirect('user')->with('success', 'Success! User data has been updated.');
    }

    /**
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(User $user): Redirector|RedirectResponse|Application
    {
        $user->delete();

        return redirect('user')->with('success', 'Success! User has been deleted.');
    }
}
