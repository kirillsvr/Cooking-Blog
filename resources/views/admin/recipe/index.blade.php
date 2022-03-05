@extends('admin.layouts.layout')

@section('title', 'Рецепты')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/range-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
    <div class="container-fluid product-wrapper sidebaron mt-4">
        <div class="product-grid">
            <div class="feature-products">
                <div class="row">
                    <div class="col-md-6 products-total">
                        <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#" data-original-title="" title=""><i data-feather="grid"></i></a></div>
                        <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#" data-original-title="" title=""><i data-feather="list"></i></a></div><span class="d-none-productlist filter-toggle">
                          Filters<span class="ms-2"><i class="toggle-data" data-feather="chevron-down"></i></span></span>
                    </div>
                    <div class="col-md-6 text-end"><span class="f-w-600 m-r-5">Showing Products 1 - 24 Of 200 Results</span>
                        <div class="select2-drpdwn-product select-options d-inline-block">
                            <select class="form-control btn-square" name="select">
                                <option value="opt1">Featured</option>
                                <option value="opt2">Lowest Prices</option>
                                <option value="opt3">Highest Prices</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <div class="product-sidebar">
                            <div class="filter-section">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0 f-w-600">Filters<span class="pull-right"><i class="fa fa-chevron-down toggle-data"></i></span></h6>
                                    </div>
                                    <div class="left-filter">
                                        <div class="card-body filter-cards-view animate-chk">
                                            <div class="product-filter">
                                                <h6 class="f-w-600">Category</h6>
                                                <div class="checkbox-animated mt-0">
                                                    @foreach($categories as $key => $category)
                                                    <label class="d-block" for="chk-ani{{$loop->index}}">
                                                        <input class="checkbox_animated category-filter" id="chk-ani{{$loop->index}}" type="checkbox" data-value="{{$key}}" data-original-title="" title="" @if(isset($data['category']) && array_search($key, $data['category']) !== false) checked @endif>
                                                        {{$category}}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="product-filter">
                                                <h6 class="f-w-600">Тэги</h6>
                                                <div class="checkbox-animated mt-0">
                                                    @foreach($tags as $key => $tag)
                                                    <label class="d-block" for="chk-ani{{$loop->index}}">
                                                        <input class="checkbox_animated" id="chk-ani{{$loop->index}}" type="checkbox" data-value="{{$key}}" data-original-title="" title="">
                                                        {{$tag}}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <form>
                            <div class="form-group m-0">
                                <input class="form-control" type="search" placeholder="Search.." data-original-title="" title=""><i class="fa fa-search"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="product-wrapper-grid">
                <div class="row">
                    @if(!empty($recipes))
                        @csrf
                        @foreach($recipes as $recipe)
                            <div class="col-xl-3 col-sm-4 xl-4">
                                <div class="card">
                                    <div class="product-box">
                                        <div class="product-img">
                                            @if(isset($recipe['newComm']))
                                            <div class="ribbon ribbon-bookmark ribbon-vertical-right ribbon-info"><i class="icofont icofont-comment"></i></div>
                                            @endif
                                            <img class="img-fluid" src="/uploads/{{$recipe->thumbnail}}" alt="">
                                            @can('edit', $recipe)
                                            <div class="product-hover">
                                                <ul>
                                                    <li>
                                                        <a class="btn" href="{{route('recipe.edit', $recipe->id)}}"><i class="icon-pencil"></i></a>
                                                    </li>
                                                    <li class="trash">
                                                        <button class="btn del-recipe" type="button" data-id="{{$recipe->id}}"><i class="icon-trash"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endcan
                                        </div>
                                        <div class="product-details">
                                            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                            <h4><a href="{{route('recipe.edit', $recipe->id)}}" class="text-decoration-none text-reset">{{$recipe->title}}</a></h4>
                                            <div class="stats row m-t-15">
                                                <div class="views col-md-6">
                                                    <i data-feather="eye"></i>
                                                    <span class="va-s">{{$recipe->views}}</span>
                                                </div>
                                                <div class="comms col-md-6">
                                                    <a class="text-decoration-none text-reset" href="{{route('recipe_comments.show', $recipe->id)}}">
                                                        <i data-feather="message-circle"></i>
                                                        <span class="va-s">{{$recipe->countComm}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$recipes->withQueryString()->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dopScripts')
<script src="{{asset('assets/admin/js/product-tab.js')}}"></script>
<script src="{{asset('assets/admin/js/range-slider/rangeslider-script.js')}}"></script>
<script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>
@endsection
