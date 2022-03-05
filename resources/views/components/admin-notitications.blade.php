<div class="notification-box">
    <i data-feather="bell"></i>
    @if($comments->count())
    <span class="badge rounded-pill badge-secondary">{{$comments->count()}}</span>
    @endif
</div>
<ul class="notification-dropdown onhover-show-div">
    <li><i data-feather="bell"></i>
        <h6 class="f-18 mb-0">Новые комментарии</h6>
    </li>
    @if($comments->count())
        @foreach($comments as $comment)
            <li>
                <a href="{{route('recipe_comments.show', $comment->recipe_id)}}" class="text-decoration-none text-reset">
                    <p>
                        <i class="fa fa-circle-o me-3 font-primary"> </i>
                        {{$comment->comment}}
                        <span class="pull-right">{{$comment->interval}}</span>
                    </p>
                </a>
            </li>
        @endforeach
    @else
        <li>
            <p>Новых комментариев пока нет</p>
        </li>
    @endif
</ul>
