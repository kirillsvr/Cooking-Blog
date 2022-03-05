@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles header="Пользователи" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <x-admin-subtitles headtitle="Список пользователей" subtitle=""/>
                    </div>
                    <div class="table-responsive">
                        @if(count($users))
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Доступ</th>
                                    <th scope="col">Дата регистрации</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row"><a href="{{route('users.show', $user->id)}}">{{$user->name}}</a></th>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <a class="btn btn-success btn-s" data-original-title="btn btn-danger btn-xs" title="" href="{{route('users.edit', $user->id)}}" data-bs-original-title=""><i class="fa fa-pencil"></i></a>
                                            <form action="{{route('users.destroy', $user->id)}}" class="d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-s" type="submit" data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title=""><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @else
                            <div class="card-body">
                                Тэгов пока нет...
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
