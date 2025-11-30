<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Jost:ital,wght@0,100..900;1,100..900&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body {
    font-family: 'Poppins', 'Josefin Sans', Arial, sans-serif;
    background: #001BB7 !important;
    margin: 0;
    padding: 0;
}

.judul-transactions {
    color: #ffffff;
    font-weight: 800;
    letter-spacing: 1px;
}

.judul-history {
    color: #B6F500;
    font-weight: 800;
    letter-spacing: 1px;
}

center {
    display: flex;
    flex-direction: column;
    align-items: center;
}

h2 {
    font-size: xx-large;
    color: #fff;
    margin-bottom: 24px;
    letter-spacing: 1px;
    font-weight: 800;
}

table {
    border-collapse: separate;
    border-spacing: 0;
    width: 80%;
    margin: 20px 0;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 16px 0 rgba(0,0,0,0.08);
    overflow: hidden;
    font-size: 1rem;
    border: none;
}

th, td {
    padding: 14px 18px;
    text-align: left;
    font-size: 1rem;
    border: none;
}

th {
    background: #B6F500;
    color: #001BB7;
    font-weight: 700;
    letter-spacing: 0.5px;
}

td {
    border-bottom: 1px solid #eef2f4;
    color: #222;
}

tr:last-child td {
    border-bottom: none;
}

tr:hover {
    background: #f5fbe7;
    transition: background 0.2s;
}

tr:nth-child(even) {
    background-color: #f7f9f8;
}

a, button, input[type="button"] {
    font-family: inherit;
    font-size: 0.9rem;
    border: none;
    border-radius: 6px;
    padding: 7px 14px;
    cursor: pointer;
    transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    margin: 0 2px;
    text-decoration: none;
    display: inline-block;
}

a[href*="edit"] {
    background: #ffe066;
    color: #4b5e00;
    border: 1px solid #ffe066;
    box-shadow: 0 1px 4px 0 rgba(255,224,102,0.15);
}

a[href*="add"] {
    background: #B6F500;
    color: black;
    border: 1px solid #B6F500;
    border-radius: 8px;
    font-weight: 600;
    box-shadow: 0 1px 4px 0 rgba(74,222,128,0.12);
    padding: 10px 26px;
    margin-bottom: 10px;
    transition: background 0.2s, color 0.2s;
    display: inline-block;
}

a[href*="details"] {
    background: #03a9f4;
    color: white;
    border: 1px solid #03a9f4;
    box-shadow: 0 1px 4px 0 rgba(3,169,244,0.15);
}

a[href*="add"]:hover {
    background: #B6F500;
    color: #065f46;
    border: 1px solid #B6F500;
}

a[href*="edit"]:hover {
    background: #ffd60a;
    color: #000000;
    border: 1px solid #ffd60a;
}

a[href*="details"]:hover {
    background: #0288d1;
    color: white;
    border: 1px solid #0288d1;
}

button[type="submit"], input[type="submit"] {
    background:  #ff2424c6;
    color: #ffffff;
    border: 1px solid #B6F500;
    box-shadow: 0 1px 4px 0 rgba(182,245,0,0.08);
}

button[type="submit"]:hover, input[type="submit"]:hover {
    background: #d92100;
    color: #fff;
}

input[type="button"][disabled], button[disabled] {
    background: #e0e0e0;
    color: #aaa;
    cursor: not-allowed;
    border: 1px solid #ccc;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.85em;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.completed {
    background: #d4edda;
    color: #155724;
}

.status-badge.pending {
    background: #fff3cd;
    color: #856404;
}

.revenue-row {
    background: #f8f9fa !important;
    font-weight: bold;
}

.revenue-row td {
    border-bottom: none;
    color: #28a745;
}

@media (max-width: 800px) {
    table { width: 98%; font-size: 0.95rem; }
    th, td { padding: 10px 6px; }
    a, button, input[type="button"] { font-size: 0.8rem; padding: 6px 10px; }
}
</style>

<?php
// Mendefinisikan konstanta ROOTPATH yang menunjuk ke folder utama proyek
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . '/niki mart');

// Mengimpor file konfigurasi database (berisi koneksi ke MySQL)
include ROOTPATH . "/config/config.php";

// Mengimpor file header (biasanya berisi HTML awal atau menu navigasi)
include ROOTPATH . "/includes/header.php";
?>
<br>

