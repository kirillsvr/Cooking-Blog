@extends('admin.layouts.layout')

@section('title', 'Настройки сайта')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
    <x-admin-titles
        header="Настройки сайта"
        breadcrumb="admin.breadcrumb"
        paramBreadcrumb="Настройки сайта"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <x-admin-subtitles headtitle="Редактирование настроек сайта" subtitle="Заполните необходимые поля"/>
                    </div>
                    @csrf
                    <div class="card-body">
                        <h6 class="sub-title mb-4">Настройки пользовательской части</h6>
                        <div class="row">
                            <div class="col">
                                <form class="needs-validation front-settings" method="post" action="{{route('settings.update')}}" novalidate="">
                                    @foreach($settingsFront as $setting)
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">{{$setting->name}}</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="{{$setting->key}}" value="{{$setting->value}}">
                                        </div>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        <h6 class="sub-title mt-5 mb-4">Настройки админской части</h6>
                        <div class="row">
                            <div class="col">
                                <form class="needs-validation admin-settings" method="post" action="{{route('settings.update')}}" novalidate="">
                                    @foreach($settingsAdmin as $setting)
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">{{$setting->name}}</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="{{$setting->key}}" value="{{$setting->value}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary save-settings" type="submit">Сохранить</button>
                            <a class="btn btn-light" href="{{route('admin.index')}}">Отмена</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('dopScripts')
    <script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>
@endsection
