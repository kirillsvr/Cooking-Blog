@extends('admin.layouts.layout')

@section('content')
        <x-admin-titles
            header="Создание категории"
            breadcrumb="admin.categories.create"
        />
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form class="needs-validation" method="post" action="{{route('categories.store')}}" novalidate="">
                            <div class="card-header">
                                <x-admin-subtitles headtitle="Добавление новой категории" subtitle="Заполните необходимые поля"/>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row g-3">
                                    <label class="form-label" for="validationCustom01">Название категории</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Название категории" required="">
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
