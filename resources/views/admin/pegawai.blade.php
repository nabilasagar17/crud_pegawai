@extends('layout/index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pegawai</a></li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Start Modal Add Data -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('admin/input_pegawai')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Provinsi</label>
                                            <select required class="form-control select2 select2-danger" name="provinsi"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">
                                                    Kode Provinsi</option>
                                                @foreach($provinsi as $pro)
                                                <option value="{{$pro->id}}">
                                                    {{' Kode: '.$pro->kode.' Nama: '.$pro->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Kecamatan</label>
                                            <select required class="form-control select2 select2-danger"
                                                name="kecamatan" data-dropdown-css-class="select2-danger"
                                                style="width: 100%;">
                                                <option value="">
                                                    Kode Provinsi</option>
                                                @foreach($kecamatan as $kec)
                                                <option value="{{$kec->id}}">
                                                    {{' Kode: '.$kec->kode.' Nama: '.$kec->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Kelurahan</label>
                                            <select required class="form-control select2 select2-danger"
                                                name="kelurahan" data-dropdown-css-class="select2-danger"
                                                style="width: 100%;">
                                                <option value="">
                                                    Kode Provinsi</option>
                                                @foreach($kelurahan as $kel)
                                                <option value="{{$kel->id}}">
                                                    {{' Kode: '.$kel->kode.' Nama: '.$kel->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input type="text" name="kode" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control"
                                                id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <input type="text" name="agama" class="form-control"
                                                id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- End Modal Add Data -->

            <!-- Start Modal Edit Data -->
            <div class="modal fade" id="edit_data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data Provinsi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('admin/edit_pegawai')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Provinsi</label>
                                            <select class="form-control select2 select2-danger" name="provinsi"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">
                                                    Kode Provinsi</option>
                                                @foreach($provinsi as $pro)
                                                <option value="{{$pro->id}}">
                                                    {{' Kode: '.$pro->kode.' Nama: '.$pro->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Kecamatan</label>
                                            <select class="form-control select2 select2-danger" name="kecamatan"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">
                                                    Kode Provinsi</option>
                                                @foreach($kecamatan as $kec)
                                                <option value="{{$kec->id}}">
                                                    {{' Kode: '.$kec->kode.' Nama: '.$kec->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Kelurahan</label>
                                            <select class="form-control select2 select2-danger" name="kelurahan"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">
                                                    Kode Provinsi</option>
                                                @foreach($kelurahan as $kel)
                                                <option value="{{$kel->id}}">
                                                    {{' Kode: '.$kel->kode.' Nama: '.$kel->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6  mb-2">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select class="form-control select2" required name="status"
                                            style="width: 100%;">
                                            <option value="">Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
                                            <input type="text" name="id" hidden class="form-control"
                                                id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input type="text" name="kode" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control"
                                                id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control"
                                                id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>tgl Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control"
                                                id="exampleInputEmail1">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>

                                            <select class="form-control select2" required name="jk"
                                                style="width: 100%;">
                                                <option value="">Jenis Kelamin</option>
                                                <option value="Wanita">Wanita</option>
                                                <option value="Pria">Pria</option>

                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <?php  $agama = array('Islam','Protestan','Katolik','Budha','Hindu')?>
                                            <select class="form-control select2" required name="agama"
                                                style="width: 100%;">
                                                <option value="">Agama</option>
                                                @foreach($agama as $aga)
                                                <option value="{{$aga}}">{{$aga}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- End Modal Edit Data -->

            <!-- Start Modal Edit Data -->
            <div class="modal fade" id="hapus_data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('admin/hapus_pegawai')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12 my-2">
                                        <h4> Hapus Data?
                                        </h4>
                                        <input type="text" name="id" hidden>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ya, Hapus </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- End Modal Edit Data -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-8">
                                    <form action="" method="get">
                                        <div class="form-inline">
                                            <div class="input-group">
                                                <input name="search" class="form-control form-control-sidebar"
                                                    type="search" placeholder="Search"
                                                    value="{{Request::input('search')}}" aria-label="Search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-sidebar">
                                                        <i class="fas fa-search fa-fw"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" data-toggle="modal" data-target="#modal-default"
                                        class="btn btn-primary btn-block"><i class="fa fa-plus"></i>
                                        Tambah</button>
                                </div>
                                @if(Request::input('search') == "")
                                <div class="col-lg-2">
                                    <a href="{{url('admin/print_pegawai')}}" class="btn btn-info btn-block"><i
                                            class="fa fa-print"></i>
                                        Print</a>
                                </div>
                                @else
                                <div class="col-lg-2">
                                    <a href="{{url('admin/print_pegawai').'?search='.(Request::input('search'))}}"
                                        class="btn btn-info btn-block"><i class="fa fa-print"></i>
                                        Print</a>
                                </div>
                                @endif
                            </div>

                        </div>

                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                            {{ session()->get('message') }}
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            {{ session()->get('error') }}
                        </div>
                        @endif


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Kode </th>
                                        <th>Nama</th>

                                        <th>Nama Provinsi</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Kelurahan</th>
                                        <th>Agama</th>
                                        <th>JK</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Tgl.Dibuat</th>
                                        <th>Pembuat</th>
                                        <th>Tgl.Update</th>
                                        <th>Pengupdate</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $no = 10 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>

                                    @foreach($data as $datas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{$datas->kode}}</td>
                                        <td>{{$datas->nama}}</td>

                                        <td>{{$datas->nama_provinsi}}</td>
                                        <td>{{$datas->nama_kecamatan}}</td>
                                        <td>{{$datas->nama_kelurahan}}</td>
                                        <td>{{$datas->agama}}</td>
                                        <td>{{$datas->jk}}</td>
                                        <td>{{$datas->alamat}}</td>
                                        <td> @if($datas->is_active == '1')
                                            <span class="badge bg-success">Aktif</span>
                                            @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>{{$datas->created_at}}</td>
                                        <td>{{$datas->created_by}}</td>
                                        <td>{{$datas->updated_at}}</td>
                                        <td>{{$datas->updated_by}}</td>
                                        <td>
                                            <button type="button"
                                                onClick="edit_data('{{ $datas->id}}','{{ $datas->kode}}','{{ $datas->nama}}','{{ $datas->alamat}}','{{ $datas->tempat_lahir}}')"
                                                class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                            <button type="button" onClick="hapus_data('{{ $datas->id}}')"
                                                class="btn btn-danger btn-sm"><i
                                                    class="far fa-trash-alt"></i></button></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix my-2">
                            {!! $data->appends(Request::all())->links() !!}
                        </div>
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection


<script>
function edit_data(id, kode, nama, alamat, tempat_lahir) {
    $('#edit_data').modal('show');
    $('input[name="id"]').val(id);
    $('input[name="kode"]').val(kode);
    $('input[name="nama"]').val(nama);
    $('input[name="alamat"]').val(alamat);
    $('input[name="tempat_lahir"]').val(tempat_lahir);
}

function hapus_data(id) {
    $('#hapus_data').modal('show');
    $('input[name="id"]').val(id);


}
</script>