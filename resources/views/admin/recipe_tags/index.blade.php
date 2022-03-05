@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles header="Тэги рецептов" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <x-admin-subtitles headtitle="Список тэгов" subtitle=""/>
                    </div>
                    <div class="table-responsive">
                        @if(count($tags))
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Название тэга</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <th scope="row">{{$tag->id}}</th>
                                        <td>{{$tag->title}}</td>
                                        <td>{{$tag->slug}}</td>
                                        <td>
                                            <a class="btn btn-success btn-s" data-original-title="btn btn-danger btn-xs" title="" href="{{route('recipe_tags.edit', $tag->id)}}" data-bs-original-title=""><i class="fa fa-pencil"></i></a>
                                            <form action="{{route('recipe_tags.destroy', $tag->id)}}" class="d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-s" type="submit" data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title=""><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
{{--                            {{$tags->links()}}--}}
                        @else
                            <div class="card-body">
                                Тэгов пока нет...
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
