<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset("assets/admin/assets/")}}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Marathon | Espace participant</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_fav.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{("assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand d-flex justify-content-center" style="margin-left: 23%;">
                            <a href="{{ url('/admin') }}" class="app-brand-link gap-2 ">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/images/logo-marathon.png') }}" width="7%" alt="" srcset="">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenue! 👋</h4>
                        <div class="alert alert-danger alert-dismissible " id="alert" role="alert" hidden>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <form id="formAuthentication" class="mb-3" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email-username"
                                    placeholder="Enter your email or username" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">

                                <label for="email" class="form-label">Mot de passe</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <label class="btn btn-primary d-grid w-100" id="btnSave">Connexion</label>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <script>
        $(document).ready(function() {

            $("#btnSave").on("click", function(e) {

                $.ajax({
                    url: "{{ route('loginParticipant') }}",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: $("input[name=email-username]").val(),
                        password: $("input[name=password]").val()
                    },
                    success: function(response, statut) {
                        // //console.log(response)
                        if(response.error == true){
                            $("#alert").removeAttr("hidden")
                            return 0
                        }
                        window.location.href = "{{URL::to('/participant')}}"
                    },
                    error: function(reponse, statut, err) {
                        //console.log(reponse)
                    }
                })
            })
        })
    </script>
</body>

</html>
