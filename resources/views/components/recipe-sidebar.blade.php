<div class="col-lg-4 col-md-7 col-12">
    <aside>
        <div class="widget widget-author">
            <div class="widget-header">
                <h5>Meet Admin112</h5>
            </div>
            <div class="widget-wrapper">
                <div class="admin-thumb">
                    <img src="/assets/front/images//chef/author/08.jpg" alt="author">
                </div>
                <div class="admin-content">
                    <p>Hey hey! I'm Lindsay and this is my websiteThanks for being here! I'm a yoga instructor I write about all of those...</p>
                    <div class="scocial-media">
                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                        <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget recipe-categori">
            <div class="widget-header">
                <h5>Popular Categories</h5>
            </div>
            <div class="widget-wrapper section-wrapper">
                <div class="row justify-content-center no-gutters">
                    @foreach($categories as $category)
                    <div class="col-6">
                        <div class="recipe-item">
                            <div class="recipe-thumb">
                                <img src="/uploads/{{$category->thumbnail}}" alt="food-recipe">
                            </div>
                            <div class="recipe-content">
                                <a href="#">{{$category->title}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="widget widget-post">
            <div class="widget-header">
                <h5>smith archives</h5>
            </div>
            <ul class="widget-wrapper">
                <li class="d-flex flex-wrap justify-content-between">
                    <div class="post-thumb">
                        <a href="#"><img src="/assets/front/images//popular-food/01.jpg" alt="product"></a>
                    </div>
                    <div class="post-content">
                        <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                        <p>04 February 2019</p>
                    </div>
                </li>
                <li class="d-flex flex-wrap justify-content-between">
                    <div class="post-thumb">
                        <a href="#"><img src="/assets/front/images//popular-food/02.jpg" alt="product"></a>
                    </div>
                    <div class="post-content">
                        <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                        <p>04 February 2019</p>
                    </div>
                </li>
                <li class="d-flex flex-wrap justify-content-between">
                    <div class="post-thumb">
                        <a href="#"><img src="/assets/front/images//popular-food/03.jpg" alt="product"></a>
                    </div>
                    <div class="post-content">
                        <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                        <p>04 February 2019</p>
                    </div>
                </li>
                <li class="d-flex flex-wrap justify-content-between">
                    <div class="post-thumb">
                        <a href="#"><img src="/assets/front/images//popular-food/04.jpg" alt="product"></a>
                    </div>
                    <div class="post-content">
                        <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                        <p>04 February 2019</p>
                    </div>
                </li>
            </ul>
        </div>

        <div class="widget widget-instagram">
            <div class="widget-header">
                <h5>smith instagram</h5>
            </div>
            <ul class="widget-wrapper d-flex flex-wrap justify-content-center">
                <li><a href="#"><img src="/assets/front/images//popular-food/01.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/02.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/03.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/04.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/05.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/06.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/07.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/08.jpg" alt="product"></a></li>
                <li><a href="#"><img src="/assets/front/images//popular-food/09.jpg" alt="product"></a></li>
            </ul>
        </div>

        <div class="widget widget-tags">
            <div class="widget-header">
                <h5>top tags</h5>
            </div>
            <ul class="widget-wrapper d-flex flex-wrap justify-content-xl-between">
                <li><a href="#">envato</a></li>
                <li><a href="#" class="active">themeforest</a></li>
                <li><a href="#">codecanyon</a></li>
                <li><a href="#">videohive</a></li>
                <li><a href="#">audiojungle</a></li>
                <li><a href="#">3docean</a></li>
                <li><a href="#">envato</a></li>
                <li><a href="#">themeforest</a></li>
                <li><a href="#">codecanyon</a></li>
            </ul>
        </div>
    </aside>
</div>
