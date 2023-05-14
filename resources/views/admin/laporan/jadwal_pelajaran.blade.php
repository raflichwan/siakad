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
                    @if(Auth::user()->level != '3')
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-info">Action</button> -->
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>Pilih Kelas &nbsp
                        </button>
                        <div class="dropdown-menu" role="menu">
                            @foreach($kelas as $value)
                            <a class="dropdown-item" href="{{ url('laporanjadwal/'.$value->id) }}">{{$value->keterangan}}</a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
                <!-- /.card-header -->
                <div class=" card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($jadwal as $key => $value)
                                <th>{{ $key }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $key => $value)
                            <td>
                                @foreach($value as $key1 => $value1)
                                <p>{{ $key1." || ".$value1 }}</p>
                                @endforeach

                            </td>

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