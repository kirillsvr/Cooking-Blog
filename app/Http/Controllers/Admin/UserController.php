<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreateUser;
use App\Http\Requests\StoreEditUser;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Services\ImageSaveService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(ImageSaveService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
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
    public function store(StoreCreateUser $request)
    {
        $this->authorize('create', User::class);
        $data = $request->all();
        $data['image'] = $this->service->uploadImage($request, 'image');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->home();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $this->authorize('view', $user);
//        $posts = $user->posts;
        $recipes = $user->recipes;
        return view('admin.users.show', compact('user', 'recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
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
    public function update(StoreEditUser $request, $id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);
        $data = $request->all();
        if (empty($data['password'])) unset($data['password']);
            else $data['password'] = bcrypt($data['password']);

        if (empty($data['image'])) unset($data['image']);
            else $data['image'] = $this->service->uploadImage($request, 'image', $user->image);

        $up = $user->update($data);
        return redirect()->home();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $this->authorize('delete', $user);
    }
}
