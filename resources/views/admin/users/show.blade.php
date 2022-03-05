@extends('admin.layouts.layout')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
    <x-admin-titles header="Пользователь «{{$user->name}}»" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
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
                                            <p>
                                                @switch ($user->role)
                                                    @case(1)
                                                        Гость
                                                    @case(2)
                                                        Автор
                                                    @case(3)
                                                        Администратор
                                                @endswitch
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="form-label">Bio</h6>
                                <p>{{$user->short_info}}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="form-label">Email-Address</h6>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="form-label">Website</h6>
                                <p>{{$user->web}}</p>
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
                                        <h6 class="form-label">Username</h6>
                                        <p>{{$user->username}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <h6 class="form-label">Email address</h6>
                                        <p>{{$user->public_email}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <h6 class="form-label">First Name</h6>
                                        <p>{{$user->first_name}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <h6 class="form-label">Last Name</h6>
                                        <p>{{$user->last_name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <h6 class="form-label">About Me</h6>
                                        <p>{{$user->info}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Изменить профиль</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Рецепты</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body table-responsive add-project">
                            @if(isset($recipes) && $recipes->count())
                                @csrf
                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recipes as $recipe)
                                    <tr>
                                        <td><a class="text-inherit" href="#">{{$recipe->title}}</a></td>
                                        <td>{{$recipe->created_at}}</td>
                                        <td><span class="status-icon bg-success"></span> Completed</td>
                                        <td class="text-end">
                                            <a class="icon" href="javascript:void(0)"></a>
                                            <a class="btn btn-primary btn-sm" href="{{route('recipe.edit', $recipe->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="icon" href="javascript:void(0)"></a>
                                            <a class="btn btn-danger btn-sm del-recipe" href="{{route('recipe.destroy', $recipe->id)}}" data-id="{{$recipe->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="card-body">
                                У данного пользователя пока нет рецептов
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Посты на сайте</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body table-responsive add-project">
                            @if(isset($posts) && $posts->count())
                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a class="text-inherit" href="#">Untrammelled prevents </a></td>
                                        <td>28 May 2018</td>
                                        <td><span class="status-icon bg-success"></span> Completed</td>
                                        <td>$56,908</td>
                                        <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                                        <td>12 June 2018</td>
                                        <td><span class="status-icon bg-danger"></span> On going</td>
                                        <td>$45,087</td>
                                        <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                                        <td>12 July 2018</td>
                                        <td><span class="status-icon bg-warning"></span> Pending</td>
                                        <td>$60,123</td>
                                        <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                                        <td>14 June 2018</td>
                                        <td><span class="status-icon bg-warning"></span> Pending</td>
                                        <td>$70,435</td>
                                        <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                                        <td>25 June 2018</td>
                                        <td><span class="status-icon bg-success"></span> Completed</td>
                                        <td>$15,987</td>
                                        <td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            @else
                                <div class="card-body">
                                    У данного пользователя пока нет постов
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dopScripts')
    <script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>
@endsection
