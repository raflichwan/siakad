@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan Perizinan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Laporan Perizinan</li>
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

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Santri</th>
                                <th>Tanggal Permohonan</th>
                                <th>Tanggal Perizinan</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->no_identitas }}</td>
                                <td>{{ $value->tanggal_permohonan }}</td>
                                <td>{{ $value->tanggal_perizinan }}</td>
                                <td>{{ $value->keterangan }}</td>
                                <td>
                                    @if($value->status != 0 && $value->gambar == "")
                                    {{ "Gambar Belum Diupload" }}
                                    @elseif($value->gambar != "")
                                    <?php
                                    $url = "maps/" . $value->lat . "/" . $value->lng;
                                    ?>
                                    <button type="button" class="btn btn-success" onclick="bukamap('{{ $url }}')">
                                        Detail Lokasi
                                    </button>
                                    @else
                                    <a href="laporanperizinanacc/{{ $value->id.'/1' }}" class="btn btn-danger float-right ml-1">Setujui</a>
                                    <a href="laporanperizinanacc/{{ $value->id.'/2' }}" class="btn btn-danger float-right">Tolak</a>

                                    @endif

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

<div class="modal fade" id="modal-info">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="loaddata">
            <div class="modal-body" id="isi-filter" style="height:500px;">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('script')
<script>
    function bukamap(a) {
        $('#modal-info').modal('show');
        $("#isi-filter").html('');
        $("#isi-filter").append("<iframe src='" + a + "' width='100%' height='100%'></iframe>");
        // $("#loaddata").load('coba');

    }
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