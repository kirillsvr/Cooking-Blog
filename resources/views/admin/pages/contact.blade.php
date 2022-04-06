@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Страница «Контакты»"
        breadcrumb="admin.breadcrumb"
        paramBreadcrumb="Контакты"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation contact-form" method="post" action="{{route('contact.update')}}" novalidate="">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Редактирование страницы" subtitle="Заполните необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom01">Адрес офиса</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="office_adress" placeholder="г. Москва, ул. Мира, 1, оф. 12" value="{{$contact->office_adress}}" required="">
                                <div class="invalid-feedback">Заполните адрес офиса</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom02">Контактные телефоны</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom02" type="text" name="phone_number" placeholder="+7 900 000 11 22" value="{{$contact->phone_number}}" required="">
                                <div class="invalid-feedback">Заполните контактные телефоны</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom03">Email</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom03" type="text" name="email" placeholder="+7 900 000 11 22" value="{{$contact->email}}" required="">
                                <div class="invalid-feedback">Заполните email</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="validationCustom04">Карта гугл</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom04" type="text" name="map" placeholder="" value="{{$contact->map}}" required="">
                                <div class="invalid-feedback">Заполните данные для карты гугл</div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary save-contact" type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('dopScripts')

@endsection
