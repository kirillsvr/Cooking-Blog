@extends('admin.layouts.layout')

@section('content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Новая статья</h3>
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
                            <h5>Hoverable rows</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="post" action="{{route('posts.store')}}" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <label class="form-label" for="validationCustom01">Название статьи</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Название категории" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="row g-3">
                                    <label class="form-label" for="exampleFormControlTextarea4">Краткое описание</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea4" rows="3"></textarea>
                                </div>
                                <div class="row g-3">
                                    <label>Контент:</label>
                                    <textarea id="text-box" class="@error('content') is-invalid @enderror" name="content" cols="10" rows="2"></textarea>
                                </div>
                                <div class="mb-3 g-3">
                                    <label class="form-label" for="exampleFormControlSelect9">Категория</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9" name="category_id">
                                        @foreach($categories as $key => $category)
                                            <option value="{{$key}}">{{$category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 g-3">
                                    <div class="col-form-label">Тэги:
                                        <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple" name="tags[]">
                                            @foreach($tags as $key => $tag)
                                                <option value="{{$key}}">{{$tag}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Upload File</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="thumbnail">
                                    </div>
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

@section('dopScripts')

@endsection
