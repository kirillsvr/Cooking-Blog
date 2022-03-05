@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles header="Редактирование категории" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <x-admin-subtitles headtitle="Категория «{{$category->title}}»" subtitle="Заполните необходимые поля"/>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{route('categories.update', $category->id)}}" novalidate="">
                            @csrf
                            @method("PUT")
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Название категории</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" value="{{$category->title}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>

                            <button class="btn btn-primary" type="submit">Сохранить</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
