<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JozzStore - Top Up Terpercaya</title>
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
            --primary-color: #facc15; /* Yellow */
            --primary-hover: #eab308;
            --text-main: #ffffff;
            --text-muted: #9ca3af;
            --border-color: #272a35;
            --border-light: rgba(255, 255, 255, 0.08);
            --font-outfit: 'Outfit', sans-serif;
            --font-inter: 'Inter', sans-serif;
            --shadow-glow: 0 0 20px rgba(250, 204, 21, 0.15);
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
            overflow-x: hidden;
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

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Top Bar & Navbar */
        header {
            background: rgba(11, 12, 16, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--border-light);
            transition: all 0.3s ease;
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
            color: #0b0c10;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 0.9rem;
            box-shadow: 0 4px 10px rgba(250, 204, 21, 0.3);
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
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .search-bar:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.1);
            width: 320px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: var(--text-main);
            outline: none;
            width: 100%;
            font-size: 0.95rem;
            font-family: var(--font-inter);
        }
        
        .search-bar input::placeholder {
            color: var(--text-muted);
        }

        .search-bar i {
            color: var(--text-muted);
            transition: color 0.3s;
        }
        
        .search-bar:focus-within i {
            color: var(--primary-color);
        }

        .login-btn {
            color: var(--text-main);
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .login-btn:hover {
            color: var(--primary-color);
        }

        .register-btn {
            background: linear-gradient(to right, var(--primary-color), var(--primary-hover));
            color: #0b0c10;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 24px;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(250, 204, 21, 0.2);
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(250, 204, 21, 0.4);
            filter: brightness(1.1);
        }

        /* Hero Carousel */
        .hero {
            padding: 3rem 0;
            position: relative;
        }
        
        /* Subtle background glow */
        .hero::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(250, 204, 21, 0.08) 0%, rgba(11, 12, 16, 0) 70%);
            z-index: -1;
            pointer-events: none;
        }

        .carousel-track {
            display: flex;
            gap: 24px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            padding-bottom: 20px; /* Space for shadow */
        }
        
        .carousel-track::-webkit-scrollbar {
            display: none;
        }

        /* ========== HERO CAROUSEL ========== */
        .hero {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            margin: 2rem 1rem 4rem 1rem;
            user-select: none;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .carousel-wrapper {
            display: flex;
            width: 400%; /* Explicitly 400% for 4 slides */
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
            cursor: grab;
        }

        .carousel-wrapper.dragging {
            cursor: grabbing;
            transition: none;
        }

        .carousel-item {
            width: 25%; /* 1/4th of 400% = 100% of container */
            height: 440px;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            box-sizing: border-box;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Back to cover for full-bleed feel */
            filter: brightness(0.6); /* Built-in dark overlay */
            pointer-events: none;
        }

        .carousel-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.6), 0 0 20px rgba(250, 204, 21, 0.1);
            border-color: rgba(250, 204, 21, 0.3);
        }

        .carousel-item:hover img {
            transform: scale(1.05);
        }

        .carousel-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(0,0,0,0.5);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1rem;
            transition: 0.2s;
        }
        .carousel-nav-btn:hover { 
            background: rgba(250,204,21,0.4); 
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        .carousel-nav-btn.prev { left: 16px; }
        .carousel-nav-btn.next { right: 16px; }

        .slider-indicators {
            display: flex;
            justify-content: center;
            gap: 8px;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator.active {
            width: 30px;
            border-radius: 5px;
            background: var(--primary-color);
        }

        .carousel-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            text-align: center;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .carousel-title {
            font-family: var(--font-outfit);
            font-size: 4rem; /* Larger title */
            font-weight: 800;
            margin-bottom: 15px;
            letter-spacing: -1.5px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.6);
            line-height: 1;
        }
        
        .carousel-desc {
            color: #f3f4f6;
            font-size: 1.25rem;
            font-weight: 500;
            text-shadow: 0 2px 5px rgba(0,0,0,0.8);
            max-width: 600px;
        }



        /* Sections */
        .section-header {
            text-align: center;
            margin-bottom: 3.5rem;
            margin-top: 5rem;
        }

        .section-badge {
            display: inline-block;
            border: 1px solid rgba(250, 204, 21, 0.3);
            color: var(--primary-color);
            padding: 6px 20px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 16px;
            background: rgba(250, 204, 21, 0.08);
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .section-title {
            font-family: var(--font-outfit);
            font-size: 2.75rem;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.15rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            gap: 24px;
            margin-bottom: 5rem;
        }

        .product-card {
            background-color: var(--surface-color);
            border-radius: 24px;
            border: 1px solid var(--border-light);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            display: flex;
            flex-direction: column;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .product-card:hover {
            transform: translateY(-8px);
            border-color: rgba(250, 204, 21, 0.5);
            box-shadow: 0 15px 35px rgba(0,0,0,0.6), var(--shadow-glow);
            z-index: 10;
        }

        .product-img-wrapper {
            position: relative;
            padding-top: 130%; /* Taller cards */
            overflow: hidden;
            background: #1a1c23;
        }

        .product-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-img-wrapper img {
            transform: scale(1.08);
        }

        /* Specific fix for landscape images in portrait cards */
        .img-portrait-lock {
            object-fit: cover !important;
            object-position: center !important;
        }

        .badge-coming-soon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0,0,0,0.65);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 8px 16px;
            border-radius: 24px;
            font-family: var(--font-outfit);
            font-size: 0.8rem;
            font-weight: 700;
            z-index: 2;
            white-space: nowrap;
            letter-spacing: 0.5px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .product-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60%;
            background: linear-gradient(to top, var(--surface-color) 0%, rgba(18,20,26,0.8) 30%, rgba(18,20,26,0) 100%);
            z-index: 1;
        }

        .product-info {
            padding: 0 20px 20px;
            position: relative;
            z-index: 2;
            background: var(--surface-color);
            flex-grow: 1;
            /* Negative margin to pull text into the gradient */
            margin-top: -30px; 
        }

        .product-name {
            font-family: var(--font-outfit);
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 6px;
            color: var(--text-main);
            transition: color 0.3s ease;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .product-card:hover .product-name {
            color: var(--primary-color);
        }

        .product-desc {
            color: var(--text-muted);
            font-size: 0.85rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* FAQ Section */
        .faq-section {
            max-width: 850px;
            margin: 0 auto 5rem;
        }

        .faq-item {
            background-color: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-item:hover {
            border-color: rgba(255,255,255,0.2);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            transform: translateY(-2px);
        }

        .faq-item.active {
            border-color: var(--primary-color);
            box-shadow: var(--shadow-glow);
        }

        .faq-header {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            cursor: pointer;
            user-select: none;
        }

        .faq-number {
            background: rgba(250, 204, 21, 0.1);
            color: var(--primary-color);
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
            border: 1px solid rgba(250, 204, 21, 0.2);
        }

        .faq-question {
            font-family: var(--font-outfit);
            font-weight: 600;
            font-size: 1.15rem;
            flex-grow: 1;
            transition: color 0.3s;
        }
        
        .faq-item:hover .faq-question {
            color: var(--primary-color);
        }

        .faq-icon {
            color: var(--text-muted);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255,255,255,0.05);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
            background: var(--primary-color);
            color: #000;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), padding 0.4s ease, opacity 0.4s ease;
            background-color: rgba(0,0,0,0.3);
            opacity: 0;
        }

        .faq-item.active .faq-body {
            max-height: 250px;
            padding: 0 24px 24px 78px;
            opacity: 1;
        }

        .faq-content {
            color: #d1d5db;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Contact Box */
        .contact-box {
            text-align: center;
            margin-bottom: 6rem;
        }

        .contact-text {
            color: var(--text-muted);
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        
        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            color: #000;
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 40px;
            font-family: var(--font-outfit);
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(250, 204, 21, 0.3);
        }

        .whatsapp-btn i {
            font-size: 1.3rem;
        }

        .whatsapp-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 25px rgba(250, 204, 21, 0.4);
            filter: brightness(1.1);
        }

        /* Jual Voucher Section */
        .sell-voucher {
            text-align: center;
            margin-bottom: 6rem;
            padding: 4rem 2rem;
            background: radial-gradient(circle at center, rgba(39, 42, 53, 0.5) 0%, rgba(18, 20, 26, 0.5) 100%);
            border-radius: 30px;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }
        
        .sell-voucher::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
        }

        .sell-desc {
            font-size: 1.35rem;
            color: #e5e7eb;
            max-width: 650px;
            margin: 0 auto 32px;
            line-height: 1.6;
            font-family: var(--font-outfit);
        }

        .login-sell-btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            color: #000;
            font-weight: 700;
            padding: 14px 40px;
            border-radius: 40px;
            font-family: var(--font-outfit);
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(250, 204, 21, 0.3);
        }

        .login-sell-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 25px rgba(250, 204, 21, 0.4);
            filter: brightness(1.1);
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--border-color);
            padding: 5rem 0 2rem;
            background-color: #08090c;
            position: relative;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 48px;
            margin-bottom: 4rem;
        }

        .footer-logo {
            margin-bottom: 24px;
            display: inline-flex;
            border: 1px solid var(--border-color);
            padding: 10px 20px;
            border-radius: 12px;
            background: var(--surface-color);
            transition: all 0.3s ease;
        }
        
        .footer-logo:hover {
            border-color: rgba(250, 204, 21, 0.4);
            transform: translateY(-2px);
        }

        .footer-desc {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.6;
            max-width: 320px;
        }

        .footer-title {
            font-family: var(--font-outfit);
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 24px;
            color: var(--text-main);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 14px;
        }

        .footer-links a {
            color: var(--text-muted);
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }
        
        .footer-contact li {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-contact i {
            width: 20px;
            color: var(--text-main);
        }

        .cta-box {
            background-color: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
        }
        
        .cta-box:hover {
            border-color: rgba(255,255,255,0.2);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .cta-title {
            font-family: var(--font-outfit);
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .cta-desc {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .cta-btn {
            background-color: rgba(250, 204, 21, 0.1);
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            padding: 10px 24px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .cta-btn:hover {
            background-color: var(--primary-color);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(250, 204, 21, 0.2);
        }

        .copyright {
            text-align: center;
            color: var(--text-muted);
            font-size: 0.9rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .social-links {
            display: flex;
            gap: 16px;
        }
        
        .social-links a {
            color: var(--text-muted);
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social-links a:hover {
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
            .copyright {
                flex-direction: column;
                gap: 16px;
            }
        }

        @media (max-width: 768px) {
            .nav-actions .search-bar {
                display: none;
            }
            .carousel-item {
                width: 25%;
                height: 350px;
            }
            .carousel-item.secondary {
                display: none;
            }
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
            .carousel-title {
                font-size: 2.2rem;
            }
            .section-title {
                font-size: 2.2rem;
            }
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .sell-voucher {
                padding: 3rem 1.5rem;
            }
            .sell-desc {
                font-size: 1.15rem;
            }
        }
        
        /* ========== UNIFIED RESPONSIVE DESIGN (Mobile-First) ========== */
        
        /* Base / Mobile Under 640px */
        @media (max-width: 639px) {
            .navbar { height: 60px; padding: 0 1rem; }
            .logo span { display: none; }
            .logo-icon { width: 30px; height: 30px; font-size: 0.8rem; }
            
            .nav-actions { gap: 8px; }
            .login-btn span, .register-btn span { display: none; }
            .login-btn, .register-btn { padding: 8px 12px; min-width: 40px; text-align: center; }
            .login-btn i, .register-btn i { display: inline-block !important; font-size: 1.1rem; }
            
            .mobile-search-toggle { display: block !important; }
            .search-bar { 
                position: absolute;
                top: 70px;
                left: 1rem;
                right: 1rem;
                width: calc(100% - 2rem) !important;
                z-index: 1001;
                background: var(--bg-color);
                box-shadow: 0 10px 20px rgba(0,0,0,0.5);
                display: none;
            }
            .search-bar.active { display: flex; }

            .hero { margin-bottom: 2rem; border-radius: 12px; }
            .carousel-item { height: 240px; }
            .carousel-title { font-size: 1.2rem; }
            .carousel-desc { display: none; }
            .carousel-content { padding: 15px; }
            .carousel-nav-btn { width: 32px; height: 32px; font-size: 0.7rem; }
        }

        /* Tablet / Mid Mobile (640px - 767px) */
        @media (min-width: 640px) and (max-width: 767px) {
            .navbar { height: 70px; }
            .logo span { display: none; }
            .carousel-item { height: 400px; }
            .carousel-title { font-size: 2.2rem; }
            .carousel-desc { font-size: 1rem; max-width: 80%; }
        }

        /* Desktop (768px+) */
        @media (min-width: 768px) {
            .navbar { height: 75px; }
            .logo span { display: inline; }
            .login-btn span, .register-btn span { display: inline; }
            .login-btn i, .register-btn i { display: none !important; }
            
            .search-bar { display: flex; position: static; width: 280px !important; }
            .mobile-search-toggle { display: none !important; }
            
            .carousel-item { height: 620px; }
            .carousel-title { font-size: 3.5rem; }
            .carousel-desc { display: block; }
        }

        /* Wide Desktop (1536px+) */
        @media (min-width: 1536px) {
            .carousel-item { height: 820px; }
            .carousel-title { font-size: 5rem; }
        }

        .carousel-nav-btn {
            background: rgba(255,255,255,0.1);
            border: none;
            backdrop-filter: blur(4px);
            width: 40px;
            height: 40px;
        }

        .carousel-nav-btn:hover {
            background: var(--primary-color);
            color: #000;
        }

        .indicator {
            width: 8px;
            height: 8px;
            background: rgba(255,255,255,0.2);
        }

        .indicator.active {
            width: 24px;
            background: var(--primary-color);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="container navbar">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fa-solid fa-gamepad"></i>
                </div>
                <span>VoucherAnakBangsa</span>
            </a>
            
            <div class="nav-actions">
                <button class="mobile-search-toggle" id="mobile-search-btn" style="display: none; color: var(--text-main); font-size: 1.2rem;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <div class="search-bar" id="search-bar-container" style="position: relative;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="search-input" placeholder="Cari game favorit..." autocomplete="off">
                    <div id="search-dropdown" style="
                        display: none;
                        position: absolute;
                        top: calc(100% + 8px);
                        left: 0;
                        right: 0;
                        background: #1c1e26;
                        border: 1px solid #272a35;
                        border-radius: 12px;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
                        z-index: 9999;
                        overflow: hidden;
                        max-height: 360px;
                        overflow-y: auto;
                    ">
                    </div>
                </div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="login-btn">
                        <i class="fa-solid fa-gauge" style="display: none;"></i>
                        <span>Dashboard</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="register-btn" style="background: transparent; border: 1px solid var(--primary-color); color: var(--text-main); display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-right-from-bracket" style="display: none;"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="login-btn">
                        <i class="fa-solid fa-right-to-bracket" style="display: none;"></i>
                        <span>Login</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register-btn">
                            <i class="fa-solid fa-user-plus" style="display: none;"></i>
                            <span>Daftar</span>
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <main class="container">
        <!-- Hero Section -->
        <section class="hero" id="hero-section">
            <!-- Nav buttons -->
            <button class="carousel-nav-btn prev" onclick="carouselMove(-1)"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="carousel-nav-btn next" onclick="carouselMove(1)"><i class="fa-solid fa-chevron-right"></i></button>

            <div class="carousel-wrapper" id="carousel-wrapper">

                <!-- Slide 1: PUBG Mobile -->
                <div class="carousel-item" style="background: #0b0c10;">
                    <img src="{{ asset('images/hero_pubg.png') }}" alt="PUBG Mobile">
                    <div class="carousel-content">
                        <h2 class="carousel-title">PUBG Mobile</h2>
                        <p class="carousel-desc">Get your UC and dominate the battleground!</p>
                    </div>
                </div>

                <!-- Slide 2: Mobile Legends -->
                <div class="carousel-item" style="background: #0b0c10;">
                    <img src="{{ asset('images/hero_mlbb_landscape.png') }}" alt="Mobile Legends">
                    <div class="carousel-content">
                        <h2 class="carousel-title">Mobile Legends</h2>
                        <p class="carousel-desc">Top up Diamonds and rule the Land of Dawn!</p>
                    </div>
                </div>

                <!-- Slide 3: Free Fire -->
                <div class="carousel-item" style="background: #0b0c10;">
                    <img src="{{ asset('images/hero_ff_landscape.png') }}" alt="Free Fire">
                    <div class="carousel-content">
                        <h2 class="carousel-title">Free Fire Diamonds</h2>
                        <p class="carousel-desc">Get diamonds and unlock exclusive bundles!</p>
                    </div>
                </div>

                <!-- Slide 4: Genshin Impact -->
                <div class="carousel-item" style="background: #0b0c10;">
                    <img src="{{ asset('images/card_genshin.png') }}" alt="Genshin Impact">
                    <div class="carousel-content">
                        <h2 class="carousel-title">Genshin Impact</h2>
                        <p class="carousel-desc">Top up Genesis Crystals for your adventure!</p>
                    </div>
                </div>

            </div>

            <!-- Dot indicators -->
            <div class="slider-indicators" id="carousel-dots">
                <div class="indicator active"></div>
                <div class="indicator"></div>
                <div class="indicator"></div>
                <div class="indicator"></div>
            </div>
        </section>

        <!-- Popular Products Section -->
        <section class="products">
            <div class="section-header">
                <div class="section-badge" style="
                    background: rgba(250, 204, 21, 0.1);
                    color: var(--primary-color);
                    border: 1px solid rgba(250, 204, 21, 0.2);
                    padding: 6px 16px;
                    border-radius: 100px;
                    font-size: 0.85rem;
                    font-weight: 600;
                    margin-bottom: 1.5rem;
                    display: inline-block;
                ">Produk Unggulan</div>
                <h2 class="section-title">Voucher Game Terpopuler</h2>
                <p class="section-subtitle">Pilih dari berbagai macam voucher digital dan kredit game yang kami sediakan.</p>
            </div>

            <div class="products-grid">

                <!-- Mobile Legends Card -->
                <a href="{{ route('topup.show', 'mobile-legends') }}" class="product-card">
                    <div class="product-img-wrapper">
                        <img src="{{ asset('images/card_mlbb.png') }}" alt="Mobile Legends" class="img-portrait-lock">
                        <div class="product-badge">Populer</div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Mobile Legends</h3>
                        <p class="product-dev">Moonton</p>
                    </div>
                </a>

                <!-- Free Fire Card -->
                <a href="{{ route('topup.show', 'free-fire') }}" class="product-card">
                    <div class="product-img-wrapper">
                        <img src="{{ asset('images/card_ff.png') }}" alt="Free Fire" class="img-portrait-lock">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Free Fire</h3>
                        <p class="product-dev">Garena</p>
                    </div>
                </a>

                <!-- PUBG Mobile Card -->
                <a href="{{ route('topup.show', 'pubg-mobile') }}" class="product-card">
                    <div class="product-img-wrapper">
                        <img src="{{ asset('images/hero_pubg.png') }}" alt="PUBG Mobile" class="img-portrait-lock">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">PUBG Mobile</h3>
                        <p class="product-dev">Level Infinite</p>
                    </div>
                </a>

                <!-- Genshin Impact Card -->
                <a href="#" class="product-card" data-name="Genshin Impact">
                    <div class="product-img-wrapper">
                        <img src="{{ asset('images/card_genshin.png') }}" alt="Genshin Impact" class="img-portrait-lock">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Genshin Impact</h3>
                        <p class="product-dev">HoYoverse</p>
                    </div>
                </a>

                <!-- Card 4: Magic Chess -->
                <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #0f766e, #042f2e);"></div>
                        <div class="product-gradient"></div>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Magic Chess Vo...</h3>
                        <p class="product-desc">Purchase Magic Chess specific items</p>
                    </div>
                </a>

                
                <!-- Card 7: Honor of Kings -->
                <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #7f1d1d, #450a0a);"></div>
                        <div class="product-gradient"></div>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Honor of Kings</h3>
                        <p class="product-desc">Top up Honor of Kings Tokens</p>
                    </div>
                </a>
                
                 <!-- Card 8: Honkai Star Rail -->
                 <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #4338ca, #312e81);"></div>
                        <div class="product-gradient"></div>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Honkai: Star Rail</h3>
                        <p class="product-desc">Top up Oneiric Shards</p>
                    </div>
                </a>

                 <!-- Card 9: ZZZ -->
                 <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #c026d3, #701a75);"></div>
                        <div class="product-gradient"></div>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">ZZZ</h3>
                        <p class="product-desc">Top up Zenless Zone Zero Monochrome</p>
                    </div>
                </a>
                
                 <!-- Card 10: AOV -->
                 <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #1d4ed8, #1e3a8a);"></div>
                        <div class="product-gradient"></div>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">AOV</h3>
                        <p class="product-desc">Arena of Valor Vouchers</p>
                    </div>
                </a>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq">
            <div class="section-header">
                <div class="section-badge">Pertanyaan Umum</div>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Temukan jawaban untuk pertanyaan yang sering diajukan tentang layanan kami</p>
            </div>

            <div class="faq-section">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="this.parentElement.classList.toggle('active')">
                        <span class="faq-number">1</span>
                        <h3 class="faq-question">Apakah Diamonds/Chips/Item Game dari JozzsStore.com Legal?</h3>
                        <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-body">
                        <div class="faq-content">
                            Ya, semua produk digital yang kami jual 100% legal dan resmi. Kami bekerja sama dengan publisher langsung sehingga akun Anda dijamin aman.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="this.parentElement.classList.toggle('active')">
                        <span class="faq-number">2</span>
                        <h3 class="faq-question">Bagaimana Cara Top-Up Diamonds atau Beli Voucher?</h3>
                        <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-body">
                        <div class="faq-content">
                            Pilih game yang Anda inginkan, masukkan ID Pengguna Anda, pilih nominal top-up, dan selesaikan pembayaran. Item akan otomatis masuk ke akun Anda dalam hitungan detik.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="this.parentElement.classList.toggle('active')">
                        <span class="faq-number">3</span>
                        <h3 class="faq-question">Apakah Bisa Bayar Menggunakan QRIS?</h3>
                        <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-body">
                        <div class="faq-content">
                            Tentu saja! Kami menerima pembayaran melalui QRIS dari semua e-wallet dan m-banking di Indonesia. Transaksi cepat dan tanpa ribet.
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="this.parentElement.classList.toggle('active')">
                        <span class="faq-number">4</span>
                        <h3 class="faq-question">Pembayaran Berhasil, Tapi Item Belum Diterima?</h3>
                        <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-body">
                        <div class="faq-content">
                            Biasanya proses masuk memakan waktu 1-5 menit. Jika lebih dari 15 menit, silakan hubungi CS kami dengan melampirkan bukti pembayaran agar segera kami tangani.
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <div class="faq-header" onclick="this.parentElement.classList.toggle('active')">
                        <span class="faq-number">5</span>
                        <h3 class="faq-question">Mengapa Harus Beli di JozzStore.com?</h3>
                        <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-body">
                        <div class="faq-content">
                            Proses otomatis 24 jam, jaminan harga termurah, banyak pilihan metode pembayaran yang lengkap, sistem yang sangat aman dan customer service yang tanggap dan responsif.
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-box">
                <p class="contact-text">Masih punya pertanyaan?</p>
                <a href="#" class="whatsapp-btn">
                    <i class="fa-brands fa-whatsapp"></i>
                    Chat dengan Kami
                </a>
            </div>
            
            <div class="sell-voucher">
                <div class="section-badge" style="background: rgba(0,0,0,0.5); border-color: var(--primary-color);">Jual Voucher Game</div>
                <p class="sell-desc">Tukar voucher game yang tidak terpakai menjadi uang tunai. Proses cepat, aman, dan terpercaya.</p>
                <a href="#" class="login-sell-btn">Login untuk Jual Voucher</a>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer-grid">
            <div class="footer-brand">
                <a href="/" class="footer-logo logo">
                    <div class="logo-icon text-sm" style="width:30px;height:30px;">
                        <i class="fa-solid fa-gamepad"></i>
                    </div>
                    <span style="font-size: 1.1rem; font-weight: 700;">JozzsStore</span>
                </a>
                <p class="footer-desc">Platform terpercaya untuk top up game dan produk digital. Cepat, aman, dan siap melayani Anda 24/7 non-stop.</p>
            </div>
            
            <div class="footer-nav">
                <h4 class="footer-title">Navigasi</h4>
                <ul class="footer-links">
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            
            <div class="footer-contact-info">
                <h4 class="footer-title">Hubungi Kami</h4>
                <ul class="footer-links footer-contact">
                    <li><i class="fa-regular fa-envelope"></i> admin@JozzsStoregsa.com</li>
                    <li><i class="fa-solid fa-phone"></i> 085811959392</li>
                </ul>
            </div>
            
            <div class="footer-cta">
                <div class="cta-box">
                    <h4 class="cta-title">Siap top up sekarang?</h4>
                    <p class="cta-desc">Nikmati pengalaman checkout baru yang lebih cepat dan lebih jelas.</p>
                    <a href="#" class="cta-btn">Jelajahi Produk</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div>&copy; 2026 JozzsStore. All rights reserved.</div>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </footer>

<script>
    // ===================== LIVE SEARCH FUNCTIONALITY =====================
    (function() {
        const searchInput = document.getElementById('search-input');
        const searchDropdown = document.getElementById('search-dropdown');

        // Collect all game cards with their names
        const productCards = document.querySelectorAll('.product-card');

        // Build a data list from the product cards
        const games = [];
        productCards.forEach(function(card) {
            const nameEl = card.querySelector('.product-name');
            if (nameEl) {
                games.push({
                    name: nameEl.textContent.trim(),
                    element: card
                });
            }
        });

        function showDropdown(query) {
            if (!query) {
                searchDropdown.style.display = 'none';
                return;
            }

            const q = query.toLowerCase();
            const matches = games.filter(g => g.name.toLowerCase().includes(q));

            if (matches.length === 0) {
                searchDropdown.innerHTML = '<div style="padding: 14px 20px; color: #9ca3af; font-size: 0.9rem;">Game tidak ditemukan 😔</div>';
                searchDropdown.style.display = 'block';
                return;
            }

            searchDropdown.innerHTML = matches.map(function(g) {
                const imgEl = g.element.querySelector('img');
                const imgSrc = imgEl ? imgEl.src : '';
                return `<div class="search-result-item" data-name="${g.name}" style="
                    display: flex;
                    align-items: center;
                    gap: 14px;
                    padding: 12px 18px;
                    cursor: pointer;
                    border-bottom: 1px solid #272a35;
                    transition: background 0.2s;
                " onmouseover="this.style.background='rgba(250,204,21,0.08)'" onmouseout="this.style.background='transparent'">
                    ${imgSrc ? `<img src="${imgSrc}" alt="${g.name}" style="width: 40px; height: 40px; border-radius: 8px; object-fit: cover;">` : '<div style="width:40px;height:40px;border-radius:8px;background:#272a35;"></div>'}
                    <span style="font-weight: 600; font-size: 0.95rem; color: #ffffff;">${g.name}</span>
                </div>`;
            }).join('');

            searchDropdown.style.display = 'block';

            // Add click listeners to each result item
            searchDropdown.querySelectorAll('.search-result-item').forEach(function(item) {
                item.addEventListener('click', function() {
                    const name = item.dataset.name;
                    const match = games.find(g => g.name === name);
                    if (match) {
                        // Scroll to product section
                        match.element.scrollIntoView({ behavior: 'smooth', block: 'center' });

                        // Highlight the found card briefly
                        match.element.style.boxShadow = '0 0 0 2px #facc15, 0 0 30px rgba(250,204,21,0.3)';
                        setTimeout(function() {
                            match.element.style.boxShadow = '';
                        }, 2500);
                    }
                    searchInput.value = name;
                    searchDropdown.style.display = 'none';
                });
            });
        }

        searchInput.addEventListener('input', function() {
            showDropdown(this.value.trim());
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-bar')) {
                searchDropdown.style.display = 'none';
            }
        });

        // Show dropdown again when focusing on input if it has value
        searchInput.addEventListener('focus', function() {
            if (this.value.trim()) {
                showDropdown(this.value.trim());
            }
        });
    })();

    // ===================== HERO CAROUSEL LOGIC =====================
    (function() {
        const wrapper = document.getElementById('carousel-wrapper');
        const items = document.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('#carousel-dots .indicator');
        const hero = document.getElementById('hero-section');
        
        let currentIndex = 0;
        let startX = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;
        let isDragging = false;
        let animationID = 0;
        let autoPlayInterval;

        // Set initial position
        updateCarousel();

        // Auto Play
        function startAutoPlay() {
            stopAutoPlay(); // Ensure no multiple intervals
            autoPlayInterval = setInterval(() => {
                carouselMove(1);
            }, 10000); // Slowed down to 10 seconds
        }

        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }

        startAutoPlay();
        hero.addEventListener('mouseenter', stopAutoPlay);
        hero.addEventListener('mouseleave', startAutoPlay);

        // Navigation
        window.carouselMove = function(direction) {
            currentIndex += direction;
            if (currentIndex < 0) currentIndex = items.length - 1;
            if (currentIndex >= items.length) currentIndex = 0;
            updateCarousel();
        };

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateCarousel();
            });
        });

        function updateCarousel() {
            // Formula: index * -(100 / totalItems)
            // If items.length is 4, it's index * -25%
            currentTranslate = currentIndex * -(100 / items.length);
            prevTranslate = currentTranslate;
            wrapper.style.transform = `translateX(${currentTranslate}%)`;
            
            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });
        }

        // Drag / Swipe Logic
        wrapper.addEventListener('mousedown', dragStart);
        wrapper.addEventListener('touchstart', dragStart, { passive: true });
        wrapper.addEventListener('mouseup', dragEnd);
        wrapper.addEventListener('touchend', dragEnd);
        wrapper.addEventListener('mousemove', dragMove);
        wrapper.addEventListener('touchmove', dragMove, { passive: true });
        wrapper.addEventListener('mouseleave', dragEnd);

        function dragStart(e) {
            isDragging = true;
            startX = getPositionX(e);
            wrapper.classList.add('dragging');
            stopAutoPlay();
            animationID = requestAnimationFrame(animation);
        }

        // Mobile Search Toggle
        const mobileSearchBtn = document.getElementById('mobile-search-btn');
        const searchBarContainer = document.getElementById('search-bar-container');
        
        if (mobileSearchBtn) {
            mobileSearchBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                if (searchBarContainer) {
                    searchBarContainer.classList.toggle('active');
                    if (searchBarContainer.classList.contains('active')) {
                        const input = document.getElementById('search-input');
                        if (input) input.focus();
                    }
                }
            });
        }

        document.addEventListener('click', (e) => {
            if (searchBarContainer && !searchBarContainer.contains(e.target) && e.target !== mobileSearchBtn) {
                searchBarContainer.classList.remove('active');
            }
        });

        function dragMove(e) {
            if (!isDragging) return;
            const currentX = getPositionX(e);
            // diff is percentage relative to the wrapper width
            const diff = (currentX - startX) / wrapper.offsetWidth * 100;
            currentTranslate = prevTranslate + diff;
        }

        function dragEnd() {
            isDragging = false;
            cancelAnimationFrame(animationID);
            wrapper.classList.remove('dragging');
            
            const movedBy = (currentTranslate - prevTranslate) * items.length; // Rescale back for threshold check
            if (movedBy < -10) carouselMove(1);
            else if (movedBy > 10) carouselMove(-1);
            else updateCarousel();

            startAutoPlay();
        }

        function getPositionX(e) {
            return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
        }

        function animation() {
            if (isDragging) {
                wrapper.style.transform = `translateX(${currentTranslate}%)`;
                requestAnimationFrame(animation);
            }
        }
    })();
</script>

</body>
</html>
