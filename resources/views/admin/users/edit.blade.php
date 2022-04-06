@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Редактирование пользователя «{{$user->name}}»"
        breadcrumb="admin.user"
        paramBreadcrumb="{{$user->id}}"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <form class="row user-edit-form needs-validation" id="form-user" action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Данные для входа</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="media">                        <img class="img-70 rounded-circle" alt="" src="/uploads/{{$user->image}}">
                                            <div class="media-body">
                                                <h5 class="mb-3">{{$user->name}}</h5>
                                                @can('view', auth()->user())
                                                <div class="mb-3">
                                                <h6 class="form-label">Роль</h6>
                                                <select class="form-select digits" id="role" name="role_id">
                                                    <option value="1" @if($user->role_id === 1) selected @endif>Гость</option>
                                                    <option value="2" @if($user->role_id === 2) selected @endif>Автор</option>
                                                    <option value="3" @if($user->role_id === 3) selected @endif>Администратор</option>
                                                </select>
                                                </div>
                                                @endcan

                                                @cannot('view', auth()->user())
                                                <div class="mb-3">
                                                <h6 class="form-label">Роль</h6>
                                                <p>{{$user->role()->name}}</p>
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
                                    <h6 class="form-label">Email</h6>
                                    <input class="form-control" placeholder="your@domain.com" name="email" value="{{$user->email}}" required>
                                    <div class="invalid-feedback">Заполните email</div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Пароль</h6>
                                    <input class="form-control" type="password" name="password" placeholder="password">
                                    <div class="invalid-feedback">Заполните пароль</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Данные пользоватея</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Имя пользователя</label>
                                            <input class="form-control" type="text" name="name" placeholder="Username" value="{{$user->name}}" required>
                                            <div class="invalid-feedback">Заполните имя пользователя</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Публичный email</label>
                                            <input class="form-control" type="email" name="public_email" placeholder="Email" value="{{$user->public_email}}" required>
                                            <div class="invalid-feedback">Заполните публичный email</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Website</label>
                                            <input class="form-control" placeholder="site.com" name="web" value="{{$user->web}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label class="form-label">Краткая биография</label>
                                            <textarea class="form-control" rows="5" name="info" placeholder="Краткая информация о пользователе" required>{{$user->info}}</textarea>
                                            <div class="invalid-feedback">Заполните биографию</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary usr-edit" type="submit">Изменить профиль</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
