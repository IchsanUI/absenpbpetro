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
                    @foreach ($atlitPBs as $atlitPB)
                        <tr>
                            <td>{{ $atlitPB->Nama }}</td>
                            <td>{{ $atlitPB->namaPanggilan }}</td>
                            <td><span class="badge rounded-pill text-bg-warning"
                                    style="width: 40px;font-size: 15px">{{ $atlitPB->banyakAbsen }}</span></td>
                            <td><button class="btn"
                                    style="background-color: rgb(49, 50, 71);color: white;width: 60px;font-size: 7pt">Absen</button>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Tambahkan baris-baris lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>
</div>
