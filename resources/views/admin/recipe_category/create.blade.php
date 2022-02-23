@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Sample Page</h3>
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
                        <form class="needs-validation" method="post" action="{{route('recipe_category.store')}}" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <label class="form-label" for="validationCustom01">Название категории</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Название категории" required="">
                                <div class="valid-feedback">Looks good!</div>
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
