<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SimPro</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('web-report/assets/img/logo/logo.png') }}" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>

    <script>
        @if (session('alert'))
            Swal.fire({
                icon: '{{ session('alert.type') }}',
                title: 'Alert!',
                text: '{{ session('alert.message') }}',
            });
        @endif
    </script>
</head>

<body class="bg-white">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card align-middle shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-1"><img
                                            src="{{ asset('web-report/assets/img/logo/logo.png') }}" alt="SimPro"
                                            width="40" height="40"> SimPro - Login</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form id="loginForm">
                                        @csrf
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <div id="alertContainer"></div>
                                            <input class="form-control" name="username" id="inputEmailAddress"
                                                type="email" placeholder="Masukan Username atau NIK" />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Masukan password" />
                                        </div>
                                        <!-- Form Group (remember password checkbox)-->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" name="remember"
                                                    id="rememberPasswordCheck" type="checkbox" value="" />
                                                <label class="form-check-label" for="rememberPasswordCheck">Remember
                                                    password</label>
                                            </div>
                                        </div>
                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                            <button type="button" class="btn btn-primary"
                                                onclick="submitForm()">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
    <script>
        function submitForm() {
            var formData = $('#loginForm').serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route('login') }}', // Gunakan fungsi route() untuk mendapatkan URL route login
                data: formData,
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    } else {
                        $('.alert').remove();

                        // Menampilkan pesan kesalahan menggunakan alert Bootstrap
                        if (response.errors) {
                            var errorsHtml = '<div class="alert alert-danger" role="alert">';
                            errorsHtml += '<ul>';
                            response.errors.forEach(function(error) {
                                errorsHtml += '<li>' + error + '</li>';
                            });
                            errorsHtml += '</ul></div>';
                            $('#alertContainer').html(errorsHtml);
                        } else {
                            $('#alertContainer').html(
                                '<div class="alert alert-danger" role="alert">Username or password is incorrect</div>'
                            );
                        }
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
</body>

</html>
