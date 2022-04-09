@extends('front.layouts.layout')

@section('content')
    <x-front-title
        header="{{$post->title}}"
        breadcrumb="front.article"
        paramBreadcrumb="{{$post->slug}}"
    />

    <div class="blog-section blog-page blog-single padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <article>
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <img src="/uploads/{{$post->thumbnail}}" alt="blog">
                                    </div>
                                    <div class="post-content">
                                        <h4>{{$post->title}}</h4>
                                        <div class="meta-post">
                                            <ul>
                                                <li>
                                                    <i class="icofont-calendar"></i>
                                                    <span class="date">{{$post->created_at->translatedFormat('d F Y')}}</span>
                                                </li>
                                                <li>
                                                    <i class="icofont-ui-user"></i>
                                                    <a href="{{route('authors.show', $post->user->id)}}" class="admin">{{$post->user->name}}</a>
                                                </li>
                                                <li>
                                                    <i class="icofont-speech-comments"></i>
                                                    <span class="comment">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::make($post->comments->where('is_published', 1)->count(), 'комментарий')}}</span>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="post-content-text">{!! $post->content !!}</div>

                                        <div class="tags-section">
                                            @if(isset($post->tags))
                                            <ul class="tags">
                                                @foreach($post->tags as $tag)
                                                <li><a href="#">{{$tag->title}}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                            <div class="scocial-media">
                                                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                                <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="navigations-part">
                                @if(!is_null($prevPost))
                                <div class="left">
                                    <a href="{{route('article.show', $prevPost->slug)}}" class="prev"><i class="icofont-double-left"></i>Предыдущая статья</a><br>
                                    <a href="{{route('article.show', $prevPost->slug)}}" class="title">{{$prevPost->title}}</a>
                                </div>
                                @endif
                                @if(!is_null($nextPost))
                                <div class="right">
                                    <a href="{{route('article.show', $nextPost->slug)}}" class="prev">Следующая статья<i class="icofont-double-right"></i></a><br>
                                    <a href="{{route('article.show', $nextPost->slug)}}" class="title">{{$nextPost->title}}</a>
                                </div>
                                @endif
                            </div>

                            @if(isset($post->user))
                            <div class="authors">
                                @if($post->user->image)
                                <div class="author-thumb">
                                    <a href="#"><img src="/uploads/{{$post->user->image}}" alt="author"></a>
                                </div>
                                @endif
                                <div class="author-content">
                                    <h6>{{$post->user->name}}</h6>
                                    <p>{{$post->user->info}}</p>
                                    <div class="scocial-media">
                                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                        <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($relatedArticles->count())
                            <div class="product">
                                <h4 class="title-border">Вам также может понравится</h4>
                                <div class="section-wrapper">
                                    <div class="row no-gutters">
                                        @foreach($relatedArticles as $article)
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <img src="/uploads/{{$article->thumbnail}}" alt="food-product">
                                                </div>
                                                <div class="product-content">
                                                    <h6><a href="{{route('article.show', $article->slug)}}">{{$article->title}}</a></h6>
                                                    <a href="{{route('article.show', $article->slug)}}" class="commtents">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::make($article->comments->where('is_published', 1)->count(), 'комментарий')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if(!empty($comments))
                            <div id="comments" class="comments">
                                <h4 class="title-border">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::make($post->comments->where('is_published', 1)->count(), 'комментарий')}}</h4>
                                <?php function renderComments($comments){?>
                                    <?php foreach($comments as $comment):?>
                                    <ul class="comment-list">
                                        <li class="comment" id="li-comment-{{$comment['id']}}">
                                            <div class="com-content">
                                                <div class="com-title">
                                                    <div class="com-title-meta">
                                                        <h6><a href="http://Sk" rel="external nofollow" class="url">{{$comment['name']}}</a></h6>
                                                        <span> {{\Carbon\Carbon::parse($comment['created_at'])->translatedFormat('d F Y')}} </span>
                                                    </div>
                                                    <span class="reply">
                                                            <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Masum" data-id="{{$comment['id']}}" data-name="{{$comment['name']}}"><i class="icofont-reply-all"></i>Ответить</a>
                                                        </span>
                                                </div>
                                                <p>{{$comment['comment']}}</p>
                                                <div class="reply-btn"></div>
                                            </div>
                                            <?php if (isset($comment['childs'])):?>
                                                <?php renderComments($comment['childs']);?>
                                            <?php endif;?>
                                        </li>
                                    </ul>
                                    <?php endforeach;?>
                                <?php };?>
                                <?php renderComments($comments, 0, false);?>
                            </div>
                            @endif
                            <div id="respond" class="comment-respond">
                                <div class="respond-title">
                                    <h4 class="title-border" id="title-comments-form">Оставить комментарий</h4>

                                </div>
                                <div class="add-comment">
                                    <form action="{{route('post_comments.store', $post->id)}}" method="post" id="commentform" class="comment-form">
                                        @guest
                                        <input name="name" type="text" value="" placeholder="Name">
                                        <input name="email" type="text" value="" placeholder="Email">
                                        @endguest
                                        <textarea id="comment-reply" name="comment" rows="5" placeholder="Напишите здесь ваш комментарий"></textarea>
                                        <input name="parent" type="hidden" value="">
                                        @csrf
                                        <button type="submit" class="food-btn"><span>Отправить комментарий</span></button>
                                        <!-- <a href="#0" class="food-btn"><span>send comment</span></a> -->
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                    <x-blog-sidebar />
                </div>
            </div>
        </div>
    </div>

@endsection
