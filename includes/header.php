<!-- Menandakan bahwa ini adalah dokumen HTML5 -->
<!DOCTYPE html>

<!-- Tag utama pembungkus seluruh halaman, dengan bahasa Indonesia -->
<html lang="id">

<head>
    <!-- Mengatur karakter huruf agar teks tampil dengan benar -->
    <meta charset="UTF-8" />

    <!-- Judul halaman yang tampil di tab browser -->
    <title>Niki Mart</title>

    <!-- Bagian untuk menulis gaya (CSS) -->
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Jost:ital,wght@0,100..900;1,100..900&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #ffff;
    }

    nav {
        background: #001BB7;    
        padding: 20px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    nav ul {
        list-style: square;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: center;
       
    }

    nav ul li {
        display: inline;
         border: 1px solid white;
         padding: 10px 10px;
         border-radius: 20px;
    }

    nav ul li a {
        font-family: "Josefin Sans", sans-serif;
        color: #ffffff;
        text-decoration: none;
        font-weight: bold;
    }

    nav ul li:hover a{
        color: #B6F500;
        transition: 0.3s;
    }

    .logo {
        height: 4em;
        margin-left: 20px;
    }

    .logo img{
        height: 100%;
    }

    .btn-contact {
        margin-right: 20px;
    }

    .btn-contact button {
        background-color: transparent;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: bold;
        border: 1px solid white;
        transition: 0.3s;
    }

    .btn-contact button:hover {
        color: #B6F500;
    }
    </style>
</head>

<body>
    <!-- Bagian header (bagian atas halaman) -->
    <header>

        <!-- Navigasi menu utama -->
        <nav>
            <div class="logo">
                <img src="/Niki Mart/asset/img/nikimart.png" alt="Logo Niki Mart">
            </div>
            <!-- Daftar menu navigasi -->
            <ul>
                <!-- Setiap item menu -->
                <li><a href="/niki mart/pages/dashboard.php">Dashboard</a></li>
                <li><a href="/niki mart/pages/cashiers/list.php">Kasir</a></li>
                <li><a href="/niki mart/pages/products/list.php">Produk</a></li>
                <li><a href="/niki mart/pages/transactions/list.php">Transaksi</a></li>
            </ul>
            <div class="btn-contact">
                <button>
                    <a href="https://wa.me/6289605948383" style="color: white; text-decoration: none;">Contact</a>
                </button>
            </div>
        </nav>
    </header>

    <!-- Bagian utama halaman, tempat isi konten ditampilkan -->
    <main>


        <!-- 
    💡 Penjelasan ringkas struktur HTML-nya:
	•	<!DOCTYPE html> → Menentukan dokumen ini memakai standar HTML5.
	•	<html lang="id"> → Bahasa halaman adalah bahasa Indonesia.
	•	<head> → Bagian kepala, berisi pengaturan halaman (judul, karakter, style).
	•	<body> → Bagian isi tampilan halaman.
	•	<header> → Bagian atas, biasanya berisi judul dan menu navigasi.
	•	<nav> → Area navigasi untuk berpindah ke halaman lain.
	•	<ul> dan <li> → Menyusun daftar menu.
	•	<main> → Area utama yang nanti berisi konten dari halaman lain. 
    -->