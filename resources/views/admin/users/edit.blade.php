@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles header="Редактирование пользователя «{{$user->name}}»" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <form class="row" action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">My Profile</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="media">                        <img class="img-70 rounded-circle" alt="" src="/uploads/{{$user->image}}">
                                            <div class="media-body">
                                                <h5 class="mb-1">{{$user->name}}</h5>
                                                @can('view', auth()->user())
                                                <div class="mb-3">
                                                <h6 class="form-label">Роль</h6>
                                                <select class="form-select digits" id="role" name="role">
                                                    <option value="guest" @if($user->role === 1) selected @endif>Гость</option>
                                                    <option value="author" @if($user->role === 2) selected @endif>Автор</option>
                                                    <option value="admin" @if($user->role === 3) selected @endif>Администратор</option>
                                                </select>
                                                </div>
                                                @endcan

                                                @cannot('view', auth()->user())
                                                <div class="mb-3">
                                                <h6 class="form-label">Роль</h6>
                                                <p>{{$user->role}}</p>
                                                </div>
                                                @endcannot
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Изменить аватар</h6>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Bio</h6>
                                    <textarea class="form-control" rows="5">{{$user->short_info}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email-Address</label>
                                    <input class="form-control" placeholder="your-email@domain.com" name="email" value="{{$user->email}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Website</label>
                                    <input class="form-control" placeholder="http://Uplor .com" name="web" value="{{$user->web}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Edit Profile</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control" type="text" name="name" placeholder="Username" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Public Email address</label>
                                            <input class="form-control" type="email" name="public_email" placeholder="Email" value="{{$user->public_email}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" name="first_name" placeholder="Company" value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label class="form-label">About Me</label>
                                            <textarea class="form-control" rows="5" name="info" placeholder="Enter About your description">{{$user->info}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
