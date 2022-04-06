@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Поиск по сайту"
        breadcrumb="admin.breadcrumb"
        paramBreadcrumb="Поиск по сайту"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid search-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <form class="theme-form" method="get" action="{{route('search.index')}}">
                            <div class="input-group m-0">
                                <input class="form-control-plaintext" name="search" type="search" value="{{$data}}"  placeholder="Поиск..."><button type="submit" class="btn btn-primary input-group-text">Поиск</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="top-tabContent">
                            <div class="search-links tab-pane fade show active" id="all-links" role="tabpanel" aria-labelledby="all-link">
                                <div class="row">
                                    <div class="col-12 box-col-12">
                                        <h6 class="mb-2">Результаты по поиску "{{$data}}"</h6>
                                        @if($allModels->count())
                                            @foreach($allModels as $model)
                                            <div class="info-block"><a href="{{$model->getTable() == 'posts' ? route('posts.edit', $model->id) : route('recipe.edit', $model->id)}}">{{$model->getTable() == 'posts' ? route('posts.edit', $model->id) : route('recipe.edit', $model->id)}}</a>
                                                <h6>{{$model->title}}</h6>
                                                <p>{{\Illuminate\Support\Str::limit($model->content, 200, $end = '...')}}</p>
                                                <div class="star-ratings">
                                                    <ul class="search-info">
                                                        <li>{{$model->getTable() == 'posts' ? 'Статья' : 'Рецепт'}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="mt-5">Результатов не найдено...</div>
                                        @endif
                                    </div>
                                    <div class="col-12 m-t-30">
                                        <nav aria-label="...">
                                            {{$allModels->withQueryString()->links()}}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
