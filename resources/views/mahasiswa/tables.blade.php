@extends('layout.main')

@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
</div>
@elseif(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('delete') }}
    <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
</div>
@elseif(session()->has('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('sukses') }}
    <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
</div>
@elseif($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $errors->first() }}
    <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
</div>
@endif
<!-- Page Heading -->





<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary d-inline-block align-self-center">Data Informasi Kerja Praktek dan Magang</h6>
        <div>
            <a href="{{ route('mahasiswa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mx-3" data-toggle="tooltip" data-placement="top" title="Tambah Data" style="height: 100%"><i class="fas fa-plus fa-sm-w-20 text-white-50 mr-2 "></i>Tambah Data</a>

        </div>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jurusan</th>
                        <th>Asal Instansi</th>
                        <th>Jenis</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMahasiswa as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama_mahasiswa }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>{{ $mhs->asal_instansi }}</td>
                        <td>{{ $mhs->jenis }}</td>
                        <td>{{ $mhs->tanggal_masuk }}</td>
                        <td>{{ $mhs->tanggal_selesai }}</td>
                        <td>{{ $mhs->status }}</td>
                        <td style="min-width: 100px;">
                            <a class="btn btn-success btn-circle btn-sm border-0" title="Edit Data" href="{{ route('mahasiswa.edit', $mhs->id) }}">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a class="btn btnHapus btn-danger btn-circle btn-sm border-0" title="Hapus Data" data-toggle="modal" data-target="#hapusModal{{ $mhs->id }}" data-id="{{ $mhs->id }}">
                                <i class="fas fa-trash"></i>
                            </a>

                            {{-- Delete Modal --}}
                            <div class="modal fade" id="hapusModal{{ $mhs->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Yakin anda akan menghapus data?</div>
                                        <div class="modal-footer">

                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <form id="formHapusModal" action="{{ route('mahasiswa.destroy', $mhs->id) }}" class="d-inline" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-primary" type="submit">Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- @push('scripts')
    <script>
        document.querySelector(".btn-hapus").addEventListener("click", function(e) {          
            e.preventDefault();

            let id = this.data.id;
            Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(id).click();
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
        }
        });
        });

    </script>
    
    @endpush --}}
@endsection
@push('scripts')
<script>
    $('.btnHapus').on('click', function() {

        $('#formHapusModal').attr('action', '/mahasiswa/' + $(this).data('id'));
    })
</script>
@endpush