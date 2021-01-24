@extends('admin.temp')
@section('admin_content')
    <div class="x_panel">
        <div class="x_title">
            <h2>فرم ایجاد دسته بندی
{{--                <small>عناصر مختلف فرم ها</small>--}}
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                {{--                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                {{--                </li>--}}
                {{--                <li class="dropdown">--}}
                {{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                {{--                       aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                {{--                    <ul class="dropdown-menu" role="menu">--}}
                {{--                        <li><a href="#">تنظیمات 1</a>--}}
                {{--                        </li>--}}
                {{--                        <li><a href="#">تنظیمات 2</a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                {{--                </li>--}}
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>

            <h4>ارسال دسته بندی یا زیر دسته بندی </h4>
            {{--            <p class="font-gray-dark">--}}
            {{--                با استفاده از سیستم گرید می توانید موقعیت برچسب را کنترل کنید.فرم مثال زیر دارای حالت--}}
            {{--                <b>col-md-10</b>--}}
            {{--                که تنظیم می کند عرض را در 10/12 و <b>center-margin</b> تنظیم می نماید در وسط.--}}
            {{--            </p>--}}
            <form class="form-horizontal form-label-left" method="post">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">نام دسته بندی <span class="required">*</span></label>
                    <div class="col-md-7">
                        <input type="text" id="first-name2" required="required"
                               class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="last-name">انتخاب مورد بالا برای یکی از زیر دسته های
                        روبر</label>
                    <div class="col-md-7">
                        <select type="text" id="last-name2" name="last-name" required="required"
                                class="form-control col-md-7 col-xs-12">
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-lg btn-block">ارسال دسته بندی یا زیر دسته بندی
                </button>
            </form>

        </div>
    </div>
    </div>
@endsection
