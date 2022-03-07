@extends('admin.layouts.layout')

@section('content')
    <x-admin-titles
        header="Категории рецептов"
        breadcrumb="admin.breadcrumb"
        paramBreadcrumb="Категории рецептов"
    />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <x-admin-subtitles headtitle="Список категорий" subtitle=""/>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('recipe_category.create')}}" class="btn btn-primary">Добавить категорию</a>
                        </div>
                    </div>
                        @if(count($categories))
                        <div class="table-responsive card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Название Категории</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Управление</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$category->id}}</th>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a class="btn btn-success btn-s" data-original-title="btn btn-danger btn-xs" title="" href="{{route('recipe_category.edit', $category->id)}}" data-bs-original-title=""><i class="fa fa-pencil"></i></a>
                                            <form action="{{route('categories.destroy', $category->id)}}" class="d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-s" type="submit" data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title=""><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                        @if($categories->hasPages())--}}
{{--                            <div class="card-footer text-end">--}}
{{--                                {{$categories->links()}}--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        @else
                            <div class="card-body">
                                Категорий пока нет...
                            </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
