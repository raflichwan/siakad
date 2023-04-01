@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Master Pelanggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Master Pelanggaran</li>
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
                                <th>Keterangan</th>
                                <th>Poin</th>
                                <th>Jenis Pelanggaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->keterangan }}</td>
                                <td>{{ $value->poin }}</td>
                                <td>{{ $value->jenis_pelanggaran }}</td>
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
            <form method="POST" enctype='multipart/form-data' action="pelanggaranmaster">
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
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>

                        <div class="col-sm-9">
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Poin</label>
                        <div class="col-sm-9">
                            <input type="text" name="poin" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pelanggaran" value="S">
                                <label class="form-check-labelL">Santri</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pelanggaran" value="P">
                                <label class="form-check-label">Pengajar</label>
                            </div>
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
                    <h4 class="modal-title">Tambah Pelanggarann</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>

                        <div class="col-sm-9">
                            <input type="text" name="id" id="idpelanggaran" class="d-none">
                            <input type="text" name="keterangan" id="keterangan" class="form-control">
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="jenis_pelanggaranS" name="jenis_pelanggaran" value="S">
                                <label class="form-check-labelL">Santri</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="jenis_pelanggaranP" name="jenis_pelanggaran" value="P">
                                <label class="form-check-label">Pengajar</label>
                            </div>
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

        $("#jenis_pelanggaran" + data[3]).prop('checked', true);
        // $("#jenis_pelanggaran").val(data[3]);

    });
</script>
@endsection