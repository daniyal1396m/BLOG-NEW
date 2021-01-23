<!DOCTYPE html>
<html lang="fa">
<head>

    <title>صفحه مورد نظر پیدا نشد</title>
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

                <div class="error-page text-center">
                    <div class="error-code">
                        <h2><strong>404</strong></h2>
                    </div>
                    <div class="error-message">
                        <h3>صفحه مورد نظر یافت نشد!</h3>
                    </div>
                    <div class="error-body">
                        از دکمه زیر برای رفتن به صفحه اصلی استفاده کنید <br>
                        <a href="/" class="btn btn-primary">بازگشت به صفحه اصلی</a>
                    </div>
                </div>

            </div><!-- Row end -->


        </div><!-- Container end -->
    </section><!-- First block end -->

    @include('layouts.footer')
    @include('layouts.copyRight')
    @include('layouts.footerLinks')
</div><!-- Body inner end -->
</body>
</html>
