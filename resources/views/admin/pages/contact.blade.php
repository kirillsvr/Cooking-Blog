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
                        <form class="needs-validation" method="post" action="{{route('contact.update')}}" novalidate="">
                            @csrf
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Адрес офиса</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="office_adress" placeholder="г. Москва, ул. Мира, 1, оф. 12" value="{{$contact->office_adress}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom02">Контактные телефоны</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom02" type="text" name="phone_number" placeholder="+7 900 000 11 22" value="{{$contact->phone_number}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom03">Email</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom03" type="text" name="email" placeholder="+7 900 000 11 22" value="{{$contact->email}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom04">Карта гугл</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom04" type="text" name="map" placeholder="" value="{{$contact->map}}" required="">
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

@section('dopScripts')

@endsection
