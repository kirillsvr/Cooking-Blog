<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>{{$header}}</h3>
            </div>
            <div class="col-6">
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>--}}
{{--                    <li class="breadcrumb-item">Pages</li>--}}
{{--                    <li class="breadcrumb-item active">Sample Page</li>--}}
{{--                </ol>--}}
                @if(!is_null($breadcrumb))
                    {{ Breadcrumbs::render($breadcrumb, $paramBreadcrumb, $routeBreadcrumb) }}
                @endif
            </div>
        </div>
    </div>
</div>
