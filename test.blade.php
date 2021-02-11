<div id="comments" class="comments-area block">
    <h3 class="block-title"><span> دیدگاه</span></h3>
    @if(count($comments))
        @foreach($comments as $comment)
            @if($comment->parent_id==null)
                @if($comment->status==1)
                    <ul class="comments-list">
                        <li>
                            <div class="comment">
                                <div class="comment-body">
                                    <div class="meta-data">
                                        <span class="comment-author">{{$comment->name}}</span>
                                        <span
                                            class="comment-date pull-right">{{verta($article->created_at)->format('%B %d, %Y')}}</span>
                                    </div>
                                    <div class="comment-content">
                                        <p>{{$comment->message}}</p></div>
                                    <div class="text-left">
                                        <button class="comment-reply" type="button"
                                                data-toggle="modal" data-target="#myModal">پاسخ
                                        </button>
                                    </div>
                                </div>

                            </div><!-- Comments end -->
                            @endif
                            @else
                                @if($comment->replayComment)
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
                        </li>
                    </ul>

                @endif
            @endif
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
</div><!-- Content Col end -->
