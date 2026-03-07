<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - JozzStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-color: #0b0c10;
            --surface-color: #12141a;
            --primary-color: #facc15;
            --primary-hover: #eab308;
            --text-main: #ffffff;
            --text-muted: #9ca3af;
            --border-color: #272a35;
            --font-outfit: 'Outfit', sans-serif;
            --font-inter: 'Inter', sans-serif;
        }
        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: var(--font-inter);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
        header { background: rgba(11, 12, 16, 0.85); border-bottom: 1px solid var(--border-color); sticky: top 0;}
        .navbar { display: flex; align-items: center; justify-content: space-between; height: 75px; }
        .logo { display: flex; align-items: center; gap: 12px; font-family: var(--font-outfit); font-size: 1.35rem; font-weight: 800; color: var(--text-main); text-decoration: none;}
        .logo-icon { background: linear-gradient(135deg, var(--primary-color), #d97706); color: #000; width: 38px; height: 38px; display: flex; justify-content: center; align-items: center; border-radius: 10px; font-size: 1.1rem; }
        .nav-actions { display: flex; gap: 20px; align-items: center;}
        
        .main-content { padding: 40px 0; flex-grow: 1; }
        .dashboard-grid { display: grid; grid-template-columns: 250px 1fr; gap: 30px; }
        .sidebar { background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 12px; padding: 20px; }
        .sidebar-menu { list-style: none; padding: 0; margin: 0; }
        .sidebar-menu li { margin-bottom: 10px; }
        .sidebar-menu a { color: var(--text-muted); text-decoration: none; padding: 10px 15px; display: block; border-radius: 8px; transition: 0.3s; font-weight: 500;}
        .sidebar-menu a:hover, .sidebar-menu a.active { background: rgba(250, 204, 21, 0.1); color: var(--primary-color); }
        .sidebar-menu a i { margin-right: 10px; width: 20px; text-align: center; }
        
        .dashboard-content { background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 12px; padding: 30px; }
        .welcome-box { border-bottom: 1px solid var(--border-color); padding-bottom: 20px; margin-bottom: 20px; }
        .welcome-box h2 { font-family: var(--font-outfit); color: var(--primary-color); margin: 0 0 10px 0; font-size: 1.8rem;}
        .profile-info { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .info-card { background: var(--bg-color); padding: 15px 20px; border-radius: 8px; border: 1px solid var(--border-color); }
        .info-label { color: var(--text-muted); font-size: 0.85rem; margin-bottom: 5px; }
        .info-value { font-weight: 600; font-size: 1.1rem; }
        
        .logout-btn { background: var(--primary-color); color: #000; padding: 10px 24px; border-radius: 20px; font-weight: 600; cursor: pointer; border: none; font-family: var(--font-inter);}
    </style>
</head>
<body>
    <header>
        <div class="container navbar">
            <a href="/" class="logo">
                <div class="logo-icon"><i class="fa-solid fa-gamepad"></i></div>
                JozzStore
            </a>
            <div class="nav-actions">
                <a href="/" style="color: var(--text-main); font-weight: 500; text-decoration: none;"><i class="fa-solid fa-home"></i> Kembali ke Beranda</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fa-solid fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
        </div>
    </header>

    <main class="container main-content">
        <div class="dashboard-grid">
            <aside class="sidebar">
                <ul class="sidebar-menu">
                    <li><a href="#" class="active"><i class="fa-solid fa-user"></i> Profil Saya</a></li>
                    <li><a href="#"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Transaksi</a></li>
                    <li><a href="#"><i class="fa-solid fa-wallet"></i> Saldo</a></li>
                </ul>
            </aside>
            <section class="dashboard-content">
                <div class="welcome-box">
                    <h2>Selamat datang, {{ auth()->user()->name }}!</h2>
                    <p style="color: var(--text-muted);">Ini adalah halaman dashboard Anda. Anda dapat mengelola akun dan melihat transaksi di sini.</p>
                </div>
                
                <h3 style="margin: 0 0 15px 0; font-family: var(--font-outfit);">Informasi Akun</h3>
                <div class="profile-info">
                    <div class="info-card">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">No. Telepon / WhatsApp</div>
                        <div class="info-value">{{ auth()->user()->phone ?? '-' }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Bank Terdaftar</div>
                        <div class="info-value">{{ auth()->user()->bank_name ?? '-' }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Nomor Rekening</div>
                        <div class="info-value">{{ auth()->user()->bank_account ?? '-' }}</div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
