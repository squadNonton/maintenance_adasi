<!DOCTYPE html>
<html lang="en" class="dark-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets')}}/" data-template="horizontal-menu-template-dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Login | Digital Maintenance Systeam</title>
        <meta name="description" content="Digital Maintenance Systeam || PT. Astra Daido Steel Indonesia" />
        <meta name="keywords" content="Digital Maintenance Systeam">
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');

        </script>
        <!-- End Google Tag Manager -->

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core-dark.css')}}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default-dark.css')}}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
        <!-- Vendor -->
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

        <!-- Helpers -->
        <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
        <script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>
        <script src="{{asset('assets/js/config.js')}}"></script>
    </head>

    <body>
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe>
        </noscript>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <!-- Login -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center mb-4 mt-2">
                                <a href="" class="app-brand-link gap-2">
                                    <span class="app-brand-text demo text-body fw-bold ms-1">PT. Astra Daido Steel Indonesia</span>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-1 pt-2">Welcome to DMS! 👋</h4>
                            <p class="mb-4">Digital Maintenance Systeam</p>

                            <form id="" class="mb-3" action="{{route('login_post')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me">
                                        <label class="form-check-label" for="remember-me">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->

        <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
        <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
        <script src="{{asset('assets/vendor/js/menu.js')}}"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{asset('assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>

        <!-- Main JS -->
        <script src="{{asset('assets/js/main.js')}}"></script>


        <!-- Page JS -->
        <script src="{{asset('assets/js/pages-auth.js')}}"></script>

    </body>
</html>
