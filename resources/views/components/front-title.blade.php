<!-- Page Header Section Start Here -->
<section class="page-header style-2">
    <div class="container">
        <div class="page-title text-center">
            <h3>{{$header}}</h3>
            @if(!is_null($breadcrumb))
                {{ Breadcrumbs::render($breadcrumb, $paramBreadcrumb, $routeBreadcrumb) }}
            @endif
        </div>
    </div>
</section>
<!-- Page Header Section Ending Here -->
