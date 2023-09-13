<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Tambahkan link ke Google Fonts untuk Rubik -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap">
    <!-- Tambahkan referensi ke jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Tambahkan referensi ke DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Tambahkan referensi ke DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <style>
        /* Gaya untuk dark mode */
        body.dark-mode {
            background-color: rgb(35, 35, 51);
            /* Warna latar belakang mode gelap */
            color: #fff;
            /* Warna teks mode gelap */
        }

        /* Gaya untuk font Rubik */
        body {
            font-family: 'Rubik', sans-serif;
            font-size: 9pt;
        }

        .card-title {
            font-size: 40pt;
        }
    </style>
</head>

<body class="dark-mode">
    <div class="container-from" style="width:100%; padding: 20px">


        <div style="display: flex;justify-content: center;flex-direction: column;align-items: center">
            <div class="mb-3">
                <h1>ABSEN PB.PETROKIMIA</h1>
            </div>

            <div class="mb-3" style="display: flex;gap: 10px">
                <button type="button" class="btn btn-secondary" id="dark-mode-button">
                    <span id="dark-mode-text">Mode Gelap</span>
                    <i id="dark-mode-icon" class="fi fi-sr-moon-stars"></i>
                </button>
                <div class="card border-secondary" style="width: 16rem;">
                    <div class="card-header" id="dateHeader">Tanggal Hari ini
                        <h6 id="dateDisplay"></h6>
                    </div>
                </div>

            </div>
            <div style="display: flex;gap: 10px;text-align: center ;width:100%;">
                <div class="card text-dark bg-light mb-3" style="max-width: 8rem;">
                    <div class="card-header">Jumlah</div>
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <p class="card-text">Total Atlit yang Anak"</p>
                    </div>
                </div>
                <div class="card text-white mb-3" style="max-width: 8rem; background-color: rgb(49, 50, 71)">
                    <div class="card-header">Jumlah</div>
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <p class="card-text">Total Atlit yang Hadir Saat Ini.</p>
                    </div>
                </div>
                <div class="card text-dark bg-light mb-3" style="max-width: 8rem;">
                    <div class="card-header">Jumlah</div>
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <p class="card-text">Total Atlit yang Dewasa.</p>
                    </div>
                </div>
            </div>

            <div class="table">
                <div class="card">
                    <div class="card-body">
                        <table id="dataTable" style="text-align: center " class="display">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Panggilan</th>
                                    <th>Absen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kamila</td>
                                    <td>Kamilatok</td>
                                    <td><span class="badge rounded-pill text-bg-warning"
                                            style="width: 40px;font-size: 15px">2</span></td>
                                    <td><button class="btn"
                                            style="background-color: rgb(49, 50, 71);color: white;width: 60px;font-size: 7pt">Absen</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ayunda</td>
                                    <td>Ayunda</td>
                                    <td><span class="badge rounded-pill text-bg-warning"
                                            style="width: 40px;font-size: 15px">0</span></td>
                                    <td><button class="btn"
                                            style="background-color: rgb(49, 50, 71);color: white;width: 60px;font-size: 7pt">Absen</button>
                                    </td>
                                </tr>
                                <!-- Tambahkan baris-baris lainnya sesuai kebutuhan -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>Build by Ichsan</p>
        </footer>
        <script>
            const darkModeButton = document.getElementById('dark-mode-button');
            const darkModeIcon = document.getElementById('dark-mode-icon');
            const darkModeText = document.getElementById('dark-mode-text');
            const body = document.body;

            // Fungsi untuk mengaktifkan/menonaktifkan mode gelap
            function toggleDarkMode() {
                body.classList.toggle('dark-mode'); // Menggunakan toggle untuk mengaktifkan/menonaktifkan mode gelap
                if (body.classList.contains('dark-mode')) {
                    darkModeIcon.classList.remove('fi-sr-brightness');
                    darkModeIcon.classList.add('fi-sr-moon-stars'); // Mengganti ikon ke matahari saat mode gelap aktif
                    darkModeText.textContent = 'Mode Terang'; // Mengganti teks tombol saat mode gelap aktif
                } else {
                    darkModeIcon.classList.remove('fi-sr-moon-stars');
                    darkModeIcon.classList.add('fi-sr-brightness'); // Mengganti ikon ke lampu saat mode gelap nonaktif
                    darkModeText.textContent = 'Mode Gelap'; // Mengganti teks tombol saat mode gelap nonaktif
                }
            }

            // Panggil fungsi toggleDarkMode saat tombol ditekan
            darkModeButton.addEventListener('click', toggleDarkMode);
        </script>
        <script>
            // Mendapatkan elemen yang akan menampilkan tanggal dan waktu
            const dateDisplay = document.getElementById('dateDisplay');
            const dateHeader = document.getElementById('dateHeader');

            // Fungsi untuk mengupdate tanggal dan waktu setiap detik
            function updateDateTime() {
                const now = new Date();

                // Format tanggal
                const optionsDate = {
                    year: 'numeric',
                    month: 'numeric',
                    day: 'numeric'
                };
                const formattedDate = now.toLocaleDateString('id-ID', optionsDate);

                // Format waktu
                const optionsTime = {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                const formattedTime = now.toLocaleTimeString('id-ID', optionsTime);

                // Menampilkan tanggal dan waktu dalam elemen "dateDisplay"
                dateDisplay.textContent = `${formattedDate} | ${formattedTime}`;
            }

            // Memanggil fungsi updateDateTime() setiap detik
            setInterval(updateDateTime, 1000);

            // Menginisialisasi tampilan awal
            updateDateTime();
        </script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>

</body>


</html>
