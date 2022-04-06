@extends('admin.layouts.layout')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
    <x-admin-titles
        header="Пользователь «{{$user->name}}»"
        breadcrumb="admin.user"
        paramBreadcrumb="{{$user->id}}"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Профиль</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                                         data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media"><img class="img-70 rounded-circle" alt=""
                                                            src="/uploads/{{$user->image}}">
                                        <div class="media-body">
                                            <h5 class="mb-1">{{$user->name}}</h5>
                                            <p>{{$user->role->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="form-label">Email</h6>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Информация о пользователе</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                                         data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <h6 class="form-label">Публичный email</h6>
                                        <p>{{$user->public_email}}</p>
                                    </div>
                                </div>
                                @if($user->web)
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <h6 class="form-label">Website</h6>
                                        <p>{{$user->web}}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div>
                                        <h6 class="form-label">Краткая биография</h6>
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
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                                         data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        @if(isset($recipes) && $recipes->count())
                            <div class="card-body table-responsive add-project">

                                @csrf
                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Название рецепта</th>
                                        <th>Дата публикации</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recipes as $recipe)
                                        <tr>
                                            <td><a class="text-inherit" href="#">{{$recipe->title}}</a></td>
                                            <td>{{$recipe->created_at}}</td>
                                            <td class="text-end">
                                                <a class="icon" href="javascript:void(0)"></a>
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{route('recipe.edit', $recipe->id)}}"><i
                                                        class="fa fa-pencil"></i> Изменить</a>
                                                <a class="icon" href="javascript:void(0)"></a>
                                                <a class="btn btn-danger btn-sm del-recipe"
                                                   href="{{route('recipe.destroy', $recipe->id)}}"
                                                   data-id="{{$recipe->id}}"><i class="fa fa-trash"></i> Удалить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @else
                            <div class="card-body">
                                У данного пользователя пока нет рецептов
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Посты на сайте</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                                         data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        @if(isset($posts) && $posts->count())
                            <div class="card-body table-responsive add-project">

                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Название статьи</th>
                                        <th>Дата публикации</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td><a class="text-inherit" href="#">{{$post->title}}</a></td>
                                            <td>{{$post->created_at}}</td>
                                            <td class="text-end">
                                                <a class="icon" href="javascript:void(0)"></a>
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{route('posts.edit', $post->id)}}"><i
                                                        class="fa fa-pencil"></i> Изменить</a>
                                                <a class="icon" href="javascript:void(0)"></a>
                                                <a class="btn btn-danger btn-sm del-post"
                                                   href="{{route('posts.destroy', $post->id)}}"
                                                   data-id="{{$post->id}}"><i class="fa fa-trash"></i> Удалить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
@endsection

@section('dopScripts')
    <script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>
@endsection
