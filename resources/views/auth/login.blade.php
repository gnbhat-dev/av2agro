<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Av2 Agro</title>
    <link rel="icon" type="image/png" href="{{ asset('images/fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background-color: #f5f0eb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("{{ asset('images/pdt_bg.png') }}");
            background-size: cover;
            background-position: center;
        }

        /* Dark overlay on background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: rgba(60, 20, 5, 0.72);
            z-index: 0;
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 16px;
        }

        /* Logo area */
        .login-brand {
            text-align: center;
            margin-bottom: 24px;
        }

        .login-brand img {
            height: 52px;
            filter: brightness(0) invert(1);
        }

        /* Card */
        .login-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px 36px 36px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .login-card h2 {
            font-size: 20px;
            font-weight: 600;
            color: #6a3013;
            margin-bottom: 4px;
        }

        .login-card p {
            font-size: 13px;
            color: #888;
            margin-bottom: 28px;
        }

        /* Error alert */
        .alert-error {
            background: #fff2f0;
            border: 1px solid #ffccc7;
            color: #c0392b;
            font-size: 13px;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-error::before {
            content: '⚠';
            font-size: 14px;
        }

        /* Form fields */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #333;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 11px 14px;
            font-size: 14px;
            font-family: "Poppins", sans-serif;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            color: #333;
            background: #fafafa;
        }

        .form-group input:focus {
            border-color: #6a3013;
            box-shadow: 0 0 0 3px rgba(106, 48, 19, 0.1);
            background: #fff;
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #6a3013;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            font-family: "Poppins", sans-serif;
            cursor: pointer;
            margin-top: 8px;
            transition: background-color 0.25s ease, color 0.25s ease;
            letter-spacing: 0.3px;
        }

        .btn-login:hover {
            background-color: #f5c400;
            color: #6a3013;
        }

        /* Back to site link */
        .back-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.75);
        }

        .back-link a {
            color: #f5c400;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    {{-- Logo --}}
    <div class="login-brand">
        <img src="{{ asset('images/logo.png') }}" alt="Av2 Agro">
    </div>

    {{-- Card --}}
    <div class="login-card">

        <h2>Admin Login</h2>
        <p>Sign in to manage your website</p>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="admin@av2agro.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>

        </form>

    </div>

    <div class="back-link">
        <a href="{{ route('home') }}">← Back to website</a>
    </div>

</div>

</body>
</html>