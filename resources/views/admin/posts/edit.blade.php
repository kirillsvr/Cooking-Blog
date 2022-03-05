@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles header="Редактирование поста" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <x-admin-subtitles headtitle="Пост «{{$post->title}}»" subtitle="Измените необходимые поля"/>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{route('posts.update', $post->id)}}" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <label class="form-label" for="validationCustom01">Название статьи</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="validationCustom01" type="text" name="title" value="{{$post->title}}" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="row g-3">
                                <label class="form-label" for="exampleFormControlTextarea4">Краткое описание</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea4" rows="3">{{$post->description}}</textarea>
                            </div>
                            <div class="row g-3">
                                <label>Контент:</label>
                                <textarea id="text-box" class="@error('content') is-invalid @enderror" name="content" cols="10" rows="2">{{$post->content}}</textarea>
                            </div>
                            <div class="mb-3 g-3">
                                <label class="form-label" for="exampleFormControlSelect9">Категория</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="category_id">
                                    @foreach($categories as $key => $category)
                                        <option value="{{$key}}" @if($key === $post->category_id) selected @endif>{{$category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 g-3">
                                <div class="col-form-label">Тэги:
                                    <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple" name="tags[]">
                                        @foreach($tags as $key => $tag)
                                            <option value="{{$key}}" @if(in_array($key, $post->tags->pluck('id')->all())) selected @endif>{{$tag}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload File</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="thumbnail">
                                </div>
                                @if($post->thumbnail)
                                <div>
                                    <img style="width: 400px;" src="{{asset('uploads/' . $post->thumbnail)}}" alt="">
                                </div>
                                @endif
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

@section('dopScripts')

@endsection
