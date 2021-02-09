<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="sidebar sidebar-right">
        <div class="widget">
            <h3 class="block-title"><span>ما را دنبال کنید</span></h3>

            <ul class="social-icon-box unstyled">
                <li class="rss">
                    <a href="https://www.w3schools.com/login"><i class="fa fa-rss"></i>
                        <span class="ts-social-title">آموزش وب</span>
                        <span class="ts-social-desc">لورم ایپسوم متن ساختگی</span></a>
                </li>

                <li class="facebook">
                    <a href="https://www.facebook.com/login"><i class="fa fa-rss"></i>
                        <span class="ts-social-title">فیسبوک</span>
                        <span class="ts-social-desc">لورم ایپسوم متن ساختگی</span></a>
                </li>

                <li class="twitter">
                    <a href="https://www.twitter.com/login"><i class="fa fa-twitter"></i>
                        <span class="ts-social-title">توییتر</span>
                        <span class="ts-social-desc">لورم ایپسوم متن ساختگی</span></a>
                </li>

                <li class="gplus">
                    <a href="https://www.google.com/login"><i class="fa fa-google-plus"></i>
                        <span class="ts-social-title">گوگل</span>
                        <span class="ts-social-desc">لورم ایپسوم متن ساختگی</span></a>
                </li>
            </ul>
        </div><!-- Widget Social end -->

        <div class="widget color-default">
            <h3 class="block-title"><span>اخبار پربازدید</span></h3>
            <div class="post-overaly-style clearfix">
                    <div class="post-thumb">
                        <a href="#">
                            <img class="img-responsive" src="{{url('/')."/".$articleView->image}}"
                                 alt="{{$articleView->title}}">
                        </a>
                    </div>

                    <div class="post-content">
                        <a class="post-cat">{{$articleView->subcategory->name}}</a>
                        <h2 class="post-title title-small">
                            <a href="{{route('single.post',$articleView->id)}}">{{$articleView->title}}</a>
                        </h2>
                        <div class="post-meta">
                            <span class="post-date">{{$articleView->created_at}}</span>
                        </div>
                    </div><!-- Post content end -->
            </div><!-- Post Overaly Article end -->
            </ul><!-- List post end -->
        </div><!-- List post block end -->

    </div><!-- Popular news widget end -->

    <div class="widget text-center">
        <img class="banner img-responsive" src="/images/banner-ads/ad-sidebar.png" alt="">
    </div><!-- Sidebar Ad end -->

    <div class="widget m-bottom-0">

        <h3 class="block-title"><span>خبرنامه</span></h3>
        <div class="ts-newsletter">
            @include('layouts.messages')
            <div class="newsletter-introtext">
                <h4>به روز باشید</h4>
                <p>با عضویت در خبرنامه جدیدترین اخبار را در ایمیل خود دریافت کنید!</p>
            </div>

            <div class="newsletter-form">
                <form id="news" action="{{route('storeNewsLetter')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" id="newsletter-form-email"
                               class="form-control form-control-lg" placeholder="ایمیل"
                               autocomplete="off">
                        <button class="btn btn-primary" type="submit" id="submit">عضویت</button>
                    </div>

                </form>

            </div>
        </div><!-- Newsletter end -->
    </div><!-- Newsletter widget end -->

</div><!-- Sidebar right end -->
</div><!-- Sidebar Col end -->
@section('script')

@endsection
