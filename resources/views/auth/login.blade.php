<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin | Sahabat Teknisi</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- CSS Custom --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="container-fluid p-0">

        <div class="row g-0 min-vh-100">

            <!-- ========================= -->
            <!-- HERO -->
            <!-- ========================= -->

            <div class="col-lg-7 hero-section d-none d-lg-flex">

                <div class="hero-content">

                    <div>

                        <span class="badge hero-badge">
                            Dashboard Admin
                        </span>

                        <h1 class="hero-title mt-4">
                            Sahabat Teknisi
                        </h1>

                        <p class="hero-description mt-3">
                            Sistem administrasi modern untuk membantu pengelolaan layanan
                            teknisi secara cepat, mudah dan praktis.
                        </p>

                    </div>


                    <!-- Floating Feature -->

                    <div class="feature-area">

                        <div class="feature-card card-1">
                            <i class="bi bi-router-fill"></i>
                            <span>Instalasi WiFi</span>
                        </div>

                        <div class="feature-card card-2">
                            <i class="bi bi-pc-display"></i>
                            <span>Servis Komputer</span>
                        </div>

                        <div class="feature-card card-3">
                            <i class="bi bi-receipt"></i>
                            <span>Pembayaran Tagihan</span>
                        </div>

                        <div class="feature-card card-4">
                            <i class="bi bi-tools"></i>
                            <span>Maintenance</span>
                        </div>

                        <div class="feature-card card-5">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </div>

                        <div class="feature-card card-6">
                            <i class="bi bi-headset"></i>
                            <span>Customer Service</span>
                        </div>

                    </div>

                </div>

                <!-- Background Shape -->

                <div class="blob blob1"></div>
                <div class="blob blob2"></div>
                <div class="blob blob3"></div>

                <!-- Version -->

                <div class="version">
                    Sahabat Teknisi
                    <span>v1.0.0</span>
                </div>

            </div>

            <!-- ========================= -->
            <!-- LOGIN -->
            <!-- ========================= -->

            <div class="col-lg-5 login-section">

                <div class="login-wrapper">

                    <div class="login-card">

                        <div class="text-center mb-4">

                            <div class="logo-circle mb-3">

                                <i class="bi bi-person-gear"></i>

                            </div>

                            <h3 class="fw-bold mb-1">
                                Selamat Datang
                            </h3>

                            <p class="text-muted">
                                Login sebagai Administrator
                            </p>

                        </div>


                        <form method="POST" action="{{ route('login.process') }}">

                            @csrf

                            <!-- Email -->

                            <div class="mb-3">

                                <label class="form-label">

                                    Email

                                </label>

                                <div class="input-group custom-input">

                                    <span class="input-group-text">

                                        <i class="bi bi-envelope"></i>

                                    </span>

                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Masukkan email"
                                        required>

                                </div>

                                @error('email')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                                @enderror

                            </div>

                            <!-- Password -->

                            <div class="mb-3">

                                <label class="form-label">

                                    Password

                                </label>

                                <div class="input-group custom-input">

                                    <span class="input-group-text">

                                        <i class="bi bi-lock"></i>

                                    </span>

                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="Masukkan password"
                                        required>

                                    <button
                                        class="btn btn-outline-secondary"
                                        type="button"
                                        id="togglePassword">

                                        <i class="bi bi-eye"></i>

                                    </button>

                                </div>

                                @error('password')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                                @enderror

                            </div>


                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember">

                                    <label
                                        class="form-check-label"
                                        for="remember">

                                        Ingat Saya

                                    </label>

                                </div>

                            </div>


                            <button
                                class="btn btn-primary w-100 btn-login">

                                <i class="bi bi-box-arrow-in-right me-2"></i>

                                Masuk

                            </button>

                        </form>

                        <div class="login-footer">

                            © {{ date('Y') }}

                            Sahabat Teknisi

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const togglePassword = document.getElementById('togglePassword');

        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {

            const type = password.getAttribute('type') === 'password' ?
                'text' :
                'password';

            password.setAttribute('type', type);

            this.innerHTML = type === 'password' ?
                '<i class="bi bi-eye"></i>' :
                '<i class="bi bi-eye-slash"></i>';

        });
    </script>

</body>

</html>