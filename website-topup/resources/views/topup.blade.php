<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $game['name'] }} - JozzStore</title>
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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: var(--bg-color); color: var(--text-main); font-family: var(--font-inter); min-height: 100vh; }
        a { text-decoration: none; color: inherit; }
        button { cursor: pointer; border: none; font-family: var(--font-inter); }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }

        /* Header */
        header { background: rgba(11,12,16,.9); border-bottom: 1px solid var(--border-color); position: sticky; top: 0; z-index: 1000; backdrop-filter: blur(16px); }
        .navbar { display: flex; align-items: center; justify-content: space-between; height: 70px; }
        .logo { display: flex; align-items: center; gap: 10px; font-family: var(--font-outfit); font-size: 1.3rem; font-weight: 800; }
        .logo-icon { background: linear-gradient(135deg, #facc15, #d97706); color: #000; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 9px; font-size: 1rem; }
        .nav-actions { display: flex; align-items: center; gap: 16px; }
        .btn-back { background: var(--surface-color); border: 1px solid var(--border-color); color: var(--text-muted); padding: 9px 18px; border-radius: 20px; font-size: 0.9rem; font-weight: 500; display: flex; align-items: center; gap: 8px; transition: 0.2s; }
        .btn-back:hover { border-color: var(--primary-color); color: var(--primary-color); }
        @auth
        .btn-dashboard { color: var(--text-main); font-weight: 500; font-size: 0.9rem; }
        @endauth

        /* Hero Banner */
        .hero-banner {
            position: relative;
            height: 220px;
            background: {{ $game['hero_bg'] }};
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .hero-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 60%, transparent 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 24px;
            padding: 0 3rem;
        }
        .hero-game-img {
            width: 100px;
            height: 100px;
            border-radius: 16px;
            object-fit: cover;
            border: 3px solid rgba(255,255,255,0.2);
            box-shadow: 0 8px 24px rgba(0,0,0,0.5);
        }
        .hero-info {}
        .hero-title { font-family: var(--font-outfit); font-size: 2.2rem; font-weight: 800; color: #fff; text-shadow: 0 2px 10px rgba(0,0,0,0.5); line-height: 1.1; }
        .hero-category { color: var(--text-muted); font-size: 0.85rem; margin-bottom: 12px; margin-top: 4px; }
        .hero-badges { display: flex; gap: 10px; flex-wrap: wrap; }
        .hero-badge { background: rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 5px 14px; border-radius: 20px; font-size: 0.75rem; display: flex; align-items: center; gap: 6px; }
        .hero-badge i { color: var(--primary-color); }

        /* Main Content */
        .main-content { padding: 32px 0 60px; }
        .topup-layout { display: grid; grid-template-columns: 1fr 340px; gap: 24px; align-items: start; }

        /* Denomination Section */
        .section-card { background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 14px; padding: 24px; }
        .section-title { display: flex; align-items: center; gap: 10px; font-family: var(--font-outfit); font-size: 1.1rem; font-weight: 700; margin-bottom: 20px; color: var(--primary-color); }
        .section-title i { color: var(--primary-color); }

        .denomination-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
        .denom-btn {
            background: #0b0c10;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            padding: 12px 14px;
            cursor: pointer;
            text-align: left;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .denom-btn:hover { border-color: var(--primary-color); background: rgba(250,204,21,0.06); }
        .denom-btn.selected { border-color: var(--primary-color); background: rgba(250,204,21,0.1); }
        .denom-icon { color: var(--primary-color); font-size: 0.9rem; flex-shrink: 0; }
        .denom-info { flex: 1; }
        .denom-name { font-size: 0.82rem; font-weight: 600; color: var(--text-main); line-height: 1.2; }
        .denom-price { font-size: 0.75rem; color: var(--text-muted); margin-top: 2px; }

        /* Order Form */
        .order-card { background: var(--surface-color); border: 1px solid var(--border-color); border-radius: 14px; padding: 24px; }
        .form-group { margin-bottom: 18px; }
        .form-label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; color: var(--text-main); }
        .form-sublabel { font-size: 0.75rem; color: var(--text-muted); margin-top: 5px; }
        .form-input { width: 100%; background: #0b0c10; border: 1.5px solid var(--border-color); color: var(--text-main); padding: 11px 14px; border-radius: 8px; font-family: var(--font-inter); font-size: 0.9rem; transition: border-color 0.2s; }
        .form-input:focus { outline: none; border-color: var(--primary-color); }

        .payment-method { background: #0b0c10; border: 1.5px solid var(--border-color); border-radius: 8px; padding: 13px 14px; display: flex; align-items: center; justify-content: space-between; cursor: pointer; transition: 0.2s; margin-top: 8px; }
        .payment-method.selected { border-color: var(--primary-color); background: rgba(250,204,21,0.08); }
        .payment-method-left { display: flex; align-items: center; gap: 10px; }
        .payment-method img { height: 22px; width: auto; }
        .payment-method-name { font-weight: 600; font-size: 0.9rem; }
        .payment-method-price { font-size: 0.85rem; color: var(--primary-color); font-weight: 700; }

        .payment-instructions { margin-top: 12px; padding: 12px; background: rgba(255,255,255,0.03); border-radius: 8px; border: 1px solid var(--border-color); }
        .payment-instructions p { font-size: 0.78rem; color: var(--text-muted); margin-bottom: 6px; font-weight: 600; }
        .payment-instructions ol { padding-left: 16px; }
        .payment-instructions li { font-size: 0.78rem; color: var(--text-muted); margin-bottom: 4px; line-height: 1.4; }

        .confirm-btn { width: 100%; background: var(--primary-color); color: #000; font-weight: 700; font-size: 1rem; padding: 14px; border-radius: 10px; margin-top: 18px; cursor: pointer; border: none; transition: background 0.2s; font-family: var(--font-inter); }
        .confirm-btn:hover { background: var(--primary-hover); }
        .confirm-btn:disabled { background: #4a4118; color: #888; cursor: not-allowed; }

        /* Responsive */
        @media (max-width: 768px) {
            .topup-layout { grid-template-columns: 1fr; }
            .denomination-grid { grid-template-columns: repeat(2, 1fr); }
            .hero-title { font-size: 1.5rem; }
            .hero-banner { height: 180px; }
        }
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
                <a href="/" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                @auth
                    <a href="/dashboard" class="btn-dashboard" style="color: var(--primary-color);">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" style="color: var(--text-main); font-size: 0.9rem; font-weight: 500;">Login</a>
                    <a href="{{ route('register') }}" style="background: var(--primary-color); color: #000; padding: 8px 20px; border-radius: 20px; font-weight: 700; font-size: 0.9rem;">Daftar</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-content">
            <img src="{{ $game['image'] }}" alt="{{ $game['name'] }}" class="hero-game-img">
            <div class="hero-info">
                <h1 class="hero-title">{{ $game['name'] }}</h1>
                <p class="hero-category">Mobile Gaming</p>
                <div class="hero-badges">
                    <span class="hero-badge"><i class="fa-solid fa-headset"></i> Customer Service 24/7</span>
                    <span class="hero-badge"><i class="fa-solid fa-bolt"></i> Instant Delivery</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container main-content">
        <div class="topup-layout">

            <!-- Denomination Grid -->
            <div class="section-card">
                <h2 class="section-title"><i class="fa-solid fa-coins"></i> Pilih Nominal Top Up</h2>
                <div class="denomination-grid" id="denom-grid">
                    @foreach ($game['packages'] as $pkg)
                    <button class="denom-btn" onclick="selectPackage(this, '{{ $pkg['name'] }}', {{ $pkg['price'] }})">
                        <i class="fa-solid fa-diamond denom-icon"></i>
                        <div class="denom-info">
                            <div class="denom-name">{{ $pkg['name'] }}</div>
                            <div class="denom-price">Rp {{ number_format($pkg['price'], 0, ',', '.') }},-</div>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Order Form -->
            <div class="order-card">
                <h2 class="section-title"><i class="fa-solid fa-clipboard-list"></i> Informasi Pesanan</h2>

                <div class="form-group">
                    <label class="form-label">Masukkan Player ID</label>
                    <input type="text" class="form-input" id="player-id" placeholder="Enter your Player ID">
                    @if(isset($game['id_hint']))
                        <p class="form-sublabel">{{ $game['id_hint'] }}</p>
                    @endif
                </div>

                @if(isset($game['requires_server']) && $game['requires_server'])
                <div class="form-group">
                    <label class="form-label">Masukkan Server ID</label>
                    <input type="text" class="form-input" id="server-id" placeholder="Enter your Server ID">
                    <p class="form-sublabel">Server ID dapat dilihat di profil game</p>
                </div>
                @endif

                <div class="form-group">
                    <label class="form-label">Pilih Pembayaran</label>
                    <div class="payment-method selected" onclick="selectPayment(this, 'QRIS')">
                        <div class="payment-method-left">
                            <span style="font-size: 1.3rem;">📱</span>
                            <span class="payment-method-name">QRIS</span>
                        </div>
                        <span class="payment-method-price" id="payment-price">Rp 0,-</span>
                    </div>
                </div>

                <div class="payment-instructions">
                    <p>Cara Pembayaran:</p>
                    <ol>
                        <li>Scan QR Code yang muncul setelah konfirmasi</li>
                        <li>Pilih aplikasi e-wallet atau mobile banking</li>
                        <li>Masukkan nominal pembayaran</li>
                        <li>Konfirmasi pembayaran</li>
                    </ol>
                </div>

                <button class="confirm-btn" id="confirm-btn" onclick="handleTopup()">Konfirmasi Top Up</button>
            </div>

        </div>
    </main>

    <script>
        let selectedPackage = null;

        function selectPackage(el, name, price) {
            // Remove selected from all
            document.querySelectorAll('.denom-btn').forEach(b => b.classList.remove('selected'));
            el.classList.add('selected');
            selectedPackage = { name, price };

            // Update price display
            const priceFormatted = 'Rp ' + price.toLocaleString('id-ID') + ',-';
            document.getElementById('payment-price').textContent = priceFormatted;
        }

        function handleTopup() {
            const playerId = document.getElementById('player-id').value.trim();
            if (!selectedPackage) {
                alert('Pilih nominal top up terlebih dahulu!');
                return;
            }
            if (!playerId) {
                alert('Masukkan Player ID terlebih dahulu!');
                document.getElementById('player-id').focus();
                return;
            }
            
            // Simulated confirmation
            const confirmed = confirm(
                `Konfirmasi Top Up:\n\n` +
                `Game: {{ $game['name'] }}\n` +
                `Paket: ${selectedPackage.name}\n` +
                `Player ID: ${playerId}\n` +
                `Total: Rp ${selectedPackage.price.toLocaleString('id-ID')},-\n\n` +
                `Lanjutkan?`
            );
            
            if (confirmed) {
                alert('✅ Pesanan diterima! QR Code pembayaran akan segera dikirimkan via WhatsApp CS kami.');
            }
        }
    </script>
</body>
</html>
