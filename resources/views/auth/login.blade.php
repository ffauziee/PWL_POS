<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | AdminLTE</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/docs/assets/plugins/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --text-color: #2b2d42;
            --light-gray: #f8f9fa;
            --box-shadow: 0 10px 30px rgba(67, 97, 238, 0.1);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-box {
            width: 400px;
            margin-bottom: 0;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            padding: 30px 20px;
            position: relative;
        }
        
        .brand-logo {
            color: white;
            font-weight: 700;
            font-size: 28px;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .brand-logo:hover {
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            color: white;
        }
        
        .brand-logo b {
            color: rgba(255, 255, 255, 0.95);
        }
        
        .card-body {
            padding: 40px 30px;
            background-color: white;
        }
        
        .login-box-msg {
            color: var(--text-color);
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .input-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-control {
            height: 50px;
            border-radius: 8px;
            padding-left: 45px;
            border: 1px solid #e1e5eb;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            border-color: var(--primary-color);
        }
        
        .input-group-text {
            position: absolute;
            left: 0;
            top: 0;
            height: 50px;
            width: 45px;
            background: transparent;
            border: none;
            color: #a0a5b1;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .input-group-append {
            position: absolute;
            left: 0;
            top: 0;
        }
        
        .error-text {
            display: block;
            margin-top: 5px;
            font-size: 12px;
        }
        
        .icheck-primary {
            user-select: none;
        }
        
        .icheck-primary label {
            font-size: 14px;
            color: #6c757d;
            cursor: pointer;
            padding-left: 5px;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border: none;
            height: 48px;
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover, .btn-primary:focus {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
        
        .animated {
            animation-duration: 0.5s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fadeIn {
            animation-name: fadeIn;
        }
        
        @media (max-width: 576px) {
            .login-box {
                width: 90%;
            }
            
            .card-body {
                padding: 30px 15px;
            }
        }
    </style>
</head>

<body>
    <div class="login-box animated fadeIn">
        <div class="card">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="brand-logo">
                    <b>Admin</b>LTE
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to your account</p>
                <form action="{{ url('login') }}" method="POST" id="form-login">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>
                    <div class="input-group">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>
                    <div class="row mb-4">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                <div class="footer-text">
                    <p>PWL POS 2025.</p>
                </div>
            
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/docs/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).ready(function() {
            // Focus on username field when page loads
            $('#username').focus();
            
            // Form validation
            $("#form-login").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 20
                    }
                },
                messages: {
                    username: {
                        required: "Please enter your username",
                        minlength: "Username must be at least 4 characters"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 6 characters"
                    }
                },
                submitHandler: function(form) {
                    const btn = $(form).find('button[type="submit"]');
                    btn.html('<i class="fas fa-spinner fa-spin"></i> Signing In...');
                    btn.prop('disabled', true);
                    
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Welcome Back!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    window.location = response.redirect;
                                });
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Authentication Failed',
                                    text: response.message
                                });
                                btn.html('Sign In');
                                btn.prop('disabled', false);
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Connection Error',
                                text: 'Please check your internet connection and try again.'
                            });
                            btn.html('Sign In');
                            btn.prop('disabled', false);
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>