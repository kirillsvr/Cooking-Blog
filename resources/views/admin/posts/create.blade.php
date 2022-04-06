@extends('admin.layouts.layout')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
        <x-admin-titles
            header="Создание поста"
            breadcrumb="admin.post.create"
        />
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form class="needs-validation post-create-form" method="post" action="{{route('posts.store')}}" novalidate="" enctype="multipart/form-data">
                            <div class="card-header">
                                <x-admin-subtitles headtitle="Добавление нового поста" subtitle="Заполните необходимые поля"/>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row g-2 mb-4">
                                    <label class="form-label" for="validationCustom01">Название статьи</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" placeholder="Название категории" required="">
                                    <div class="invalid-feedback">Заполните название статьи</div>
                                </div>
                                <div class="row g-2 mb-4">
                                    <label class="form-label" for="exampleFormControlTextarea4">Краткое описание</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea4" rows="3" required></textarea>
                                    <div class="invalid-feedback">Заполните краткое описание</div>
                                </div>
                                <div class="row g-2 mb-4">
                                    <label>Контент:</label>
                                    <textarea class="@error('content') is-invalid @enderror" id="editor1" name="content" cols="10" rows="2" required></textarea>
                                    <div class="invalid-feedback">Заполните контент</div>
                                </div>
                                <div class="mb-3 g-2 mb-4">
                                    <label class="form-label" for="exampleFormControlSelect9">Категория</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9" name="category_id">
                                        @foreach($categories as $key => $category)
                                            <option value="{{$key}}">{{$category}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Выберите категорию</div>
                                </div>
                                <div class="mb-3 g-3 mb-5">
                                    <label class="form-label" for="exampleFormControlSelect9">Тэги</label>
                                    <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple" name="tags[]">
                                        @foreach($tags as $key => $tag)
                                            <option value="{{$key}}">{{$tag}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Загрузить изображение</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="thumbnail" required>
                                        <div class="invalid-feedback">Загрузите изображение</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="col-sm-9 offset-sm-3">
                                    <button class="btn btn-primary post-create-but" type="submit">Сохранить</button>
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
    <script src="{{asset('assets/admin/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/admin/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/admin/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('assets/admin/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
    <script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>

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
@endsection
