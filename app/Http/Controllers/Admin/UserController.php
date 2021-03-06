<?php

namespace App\Http\Controllers\Admin;

use App\Actions\User\UserStoreAction;
use App\Actions\User\UserUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreateUser;
use App\Http\Requests\StoreEditUser;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Services\ImageSaveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreateUser $request, UserStoreAction $action)
    {
        $this->authorize('create', User::class);
        $action->execute($request->validated());
        return response()->json('Пользователь успешно создан', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        $recipes = $user->recipes;
        $posts = $user->posts;
        return view('admin.users.show', compact('user', 'recipes', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditUser $request, User $user, UserUpdateAction $action)
    {
        $this->authorize('update', $user);
        $action->execute($request->validated(), $user);
        return response()->json('Пользователь успешно изменен', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        Storage::delete($user->image);
        $user->delete();
        return response()->json('Пользователь успешно удален', 200);
    }
}
