@extends('layout.admin') @section('content') <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Pengajar</li>
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
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-success">

                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{ $data->nama }}</h3>
                    @if($data->type == 'P')
                    <h5 class="widget-user-desc">Pengajar Pondok</h5>
                    @else
                    <h5 class="widget-user-desc">Santri</h5>
                    @endif
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <div class="nav-link text-primary">Alamat &nbsp;:&nbsp;{{$data->alamat}}</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link text-primary">Tanggal Lahir &nbsp;:&nbsp;{{$data->tanggal_lahir}}</div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link text-primary">No Hp &nbsp;:&nbsp;{{$data->no_hp}}</div>
                        </li>

                    </ul>
                </div>
            </div>
        </div><!-- ./row -->
        <!-- ./row -->
</section>
@endsection