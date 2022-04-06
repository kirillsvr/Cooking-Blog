@extends('admin.layouts.layout')

@section('content')
        <x-admin-titles
            header="Категории постов"
            breadcrumb="admin.breadcrumb"
            paramBreadcrumb="Категории"
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
                                <a href="{{route('categories.create')}}" class="btn btn-primary">Добавить категорию</a>
                            </div>
                        </div>
                        @if(count($categories))
                        @csrf
                        <div class="card-body table-responsive">
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
                                            <a class="btn btn-success btn-s" data-original-title="btn btn-danger btn-xs" title="" href="{{route('categories.edit', $category->id)}}" data-bs-original-title=""><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-s delete-category" data-href="{{route('categories.destroy', $category->id)}}" data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title="" data-id="{{$category->id}}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($categories->hasPages())
                        <div class="card-footer text-end">
                            {{$categories->links()}}
                        </div>
                        @endif
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
