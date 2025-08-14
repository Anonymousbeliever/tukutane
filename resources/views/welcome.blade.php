<x-guest-layout>
    <style>
        :root {
            --primary: #dc2626;
            --primary-light: #ef4444;
            --primary-dark: #b91c1c;
            --secondary: #f8fafc;
            --dark: #0f172a;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--gray-900);
            overflow-x: hidden;
        }

        /* Enhanced Navigation with Better Spacing */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            padding: 2rem 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -0.05em;
            font-family: 'Inter', system-ui, sans-serif;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
        }

        .logo:hover {
            color: var(--primary-dark);
            transform: scale(1.02);
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            align-items: center;
        }

        .nav-link {
            color: var(--gray-700);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
            color: white;
            text-decoration: none;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--gray-700);
            padding: 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: var(--gray-100);
            color: var(--primary);
        }

        .mobile-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 2rem;
            right: 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            margin-top: 1rem;
            border: 1px solid var(--gray-200);
        }

        .mobile-menu.show {
            display: block;
        }

        .mobile-menu .nav-link,
        .mobile-menu .btn-primary {
            display: block;
            margin-bottom: 1rem;
            text-align: center;
            padding: 0.75rem;
        }

        .mobile-menu .nav-link {
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        .mobile-menu .nav-link:hover {
            background: var(--gray-50);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10rem 2rem 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="grad1" cx="50%" cy="50%" r="50%"><stop offset="0%" style="stop-color:rgba(255,255,255,0.1);stop-opacity:1" /><stop offset="100%" style="stop-color:rgba(255,255,255,0);stop-opacity:1" /></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23grad1)" /><circle cx="800" cy="300" r="150" fill="url(%23grad1)" /><circle cx="400" cy="700" r="120" fill="url(%23grad1)" /></svg>');
            opacity: 0.3;
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 10;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -0.025em;
        }

        .hero p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            background: white;
            color: var(--primary);
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-3px);
        }

        /* About Section */
        .about {
            padding: 8rem 2rem;
            background: var(--gray-50);
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 1.5rem;
            letter-spacing: -0.025em;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
        }

        /* Enhanced Cards */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .feature-card {
            background: white;
            padding: 3rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--gray-200);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3);
        }

        .feature-icon svg {
            width: 40px;
            height: 40px;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: var(--gray-600);
            line-height: 1.7;
            font-size: 1.1rem;
        }

        /* Events Section */
        .events {
            padding: 8rem 2rem;
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
            color: white;
        }

        .events-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .events .section-title {
            color: white;
        }

        .events .section-subtitle {
            color: var(--gray-300);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .event-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.1);
        }

        .event-date {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .event-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .event-location {
            color: var(--gray-400);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .event-card p {
            color: var(--gray-300);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .event-link {
            color: var(--primary-light);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s ease;
        }

        .event-link:hover {
            gap: 1rem;
        }

        /* CTA Section */
        .cta {
            padding: 8rem 2rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta h2 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            letter-spacing: -0.025em;
        }

        .cta p {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            line-height: 1.7;
        }

        .btn-cta {
            background: white;
            color: var(--primary);
            padding: 1.2rem 3rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        /* Enhanced Footer */
        .footer {
            background: var(--gray-900);
            color: var(--gray-300);
            padding: 4rem 2rem 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1rem;
        }

        .footer-brand p {
            line-height: 1.7;
            color: var(--gray-400);
        }

        .footer-links h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: var(--gray-400);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-light);
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-800);
            padding-top: 2rem;
            text-align: center;
            color: var(--gray-500);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 2rem;
            }

            .logo {
                font-size: 2rem;
                letter-spacing: -0.025em;
            }

            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero {
                padding: 8rem 2rem 4rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .features-grid,
            .events-grid {
                grid-template-columns: 1fr;
            }

            .cta h2 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 1.5rem;
            }

            .logo {
                font-size: 1.75rem;
            }

            .navbar {
                padding: 1.5rem 0;
            }

            .mobile-menu {
                left: 1rem;
                right: 1rem;
                padding: 1.5rem;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-card,
        .event-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .feature-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .feature-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        /* Navbar scroll effect */
        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
            padding: 1rem 0 !important;
        }

        .navbar.scrolled .logo {
            font-size: 2rem;
        }
    </style>

    <!-- Enhanced Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo">Tukutane</a>
            <div class="nav-links">
                <a href="#about" class="nav-link">About</a>
                <a href="#events" class="nav-link">Events</a>
                <a href="#contact" class="nav-link">Contact</a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-primary">Dashboard</a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn-primary">Get Started</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endauth
            </div>
            <!-- Mobile menu button -->
            <button class="mobile-menu-btn" id="mobile-menu-btn">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile menu -->
        <div class="mobile-menu" id="mobile-menu">
            <a href="#about" class="nav-link">About</a>
            <a href="#events" class="nav-link">Events</a>
            <a href="#contact" class="nav-link">Contact</a>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-primary">Dashboard</a>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn-primary">Get Started</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endif
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Your Network, Your Power</h1>
            <p>Connect with fellow graduates, discover exciting events, and empower your professional journey with Tukutane - the premier alumni network for IST.</p>
            <div class="hero-buttons">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-hero-primary">Go to Dashboard</a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn-hero-primary">Get Started</a>
                    @endif
                @endauth
                <a href="#events" class="btn-hero-secondary">Explore Events</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="about-container">
            <h2 class="section-title">About Tukutane</h2>
            <p class="section-subtitle">Tukutane is the premier alumni management system for the Institute of Software Technologies (IST), designed to foster lasting connections and professional growth among graduates.</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3>Alumni Profiles</h3>
                    <p>Create and manage your professional profile, showcasing your achievements and connecting with peers across the industry.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3>Events & Networking</h3>
                    <p>Stay updated on exclusive alumni events, workshops, and networking opportunities designed to advance your career.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10m-9 4h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3>Secure Payments</h3>
                    <p>Easily make payments for events or donations through our integrated M-Pesa Daraja payment system.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="events">
        <div class="events-container">
            <h2 class="section-title">Featured Events</h2>
            <p class="section-subtitle">Join our upcoming events and connect with fellow alumni from around the world.</p>
            
            <div class="events-grid">
                <div class="event-card">
                    <div class="event-date">December 15, 2025</div>
                    <h3>Annual Alumni Gala</h3>
                    <div class="event-location">Grand Hyatt Nairobi</div>
                    <p>Join us for an evening of celebration, networking, and fine dining. Reconnect with old friends and make new connections.</p>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="event-link">
                            Learn More & RSVP
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="event-link">
                            Learn More & RSVP
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endauth
                </div>

                <div class="event-card">
                    <div class="event-date">November 20, 2025</div>
                    <h3>Tech Innovation Summit</h3>
                    <div class="event-location">IST Auditorium</div>
                    <p>A day of insightful talks and workshops on the latest trends in software technology. Featuring industry leaders and alumni experts.</p>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="event-link">
                            Learn More & RSVP
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="event-link">
                            Learn More & RSVP
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endauth
                </div>

                <div class="event-card">
                    <div class="event-date">October 28, 2025</div>
                    <h3>Career Mentorship Session</h3>
                    <div class="event-location">Online Event</div>
                    <p>Get personalized career advice from experienced alumni in various fields. A great opportunity for recent graduates.</p>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="event-link">
                            Learn More & RSVP
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="event-link">
                            Learn More & RSVP
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 3rem;">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-hero-primary">View All Events</a>
                @else
                    <a href="{{ route('login') }}" class="btn-hero-primary">View All Events</a>
                @endauth
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-container">
            <h2>Ready to Connect?</h2>
            <p>Join the Tukutane alumni network today and unlock a world of opportunities, connections, and professional growth.</p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-cta">Register Now</a>
            @else
                <a href="{{ route('login') }}" class="btn-cta">Get Started</a>
            @endif
        </div>
    </section>

    <!-- Enhanced Footer -->
    <footer id="contact" class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3>Tukutane</h3>
                    <p>Connecting IST graduates and empowering futures through professional networking, continuous learning, and meaningful relationships.</p>
                </div>
                
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#events">Events</a></li>
                        <li><a href="#">Alumni Directory</a></li>
                        <li><a href="#">Career Resources</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h4>Account</h4>
                    <ul>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        @endif
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h4>Contact Us</h4>
                    <ul>
                        <li>Email: info@tukutane.com</li>
                        <li>Phone: +254 706 128 329</li>
                        <li>Address: Institute of Software Technologies</li>
                        <li>Nairobi, Kenya</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Tukutane. All rights reserved. Built with love for IST Alumni.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('show');
                });
                
                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.remove('show');
                    }
                });

                // Close mobile menu when clicking on a link
                const mobileMenuLinks = mobileMenu.querySelectorAll('a');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.remove('show');
                    });
                });
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</x-guest-layout>