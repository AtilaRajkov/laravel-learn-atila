<form action="#" method="post">
    <div class="input-group">
        <input type="text" class="form-control c-square c-theme-border" placeholder="Search blog...">
        <span class="input-group-btn">
            <button class="btn c-theme-btn c-theme-border c-btn-square" type="button">Go!</button>
        </span>
    </div>
</form>
<div class="c-content-ver-nav">
    <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
        <h3 class="c-font-bold c-font-uppercase">Categories</h3>
        <div class="c-line-left c-theme-bg"></div>
    </div>

    <ul class="c-menu c-arrow-dot1 c-theme">

        @if( count( $pagesTopLevel ) > 0 )
        @foreach( $pagesTopLevel as $value )
        <li>
            <a href="{{ route( 'pages.show', ['page' => $value->id, 'slug' => Str::slug($value->title, '-') ] ) }}">{{ $value->title }}</a>
        </li>
        @endforeach
    </ul>  
    @endif
</div>
<div class="c-content-tab-1 c-theme c-margin-t-30">
    <div class="nav-justified">
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#blog_recent_posts" data-toggle="tab">Recent Posts</a>
            </li>
            <li>
                <a href="#blog_popular_posts" data-toggle="tab">Popular Posts</a>
            </li>
        </ul>
        
    </div>
</div>
