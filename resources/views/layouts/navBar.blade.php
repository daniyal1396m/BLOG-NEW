<nav class="site-navigation navigation">
    <div class="site-nav-inner pull-left">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">تغییر وضعیت ناوبری</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">خانه </a>
                </li>
                <li>
                    <a href="{{route('contactUs')}}">تماس با ما </a>
                </li>
                @foreach($categories as $rowCat)
                    <li class="dropdown">
                        @if(empty($rowCat->parent_id))
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{$rowCat->name}}</a>

{{--                        @else--}}
{{--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{$rowCat->name}}<i--}}
{{--                                    class="fa fa-angle-down"></i></a>--}}
                        @endif
                        @if($rowCat->subcategories)
                            <ul class="dropdown-menu" role="menu">
                                @foreach($rowCat->subcategories as $child)
                                    <li class="dropdown-submenu">
                                        <ul class="dropdown-menu">
                                            <li><a href="/page/{{$child->id}}">{{$child->name}}</a></li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul><!-- End dropdown -->
                        @endif

                    </li><!-- Features menu end -->
                @endforeach
            </ul>
        </div>
    </div>
</nav><!--/ Navigation end -->

<div class="nav-search">
    <span id="search"><i class="fa fa-search"></i></span>
</div><!-- Search end -->

<div class="search-block" style="display: none;">
    <input type="text" class="form-control" placeholder="عبارت را وارد نموده و اینتر بزنید">
    <span class="search-close">×</span>
</div><!-- Site search end -->
