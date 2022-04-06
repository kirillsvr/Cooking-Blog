@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Создание рубрики рецептов"
        breadcrumb="admin.recipe_tags.create"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation create-element" method="post" action="{{route('recipe_tags.store')}}" novalidate="">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Добавление новой рубрики" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Название рубрики</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Название рубрики" required="">
                                <div class="invalid-feedback">Заполните название рубрики</div>
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
