<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="py-4">
                    <h2>Tabel UMKM</h2>
                    <a href="/" class="btn btn-success">Create</a>
                    @if (session('success'))
                        <div class="alert alert-success my-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('red'))
                    <div class="alert alert-danger my-3">
                        {{ session('red') }}
                    </div>
                @endif
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama UMKM</th>
                            <th>Kategori UMKM</th>
                            <th>Deskripsi UMKM</th>
                            <th>Alamat UMKM</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($umkmsArray as $umkm)
                            {{-- onclick="window.location='{{ route('mahasiswas.show', $mahasiswa->id) }}';" --}}
                            <tr style="cursor:pointer;">
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $umkm['nama_umkm'] }}</th>
                                <td>{{ $umkm['desc_umkm'] }}</td>
                                <td>{{ $umkm['kelompok_umkm'] }}</td>
                                <td>{{ $umkm['alamat_umkm'] == '' ? 'N/A' : $umkm['alamat_umkm'] }}</td>
                                <td>
                                    <button class="btn btn-primary" style="margin-right: 1%">Edit</button>
                                    <form action="{{ route('umkm_delete', ['id' => $umkm['id_umkm']]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">Tidak ada data...
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>
