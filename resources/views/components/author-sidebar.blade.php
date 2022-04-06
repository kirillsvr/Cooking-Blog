<div class="col-xl-4 col-md-7 col-12">
    <aside>
        <div class="popular-chef-widget">
            <div class="widget recipe-categori">
                <div class="widget-header">
                    <h5>Категории рецептов</h5>
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
                                        <a href="{{route('front.recipes.index', 'category=' . $category->id)}}">{{$category->title}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="contact-from">
                <div class="section-header">
                    <h6>Register Now</h6>
                </div>
                <form action="/">
                    <input type="text" name="name" placeholder="Ваше имя">
                    <input type="email" name="email" placeholder="Ваш Email">
                    <input type="submit" value="Зарегистрироваться">
                </form>
            </div>
        </div>
    </aside>
</div>
