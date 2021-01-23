@extends('admin.temp')
@section('admin_content')
    <div class="x_panel">
        <div class="x_title">
            <h2>طرح فرم
                <small>عناصر فرم های مختلف</small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">تنظیمات 1</a>
                        </li>
                        <li><a href="#">تنظیمات 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>

            <h4>برچسب های افقی</h4>
            <p class="font-gray-dark">
                با استفاده از سیستم گرید می توانید موقعیت برچسب را کنترل کنید.فرم مثال زیر دارای حالت
                <b>col-md-10</b>
                که تنظیم می کند عرض را در 10/12 و <b>center-margin</b> تنظیم می نماید در وسط.
            </p>
            <form class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">نام <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="first-name2" required="required"
                               class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="last-name">نام خانوادگی <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="last-name2" name="last-name" required="required"
                               class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
            </form>


            <h4>برچسب عمودی</h4>
            <p class="font-gray-dark">
                برای ساخت برچسب های عمودی شما دو گزینه دارید, با استفاده از گرید مناسب <b>.col-</b> ویا
                استفاده از کلاس <b>form-vertical</b>.
            </p>
            <div class="col-md-8 center-margin">
                <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label>آدرس ایمیل</label>
                        <input type="email" class="form-control" placeholder="ورود ایمیل">
                    </div>
                    <div class="form-group">
                        <label>رمز ورود</label>
                        <input type="password" class="form-control" placeholder="رمز ورود">
                    </div>

                </form>
            </div>

            <h4>فرم خطی </h4>
            <p class="font-gray-dark">
                افزودن .form-inline به فرم تان.
            </p>
            <form class="form-inline">
                <div class="form-group">
                    <label for="ex3">آدرس ایمیل</label>
                    <input type="text" id="ex3" class="form-control" placeholder=" ">
                </div>
                <div class="form-group">
                    <label for="ex4">آدرس ایمیل</label>
                    <input type="email" id="ex4" class="form-control" placeholder=" ">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> مرا به خاطر بسپار
                    </label>
                </div>
                <button type="submit" class="btn btn-default">ارسال دعوت نامه</button>
            </form>
        </div>
    </div>
    </div>
@endsection
