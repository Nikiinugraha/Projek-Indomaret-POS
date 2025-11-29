<Style>
            @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Jost:ital,wght@0,100..900;1,100..900&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    table {
        border-collapse: collapse;
        width: 50%;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #B6F500;
        color: white;
        font-weight: bold;
        color: black;
    }

    td {
        border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</Style>

<?php
// Menentukan lokasi utama proyek (folder 'indomaret_RPL4' di dalam server web)
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . '/niki mart');

// Menghubungkan ke file konfigurasi database
include ROOTPATH . "/config/config.php";

// Memanggil file header agar bagian atas halaman (judul/menu) tampil
include ROOTPATH . "/includes/header.php";

// Mengambil semua data cashier dari tabel 'kasir' di database
$result = mysqli_query($conn, "SELECT * FROM cashier");
?>

<!-- Menengahkan seluruh isi halaman -->
<center>

    <!-- Judul halaman -->
    <h2>Cashier List</h2>

    <!-- Tombol menuju halaman tambah kasir -->
    <a href="add.php">Add Cashier</a><br><br>

    <!-- Tabel untuk menampilkan daftar kasir -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <!-- Header kolom tabel -->
                <th>No</th>
                <th>Name Cashier</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            // Inisialisasi nomor urut
            $no = 1;

            // Menampilkan setiap baris data cashier dari hasil query
            while ($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <!-- Menampilkan nomor urut -->
                <td><?= $no++?></td>

                <!-- Menampilkan nama cashier (dilindungi dari karakter berbahaya dengan htmlspecialchars) -->
                <td><?= htmlspecialchars($row['name']) ?></td>

                <!-- Tombol untuk mengedit data cashier -->
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                </td>

                <!-- Tombol untuk menghapus data cashier -->
                <td>
                    <?php
                    // Mengecek apakah cashier ini sudah digunakan di tabel transaksi
                    $id_cashier = $row['id'];
                    $cek = mysqli_query($conn, "SELECT id_cashier FROM transactions WHERE id_cashier = '$id_cashier'");

                    // Jika cashier masih digunakan di transaksi, tombol hapus dinonaktifkan
                    if(mysqli_num_rows($cek) > 0){
                    ?>
                    <input type="button" value="delete" disabled>

                    <?php
                    // Jika tidak digunakan, tampilkan tombol hapus aktif
                    }else{
                    ?>
                    <!-- Form untuk menghapus data cashier -->
                    <!-- Mengirim data ke file cashiers_process.php -->
                    <form action="/niki mart/process/cashiers_process.php" method="post"
                        onsubmit="return confirm('Are you sure you want to delete?')">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit">Delete</button>
                    </form>
                    <?php
                    }
                    ?>
                </td>
            </tr>

            <?php } // akhir while ?>
        </tbody>
    </table>
</center>

<?php
// Menampilkan bagian footer (bagian bawah halaman)
include "../../includes/footer.php";
?>

<!-- 
💡 Ringkasan Fungsi Kode
	1.	Bagian PHP atas
        🔹 Menentukan path utama proyek, menyambung ke database, dan memanggil header.
        🔹 Mengambil semua data dari tabel cashier.
	2.	Bagian HTML (tabel cashier)
        🔹 Menampilkan daftar cashier dalam tabel.
        🔹 Setiap baris memiliki tombol Edit dan Delete.
        🔹 Tombol Delete otomatis dinonaktifkan jika cashier masih digunakan dalam tabel transaksi.
	3.	Bagian PHP bawah
        🔹 Menyertakan file footer.php untuk menampilkan bagian bawah halaman.

Dengan kata lain, halaman ini berfungsi untuk menampilkan daftar semua cashier, menyediakan tombol edit, dan menghapus cashier dengan pengecekan keamanan data (tidak bisa dihapus jika sudah dipakai di transaksi). 
-->
