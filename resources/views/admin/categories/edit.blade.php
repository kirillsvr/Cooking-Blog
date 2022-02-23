@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Редактирование категории</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Sample Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Категория "{{$category->title}}"</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{route('categories.update', $category->id)}}" novalidate="">
                            @csrf
                            @method("PUT")
                            <div class="row g-3">
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
