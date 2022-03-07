@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Страница «О нас»"
        breadcrumb="admin.breadcrumb"
        paramBreadcrumb="О нас"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation" method="post" action="{{route('about.update')}}" novalidate="">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Редактирование страницы" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Заголовок</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="г. Москва, ул. Мира, 1, оф. 12" value="{{$about->title}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom02">Текст страницы</label>
                                <textarea class="@error('content') is-invalid @enderror" name="content" cols="10" rows="2">{{$about->content}}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('dopScripts')

@endsection
