@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Profile</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active"> Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <form class="row" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">My Profile</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <h6 class="form-label">Загрузить аватар</h6>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Роль</h6>
                                    <select class="form-select digits" id="role" name="role">
                                        <option value="1">Гость</option>
                                        <option value="2">Автор</option>
                                        <option value="3">Администратор</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Bio</h6>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email-Address</label>
                                    <input class="form-control" placeholder="your-email@domain.com" name="email" value="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Website</label>
                                    <input class="form-control" placeholder="http://Uplor .com" name="web" value="">
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
                                            <input class="form-control" type="text" name="name" placeholder="Username" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Public Email address</label>
                                            <input class="form-control" type="email" name="public_email" placeholder="Email" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" name="first_name" placeholder="Company" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <label class="form-label">About Me</label>
                                            <textarea class="form-control" rows="5" name="info" placeholder="Enter About your description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Create Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
