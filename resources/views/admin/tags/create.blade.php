@extends('admin.layouts.layout')

@section('content')
        <x-admin-titles header="Создание тэга" />
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Добавление нового тэга" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="post" action="{{route('tags.store')}}" novalidate="">
                                @csrf
                                <div class="row g-3 mb-4">
                                    <label class="form-label" for="validationCustom01">Название тэга</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Название тэга" required="">
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
