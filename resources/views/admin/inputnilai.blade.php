@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan Jadwal Pelajaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Laporan Jadwal Pelajaran</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form method="POST" enctype='multipart/form-data' action="uploadnilai">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Pilih Kelas</label>
                            <div class="col-sm-9">
                                <select name="kelas" id="kelass" class="form-control">
                                    <option>Pilih Kelas</option>
                                    @foreach($kelas as $value)
                                    <option value="{{ $value->id }}"> {{ $value->keterangan }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-9">
                                <input type="file" name="nilai" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Periode</label>
                            <div class="col-sm-9">
                                <select name="bulan" id="kelass" class="form-control">
                                    <option>Pilih Periode</option>
                                    <option value="06">Ganjil</option>
                                    <option value="12">Genap</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                                <select name="tahun" id="kelass" class="form-control">
                                    <option>Pilih Tahun</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success" onclick="Download()">Download</button>
                        <button type="submit" class="btn btn-primary float-right"> Save </button>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <!-- /.card-header -->
                <div class=" card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No Identitas</th>
                                <th>Nama Santri</th>
                                <th>Praktek Baca Kitab</th>
                                <th>Ujian Tulis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nilai as $value)
                            <td>{{ $value->santripengajars->no_identitas }}</td>
                            <td>{{ $value->santripengajars->nama }}</td>
                            <td>{{ $value->kitab }}</td>
                            <td>{{ $value->tulis }}</td>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- ./row -->
            <!-- ./row -->
</section>


@endsection

@section('script')
<script>
    function Download() {
        var kelas = $("#kelass").val();
        //if (kelas != "") {
        var a = "{{ url('export/') }}" + "/" + kelas;
        window.location.href = a;

        // } else {
        //     alert('Kelas harus diisi');
        // }

        // alert(kelas);
    }
    $('#example1 tbody').on('click', 'tr', function() {

        var table = $('#example1').DataTable();
        var data = table.row(this).data();
        $("#idkelas").val(data[0]);
        $("#keterangan").val(data[1]);

    });
</script>
@endsection