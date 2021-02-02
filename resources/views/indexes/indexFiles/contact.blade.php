<!DOCTYPE html>
<html lang="fa">
<head>
    <title>ارتباط با ما</title>
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

                    <h3>تماس با ما</h3>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                        درصد گذشته، حال و آینده</p>

                    <div class="widget contact-info">

                        <div class="contact-info-box">
                            <div class="contact-info-box-content">
                                <h4>آدرس ما</h4>
                                <p>تبریز، نصف راه، جنب بانک ملی، پلاک 456، طبقه 87</p>
                            </div>
                        </div>

                        <div class="contact-info-box">
                            <div class="contact-info-box-content">
                                <h4>به ما ایمیل بزنید</h4>
                                <p>info@sample.com</p>
                            </div>
                        </div>

                        <div class="contact-info-box">
                            <div class="contact-info-box-content">
                                <h4>با ما تماس بگیرید</h4>
                                <p><span class="ltr_text">+98 912 345 67 89</span></p>
                            </div>
                        </div>

                    </div><!-- Widget end -->
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
                    <h3>فرم تماس</h3>

                    <form id="contact-form" action="{{route('store.Contactus')}}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>نام</label>
                                    <input class="form-control form-control-name" name="name" id="name" placeholder=""
                                           type="text" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input class="form-control form-control-email" name="email" id="email"
                                           placeholder="" type="email" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>موضوع</label>
                                    <input class="form-control form-control-subject" name="subject" id="subject"
                                           placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>پیام</label>
                            <textarea class="form-control form-control-message" name="message" id="message"
                                      placeholder="" rows="10" ></textarea>
                        </div>
                        <div class="text-right"><br>
                            <button class="btn btn-primary" type="submit">ارسال پیام</button>
                        </div>
                    </form>


                </div><!-- Content Col end -->

                @include('layouts.sideBar')

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- First block end -->


    @include('layouts.footer')
    @include('layouts.copyRight')
</div><!-- Body inner end -->
@include('layouts.footerLinks')
</body>
</html>
