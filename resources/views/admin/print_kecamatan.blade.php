<?php 
use Illuminate\Support\Carbon;
?>
<!DOCTYPE html>
</title>
<style>
.text-center {
    text-align: center;
}

.table {
    margin-left: -15px;
}

.table,
.table th,
.table td {
    border: 1px solid #333;
    border-collapse: collapse;
    padding-left: 5px;
    font-size: 13px;
}
</style>
</head>

<body>
    <div class="">
        <div id="element-to-print" style="font-family: arial;">
            <table width="100%" style="border-bottom: 1px solid #333;">
                <tr>
                    <td width="15%">
                        <div>
                            <img src="{{ asset('img/logo.png') }}" height="80">
                        </div>
                    </td>
                    <td width="85%" valign="middle">
                        <div class="text-center" style="line-height: 25px; margin-left: -150px;">
                            <div style="font-size: 16pt;"><b>PT. LAMJAYA GLOBAL SOLUSI</b></div>

                        </div>
                    </td>
                </tr>
            </table>

            <div class="text-center" style="margin-top: 20px;">
                <H1 class="uppercase mr-5">Daftar Kecamatan</h1>

            </div>
            <div class="" style="margin-top: 20px;">
                <table class="table" style="width: 100%!important;">
                    <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                        <tr class="text-start text-gray-0">
                            <th style="width: 10px">No</th>
                            <th>Kode </th>
                            <th>Nama</th>
                            <th>Kode Provinsi</th>
                            <th>Nama Provinsi</th>
                            <th>Tgl.Dibuat</th>
                            <th>Pembuat</th>
                            <th>Tgl.Update</th>
                            <th>Pengupdate</th>

                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fs-7 fw-bold text-gray-600">
                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                        @foreach($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$datas->kode}}</td>
                            <td>{{$datas->nama}}</td>
                            <td>{{$datas->kode_provinsi}}</td>
                            <td>{{$datas->nama_provinsi}}</td>
                            <td>{{$datas->created_at}}</td>
                            <td>{{$datas->created_by}}</td>
                            <td>{{$datas->updated_at}}</td>
                            <td>{{$datas->updated_by}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <p>&nbsp;</p>

                <div style=" position:absolute; left: 0;">
                    Tanggal Cetak <b>{{ date("d-M-Y H:i:s", strtotime(Carbon::now())) }}</b><br>

                </div>

            </div>
        </div>
    </div>
</body>

</html>