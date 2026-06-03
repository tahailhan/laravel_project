<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Premium Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #0f2027);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            color: white;
            transition: transform 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
        }

        .brand-icon {
            font-size: 3rem;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .form-floating .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 10px;
        }

        .form-floating .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #00c6ff;
            box-shadow: 0 0 15px rgba(0, 198, 255, 0.3);
            color: white;
        }

        .form-floating label {
            color: rgba(255, 255, 255, 0.7);
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px #203a43 inset !important;
            -webkit-text-fill-color: white !important;
        }

        .btn-login {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 114, 255, 0.3);
        }

        .btn-login:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 25px rgba(0, 114, 255, 0.5);
            color: white;
        }

        .glass-alert {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ffb3b3;
            backdrop-filter: blur(5px);
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="glass-card">
    <div class="text-center mb-4">
        <i class="bi bi-hexagon-half brand-icon"></i>
        <h3 class="fw-bold mb-1">Admin Portal</h3>
        <p class="text-white-50 small">Secure Access Control</p>
    </div>

    @if($errors->any())
        <div class="alert glass-alert py-2 text-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
            <label for="floatingInput"><i class="bi bi-envelope me-2"></i>Email address</label>
        </div>

        <div class="form-floating mb-4">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword"><i class="bi bi-lock me-2"></i>Password</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input bg-transparent border-secondary" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-white-50" for="remember">
                    Remember me
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-login w-100 mb-3">
            SECURE LOGIN <i class="bi bi-arrow-right-short fs-5 align-middle"></i>
        </button>

    </form>

    <div class="text-center mt-4">
        <small class="text-white-50">Laravel Multi-Role System &copy; {{ date('Y') }}</small>
    </div>
</div>

</body>
</html>
