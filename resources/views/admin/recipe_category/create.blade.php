@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Создание категории рецептов"
        breadcrumb="admin.recipe_categories.create"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation create-recipe-category" method="post" action="{{route('recipe_category.store')}}" novalidate="" enctype="multipart/form-data">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Добавление новой категории" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Название категории</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Название категории" required="">
                                <div class="invalid-feedback">Заполните название категории</div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label">Загрузить изображение</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="thumbnail" required>
                                    <div class="invalid-feedback">Загрузите изображение</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary save-recipe-category" type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
