@extends('front.layouts.layout')


@section('content')
    <x-front-title
        header="Контакты"
        breadcrumb="front.breadcrumb"
        paramBreadcrumb="Контакты"
    />

    <!-- Contact Us Section Start Here -->
    <section class="contact-information padding-tb pb-xl-0">
        <div class="container">
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h5>Контактная информация</h5>
                        <div class="post-item">
                            <div class="post-thumb">
                                <img src="/assets/front/images/contac/icon/04.png" alt="contact">
                            </div>
                            <div class="post-content">
                                <h6>Адрес офиса:</h6>
                                <p>{{$page->office_adress}}</p>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="post-thumb">
                                <img src="/assets/front/images/contac/icon/05.png" alt="contact">
                            </div>
                            <div class="post-content">
                                <h6>Номер телефона: </h6>
                                <p>{{$page->phone_number}}</p>
                            </div>
                        </div>
                        <div class="post-item">
                            <div class="post-thumb">
                                <img src="/assets/front/images/contac/icon/06.png" alt="contact">
                            </div>
                            <div class="post-content">
                                <h6>Email адрес: </h6>
                                <p>{{$page->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h5>Отправьте нам сообщение</h5>
                        <form action="{{route('contact.message')}}" method="post" class="d-flex flex-wrap justify-content-between contact-page">
                            @csrf
                            <input type="text" name="name" placeholder="Ваше имя">
                            <input type="text" name="email" placeholder="Ваш Email">
                            <input class="w-100" name="subject" type="text" placeholder="Тема">
                            <textarea rows="8" name="text" placeholder="Ваше сообщение"></textarea>
                            <button type="submit" class="food-btn style-2"><span>Отправить сообщение</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us Section Ending Here -->


    <!-- G-Map Section Start Here -->
    <div class="gmaps-section">
        <div class="map-area">
            {!!$page->map!!}
        </div>
    </div>
    <!-- G-Map Section Ending Here -->
@endsection
