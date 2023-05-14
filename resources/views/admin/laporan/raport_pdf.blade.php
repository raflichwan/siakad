<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
</head>
<style>
    @page {
        size: a5 potrait;
    }

    body {
        font-family: Helvetica, Sans-Serif;
    }


    .test {
        line-height: 1px;
    }


    h3 {
        line-height: 0px;
    }

    p {
        font-size: 15px;
    }

    hr {
        position: relative;
        border: none;
        height: 3px;
        background: black;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
    }

    .data {
        border-collapse: collapse;
        width: 100%;

        font-size: 10px;
    }

    .data td,
    .data th {
        border: 0.6mm solid #000000;
        padding: 3px;
    }

    .break {
        page-break-after: always
    }
</style>

<body>
    @foreach($santri as $value)
    <div class="header">
        <table width='100%' padding=0>
            <tr>
                <td align="center">
                    <div class="container">
                        <h5 class="test">MADRASAH DINIYAH </h5>
                        <h5 class="test">USHUL FIQIH</h5>
                        <h5 class="test">PP. BAHRUL LAHUT</h5>
                        <p class="test">JL Rejosari Malang Jawa Timur </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                </td>
            </tr>
        </table>
        <table style="width:100%;font-size:12px;">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $value->nama }}</td>
                <td width="60px"></td>

                <td>Tahun Pelajaran</td>
                <td>:</td>
                <td>2021/2022</td>
            </tr>

            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $value->kelas_masters->keterangan }}</td>
                <td></td>
                <td>Semester</td>
                <td>:</td>
                <td>2021/2022</td>
            </tr>
        </table>
        <table class="data" style="margin-top: 20px;">
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">DIRASAH MADIN</th>
                <th colspan="2">Nilai</th>
            </tr>
            <tr>
                <th>Praktik Baca Kitab</th>
                <th>Ujian Tulis</th>
            </tr>
            <?php
            $kitab = 0;
            $tulis = 0;
            ?>
            @foreach($nilai[$value->no_identitas] as $value1)

            <?php
            $kitab += $value1['kitab'];
            $tulis += $value1['tulis'];
            ?>

            <tr>
                <td>1</td>
                <td>{{ $value1['mapel']['nama_mapel'] }}</td>
                <td>{{ $value1['kitab'] }}</td>
                <td>{{ $value1['tulis'] }}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Rata - Rata</th>
                <th>{{ $kitab/count($nilai[$value->no_identitas]) }}</th>
                <th>{{ $tulis/count($nilai[$value->no_identitas]) }}</th>
            </tr>

            <tr>
                <th colspan="2">Jumlah</th>
                <th>{{$kitab}}</th>
                <th>{{$tulis}}</th>

            </tr>

        </table>
        <table class="data" style="margin-top: 20px;">
            <tr>
                <th colspan="2">Kepbribadian</th>
                <th>Predikat</th>
                <th rowspan="4">keterangan</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Adab</td>
                <td>A</td>
            </tr>

            <tr>
                <td>1</td>
                <td>Adab</td>
                <td>A</td>
            </tr>

            <tr>
                <td>1</td>
                <td>Adab</td>
                <td>A</td>
            </tr>
        </table>
        <table class="data" style="width:100%;font-size:12px;margin-top:20px;">
            <tr>
                <td align="center">Peringkat</td>
                <td align="center">KE 1</td>
                <td align="center">Santri 24</td>

            </tr>
        </table>
        <table class="data" style="margin-top: 20px;">
            <tr>
                <th colspan="2">Kepbribadian</th>
                <th>Predikat</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Adab</td>
                <td>A</td>
            </tr>

            <tr>
                <td>1</td>
                <td>Adab</td>
                <td>A</td>
            </tr>
        </table>

        <table style="width:100%;font-size:12px;margin-top:10px;">
            <tr>
                <td>Diberikan di</td>
                <td>:</td>
                <td>Achmat Vidianto</td>
                <td width="60px"></td>
            </tr>

            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>Achmat Vidianto</td>
            </tr>
        </table>

        <table class="data" style="width:100%;font-size:12px;margin-top:30px;">
            <tr>
                <td align="center" width="33%">Nama 1</td>
                <td align="center" width="33%">Nama 2</td>
                <td align="center" width="33%">Nama 3</td>
            </tr>

            <tr>
                <td style="height: 80px;"></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>()</td>
            </tr>
        </table>
    </div>
    <table class="break"></table>

    @endforeach
</body>

</html>