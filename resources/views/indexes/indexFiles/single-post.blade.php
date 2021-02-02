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
                    @if(count($articles))
                        @foreach($articles as $article)
                            <div class="single-post">

                                <div class="post-title-area">
                                    <a class="post-cat" href="#">{{$article->sub_category}}</a>
                                    <h2 class="post-title">
                                        {{$article->title}}
                                    </h2>
                                    <div class="post-meta">
									<span class="post-author">
										 <a href="#">{{$article->user_id}}</a>
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
                        @endforeach
                    @else
                        <h1>در حال حاضر هیچ داده ای نیست </h1>
                @endif
                <!-- Post comment start -->
                    <div id="comments" class="comments-area block">
                        <h3 class="block-title"><span>{{$article->countComments}} دیدگاه</span></h3>

                        <ul class="comments-list">
                            <li>
                                <div class="comment">
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="comment-author">میلاد آقایی</span>
                                            <span class="comment-date pull-right">26 دی 1396 - 15:36</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی</p></div>
                                        <div class="text-left">
                                            <a class="comment-reply" href="#">پاسخ</a>
                                        </div>
                                    </div>
                                </div><!-- Comments end -->

                                <ul class="comments-reply">
                                    <li>
                                        <div class="comment">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author">فرهاد عظیم پور</span>
                                                    <span class="comment-date pull-right">26 دی 1396 - 15:36</span>
                                                </div>
                                                <div class="comment-content">
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون</p></div>
                                                <div class="text-left">
                                                    <a class="comment-reply" href="#">پاسخ</a>
                                                </div>
                                            </div>
                                        </div><!-- Comments end -->
                                    </li>
                                </ul><!-- comments-reply end -->
                            </li><!-- Comments-list li end -->
                        </ul><!-- Comments-list ul end -->
                    </div><!-- Post comment end -->

                    <div class="comments-form">
                        <h3 class="title-normal">دیدگاه خود را بیان کنید</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form role="form" action="{{route('store.comment')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control required-field" id="message" name="message"
                                                  placeholder="دیدگاه شما"></textarea>
                                    </div>
                                </div><!-- Col end -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" placeholder="نام" type="text">
                                    </div>
                                </div><!-- Col end -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" placeholder="ایمیل"
                                               type="email">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="وب‌سایت" type="text" name="website">
                                    </div>
                                </div>
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
