@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Редактирование категории рецептов"
        breadcrumb="admin.recipe_categories.edit"
        paramBreadcrumb="{{$category->id}}"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation" method="post" action="{{route('recipe_category.update', $category->id)}}" novalidate="" enctype="multipart/form-data">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Категория «{{$category->title}}»" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Название категории</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" value="{{$category->title}}" type="text" name="title" placeholder="Название категории" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label">Upload File</label>
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
