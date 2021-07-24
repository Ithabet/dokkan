<!DOCTYPE html>
<html dir="rtl">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Base</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
          type="text/css" />
    <!-- icons -->
    <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/extra_pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/rtl/rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/ar-fonts.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/custom.css') }}" rel="stylesheet" type="text/css" />




    <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body>
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form method="post" action="{{ route('login') }}" class="login100-form validate-form">
                {{ csrf_field() }}
					<span class="login100-form-logo logo-default">
					 دُكان
					</span>
                <span class="login100-form-title p-b-34 p-t-27">
						تسجيل الدخول
					</span>
                <div class="wrap-input100" data-validate="أدخل اسم الدخول">
                    <input class="input100" type="text" name="email" placeholder="اسم الدخول">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <div class="wrap-input100 validate-input" data-validate="أدخل كلمة المرور">
                    <input class="input100" type="password" name="password" placeholder="كلمة المرور">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
                <div class="checkbox contact100-form-checkbox rtl">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        تذكرني
                    </label>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        دخول
                    </button>
                </div>
                <div class="text-center p-t-30">
                    <a class="txt1" href="forgot_password.html">
                        نسيت كلمة المرور
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Common js-->
<script src="{{ asset('assets/js/pages/extra-pages/pages.js') }}"></script>

<!-- end js include path -->
</body>
</html>