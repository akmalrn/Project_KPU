<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gate Admin KPU</title>
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/wikrama/favicon-96x96.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">
   <link rel="shortcut icon" href="{{ asset('assets/images/wikrama.png') }}" type="image/x-icon">
    <style>
        body {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            font-family: 'Inter', sans-serif;
            animation: fadeInBody 1s ease-in;
        }

        @keyframes fadeInBody {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .card {
            border: none;
            border-radius: 16px;
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control:focus {
            border-color: #4e54c8;
            box-shadow: 0 0 0 0.2rem rgba(78, 84, 200, 0.25);
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #4e54c8;
            border-color: #4e54c8;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3b40aa;
            border-color: #3b40aa;
            transform: scale(1.02);
        }

        .login-illustration {
            max-width: 120px;
            margin-bottom: 20px;
            animation: float 2.5s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .card-title {
            font-weight: 600;
        }

        .alert-danger {
            animation: shake 0.4s ease-in-out;
        }

        .shake {
            animation: shake 0.4s ease-in-out;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-6px);
            }

            50% {
                transform: translateX(6px);
            }

            75% {
                transform: translateX(-4px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-4" style="max-width: 420px; width: 100%; background-color: #fff;">
            <div class="text-center">
                <img src="{{ asset('assets/images/wikrama.png') }}" alt="Login" class="login-illustration">
                <h3 class="card-title mb-3">Selamat Datang Admin</h3>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">Silakan masuk untuk mengakses dashboard KPU.</p>
            </div>

            <!-- ALERT ERROR -->
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="loginForm" action="{{ route('login.admin') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="admin@kpu.go.id">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Ingat saya</label>
                </div>
                <button type="submit" id="submitBtn" class="btn btn-primary w-100">Masuk</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <script>
        const form = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        // Posisi awal tombol (anggap 0,0)
        const originalTransform = 'translate(0, 0)';

        // Fungsi buat tombol kabur secara random
        function runAway() {
            const directions = [{
                    x: 100,
                    y: 0
                },
                {
                    x: -100,
                    y: 0
                },
                {
                    x: 0,
                    y: -100
                },
                {
                    x: 0,
                    y: 100
                },
                {
                    x: 80,
                    y: 80
                },
                {
                    x: -80,
                    y: 80
                },
                {
                    x: 80,
                    y: -80
                }, {
                    x: -80,
                    y: -80
                }
            ];
            const random = directions[Math.floor(Math.random() * directions.length)];
            submitBtn.style.transition = 'transform 0.3s ease';
            submitBtn.style.transform = `translate(${random.x}px, ${random.y}px)`;
        }

        // Pas input diubah, tombol balik ke tempat semula dengan smooth
        [emailInput, passwordInput].forEach(input => {
            input.addEventListener('input', () => {
                submitBtn.style.transition = 'transform 0.3s ease';
                submitBtn.style.transform = originalTransform;
                // Hilangkan error style juga kalau mau
                emailInput.classList.remove('is-invalid');
                passwordInput.classList.remove('is-invalid');
            });
        });

        form.addEventListener('submit', function(e) {
            const email = emailInput.value.trim();
            const password = passwordInput.value.trim();

            emailInput.classList.remove('is-invalid');
            passwordInput.classList.remove('is-invalid');

            if (!email || !password) {
                e.preventDefault();

                // Tambah style error di input
                if (!email) emailInput.classList.add('is-invalid');
                if (!password) passwordInput.classList.add('is-invalid');

                runAway();

                // Fokus ke input kosong pertama
                if (!email) {
                    emailInput.focus();
                } else {
                    passwordInput.focus();
                }
            }
        });
    </script>
</body>

</html>
