<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMK Wikrama</title>
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/login.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/wikrama.png') }}" type="image/x-icon">
</head>

<body>
    <div class="login-container">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Left Side - Logo and Info -->
                <div class="col-lg-6 d-none d-lg-flex left-side">
                    <div class="d-flex flex-column justify-content-center align-items-center text-center p-5">
                        <div class="logo-container mb-4">
                            <div class="logo-circle">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                        </div>
                        <h2 class="text-white mb-3">SMK Wikrama Garut</h2>
                        <p class="text-white-50 lead">
                            Sekolah Menengah Kejuruan yang menghasilkan lulusan berkualitas dan siap kerja
                        </p>
                        <div class="features mt-4">
                            <div class="feature-item">
                                <i class="fas fa-check-circle me-2"></i>
                                <span>Pembelajaran Modern</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle me-2"></i>
                                <span>Fasilitas Lengkap</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle me-2"></i>
                                <span>Tenaga Pengajar Profesional</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="col-lg-6 col-12 right-side">
                    <div class="d-flex flex-column justify-content-center h-100 p-4 p-lg-5">
                        <div class="login-form-container">
                            <!-- Mobile Logo -->
                            <div class="d-lg-none text-center mb-4">
                                <div class="logo-circle-small mx-auto mb-3">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h4 class="text-wikrama-blue">SMK Wikrama Garut</h4>
                            </div>

                            <div class="text-center text-lg-start mb-4">
                                <h3 class="fw-bold text-wikrama-blue mb-2">Selamat Datang!</h3>
                                <p class="text-muted">Silakan masuk ke akun Anda</p>
                            </div>

                            <form id="loginForm" novalidate action="{{ route('login.siswa') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="id" class="form-label">NIS</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="id" name="id"
                                            required>
                                        <div class="invalid-feedback">
                                            Silakan masukkan NIS yang valid.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <div class="invalid-feedback">
                                            Password harus diisi.
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-wikrama w-100 mb-3" id="loginBtn">
                                    <span class="btn-text">Masuk</span>
                                    <span class="btn-loading d-none">
                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                        Memproses...
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/login.js') }}"></script>
</body>

</html>
