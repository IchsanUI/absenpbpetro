<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen PB Petro</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    /* Gaya untuk dark mode */
    * {
        font-family: 'Rubik', sans-serif;
        font-size: 9pt;
    }

    body.dark-mode {
        background-color: rgb(35, 35, 51);
        color: white;
    }


    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding-left: 30px;
        padding-right: 30px;
        margin-top: 30px;
        color: black;

    }

    .Layout {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }


    .topHead {
        display: flex;
        width: 100%;
        height: 100%;
        justify-content: space-between;
        margin-bottom: 10px;
        gap: 10px;
    }

    .topHead button {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .viewCount {
        display: flex;
        gap: 10px;
        text-align: center;
        margin-bottom: 10px
    }
</style>

<body class="dark-mode">
    <div class="Layout">
        <div class="Head_Title" style="text-align: center">
            <h2>ABSEN <i class="fi fi-sr-shuttlecock"
                    style="font-size: 15pt;margin-left: 0.4rem;margin-right: 0.4rem"></i> PB.PETROKIMIA </h2>
            <p>Lakukan Absensi Dengan Bijak.</p>
        </div>
        <div class="topHead">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambahModal"> Tambah
                Data <i class="fi fi-sr-user-add" style="margin-left: 0.4rem"></i></button>
            <button type="button" class="btn btn-info">Export
                Data <i class="fi fi-sr-file-export" style="margin-left: 0.4rem"></i></button>
            <button type="button" class="btn " id="dark-mode-button"
                style="background-color: rgb(63, 64, 91);color:white">
                <span id="dark-mode-text">Terang </span>
                <i id="dark-mode-icon" class="fi fi-sr-moon-stars" style="margin-left: 0.4rem"></i>
            </button>

        </div>
        <div class="viewCount">
            <div class="card text-dark bg-light ">
                <div class="card-header">Jumlah</div>
                <div class="card-body">
                    <h1 class="card-title">0</h1>
                    <p class="card-text">Total Atlit yang Anak".</p>
                </div>
            </div>
            <div class="card" style="background-color: rgb(42,43,63);color:white">
                <div class="card-header">Jumlah</div>
                <div class="card-body">
                    <h1 class="card-title" style="font-size: 30pt" id="jumlah-absensi">0</h1>
                    <p class="card-text">Total Atlit yang Hadir Saat Ini.</p>
                </div>
            </div>
            <div class="card text-dark bg-light ">
                <div class="card-header">Jumlah</div>
                <div class="card-body">
                    <h1 class="card-title">0</h1>
                    <p class="card-text">Total Atlit yang Dewasa.</p>
                </div>
            </div>
        </div>
        <div class="dateSetting" style="display: flex; gap: 10px">
            <button type="button" class="btn btn-warning mb-2"><i class="fi fi-sr-settings"></i></button>
            <button type="button" class="btn btn-warning mb-2"> <i id="dark-mode-icon" class="fi fi-sr-calendar-clock"
                    style="margin-right: 0.4rem"></i> Hari Ini : <b id="dateDisplay"></b></button>
        </div>

        <div class="Down">
            <div class="card">
                <div class="card-body">
                    <table id="product-table" class="table display user_datatable"
                        style="color: rgb(6, 6, 6); text-align: center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nama Panggilan</th>
                                <th>Absen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="color: rgb(6, 6, 6); ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Atlit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahForm">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Tolong Isi dengan benar karena developer belum menambahkan fitur <b>"Menghapus Data"</b>.
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_panggilan">Nama Panggilan:</label>
                            <input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan"
                                required>
                        </div>

                    </div>
                    <div class="modal-footer" style="display: flex;justify-content: space-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary " id="buttonSubmit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <footer class="mt-4">
        <p><i>Develop by </i> <a href="https://www.instagram.com/m.o.s.a.n" style="color: yellow">@m.o.s.a.n</a> </p>
    </footer>

    <script type="text/javascript">
        $(function() {
            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                paging: false,
                columns: [{
                        data: 'Nama',
                        name: 'Nama',
                        width: '5px',
                        className: 'text-center'
                    },
                    {
                        data: 'namaPanggilan',
                        name: 'namaPanggilan',
                        width: '40%',
                        className: 'text-center'
                    },
                    {
                        data: 'banyakAbsen',
                        name: 'banyakAbsen',
                        width: '10%',
                        className: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    },
                ]
            });
            $('#tambahForm').submit(function(e) {
                e.preventDefault();
                $("#buttonSubmit").text("Mengirim...")
                $.ajax({
                    type: 'POST',
                    url: "{{ route('saveData.atlit') }}", // Gantilah dengan URL yang sesuai
                    data: $(this).serialize(),
                    success: function(response) {
                        // console.log(response);
                        $('#tambahModal').modal('hide');
                        $('#tambahForm')[0].reset();

                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data berhasil disimpan',
                            icon: 'success',
                            timer: 1000, // Waktu dalam milidetik (2000 ms = 2 detik)
                            showConfirmButton: false // Menyembunyikan tombol "Ok"
                        });
                        // Setelah 2 detik, tabel akan diperbarui
                        setTimeout(function() {
                            table.ajax.reload();
                        }, 1000);

                    },
                    error: function(error) {
                        console.log('Error:', error);
                        // Tampilkan pesan kesalahan kepada pengguna, misalnya:
                        alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                    }
                });
            });
            $(document).on('click', '.absen-button', function() {
                // Ambil nama dari atribut data-nama
                var nama = $(this).data('nama');
                var id_user = $(this).data('id_user');
                $.ajax({
                    url: "{{ route('absen') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content'), // Menambahkan token CSRF
                        nama: nama,
                        id_user: id_user
                    },
                    success: function(response) {
                        console.log('Absen berhasil');
                        Swal.fire({
                            title: 'Sukses!',
                            text: nama + ' Berhasil Absen!',
                            icon: 'success',
                            timer: 1000, // Durasi SweetAlert dalam milidetik (misalnya, 2000 ms = 2 detik)
                            showConfirmButton: false // Menyembunyikan tombol "Ok"
                        });
                        setTimeout(function() {
                            table.ajax.reload();
                            updateJumlahAbsensi();
                        }, 1000);

                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });

            });
            $(document).on('click', '.batal-absen-button', function() {
                var nama = $(this).data('nama');
                var id_user = $(this).data('id_user');

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin ingin membatalkan absensi ' + nama + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim permintaan AJAX untuk membatalkan absensi
                        $.ajax({
                            url: "{{ route('batalAbsen') }}", // Gantilah dengan URL endpoint yang sesuai
                            type: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                nama: nama,
                                id_user: id_user
                            },
                            success: function(response) {
                                console.log('Absen dibatalkan');
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Absensi ' + nama + ' dibatalkan!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false
                                });
                                setTimeout(function() {
                                    table.ajax.reload();
                                    updateJumlahAbsensi();
                                }, 1000);
                            },
                            error: function(error) {
                                console.error('Error:', error);
                            }
                        });
                    }
                });
            });

            function updateJumlahAbsensi() {
                // Mengambil jumlah data absensi menggunakan AJAX
                $.ajax({
                    url: "{{ route('jumlahAbsensi') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Menampilkan jumlah data absensi dalam elemen dengan id "jumlah-absensi"
                        $('#jumlah-absensi').text(response.jumlahAbsensi);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }

        });
    </script>


    <script>
        $(document).ready(function() {
            // Mengambil jumlah data absensi menggunakan AJAX
            $.ajax({
                url: "{{ route('jumlahAbsensi') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Menampilkan jumlah data absensi dalam elemen dengan id "jumlah-absensi"
                    $('#jumlah-absensi').text(response.jumlahAbsensi);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Menampilkan modal saat tombol dengan ID 'showModalButton' diklik
            $('#showModalButton').click(function() {
                $('#tambahModal').modal('show');
            });
        });
    </script>

    {{-- Dark Mode Script --}}
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
                darkModeText.textContent = 'Terang'; // Mengganti teks tombol saat mode gelap aktif
            } else {
                darkModeIcon.classList.remove('fi-sr-moon-stars');
                darkModeIcon.classList.add('fi-sr-brightness'); // Mengganti ikon ke lampu saat mode gelap nonaktif
                darkModeText.textContent = 'Gelap'; // Mengganti teks tombol saat mode gelap nonaktif
            }
        }

        // Panggil fungsi toggleDarkMode saat tombol ditekan
        darkModeButton.addEventListener('click', toggleDarkMode);
    </script>
    {{-- Hari Dan waktu --}}
    <script>
        // Mendapatkan elemen yang akan menampilkan tanggal dan waktu
        const dateDisplay = document.getElementById('dateDisplay');

        // Fungsi untuk mengupdate tanggal dan waktu setiap detik
        function updateDateTime() {
            const now = new Date();

            // Format tanggal
            const optionsDate = {
                year: 'numeric',
                month: 'long',
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
            dateDisplay.textContent = `${formattedDate} [ ${formattedTime} ]`;
        }

        // Memanggil fungsi updateDateTime() setiap detik
        setInterval(updateDateTime, 1000);

        // Menginisialisasi tampilan awal
        updateDateTime();
    </script>
</body>

</html>
