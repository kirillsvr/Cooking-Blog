@extends('admin.layouts.layout')

@section('title', 'Настройки сайта')

@section('content')
    <x-admin-titles header="Настройки сайта" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <x-admin-subtitles headtitle="Редактирование настроек сайта" subtitle="Заполните необходимые поля"/>
                    </div>
                    <form class="needs-validation" method="post" action="{{route('settings.update')}}" novalidate="">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    @foreach($settings as $setting)
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">{{$setting->name}}</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="{{$setting->key}}" value="{{$setting->value}}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <input class="btn btn-light" type="reset" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
