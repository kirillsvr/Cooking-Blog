@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Редактирование тэга рецептов"
        breadcrumb="admin.recipe_tags.edit"
        paramBreadcrumb="{{$tag->id}}"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation" method="post" action="{{route('recipe_tags.update', $tag->id)}}" novalidate="">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Тэг «{{$tag->title}}»" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method("PUT")
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Название тэга</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" value="{{$tag->title}}" required="">
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
