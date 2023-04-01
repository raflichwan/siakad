@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pelanggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Pelanggaran</li>
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
                                <th>Pelanggaran</th>
                                <th>No Identitas</th>
                                <th>tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->pelanggaran_masters->keterangan }}</td>
                                <td>{{ $value->santripengajars->nama }}</td>
                                <td>{{ $value->tanggal }}</td>
                                <td>
                                    <a href="pelanggaranmasterdelete/{{ $value->id }}" class="btn btn-danger float-right">Delete</a>

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
            <form method="POST" enctype='multipart/form-data' action="pelanggaran">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pelanggarann</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" id="id" class="d-none">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                        <div class="col-sm-9">
                            <select name="pelanggar" onchange="PilihJenis(this)" id="pelanggar" class="form-control">
                                <option>Pilih Jenis Pelanggar</option>
                                <option value="S">Santri</option>
                                <option value="P">Pengajar</option>
                            </select>
                        </div>

                    </div>
                    <div id="LoadData">

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
                    <h4 class="modal-title">Edit Pelanggaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <input type="text" id="idpelanggaran" name="id">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                        <div class="col-sm-9">

                            <select name="pelanggar" onchange="PilihJenis(this)" id="pelanggar" class="form-control">
                                <option>Pilih Jenis Pelanggar</option>
                                <option value="S">Santri</option>
                                <option value="P">Pengajar</option>
                            </select>
                        </div>

                    </div>
                    <div id="LoadData">

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

    function PilihJenis(id) {
        $("#LoadData").load('viewpelanggaran/' + id.value);
        // alert('okee');
    }
</script>
@endsection