<!-- Bagian tampilan halaman utama -->
<center>

    <h2><span class="judul-transactions">Transactions</span> <span class="judul-history">History</span></h2>
    <!-- Tombol untuk menambah transaksi baru -->
    <a href="add.php">➕ Add transaksi</a><br><br>

    <!-- Tabel utama untuk menampilkan daftar transaksi -->
    <table border="1" cellpadding="20" cellspacing="0">
        <tr>
            <th>No</th> <!-- Nomor urut -->
            <th>Date</th> <!-- Tanggal transaksi -->
            <th>Transaction Code</th> <!-- Kode unik transaksi -->
            <th>Id Cashier</th> <!-- Nama kasir yang menangani -->
            <th>Total</th> <!-- Total harga transaksi -->
            <th colspan="3">Action</th> <!-- Kolom aksi (lihat, edit, hapus) -->
        </tr>

        <?php
        // Inisialisasi nomor urut
        $no = 1;

        // Menjalankan query untuk mengambil transaksi yang sudah selesai beserta data kasir terkait
        $query = mysqli_query($conn, "SELECT *, transactions.id AS id_transactions FROM transactions JOIN cashier ON transactions.id_cashier = cashier.id WHERE transactions.status = 'completed'");

        // Melakukan perulangan untuk menampilkan setiap baris data transaksi
        while($transactions = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <!-- Menampilkan nomor urut -->
            <td><?= $no++ ?></td>

            <!-- Menampilkan tanggal transaksi -->
            <td><?=$transactions['date']?></td>

            <!-- Menampilkan kode transaksi -->
            <td><?=$transactions['code']?></td>

            <!-- Menampilkan nama kasir -->
            <td><?=$transactions['name']?></td>

            <!-- Menampilkan total harga transaksi -->
            <td>Rp <?= number_format($transactions['total'], 0, ',', '.') ?></td>

            <!-- Tombol untuk melihat detail transaksi -->
            <td>
                <a href="transaction_details.php?id=<?= $transactions['id_transactions'] ?>">Details</a>
            </td>

            <!-- Tombol untuk mengedit data transaksi -->
            <td>
                <a href="edit.php?id=<?=$transactions['id']?>">✏️ Edit</a>
            </td>

            <!-- Tombol untuk menghapus transaksi -->
            <td>
                <?php
                // Mengecek apakah transaksi ini memiliki detail produk (relasi ke detail_transaksi)
                $id_product = $transactions['id'];
                $check = mysqli_query($conn, "SELECT id_transactions FROM transaction_details WHERE id_transactions = '$id_product'");

                // Jika transaksi sudah punya detail produk, maka tidak boleh dihapus
                if(mysqli_num_rows($check) > 0){
                ?>
                <!-- Tombol delete dinonaktifkan jika ada detail transaksi -->
                <input type="button" value="delete" disabled>
                <?php
                }else{
                ?>
                <!-- Jika tidak ada detail transaksi, maka bisa dihapus -->
                <form action="/niki mart/process/products_process.php" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                    <!-- Menentukan aksi delete untuk file process -->
                    <input type="hidden" name="action" value="delete">
                    <!-- Mengirim ID transaksi yang ingin dihapus -->
                    <input type="hidden" name="id" value="<?=$transactions['id']?>">
                    <!-- Tombol submit untuk menghapus -->
                    <input type="submit" value="delete">
                </form>
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
        } // Akhir dari perulangan while
        ?>
    </table>
</center>

<?php
// Mengimpor file footer (biasanya berisi penutup HTML)
include ROOTPATH . "/includes/footer.php";
?>


<!-- 
        Bagian Kode                                                             Fungsi
define('ROOTPATH', ...)                                         Menentukan lokasi folder utama proyek untuk memudahkan include.
include config.php                                              Menghubungkan file ke database MySQL.
include header.php                                              Menampilkan tampilan awal HTML dan navigasi.
<a href="add.php">Add transaksi</a>                             Tombol untuk menambah transaksi baru.
mysqli_query($conn, "SELECT * FROM transaksi JOIN kasir...")    Mengambil semua data transaksi dan nama kasir.
while($transactions = mysqli_fetch_assoc(...))                     Menampilkan setiap transaksi dalam tabel.
Lihat Detail                                                    Mengarah ke halaman detail transaksi berdasarkan id.
edit.php?id=...                                                 Mengarah ke halaman untuk mengedit transaksi.
Logika if(mysqli_num_rows($cek) > 0)                            Mengecek apakah transaksi punya detail produk (agar tidak bisa dihapus).
Form process/products_process.php                               Mengirim permintaan hapus data ke file pemrosesan.
include footer.php                                              Menutup halaman dengan tampilan footer. 
-->
