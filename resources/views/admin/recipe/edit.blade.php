@extends('admin.layouts.layout')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

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
                <form class="needs-validation" method="post" action="{{route('recipe.update', $recipe->id)}}" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5>Hoverable rows</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 mb-5">
                                <label class="form-label" for="validationCustom01">Название статьи</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" value="{{$recipe->title}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="prep_time">Время на подготовку</label>
                                    <input class="form-control" id="prep_time" name="prep_time" type="text" placeholder="City" value="{{$recipe->prep_time}}" required="">
                                    <div class="invalid-feedback">Please provide a valid city.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="cook_time">Время приготовления</label>
                                    <input class="form-control" id="cook_time" name="cook_time" type="text" placeholder="Zip" value="{{$recipe->cook_time}}" required="">
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="skill_level">Сложность приготовления</label>
                                    <select class="form-select" id="skill_level" name="skill_level" required="">
                                        <option @if('Легко' === $recipe->skill_level) selected @endif>Легко</option>
                                        <option @if('Средне' === $recipe->skill_level) selected @endif>Средне</option>
                                        <option @if('Сложно' === $recipe->skill_level) selected @endif>Сложно</option>
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                            </div>
                            @can('viewAny', \App\Models\User::class)
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="chef_id">Шеф</label>
                                    <select class="form-select digits" id="user_id" name="user_id">
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}" id="user_id" @if($author->id == $recipe->user_id) selected @endif>{{$author->name}}</option>
                                    @endforeach
                                </div>
                            </div>
                            @endcan
                            <div class="row g-3 mb-4">
                                <label class="form-label" for="description">Краткое описание</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="description" rows="3">{{$recipe->content}}</textarea>
                            </div>
                            <div class="mb-5 g-3 row">
                                <div class="col-md-6">
                                    <label class="form-label" for="recipe_categories_id">Категория</label>
                                    <select class="form-select digits" id="recipe_categories_id" name="recipe_categories_id">
                                        @foreach($categories as $key => $category)
                                            <option value="{{$key}}" @if($key === $recipe->recipe_categories_id) selected @endif>{{$category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <div class="col-form-label">Default Placeholder</div>
                                        <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="WY">Coming</option>
                                            <option value="WY">Hanry Die</option>
                                            <option value="WY">John Doe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <div class="col-md-4">
                                    <img src="/uploads/{{$recipe->thumbnail}}" width="300" alt="">
                                </div>
                                <div class="col-md-8">
                                    <label class="col-sm-3 col-form-label">Upload File</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="oldImage" value="{{$recipe->thumbnail}}">
                                        <input class="form-control" type="file" name="thumbnail">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mb-5">
                                <div class="col-md-3">
                                    <label class="form-label" for="caloric">Калорийность</label>
                                    <input class="form-control" id="caloric" name="caloric" type="text" placeholder="City" value="{{$recipe->caloric}}" required="">
                                    <div class="invalid-feedback">Please provide a valid city.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="protein">Белки</label>
                                    <input class="form-control" id="protein" name="protein" type="text" placeholder="Zip" value="{{$recipe->protein}}" required="">
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="fat">Жиры</label>
                                    <input class="form-control" id="fat" name="fat" type="text" placeholder="Zip" value="{{$recipe->fat}}" required="">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="carbohydrates">Углеводы</label>
                                    <input class="form-control" id="carbohydrates" name="carbohydrates" type="text" placeholder="Zip" value="{{$recipe->carbohydrates}}" required="">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Ингредиенты</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 mb-5 more-da" data-int="0">
                                @foreach($ingredients as $ingredient)
                                <div class="row g-3 mb-2">
                                    <div class="col-md-6">
                                        <label class="form-label" for="prep_time">Ингредиент</label>
                                        <input class="form-control" id="prep_time" name="ing[{{$loop->index}}][title]" type="text" placeholder="City" value="{{$ingredient['title']}}" required="">
                                        <div class="invalid-feedback">Please provide a valid city.</div>
                                    </div>
                                    @if($loop->first)
                                    <div class="col-md-6">
                                        <label class="form-label" for="cook_time">Количество</label>
                                        <input class="form-control" id="cook_time" name="ing[{{$loop->index}}][quantity]" type="text" placeholder="Zip" value="{{$ingredient['quantity']}}" required="">
                                        <div class="invalid-feedback">Please select a valid state.</div>
                                    </div>
                                    @endif
                                    @if(!$loop->first)
                                        <div class="col-md-5">
                                            <label class="form-label" for="cook_time">Количество</label>
                                            <input class="form-control" id="cook_time" name="ing[{{$loop->index}}][quantity]" type="text" placeholder="Zip" value="{{$ingredient['quantity']}}" required="">
                                            <div class="invalid-feedback">Please select a valid state.</div>
                                        </div>
                                        <div class="col-md-1 d-flex align-items-center">
                                            <a href="javascript:void(0)" class="mt-3 ml-2 mx-auto delete-inputs text-decoration-none text-reset"><i class="fa fa-times"></i></a>
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            <div class="btn btn-primary add-inputs">Добавить</div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Шаги приготовления</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 mb-5 steps" data-int="0">
                                @foreach($steps as $step)
                                <div class="row g-3 mb-2">
                                    <div class="col-md-6">
                                        <label class="form-label" for="step">Номер шага</label>
                                        <input class="form-control" id="step" name="steps[{{$loop->index}}][step]" type="text" placeholder="Zip" value="{{$step['step']}}" required="">
                                        <div class="invalid-feedback">Please select a valid state.</div>
                                    </div>
                                    @if($loop->first)
                                    <div class="col-md-6">
                                        @if(!empty($step['image']))
                                            <img src="/uploads/{{$step['image']}}" width="200" alt="">
                                            <a href="javascript:void(0)" class="mt-3 ml-2 mx-auto delete-img-step" data-id="{{$step['id']}}"><i class="fa fa-times"></i></a>
                                        @endif
                                        <input type="hidden" name="steps[{{$loop->index}}][oldImage]" value="{{$step['image']}}">
                                        <label class="col-sm-3 col-form-label">Upload File</label>
                                        <input class="form-control" type="file" name="steps[{{$loop->index}}][image]" value="http://site.lara/assets/front/{{$step['image']}}">
                                    </div>
                                    @endif

                                    @if(!$loop->first)
                                        <div class="col-md-5">
                                            @if(!empty($step['image']))
                                                <img src="/uploads/{{$step['image']}}" width="200" alt="">
                                                <a href="javascript:void(0)" class="mt-3 ml-2 mx-auto delete-img-step" data-id="{{$step['id']}}"><i class="fa fa-times"></i></a>
                                            @endif
                                                <input type="hidden" name="steps[{{$loop->index}}][oldImage]" value="{{$step['image']}}">
                                            <label class="col-sm-3 col-form-label">Upload File</label>
                                            <input class="form-control" type="file" name="steps[{{$loop->index}}][image]" value="http://site.lara/assets/front/{{$step['image']}}">
                                        </div>
                                        <div class="col-md-1 d-flex align-items-center">
                                            <a href="javascript:void(0)" class="mt-3 ml-2 mx-auto delete-inputs text-decoration-none text-reset"><i class="fa fa-times"></i></a>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <label class="form-label" for="exampleFormControlTextarea4">Описание шага</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="steps[{{$loop->index}}][description]" id="exampleFormControlTextarea4" rows="3">{{$step['info']}}</textarea>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="btn btn-primary add-step">Добавить</div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('dopScripts')
    <script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>
@endsection
