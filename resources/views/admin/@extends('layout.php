@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Pelanggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Input Pelanggaran</li>
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

                <div class="card-body">
                    <form method="POST" enctype='multipart/form-data' action="pelanggaran">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Pelanggaran</h4>

                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                                <div class="col-sm-9">
                                    <!-- <input type="text" name="pelanggaran_master_id" class="form-control"> -->

                                    <select name="pelanggaran_master_id" id="pelanggaran_master_id" class="form-control">
                                        <option>Pilih Jenis Pelanggaran</option>
                                        @foreach($data as $value)
                                        <option value="{{$value->id}}">{{$value->keterangan}} - {{$value->poin}} Poin</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">No Identitas</label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_identitas" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- ./row -->
            <!-- ./row -->
</section>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-xl">

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" id="saveEdit" enctype='multipart/form-data' action="santri">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Santri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">NIS</label>
                        <div class="col-sm-9">
                            <input type="text" name="nis" id="nis" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" name="alamat" id="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="1">
                                <label class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin0" value="0">
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas" id="kelas" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">No Whatsapp</label>
                        <div class="col-sm-9">
                            <input type="number" name="no_hp" id="no_hp" class="form-control">
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
        $("#nis").val(data[0]);
        $("#nama").val(data[1]);
        $("#alamat").val(data[2]);
        // $("#jenis_kelamin").val(data[3]);
        $("#tanggal_lahir").val(data[4]);
        $("#kelas").val(data[5]);
        $("#no_hp").val(data[6]);
        $("#jenis_kelamin" + data[3]).prop('checked', true);
    });
</script>
@endsection