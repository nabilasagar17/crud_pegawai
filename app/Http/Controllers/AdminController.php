<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB; 
use Auth;
use PDF;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    //
    public function provinsi(Request $request){
        if($request->input('search') != ''){
            $data = DB::table('T_PROVINSI')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->paginate(10);

        }else{
            $data = DB::table('T_PROVINSI')->select('*')->orderBy('created_at','desc')->paginate(10);
        }
        return view('admin/provinsi',['data'=>$data]);
    }

    public function print_provinsi(Request $request){
        if($request->input('search') != ''){
            $data = DB::table('T_PROVINSI')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->paginate(10);

        }else{
            $data = DB::table('T_PROVINSI')->select('*')->orderBy('created_at','desc')->paginate(10);
        }
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.print_provinsi', compact('data'));
        return $pdf->stream("Laporan Daftar Provinsi".'pdf');
    }

    public function input_provinsi(Request $request){
        $nama = $request->input('nama');
        $kode = $request->input('kode');
        DB::table('T_PROVINSI')->insert([
            'nama' => $nama,
            'kode' => $kode,
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 'admin'
        ]);
       return redirect()->back()->with('message','Input Sukses');
    }

    public function edit_provinsi(Request $request){
        $nama = $request->input('nama');
        $id = $request->input('id');
        $kode = $request->input('kode');
        $status = $request->input('status');
        DB::table('T_PROVINSI')->where('id',$id)->update([
            'nama' => $nama,
            'kode' => $kode,
            'is_active' => $status,
            'updated_at' => Carbon::now(),
            'updated_by' => 'Admin'
        ]);
       return redirect()->back()->with('message','Edit Sukses');
    }

    public function hapus_provinsi(Request $request){
        $id = $request->input('id');
        DB::table('T_PROVINSI')->where('id',$id)->delete();
       return redirect()->back()->with('message','Hapus Sukses');
    }


    public function kecamatan(Request $request){
        if($request->input('search') != ''){
            $data = DB::table('view_kecamatan')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->paginate(10);
        }else{
            $data = DB::table('view_kecamatan')->select('*')->orderBy('created_at','desc')->paginate(10);

        }
        $provinsi = DB::table('T_PROVINSI')->select('*')->orderBy('created_at','desc')->get();

        return view('admin/kecamatan',['data'=>$data,'provinsi'=> $provinsi]);
    }

    public function print_kecamatan(Request $request){
        if($request->input('search') != ''){
            $data = DB::table('view_kecamatan')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->get();
        }else{
            $data = DB::table('view_kecamatan')->select('*')->orderBy('created_at','desc')->paginate(10);

        }
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.print_kecamatan', compact('data'));
        return $pdf->stream("Laporan Daftar Kecamatan".'pdf');
    }

    public function input_kecamatan(Request $request){
        $nama = $request->input('nama');
        $kode = $request->input('kode');
        $provinsi  = $request->input('provinsi');
        DB::table('T_KECAMATAN')->insert([
            'nama' => $nama,
            'id_provinsi' => $provinsi,
            'is_active' => 1,
            'kode' => $kode,
            'created_at' => Carbon::now(),
            'created_by' => 'admin'
        ]);
       return redirect()->back()->with('message','Input Sukses');
    }

    public function edit_kecamatan(Request $request){
        $nama = $request->input('nama');
        $id = $request->input('id');
        $kode = $request->input('kode');
        $provinsi = $request->input('provinsi');
        $data  = DB::table('T_KECAMATAN')->select('*')->where('id',$id)->get(1);
        DB::table('T_KECAMATAN')->where('id',$id)->update([
            'nama' => $nama,
            'id_provinsi' => $provinsi ? $provinsi : $data[0]->id_provinsi,
            'kode' => $kode,
            'updated_at' => Carbon::now(),
            'updated_by' => 'admin'
        ]);
       return redirect()->back()->with('message','Edit Sukses');
    }

    public function hapus_kecamatan(Request $request){
        $id = $request->input('id');
        DB::table('T_KECAMATAN')->where('id',$id)->delete();
       return redirect()->back()->with('message','Hapus Sukses');
    }

    public function kelurahan(Request $request){
        if($request->input('search') != ''){
        $data = DB::table('view_kelurahan')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orwhere('nama_provinsi', 'like','%' .$request->input('search').'%')->orwhere('nama_kecamatan', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->paginate(10);
        }else{
            $data = DB::table('view_kelurahan')->select('*')->orderBy('created_at','desc')->paginate(10);

        }
        $kecamatan = DB::table('view_kecamatan')->select('*')->orderBy('created_at','desc')->get();
        $provinsi = DB::table('T_PROVINSI')->select('*')->orderBy('created_at','desc')->get();

        return view('admin/kelurahan',['data'=>$data,'kecamatan'=>$kecamatan,'provinsi'=>$provinsi]);
    }

    public function print_kelurahan(Request $request){
        if($request->input('search') != ''){
            $data = DB::table('view_kelurahan')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orwhere('nama_provinsi', 'like','%' .$request->input('search').'%')->orwhere('nama_kecamatan', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->get();
        }else{
            $data = DB::table('view_kelurahan')->select('*')->orderBy('created_at','desc')->paginate(10);
    
        }
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.print_kelurahan', compact('data'));
        return $pdf->stream("Laporan Daftar Kelurahan".'pdf');
    }

    public function input_kelurahan(Request $request){
        $nama = $request->input('nama');
        $kode = $request->input('kode');
        $provinsi  = $request->input('provinsi');
        $kecamatan  = $request->input('kecamatan');
        DB::table('T_KELURAHAN')->insert([
            'nama' => $nama,
            'id_provinsi' => $provinsi,
            'id_kecamatan' => $kecamatan,
            'is_active' => 1,
            'kode' => $kode,
            'created_at' => Carbon::now(),
            'created_by' => 'admin'
        ]);
       return redirect()->back()->with('message','Input Sukses');
    }

    public function edit_kelurahan(Request $request){
        $nama = $request->input('nama');
        $id = $request->input('id');
        $kode = $request->input('kode');
        $provinsi = $request->input('provinsi');
        $kecamatan  = $request->input('kecamatan');
        $status =  $request->input('status');
        $data  = DB::table('T_KELURAHAN')->select('*')->where('id',$id)->get(1);
        DB::table('T_KELURAHAN')->where('id',$id)->update([
            'nama' => $nama,
            'id_provinsi' => $provinsi ? $provinsi : $data[0]->id_provinsi,
            'id_kecamatan' => $kecamatan ? $kecamatan : $data[0]->id_kecamatan,
            'kode' => $kode,
            'is_active' => $status  ? $status : $data[0]->is_active,
            'updated_at' => Carbon::now(),
            'updated_by' => 'admin'
        ]);
       return redirect()->back()->with('message','Edit Sukses');
    }

    public function hapus_kelurahan(Request $request){
        $id = $request->input('id');
        DB::table('T_KELURAHAN')->where('id',$id)->delete();
       return redirect()->back()->with('message','Hapus Sukses');
    }

    public function pegawai(Request $request){
        if($request->input('search') != ''){
            $data = DB::table('view_pegawai')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orwhere('nama_kelurahan', 'like','%' .$request->input('search').'%')->orwhere('nama_provinsi', 'like','%' .$request->input('search').'%')->orwhere('nama_kecamatan', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->paginate(10);
        }else{
            $data = DB::table('view_pegawai')->select('*')->orderBy('created_at','desc')->paginate(10);

        }
        $kecamatan = DB::table('view_kecamatan')->select('*')->orderBy('created_at','desc')->get();
        $provinsi = DB::table('T_PROVINSI')->select('*')->orderBy('created_at','desc')->get();
        $kecamatan = DB::table('view_kecamatan')->select('*')->orderBy('created_at','desc')->get();
        $kelurahan = DB::table('view_kelurahan')->select('*')->orderBy('created_at','desc')->get();
        return view('admin/pegawai',['data'=>$data,'kelurahan'=>$kelurahan,'provinsi'=>$provinsi,'kecamatan'=>$kecamatan]);
    }

    public function print_pegawai(Request $request){
        if($request->input('search') != ''){
            $data = DB::table('view_pegawai')->select('*')->where('nama', 'like','%' .$request->input('search').'%')->orwhere('nama_kelurahan', 'like','%' .$request->input('search').'%')->orwhere('nama_provinsi', 'like','%' .$request->input('search').'%')->orwhere('nama_kecamatan', 'like','%' .$request->input('search').'%')->orderBy('created_at','desc')->get();
        }else{
            $data = DB::table('view_pegawai')->select('*')->orderBy('created_at','desc')->paginate(10);

        }
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.print_pegawai', compact('data'));
        return $pdf->stream("Laporan Daftar Pegawai".'pdf');
    }

    public function input_pegawai(Request $request){
        $nama = $request->input('nama');
        $kode = $request->input('kode');
        $provinsi  = $request->input('provinsi');
        $kecamatan  = $request->input('kecamatan');
        $kelurahan  = $request->input('kelurahan');
        $tempat_lahir = $request->input('tempat_lahir');
        $agama = $request->input('agama');
        $alamat = $request->input('alamat');
        $jk = $request->input('jk');
        DB::table('T_PEGAWAI')->insert([
            'nama' => $nama,
            'kode' =>$kode,
            'id_provinsi' => $provinsi,
            'id_kecamatan' => $kecamatan,
            'id_kelurahan' => $kelurahan,
            'jk' => $jk,
            'agama' => $agama,
            'tempat_lahir' => $tempat_lahir,
            'alamat' => $alamat,
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 'admin'
        ]);
       return redirect()->back()->with('message','Input Sukses');
    }

    public function edit_pegawai(Request $request){
        $id = $request->input('id');
        $nama = $request->input('nama');
        $kode = $request->input('kode');
        $provinsi  = $request->input('provinsi');
        $kecamatan  = $request->input('kecamatan');
        $kelurahan  = $request->input('kelurahan');
        $tempat_lahir = $request->input('tempat_lahir');
        $agama = $request->input('agama');
        $alamat = $request->input('alamat');
        $jk = $request->input('jk');
        $status = $request->input('status');
        $data  = DB::table('view_pegawai')->select('*')->where('id',$id)->get(1);
        DB::table('T_PEGAWAI')->where('id',$id)->update([
            'nama' => $nama,
            'id_provinsi' => $provinsi ? $provinsi : $data[0]->id_provinsi,
            'id_kecamatan' => $kecamatan ? $kecamatan : $data[0]->id_kecamatan,
            'id_kelurahan' => $kelurahan ? $kelurahan : $data[0]->id_kelurahan,
            'kode' => $kode,
            'jk' => $jk ? $jk : $data[0]->jk,
            'agama' => $agama ? $agama : $data[0]->agama,
            'is_active' => $status ? $status : $data[0]->is_active,
            'tempat_lahir' => $tempat_lahir,
            'alamat' => $alamat,
            'updated_at' => Carbon::now(),
            'updated_by' => 'admin'
        ]);
       return redirect()->back()->with('message','Edit Sukses');
    }

    public function hapus_pegawai(Request $request){
        $id = $request->input('id');
        DB::table('T_PEGAWAI')->where('id',$id)->delete();
       return redirect()->back()->with('message','Hapus Sukses');
    }

    
} 