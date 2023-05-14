@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Santri dan Pengajar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Santri dan Pengajar</li>
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
                <form method="POST" enctype='multipart/form-data' action="absensi">
                    @csrf
                    <div class="card-header">
                        <button type="submit" class="btn btn-primary float-right">
                            Simpan
                        </button>
                        <p><?php echo date('Y-m-d'); ?></p>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>No Identitas</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Whatsapp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $value)
                                <tr>
                                    <td>
                                        <div class="icheck-primary">
                                            <input type="checkbox" name="no_identitas[]" value="{{$value['no_identitas']}}" id="checkall{{$value['no_identitas']}}" checked>
                                            <label for="checkall{{$value['no_identitas']}}">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <select name="type" name="jenis" placeholder="asd" class="form-control">
                                            <!-- <option>Keterangan</option> -->
                                            <option value="S">Sakit</option>
                                            <option value="I">Izin</option>
                                            <option value="A">Alpha</option>
                                        </select>
                                    </td>
                                    <td>{{ $value['no_identitas'] }}</td>
                                    <td>{{ $value['nama'] }}</td>
                                    <td>{{ $value['alamat'] }}</td>
                                    <td>{{ $value['no_hp'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No Identitas</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Whatsapp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absen as $value)
                        @if ($value['santripengajars']['type']=='P')
                        <tr>
                            <td>{{ $value['no_identitas'] }}</td>
                            <td>{{ $value['santripengajars']['nama'] }}</td>
                            <td>{{ $value['santripengajars']['alamat'] }}</td>
                            <td>{{ $value['santripengajars']['no_hp'] }}</td>
                        </tr>
                        @endif

                        @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->

        </div>
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
        $("#nis").val(data[0]);
        $("#nama").val(data[1]);
        $("#alamat").val(data[2]);
        // $("#jenis_kelamin").val(data[3]);
        $("#tanggal_lahir").val(data[4]);
        $("#kelas").val(data[5]);
        $("#no_hp").val(data[6]);
        $("#jenis_kelamin" + data[3]).prop('checked', true);
    });

    function PilihJenis(id) {
        $("#LoadData").load('viewsantripengajar/' + id.value);
        // alert('okee');
    }
</script>
@endsection