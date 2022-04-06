<ul>
    @foreach($categories as $category)
    <li>
        <a class="" href="{{route('front.recipes.index', 'category=' . $category->id)}}">{{$category->title}}</a>
    </li>
    @endforeach
</ul>
