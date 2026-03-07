<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - JozzStore</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bg-color: #0b0c10;
            --surface-color: #12141a;
            --surface-hover: #1c1e26;
            --primary-color: #facc15;
            --primary-hover: #eab308;
            --text-main: #ffffff;
            --text-muted: #9ca3af;
            --border-color: #272a35;
            --border-light: rgba(255, 255, 255, 0.08);
            --font-outfit: 'Outfit', sans-serif;
            --font-inter: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: var(--font-inter);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            cursor: pointer;
            border: none;
            background: none;
            font-family: var(--font-inter);
        }

        /* Header (Same as Homepage) */
        header {
            background: rgba(11, 12, 16, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--border-light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 75px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: var(--font-outfit);
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.5px;
        }

        .logo-icon {
            background: linear-gradient(135deg, var(--primary-color), #d97706);
            color: #000;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.1rem;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .search-bar {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            width: 280px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: var(--text-main);
            outline: none;
            width: 100%;
        }

        .login-btn {
            color: var(--text-main);
            font-weight: 500;
        }

        .register-btn {
            background: var(--primary-color);
            color: #000;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 24px;
        }

        /* Auth Container */
        .auth-wrapper {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1.5rem;
        }

        .auth-card {
            background-color: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            width: 100%;
            max-width: 480px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .auth-title {
            text-align: center;
            color: #eab308;
            font-family: var(--font-outfit);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-main);
        }

        .form-input {
            width: 100%;
            background-color: #0b0c10;
            border: 1px solid var(--border-color);
            color: var(--text-main);
            padding: 12px 16px;
            border-radius: 6px;
            font-family: var(--font-inter);
            font-size: 0.95rem;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }

        .auth-submit-btn {
            width: 100%;
            background-color: var(--primary-color);
            color: #000;
            font-weight: 600;
            font-size: 1rem;
            padding: 14px;
            border-radius: 6px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .auth-submit-btn:hover {
            background-color: var(--primary-hover);
        }

        .auth-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .auth-footer a {
            color: var(--primary-color);
            font-weight: 600;
        }

        footer {
            border-top: 1px solid var(--border-color);
            padding: 2rem 0;
            background-color: #08090c;
        }

    </style>
</head>
<body>

    <header>
        <div class="container navbar">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fa-solid fa-gamepad"></i>
                </div>
                JozzStore
            </a>
            <div class="nav-actions">
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari game favorit...">
                </div>
                <a href="{{ route('login') }}" class="login-btn">Login</a>
                <a href="{{ route('register') }}" class="register-btn">Daftar</a>
            </div>
        </div>
    </header>

    <div class="auth-wrapper">
        <div class="auth-card">
            <h2 class="auth-title">Register</h2>
            
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-input" required autofocus value="{{ old('name') }}">
                    @error('name')<span style="color: #ef4444; font-size: 0.8rem;">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required value="{{ old('email') }}">
                    @error('email')<span style="color: #ef4444; font-size: 0.8rem;">{{ $message }}</span>@enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-input" placeholder="e.g., 08123456789" value="{{ old('phone') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="bank_name">Bank Name</label>
                    <select id="bank_name" name="bank_name" class="form-input" style="background-color: #ffffff; color: #000;">
                        <option value="">Select your bank</option>
                        <option value="BCA">BCA</option>
                        <option value="Mandiri">Mandiri</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="bank_account">Bank Account Number</label>
                    <input type="text" id="bank_account" name="bank_account" class="form-input" placeholder="Enter your bank account number" value="{{ old('bank_account') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-input" required>
                    @error('password')<span style="color: #ef4444; font-size: 0.8rem;">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
                </div>

                <button type="submit" class="auth-submit-btn">Register</button>
            </form>
            
            <div class="auth-footer">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="container" style="text-align: center; color: var(--text-muted); font-size: 0.9rem; display: flex; justify-content: space-between;">
            <div>&copy; 2026 JozzStore. All rights reserved.</div>
            <div style="display: flex; gap: 16px;">
                <a href="#" style="color: var(--text-main); font-size: 1.2rem;"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" style="color: var(--text-main); font-size: 1.2rem;"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
