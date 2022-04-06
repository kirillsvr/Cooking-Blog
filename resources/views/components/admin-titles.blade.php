<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>{{$header}}</h3>
            </div>
            <div class="col-6">
                @if(!is_null($breadcrumb))
                    {{ Breadcrumbs::render($breadcrumb, $paramBreadcrumb, $routeBreadcrumb) }}
                @endif
            </div>
        </div>
    </div>
</div>
