<!DOCTYPE html>
<html lang="en" class="dark-style layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets')}}/" data-template="horizontal-menu-template-dark">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Dashboard | DMS - PT. Astra Daido Steel Indonesia</title>
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
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}"/>

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core-dark.css')}}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default-dark.css')}}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

        <!-- Page CSS -->
        <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}"/>

        <!-- Helpers -->
        <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        <script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{asset('assets/js/config.js')}}"></script>

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
        <script src="{{asset('assets/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
        <script src="{{asset('assets/js/html5-qrcode.min.js')}}"></script>
        <!-- Main JS -->

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </head>

    <body>
        <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">

                {{-- Header --}}
                @include('Template.header')
                {{-- End Header --}}

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Content wrapper -->
                    <div class="content-wrapper">

                        {{-- Sidebar --}}
                        @include('Template.sidebar')
                        {{-- End Sidebar --}}

                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @yield('content')
                        </div>
                        <!--/ Content -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                    © {{date('Y')}}, PT. Astra Daido Steel Indonesia
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>
                <!--/ Layout container -->
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

        <!--/ Layout wrapper -->
        <!-- Core JS -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        <!-- Page JS -->
        <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
    </body>
</html>