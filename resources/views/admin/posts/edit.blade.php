@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Редактирование поста"
        breadcrumb="admin.post.edit"
        paramBreadcrumb="{{$post->id}}"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form class="needs-validation" method="post" action="{{route('posts.update', $post->id)}}" novalidate="" enctype="multipart/form-data">
                        <div class="card-header">
                            <x-admin-subtitles headtitle="Пост «{{$post->title}}»" subtitle="Измените необходимые поля"/>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row g-2 mb-4">
                                <label class="form-label" for="validationCustom01">Название статьи</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" value="{{$post->title}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row g-2 mb-4">
                                <label class="form-label" for="exampleFormControlTextarea4">Краткое описание</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea4" rows="3">{{$post->description}}</textarea>
                            </div>
                            <div class="row g-2 mb-4">
                                <label>Контент:</label>
                                <textarea class="@error('content') is-invalid @enderror" name="content" cols="10" rows="2" id="editor1">{{$post->content}}</textarea>
                            </div>
                            <div class="mb-3 g-2 mb-4">
                                <label class="form-label" for="exampleFormControlSelect9">Категория</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="category_id">
                                    @foreach($categories as $key => $category)
                                        <option value="{{$key}}" @if($key === $post->category_id) selected @endif>{{$category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 g-3 mb-5">
                                <label class="form-label" for="exampleFormControlSelect10">Тэги</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="exampleFormControlSelect10" multiple="multiple" name="tags[]">
                                    @foreach($tags as $key => $tag)
                                        <option value="{{$key}}" @if(in_array($key, $post->tags->pluck('id')->all())) selected @endif>{{$tag}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 row">
                                @if($post->thumbnail)
                                    <div class="mb-4 d-flex justify-content-center">
                                        <img style="width: 400px;" src="{{asset('uploads/' . $post->thumbnail)}}" alt="">
                                    </div>
                                @endif
                                <label class="col-sm-3 col-form-label">Изменить изображение</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="old_image" value="{{$post->thumbnail}}">
                                    <input class="form-control" type="file" name="thumbnail">
                                </div>
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
@endsection
