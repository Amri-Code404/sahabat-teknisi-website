<aside class="sidebar">

    <div class="sidebar-brand">
        <img src="{{ asset('images/logo-brand.png') }}" alt="Logo Sahabat Teknisi" class="me-2" style="height: 60px; width: auto; object-fit: contain;">
        <span>Sahabat Teknisi</span>
    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('teknisi.index') }}">
                <i class="bi bi-person-gear"></i>
                Teknisi
            </a>
        </li>

        <li>
            <a href="{{ route('pelanggan.index') }}">
                <i class="bi bi-people"></i>
                Pelanggan
            </a>
        </li>

        <li>
            <a href="{{ route('servis.index') }}">
                <i class="bi bi-pc-display"></i>
                Layanan Aplikasi
            </a>
        </li>

        <li>
            <a href="{{ route('pembayaran.index') }}">
                <i class="bi bi-receipt"></i>
                Pembayaran
            </a>
        </li>

        <li>
            <a href="{{ route('laporan.index') }}">
                <i class="bi bi-file-earmark-text"></i>
                Laporan
            </a>
        </li>

    </ul>

</aside>