<!DOCTYPE html>
{{--<html lang="fa">--}}
<html lang="{{ app()->getLocale() }}">
<head>

    <title>صفحه اصلی</title>
    @include('layouts.headerLinks')
</head>

<body>

<div class="body-inner">

    <div class="main-nav clearfix">
        <div class="container">
            <div class="row">
                @include('layouts.navBar')
            </div><!--/ Row end -->
        </div><!--/ Container end -->

    </div><!-- Menu wrapper end -->

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    @if(count($articles))
                        @foreach($articles as $article)
                            <div class="post-block-style post-list clearfix">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6">
                                        <div class="post-thumb thumb-float-style">
                                            <a href="/article/single/{{$article->id}}">
                                                <img class="img-responsive" src="{{url('/')."/".$article->image}}"
                                                     alt="{{$article->title}}">
                                            </a>
                                            <a class="post-cat" href="#">{{$article->sub_category}}</a>
                                        </div>
                                    </div><!-- Img thumb col end -->

                                    <div class="col-md-7 col-sm-6">
                                        <div class="post-content">
                                            <h2 class="post-title title-large">
                                                <a href="/article/single/{{$article->id}}">{{$article->title}}</a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="post-author"><a href="#">{{$article->user->name}}</a></span>
                                                <span class="post-date">{{verta($article->created_at)->format('%B %d, %Y')}}</span>
                                            </div>
                                            <p>{{$article->body}}</p>
                                        </div><!-- Post content end -->
                                    </div><!-- Post col end -->
                                </div><!-- 1st row end -->
                            </div><!-- 1st Post list end -->

                        @endforeach

                        <div class="paging">
                            {{$articles->render()}}
                        </div>
                    @else
                        <h1>فعلا هیچ داده ای نیست </h1>
                    @endif


                </div><!-- Content Col end -->
                @include('layouts.sideBar')
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- First block end -->


    @include('layouts.footer')
    @include('layouts.copyRight')
</div><!-- Body inner end -->
@include('layouts.footerLinks')

@yield('script')

</body>
</html>
