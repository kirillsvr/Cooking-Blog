@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Тэги рецептов"
        breadcrumb="admin.breadcrumb"
        paramBreadcrumb="Тэги рецептов"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <x-admin-subtitles headtitle="Список тэгов" subtitle=""/>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('recipe_tags.create')}}" class="btn btn-primary">Добавить тэг</a>
                        </div>
                    </div>
                    @if(count($tags))
                    @csrf
                    <div class="table-responsive card-body">
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
                                        <a class="btn btn-danger btn-s delete-recipe-tag"  data-href="{{route('recipe_tags.destroy', $tag->id)}}" data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title=""><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
    <!-- Container-fluid Ends-->
@endsection
