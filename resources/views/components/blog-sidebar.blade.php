<div class="col-lg-4 col-md-7 col-12">
    <aside>
        <div class="widget widget-search">
            <div class="search-wrapper">
                <input type="text" name="s" placeholder="Your Search...">
                <button type="submit"><i class="icofont-search-2"></i></button>
            </div>
        </div>

        <div class="widget widget-author">
            <div class="widget-header">
                <h5>Meet Admin</h5>
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
        @if($cats)
        <div class="widget widget-category">
            <div class="widget-header">
                <h5>post category</h5>
            </div>
            <ul class="widget-wrapper">
                @foreach($cats as $category)
                    <li>
                        <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>{{$category->title}}</span><span>{{$category->posts->count()}}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

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

        <div class="widget widget-archive">
            <div class="widget-header">
                <h5>smith archives</h5>
            </div>
            <ul class="widget-wrapper">
                <li><a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>January</span><span>2019</span></a> </li>
                <li><a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>February</span><span>2018</span></a></li>
                <li><a href="#" class="d-flex active flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>March</span><span>2017</span></a></li>
                <li><a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>April</span><span>2016</span></a></li>
                <li><a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>June</span><span>2015</span></a></li>
                <li><a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>July</span><span>2014</span></a></li>
                <li><a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>August</span><span>2013</span></a></li>
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
            <ul class="widget-wrapper">
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
