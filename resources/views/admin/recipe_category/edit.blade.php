@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Редактирование категории рецептов"
        breadcrumb="admin.recipe_categories.edit"
        paramBreadcrumb="{{$recipeCategory->id}}"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation" method="post" action="{{route('recipe_category.update', $recipeCategory->id)}}" novalidate="" enctype="multipart/form-data">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Категория «{{$recipeCategory->title}}»" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Название категории</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" value="{{$recipeCategory->title}}" type="text" name="title" placeholder="Название категории" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>

                            <img src="/uploads/{{$recipeCategory->thumbnail}}" width="200" alt="">
                            <input type="hidden" name="old_image" value="{{$recipeCategory->thumbnail}}">

                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label">Загрузить изображение</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="thumbnail">
                                </div>
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
