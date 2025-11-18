<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            overflow: hidden;
            font-family: "Poppins", sans-serif;
        }

        /* LEFT PANEL (Ecommerce/Dropship Background) */
        .left-panel {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1607083206813-6df94f00fcd8?auto=format&fit=crop&w=1600&q=80') center center/cover no-repeat;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .left-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.7), rgba(102, 16, 242, 0.7));
            z-index: 1;
        }

        .left-panel-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 400px;
            padding: 20px;
        }

        .left-panel-content h1 {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        .left-panel-content p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* RIGHT PANEL (Login Form) */
        .login-container {
            width: 527px;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem;
            position: relative;
            z-index: 2;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #0d6efd;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
        }

        .btn-login {
            border-radius: 10px;
            padding: 0.75rem;
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            border: none;
            color: white;
            transition: 0.3s;
        }

        .btn-login:hover {
            filter: brightness(1.2);
        }

        .social-icons a {
            color: #0d6efd;
            font-size: 1.3rem;
            margin-right: 0.8rem;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #6610f2;
        }

        @media (max-width: 992px) {
            body {
                flex-direction: column-reverse;
            }

            .left-panel {
                height: 40%;
            }

            .login-container {
                width: 100%;
                height: 60%;
                box-shadow: none;
            }
        }

         /* RIGHT PANEL (Register Form) */
        .register-container {
            overflow: scroll;
            width: 527px;
            background: #fff;
            /* display: flex; */
            flex-direction: column;
            justify-content: center;
            padding: 4rem;
            position: relative;
            z-index: 2;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #0d6efd;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
        }

        .btn-register {
            border-radius: 10px;
            padding: 0.75rem;
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            border: none;
            color: white;
            transition: 0.3s;
        }

        .btn-register:hover {
            filter: brightness(1.2);
        }

        @media (max-width: 992px) {
            body {
                flex-direction: column-reverse;
            }

            .left-panel {
                height: 40%;
            }

            .register-container {
                width: 100%;
                height: 60%;
                box-shadow: none;
            }
        }
    </style>

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans text-gray-900 antialiased">

    {{ $slot }}

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/form.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('form').on('submit',function (e) {
                const submitBtn = this.querySelector('button[type=submit]');
                startLoadings(submitBtn);
            })
        });
    </script>

</body>

</html>