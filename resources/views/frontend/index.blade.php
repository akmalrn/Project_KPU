@extends('frontend.layouts.app')

@section('content')

<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="modal">
  <div class="modal-content">
    <p>Yakin mau keluar?</p>
    <div class="modal-buttons">
      <button id="confirmLogout" class="btn-confirm">Iya, Keluar</button>
      <button id="cancelLogout" class="btn-cancel">Batal</button>
    </div>
  </div>
</div>
<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-name">
            {{ $siswa[0]->nama ?? 'User' }}
        </div>
        <form action="{{ route('logout.siswa') }}" method="POST" class="navbar-logout-form">
            @csrf
           <button type="button" id="btnLogout" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>

<div class="container">

    {{-- Card Profile --}}
    <div class="profile-card fade-in" id="card-profile">
        <div class="profile-avatar">
            {{ strtoupper(substr($siswa[0]->nama, 0, 2)) }}
        </div>
        <div class="profile-info">
            <h3>{{ $siswa[0]->nama }}</h3>
            <p>NIS: {{ $siswa[0]->id }}</p>
            <p>Kelas: {{ $siswa[0]->kelas }}</p>
            <p>Tipe: {{ $siswa[0]->tipe }}</p>
            <p>Total Poin: <strong>{{ $siswa[0]->total_poin ?? 0 }}</strong></p>
           <a href="{{ route('siswa.download.pdf') }}" class="btn-pdf mt-2" target="_blank">
    Download PDF
</a>



        </div>
    </div>

    {{-- Motivasi --}}
    @php
        $motivasi = '';
        if ($siswa[0]->total_poin == 0) {
            $motivasi = 'Kamu belum memiliki poin. Ayo mulai kumpulkan dari sekarang, jangan ketinggalan!';
        } elseif ($posisi > 10) {
            $motivasi = 'Perjalanan masih panjang, tetap semangat kumpulkan poin dan kejar posisi teratas!';
        } elseif ($posisi > 5) {
            $motivasi = 'Kamu sudah masuk 10 besar! Terus konsisten biar bisa naik ke posisi yang lebih tinggi.';
        } elseif ($posisi > 3) {
            $motivasi = 'Hebat! Kamu berada di 5 besar! Sedikit lagi menuju puncak!';
        } elseif ($posisi == 3) {
            $motivasi = 'Keren! Kamu ada di peringkat 3. Jaga momentum dan jangan lengah!';
        } elseif ($posisi == 2) {
            $motivasi = 'Luar biasa! Peringkat 2 adalah pencapaian besar, satu langkah lagi ke posisi puncak!';
        } elseif ($posisi == 1) {
            $motivasi = 'Kamu berada di posisi TERATAS! Pertahankan prestasi kamu dan jadi inspirasi buat yang lain!';
        }
    @endphp

    <div class="motivasi-box fade-in" id="motivasi-box">
        <p style="margin-bottom: 0;">{{ $motivasi }}</p>
    </div>

    {{-- Leaderboard --}}
    <div class="leaderboard fade-in" id="leaderboard">
        <div class="section-title">Top 3 Siswa Berprestasi</div>
        <table class="table-styled">
            <thead>
                <tr>
                    <th>Posisi</th>
                    <th>Nama</th>
                    <th>Total Poin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scoreboard as $i => $top)
                <tr @if($top->id == $siswa[0]->id) class="highlight-row" @endif>
                    <td>
                        <span class="badge-rank badge-{{ $i+1 }}">
                            {{ $i + 1 }}
                        </span>
                    </td>
                    <td>{{ $top->nama }}</td>
                    <td>{{ $top->total_poin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="mt-3">Posisi Kamu Saat Ini: <strong>#{{ $posisi }}</strong></p>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(() => {
            document.getElementById('card-profile').classList.add('show');
        }, 100);
        setTimeout(() => {
            document.getElementById('motivasi-box').classList.add('show');
        }, 300);
        setTimeout(() => {
            document.getElementById('leaderboard').classList.add('show');
        }, 500);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fade in effects lo tadi tetep jalan
        setTimeout(() => {
            document.getElementById('card-profile').classList.add('show');
        }, 100);
        setTimeout(() => {
            document.getElementById('motivasi-box').classList.add('show');
        }, 300);
        setTimeout(() => {
            document.getElementById('leaderboard').classList.add('show');
        }, 500);

        // Modal logout
        const logoutBtn = document.getElementById('btnLogout');
        const modal = document.getElementById('logoutModal');
        const confirmBtn = document.getElementById('confirmLogout');
        const cancelBtn = document.getElementById('cancelLogout');
        const logoutForm = document.querySelector('.navbar-logout-form');

        logoutBtn.addEventListener('click', () => {
            modal.style.display = 'block'; // buka modal
        });

        cancelBtn.addEventListener('click', () => {
            modal.style.display = 'none'; // tutup modal kalau batal
        });

        confirmBtn.addEventListener('click', () => {
            logoutForm.submit(); // submit form logout kalau yakin
        });

        // Klik di luar modal juga tutup modal
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>

@endsection
