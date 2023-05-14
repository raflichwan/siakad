<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD Pondok Pesantren</title>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">


    @foreach ($pilihCss as $value)
    <link rel="stylesheet" href="{{ asset($css[$value]) }}">
    @endforeach
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <div class="nav-link">Sistem Informasi Akademik</div>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <li class="nav-item">
                    <a class="nav-link" href="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- <a href="index3.html" class="brand-link">
                <img src="{{ url('dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIAKAD </span>
            </a> -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div> -->
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="{{ url('dashboard') }}" class="nav-link" id='dashboard'>
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>


                        @if (Auth::user()->level == '1')
                        <li class="nav-item" id="master">
                            <a href="#" class="nav-link" id="webNav">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('web')}}" class="nav-link" id="web">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Web</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('artikeladmin')}}" class="nav-link" id="artikel">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Artikel</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('santripengajar')}}" class="nav-link" id="santripengajar">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Santri dan Pengajar</p>
                                    </a>
                                </li>
                            </ul>

                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('santri')}}" class="nav-link" id="santri">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Santri</p>
                                    </a>
                                </li>
                            </ul> -->

                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('pengajar')}}" class="nav-link" id="pengajar">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Pengajar</p>
                                    </a>
                                </li>
                            </ul> -->

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('pelanggaranmaster')}}" class="nav-link" id="pelanggaranmaster">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Pelanggaran</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('mapelmaster')}}" class="nav-link" id="mapelmaster">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Mata Pelajaran</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('kelasmaster')}}" class="nav-link" id="kelas">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                            </ul>

                        </li>


                        <li class="nav-item" id="laporan">
                            <a href="#" class="nav-link" id="webNavlaporan">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('laporanpelanggaran')}}" class="nav-link" id="laporanpelanggaran">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Pelanggaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('laporanjadwal')}}" class="nav-link" id="laporanjadwal">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Jadwal Pelajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('laporanabsensi')}}" class="nav-link" id="laporanabsensi">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Absensi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a onClick="FilterRaport()" class="nav-link" id="laporanraport">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Raport</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('laporanpenjengukan')}}" class="nav-link" id="laporanpenjengukan">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Penjengukan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('laporanperizinan')}}" class="nav-link" id="laporanperizinan">
                                        <i class="far fa-circle nav-icon "></i>
                                        <p>Perizinan</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item ">
                            <a href="{{url('pelanggaran')}}" class="nav-link" id="inputpelanggaran">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Input Pelanggaran
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{url('jadwalpelajaran')}}" class="nav-link" id="inputjadwal">
                                <!-- <i class="nav-icon fas fa-calendar-week"></i> -->
                                <i class="nav-icon fas fa-calendar-week fa-spin"></i>
                                <p>
                                    Input Jadwal Pelajaran
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{url('absensi')}}" class="nav-link" id="absen">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Absensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('nilaisantri')}}" class="nav-link" id="nilaisantri">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Input Nilai
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('datapengajar')}}" class="nav-link" id="datapengajar">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Data Pengajar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('datasantri')}}" class="nav-link" id="inputnilai">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Absensi Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('laporanjadwal')}}" class="nav-link" id="laporanjadwal">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Jadwal Pengajar
                                </p>
                            </a>
                        </li>
                        @elseif(Auth::user()->level == '2')

                        <li class="nav-item ">
                            <a href="{{url('datapengajar')}}" class="nav-link" id="datapengajar">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Data Pengajar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('absensantri')}}" class="nav-link" id="inputnilai">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Absensi Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('jadwalpengajar')}}" class="nav-link" id="laporanjadwal">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Jadwal Pengajar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('nilaisantri')}}" class="nav-link" id="nilaisantri">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Input Nilai
                                </p>
                            </a>
                        </li>
                        @else
                        <li class="nav-item ">
                            <a href="{{url('datadetailsantri')}}" class="nav-link" id="datasantri">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Data Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('laporanpelanggaransantri')}}" class="nav-link" id="laporanpelanggaransantri">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Pelanggaran Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('perizinansantri')}}" class="nav-link" id="perizinansantri">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Perizinan Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a onClick="FilterRaport()" class="nav-link" id="laporanraport">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Raport Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('laporanjadwal/'.$kelassantri)}}" class="nav-link" id="inputnilai">
                                <i class="nav-icon fas fa-exclamation-circle"></i>

                                <p>
                                    Jadwal Pelajaran Santri
                                </p>
                            </a>
                        </li>
                        @endif


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @section('content')
            @show
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @foreach ($pilihJs as $value)
    <script src="{{ asset($js[$value]) }}"></script>
    @endforeach
    <script>
        <?php
        if (isset($jsTambahan)) {
            echo $jsTambahan;
        }
        ?>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    @section('script')
    @show

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>
<div class="modal fade" id="modal-raport">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <form id="form22">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Cetak Raport</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        @if(Auth::user()->level != '3')

                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select name="kelas" id="kelasss" class="form-control">
                                <option>Pilih Kelas</option>
                                @foreach($kelasFilter as $value)
                                <option value="{{ $value->id }}"> {{ $value->keterangan }} </option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Periode</label>
                        <div class="col-sm-9">
                            <select name="semester" id="semester" class="form-control">
                                <option value="06"> Ganjil</option>
                                <option value="12">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun</label>
                        <div class="col-sm-9">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="2023"> 2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="preview()" class="btn btn-primary">Preview </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function FilterRaport() {
        // alert('oke');
        $('#modal-raport').modal('show');
    }

    function preview() {
        var data = {
            'kelas': $("#kelasss").val(),
            'tahun': $("#tahun").val(),
            'semester': $("#semester").val()
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "/raportpdf",
            type: "post",
            dataType: "JSON",
            data: data,
            success: function(data) {
                window.open('downloadpdf', '_blank');
            }
        });
    }
    var notif = "{{ Session::get('notif') }}";
    if (notif != "") {
        toastr.success(notif);
    }
</script>

<?php session()->forget('notif'); ?>

</html>