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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <button type="button" class="btn btn-info">Action</button> -->
                    <form method="GET" id="saveEdit" enctype='multipart/form-data' action="laporanabsensi">
                        <div class="form-group row">
                            <div class="col-3">
                                <select name="bulan" id="bulan" class="form-control">
                                    <option>Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>

                            </div>
                            <div class="col-3">

                                <select name="tahun" class="form-control ml-2">
                                    <option>Pilih Tahun</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                            <div class="col-3">

                                <button type="submit" class=" ml-1 btn btn-primary ">Refresh</button>
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.card-header -->
                <div class=" card-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                @foreach($absen as $key => $value)
                                @foreach($value as $key1 => $value1)

                                <th>{{ date("d",strtotime($key1)) }}</th>
                                @endforeach
                                <?php break; ?>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajar as $value)
                            <tr>
                                <td>{{ $value->nama }}</td>
                                @foreach($absen[$value->no_identitas] as $value1)
                                <td><?php echo $value1; ?></td>
                                @endforeach

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


@endsection

@section('script')
<script>
    $('#example1 tbody').on('click', 'tr', function() {
        var table = $('#example1').DataTable();
        var data = table.row(this).data();
        $("#idkelas").val(data[0]);
        $("#keterangan").val(data[1]);

    });
</script>
@endsection