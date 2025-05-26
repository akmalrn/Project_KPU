@yield('content')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Outfit', sans-serif;
        background-color: #f7f9fc;
        color: #333;
    }

    .container {
        padding: 40px 20px;
        max-width: 900px;
        margin: auto;
    }

    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
    }

    .fade-in.show {
        opacity: 1;
        transform: translateY(0);
    }

    .profile-card {
        background: linear-gradient(135deg, #6C63FF, #3F3D56);
          margin-top: 20px;
        color: #fff;
        border-radius: 18px;
        padding: 30px;
        margin-bottom: 32px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        background-color: #ffffff20;
        border-radius: 50%;
        font-size: 32px;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile-info h3 {
        font-weight: 700;
        margin: 0;
        font-size: 24px;
    }

    .profile-info p {
        margin: 4px 0;
        font-size: 14px;
        opacity: 0.9;
    }

    .section-title {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .leaderboard,
    .data-siswa,
    .motivasi-box {
        background-color: #fff;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 30px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.05);
    }

    .table-styled {
        width: 100%;
        border-collapse: collapse;
    }

    .table-styled th,
    .table-styled td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #eee;
        font-size: 14px;
    }

    .table-styled th {
        background-color: #fafafa;
        font-weight: 600;
    }

    .badge-rank {
        display: inline-block;
        padding: 4px 10px;
        font-size: 12px;
        font-weight: bold;
        color: white;
        border-radius: 20px;
    }

    .badge-1 { background-color: #FFD700; }
    .badge-2 { background-color: #C0C0C0; }
    .badge-3 { background-color: #CD7F32; }

    .highlight-row {
        background-color: #e3f2fd;
        font-weight: bold;
    }
    .navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 56px;
    background: #6C63FF; /* sesuaikan sama warna profile-card */
    display: flex;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    z-index: 9999;
    padding: 0 20px;
}

.navbar-container {
    display: flex;
    justify-content: space-between; /* biar item paling kiri dan kanan */
    align-items: center;
    width: 100%;
    max-width: 900px;
    margin: auto;
    color: white;
    font-weight: 600;
    font-size: 18px;
    user-select: none;
    gap: 20px; /* optional biar ada jarak antar elemen */
}


.navbar-logout-form {
    margin: 0;
}

.btn-logout {
    background-color: #ff4d4f;
    border: none;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.btn-logout:hover {
    background-color: #d9363e;
}

.btn-pdf {
    background-color: #28a745; /* hijau segar */
    color: white;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.4);
}

.btn-pdf:hover {
    background-color: #218838; /* hijau gelap pas hover */
    box-shadow: 0 6px 15px rgba(33, 136, 56, 0.6);
    text-decoration: none;
}
/* Modal background */
.modal {
    display: none; /* default hidden */
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
}

/* Modal content box */
.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px 30px;
    border-radius: 12px;
    max-width: 320px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    font-weight: 600;
    font-size: 16px;
}

/* Buttons container */
.modal-buttons {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
}

/* Tombol confirm */
.btn-confirm {
    background-color: #6C63FF;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 700;
    transition: background-color 0.3s ease;
}

.btn-confirm:hover {
    background-color: #574bff;
}

/* Tombol batal */
.btn-cancel {
    background-color: #eee;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 700;
    color: #333;
    transition: background-color 0.3s ease;
}

.btn-cancel:hover {
    background-color: #ddd;
}


</style>
