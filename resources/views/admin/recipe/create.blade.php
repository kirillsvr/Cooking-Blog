@extends('admin.layouts.layout')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
        <x-admin-titles
            header="Создание рецепта"
            breadcrumb="admin.recipe.create"
        />
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="needs-validation" method="post" action="{{route('recipe.store')}}" novalidate="" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <x-admin-subtitles headtitle="Добавление нового рецепта" subtitle="Заполните необходимые поля"/>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 mb-5">
                                    <label class="form-label" for="validationCustom01">Название рецепта</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Борщ..." required="">
                                    <div class="invalid-feedback">Заполните название рецепта</div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="prep_time">Время на подготовку</label>
                                        <input class="form-control" id="prep_time" name="prep_time" type="text" placeholder="30 мин." required="">
                                        <div class="invalid-feedback">Заполните время на подготовку</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="cook_time">Время приготовления</label>
                                        <input class="form-control" id="cook_time" name="cook_time" type="text" placeholder="30 мин." required="">
                                        <div class="invalid-feedback">Заполните время приготовления</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="skill_level">Сложность приготовления</label>
                                        <select class="form-select" id="skill_level" name="skill_level" required="">
                                            <option selected="" disabled="" value="">Выбрать</option>
                                            @foreach($levels as $level)
                                                <option value="{{$level->id}}">{{$level->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Выберите сложность приготовления</div>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="chef_id">Шеф</label>
                                        <select class="form-select digits" id="user_id" name="user_id">
                                            @foreach($authors as $author)
                                                <option value="{{$author->id}}" id="user_id" @if($author->id == auth()->user()->id) selected @endif>{{$author->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-4">
                                    <label class="form-label" for="description">Краткое описание</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="editor1" cols="30" rows="10" name="content"></textarea>
                                </div>
                                <div class="mb-5 g-3 row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="recipe_categories_id">Категория</label>
                                        <select class="form-select digits" id="recipe_categories_id" name="recipe_categories_id">
                                            @foreach($categories as $key => $category)
                                                <option value="{{$key}}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <div class="col-form-label">Тэги рецептов</div>
                                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple" name="tags[]">
                                                @foreach($tags as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5 row">
                                    <label class="col-sm-3 col-form-label">Загрузить изображение</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="thumbnail" required>
                                        <div class="invalid-feedback">Загрузите изображение</div>
                                    </div>
                                </div>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-3">
                                        <label class="form-label" for="caloric">Калорийность</label>
                                        <input class="form-control" id="caloric" name="caloric" type="text" placeholder="150" required="">
                                        <div class="invalid-feedback">Заполните калорийность</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="protein">Белки</label>
                                        <input class="form-control" id="protein" name="protein" type="text" placeholder="10" required="">
                                        <div class="invalid-feedback">Заполните содержание белков</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="fat">Жиры</label>
                                        <input class="form-control" id="fat" name="fat" type="text" placeholder="25" required="">
                                        <div class="invalid-feedback">Заполните содержание жиров</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="carbohydrates">Углеводы</label>
                                        <input class="form-control" id="carbohydrates" name="carbohydrates" type="text" placeholder="35" required="">
                                        <div class="invalid-feedback">Заполните содержание углеводов</div>
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
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label class="form-label" for="prep_time">Ингредиент</label>
                                            <input class="form-control" id="prep_time" name="ing[0][title]" type="text" placeholder="Сахар" required="">
                                            <div class="invalid-feedback">Заполните хотя бы один ингредиент</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="cook_time">Количество</label>
                                            <input class="form-control" id="cook_time" name="ing[0][quantity]" type="text" placeholder="30 г">
                                        </div>
                                    </div>
{{--                                <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--                                    @for($i = 0; $i < 8; $i++)--}}
{{--                                    <li class="nav-item"><a class="nav-link @if($i === 0) active @endif" id="home-tab-{{$i}}" data-bs-toggle="tab" href="#ing-{{$i}}" role="tab" aria-controls="ing-{{$i}}" aria-selected="true">{{$i + 1}}</a></li>--}}
{{--                                    @endfor--}}
{{--                                </ul>--}}
{{--                                <div class="tab-content" id="myTabContent">--}}
{{--                                    @for($i = 0; $i < 8; $i++)--}}
{{--                                    <div class="tab-pane fade show @if($i === 0) active @endif" id="ing-{{$i}}" role="tabpanel" aria-labelledby="ing-{{$i}}">--}}
{{--                                        <div class="row g-3 mb-3">--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label class="form-label" for="prep_time">Ингредиент</label>--}}
{{--                                                <input class="form-control" id="prep_time" name="ing[{{$i}}][title]" type="text" placeholder="City" required="">--}}
{{--                                                <div class="invalid-feedback">Please provide a valid city.</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label class="form-label" for="cook_time">Количество</label>--}}
{{--                                                <input class="form-control" id="cook_time" name="ing[{{$i}}][quantity]" type="text" placeholder="Zip" required="">--}}
{{--                                                <div class="invalid-feedback">Please select a valid state.</div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @endfor--}}
{{--                                </div>--}}
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
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label class="form-label" for="step">Номер шага</label>
                                            <input class="form-control" id="step" name="steps[0][step]" type="text" placeholder="1 шаг" required="">
                                            <div class="invalid-feedback">Заполните хотя бы один шаг</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-3 col-form-label">Upload File</label>
                                                <input class="form-control" type="file" name="steps[0][image]">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="exampleFormControlTextarea4">Описание шага</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="steps[0][info]" id="exampleFormControlTextarea4" rows="3" required></textarea>
                                            <div class="invalid-feedback">Заполните описание</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn btn-primary add-step">Добавить</div>
                            </div>
                        </div>

                        <button class="btn btn-primary save-recipe" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
@endsection

@section('dopScripts')
    <script src="{{asset('assets/admin/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/admin/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/admin/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('assets/admin/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: "{{route('upload.image', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            on: {
                contentDom: function( evt ) {
                    // Allow custom context menu only with table elemnts.
                    evt.editor.editable().on( 'contextmenu', function( contextEvent ) {
                        var path = evt.editor.elementPath();

                        if ( !path.contains( 'table' ) ) {
                            contextEvent.cancel();
                        }
                    }, null, null, 5 );
                }
            }
        } );
    </script>
    <script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>
@endsection
