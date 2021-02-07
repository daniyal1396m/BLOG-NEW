<!DOCTYPE html>
<html lang="fa">
<head>
    <title>دیدن پست بصورت تکی</title>

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
    <section class="block-wrapper no-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="single-post">
                        <div class="post-title-area">
                            <a class="post-cat" href="{{$article->subcategory->id}}">{{$article->subcategory->name}}</a>
                            <h2 class="post-title">
                                {{$article->title}}
                            </h2>
                            <div class="post-meta">
									<span class="post-author">
										 <a href="#">{{$article->user->name}}</a>
									</span>
                                <span class="post-date"><i
                                        class="fa fa-clock-o"></i>  ارسال شده در تاریخ {{verta($article->created_at)->format('%B %d, %Y')}} </span>
                                <span class="post-hits">{{$article->countViews}}<i
                                        class="fa fa-eye"></i> </span>
                                <span class="post-comment"><i
                                        class="fa fa-comments-o">{{$article->countComments}}</i></span>
                            </div>
                        </div><!-- Post title end -->

                        <div class="post-content-area">
                            <div class="post-media post-featured-image">
                                <img src="{{url('/')."/".$article->image}}" class="img-responsive"
                                     alt="{{$article->title}}">
                            </div>
                            <div class="entry-content">
                                <p>{{$article->body}}</p>

                                <p>{{$article->description}}</p>

                            </div><!-- Entery content end -->

                        </div><!-- post-content end -->
                    </div><!-- Single post end -->

                    <!-- Post comment start -->
                    <div id="comments" class="comments-area block">
                        <h3 class="block-title"><span>{{$article->countComments}} دیدگاه</span></h3>

                        <ul class="comments-list">
                            <li>
                                @foreach($comments as $comment)
                                    <div class="comment">
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <span class="comment-author">{{$comment->name}}</span>
                                                <span
                                                    class="comment-date pull-right">{{verta($article->created_at)->format('%B %d, %Y')}}</span>
                                            </div>
                                            <div class="comment-content">
                                                <p>{{$comment->message}}</p></div>
                                        </div>
                                    </div><!-- Comments end -->
                                @endforeach
                            </li><!-- Comments-list li end -->
                        </ul><!-- Comments-list ul end -->
                    </div><!-- Post comment end -->

                    <div class="comments-form">
                        <h3 class="title-normal">دیدگاه خود را بیان کنید</h3>
                        @include('layouts.messages')
                        <form role="form" action="{{route('store.comment')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" placeholder="نام" type="text">
                                    </div>
                                </div><!-- Col end -->
                                <input type="hidden" value="{{$article->id}}" name="article_id">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" placeholder="ایمیل"
                                               type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control required-field" id="message" name="message"
                                                  placeholder="دیدگاه شما"></textarea>
                                    </div>
                                </div><!-- Col end -->
                            </div><!-- Form row end -->
                            <div class="clearfix">
                                <button class="comments-btn btn btn-primary" type="submit">ارسال دیدگاه</button>
                            </div>
                        </form><!-- Form end -->
                    </div><!-- Comments form end -->

                </div><!-- Content Col end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- First block end -->
    @include('layouts.footer')

    @include('layouts.copyRight')
</div><!-- Body inner end -->
@include('layouts.footerLinks')
</body>
</html>
