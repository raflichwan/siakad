@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jadwal Pelajaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Jadwal Pelajaran</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-info">Action</button> -->
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>Pilih Hari &nbsp
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <!-- @foreach($data as $value) -->
                            <!-- <a class="dropdown-item" href="#">{{$value->hari}}</a> -->
                            <!-- @endforeach -->
                            <a class="dropdown-item" href="#">Senin</a>
                            <a class="dropdown-item" href="#">Selasa</a>
                            <a class="dropdown-item" href="#">Rabu</a>
                            <a class="dropdown-item" href="#">Kamis</a>
                            <a class="dropdown-item" href="#">Jumat</a>
                            <a class="dropdown-item" href="#">Sabtu</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah">
                        Tambah
                    </button>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Pengajar</th>
                                <th>Jam Pelajaran ke</th>
                                <th>Lama Jam</th>
                                <th>Hari</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->kelas->keterangan }}</td>
                                <td>{{ $value->mapel->nama_mapel }}</td>
                                <td>{{ $value->pengajar->nama }}</td>
                                <td>{{ $value->jam }}</td>
                                <td>{{ $value->lama_jam }}</td>
                                <td>{{ $value->hari }}</td>
                                <td>
                                    <a href="jadwalpelajarandelete/{{ $value->id }}" class="btn btn-danger float-right">Delete</a>

                                    <button type="button" class="mr-1 btn btn-primary float-right" data-toggle="modal" data-target="#modal-edit">
                                        Edit
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- ./row -->
            <!-- ./row -->
</section>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" enctype='multipart/form-data' action="jadwalpelajaran">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jadwal Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" class="d-none">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select name="kelas_id" class="form-control">
                                <option>Pilih Kelas</option>
                                @foreach($kelas as $value)
                                <option value="{{$value->id}}">{{$value->keterangan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-9">
                            <select name="mapel_id" class="form-control">
                                <option>Pilih Mata Pelajaran</option>
                                @foreach($mapel as $value)
                                <option value="{{$value->id}}">{{$value->nama_mapel}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pengajar</label>
                        <div class="col-sm-9">
                            <select name="no_identitas" class="form-control">
                                <option>Pilih Pengajar</option>
                                @foreach($santripengajar as $value)
                                <option value="{{$value->no_identitas}}">{{$value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jam Pelajaran ke</label>
                        <div class="col-sm-9">
                            <input type="text" name="jam" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Lama Jam</label>
                        <div class="col-sm-9">
                            <input type="text" name="lama_jam" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Hari</label>
                        <div class="col-sm-9">
                            <select name="hari" class="form-control">
                                <option>Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" id="saveEdit" enctype='multipart/form-data' action="pelanggaranmaster">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Edit Jadwal Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" id="idkelas" class="d-none">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                <option>Pilih Kelas</option>
                                @foreach($kelas as $value)
                                <option value="{{$value->id}}">{{$value->keterangan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Poin</label>
                        <div class="col-sm-9">
                            <input type="text" name="poin" id="poin" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                        <div class="col-sm-9">
                            <input type="text" name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Save </button>
                </div>

            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('script')
<script>
    $('#example1 tbody').on('click', 'tr', function() {
        var table = $('#example1').DataTable();
        var data = table.row(this).data();
        $("#idpelanggaran").val(data[0]);
        $("#keterangan").val(data[1]);
        $("#poin").val(data[2]);
        $("#jenis_pelanggaran").val(data[3]);

    });
</script>
@endsection