<!DOCTYPE html>
<html lang="fa">
<head>
    <title>دیدن پست بصورت تکی</title>

    @include('layouts.headerLinks')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <p>{!! $article->body !!}</p>

                                <p>{!! $article->description!!}</p>

                            </div><!-- Entery content end -->

                        </div><!-- post-content end -->
                    </div><!-- Single post end -->
                    <!-- Post comment start -->
                    <div id="comments" class="comments-area block">
                        <h3 class="block-title"><span> دیدگاه</span></h3>
                        @if(count($comments))
                            @foreach($comments as $comment)
                                <ul class="comments-list">
                                    <li>
                                        @if($comment->status==1)
                                            @if($comment->parent_id==null)
                                                <div class="comment">
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">{{$comment->name}}</span>
                                                            <input type="hidden" value="{{$comment->id}}"
                                                                   id="comment_id">
                                                            <span
                                                                class="comment-date pull-right">{{verta($article->created_at)->format('%B %d, %Y')}}</span>
                                                        </div>
                                                        <div class="comment-content">
                                                            <p>{{$comment->message}}</p>
                                                        </div>
                                                        <div class="text-left">
                                                            <button class="comment-reply" type="button"
                                                                    data-toggle="modal" data-target="#myModal"
                                                                    onclick="GetId()">پاسخ
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div><!-- Comments end -->
                                                @if(count($comment->replayComment))
                                                    @foreach($comment->replayComment as $replay)
                                                        <ul class="comments-reply">
                                                            <li>
                                                                <div class="comment">
                                                                    <div class="comment-body">
                                                                        <div class="meta-data">
                                                                            <span
                                                                                class="comment-author">{{$replay->name}}</span>
                                                                            <span
                                                                                class="comment-date pull-right">{{verta($replay->created_at)->format('%B %d, %Y')}}</span>
                                                                        </div>
                                                                        <div class="comment-content">
                                                                            <p>{{$replay->message}}</p></div>
                                                                        <div class="text-left">
                                                                            <button class="comment-reply"
                                                                                    type="button"
                                                                                    data-toggle="modal"
                                                                                    data-target="#myModal">پاسخ
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- Comments end -->
                                                            </li>
                                                        </ul><!-- comments-reply end -->
                                                    @endforeach

                                                @endif
                                            @endif
                                        @endif
                                    </li><!-- Comments-list li end -->
                                </ul><!-- Comments-list ul end -->
                            @endforeach
                        <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">پاسخ به این دیدگاه </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form method="post" id="modalForm" action="javascript:void(0)"
                                                  name="modalForm">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="namereplay"
                                                                   id="namereplay"
                                                                   placeholder="نام"
                                                                   type="text">
                                                        </div>
                                                        <input type="hidden" value="{{$comment->id}}"
                                                               name="parent_id" id="parent_id">
                                                        <input type="hidden" value="{{$article->id}}"
                                                               name="article_id" id="article_id">
                                                    </div><!-- Col end -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="emailreplay"
                                                                   id="emailreplay"
                                                                   placeholder="ایمیل"
                                                                   type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <textarea class="form-control required-field"
                                                                          id="messagereplay" name="messagereplay"
                                                                          placeholder="دیدگاه شما"></textarea>
                                                        </div>
                                                    </div><!-- Col end -->
                                                </div><!-- Form row end -->
                                                <div class="clearfix">
                                                    <button class="comments-btn btn btn-primary" type="submit"
                                                            id="submit">پاسخ دیدگاه
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                منصرف شدن
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <h2 class="text-center">هیچ کامنتی وجود ندارد </h2>
                        @endif
                    </div><!-- Post comment end -->
                    <div class="comments-form">
                        <h3 class="title-normal">دیدگاه خود را بیان کنید</h3>
                        @include('layouts.messages')
                        <form role="form" action="{{route('store.comment')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" placeholder="نام"
                                               type="text">
                                    </div>
                                </div><!-- Col end -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email"
                                               placeholder="ایمیل" type="email">
                                    </div>
                                    <input type="hidden" value="{{$article->id}}"
                                           name="article_id" id="article_id">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control required-field" id="message" name="message"
                                                  placeholder="دیدگاه شما"></textarea>
                                    </div>
                                </div><!-- Col end -->
                            </div><!-- Form row end -->
                            <div class="clearfix">
                                <button class="comments-btn btn btn-primary" type="submit">ارسال دیدگاه
                                </button>
                            </div>
                        </form><!-- Form end -->

                    </div><!-- Comments form end -->
                </div>
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- First block end -->
    @include('layouts.footer')

    @include('layouts.copyRight')
</div><!-- Body inner end -->
@include('layouts.footerLinks')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    function GetId() {
        var commentReplay = document.getElementById('comment_id');
        var input = document.createElement('input');
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "parent_id");
        input.setAttribute("value", commentReplay);
        document.getElementById("modalForm").appendChild(input);
    }
</script>
<script>

    $("#modalForm").validate({
        rules: {
            namereplay: {
                required: true,
                maxlength: 15
            },
            emailreplay: {
                required: true,
                maxlength: 70,
                email: true,
            },
            messagereplay: {
                required: true,
                maxlength: 150
            },
        },
        messages: {
            namereplay: {
                required: "لطفا نام خود را وارد کنید ",
                maxlength: "طول ورودی نام شما بیشتر از 15 کاراکتر است "
            },
            emailreplay: {
                required: "ایمیل معتبروارد کنید ",
                email: "ایمیل معتبروارد کنید",
                maxlength: "طول ورودی ایمیل شما بیشتر از 70 کاراکتر است",
            },
            messagereplay: {
                required: "پیغام خود را وارد کنید ",
                maxlength: "طول ورودی ایمیل شما بیشتر از 150 کاراکتر است."
            },
        },
        submitHandler: function (form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit').html('لطفا کمی منتظر بمانید...');
            $("#submit").attr("disabled", true);
            $.ajax({
                url: "{{route('store.replay')}}",
                type: "post",
                data: $('#modalForm').serialize(),
                success: function (response) {
                    $('#submit').html('تایید');
                    $("#submit").attr("disabled", false);
                    alert('پاسخ با موفقیت ارسال شد در صورت تایید مدیر نمایش داده میشود');
                    document.getElementById("modalForm").reset();
                }
            });
        }
    })

</script>
</body>
</html>
