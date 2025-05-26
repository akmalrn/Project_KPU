<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gate Admin KPU</title>
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/wikrama/favicon-96x96.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">

    <style>
        :root {
            --primary-color: #4e54c8;
            --secondary-color: #00adfd;
            --accent-color: #6a5acd;
            --light-bg: #f8f9fa;
            --dark-text: #343a40;
            --light-text: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            color: var(--dark-text);
        }

        .login-card {
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            background: white;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .welcome-section {
            flex: 1 1 50%;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .welcome-section::after {
            content: "";
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .welcome-section h1 {
            font-weight: 700;
            font-size: 2.25rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .welcome-section p {
            font-size: 1rem;
            line-height: 1.7;
            opacity: 0.9;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .features-list li {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }

        .features-list i {
            margin-right: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .login-section {
            flex: 1 1 50%;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
            position: relative;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            height: 80px;
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .login-section h3 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
            color: var(--primary-color);
            font-size: 1.75rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-text);
            margin-bottom: 0.5rem;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(106, 90, 205, 0.15);
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--light-text);
        }

        .btn-login {
            background-color: var(--primary-color);
            border: none;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .alert {
            border-radius: 0.5rem;
            font-size: 0.9rem;
            padding: 0.75rem 1rem;
        }

        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--light-text);
            font-size: 0.85rem;
        }

        @media (max-width: 992px) {
            .login-card {
                flex-direction: column;
                max-width: 600px;
            }
            
            .welcome-section, 
            .login-section {
                flex: unset;
                padding: 2.5rem;
            }
            
            .welcome-section h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .welcome-section, 
            .login-section {
                padding: 2rem 1.5rem;
            }
            
            .welcome-section h1 {
                font-size: 1.75rem;
            }
            
            .login-section h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="welcome-section">
            <h1>Portal Admin KPU</h1>
            <p>
                <strong>Kejar Prestasi Unggul</strong> - Sistem manajemen terpadu untuk pengelolaan data siswa, 
                pembimbing, dan pencapaian prestasi di lingkungan sekolah/madrasah.
            </p>
            
            <ul class="features-list">
                <li><i class="fas fa-check-circle"></i> Dashboard monitoring prestasi siswa</li>
                <li><i class="fas fa-check-circle"></i> Manajemen data pembimbing</li>
                <li><i class="fas fa-check-circle"></i> Pelacakan perkembangan akademik</li>
                <li><i class="fas fa-check-circle"></i> Sistem pelaporan terintegrasi</li>
            </ul>
        </div>
        
        <div class="login-section">
            <div class="logo-container">
                <img src="{{ asset('assets/images/wikrama.png') }}" alt="Logo KPU" class="logo" />
            </div>
            
            <h3>Masuk Sebagai Admin</h3>

            <!-- Alert Error -->
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="loginForm" action="{{ route('login.admin') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Admin Sekolah</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="admin@sekolahkpu.sch.id" required />
                    <div class="invalid-feedback">Harap masukkan alamat email yang valid</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="password-container">
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required />
                        <span class="password-toggle" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    <div class="invalid-feedback">Harap masukkan kata sandi</div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember" />
                    <label class="form-check-label" for="rememberMe">Ingat perangkat ini</label>
                </div>

                <button type="submit" class="btn btn-login w-100 mb-3">
                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                </button>
                
                <div class="text-center mb-3">
                    <a href="#" class="text-decoration-none" style="color: var(--primary-color);">Lupa kata sandi?</a>
                </div>
            </form>
            
            <div class="footer-text">
                &copy; 2023 KPU - Kejar Prestasi Unggul. Hak Cipta Dilindungi.
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Form validation
        const form = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        
        // Password toggle
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>';
        });
        
        // Form validation
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Email validation
            if (!emailInput.value.trim() || !/^\S+@\S+\.\S+$/.test(emailInput.value)) {
                emailInput.classList.add('is-invalid');
                isValid = false;
            } else {
                emailInput.classList.remove('is-invalid');
            }
            
            // Password validation
            if (!passwordInput.value.trim()) {
                passwordInput.classList.add('is-invalid');
                isValid = false;
            } else {
                passwordInput.classList.remove('is-invalid');
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
        
        // Remove validation on input
        [emailInput, passwordInput].forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('is-invalid');
            });
        });
    </script>
</body>

</html>