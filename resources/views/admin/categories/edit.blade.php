@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Редактирование категории"
        breadcrumb="admin.categories.edit"
        paramBreadcrumb="{{$category->id}}"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation" method="post" action="{{route('categories.update', $category->id)}}" novalidate="">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Категория «{{$category->title}}»" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method("PUT")
                            <div class="row g-3">
                                <label class="form-label" for="validationCustom01">Название категории</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" value="{{$category->title}}" required="">
                                <div class="valid-feedback">Looks good!</div>
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
