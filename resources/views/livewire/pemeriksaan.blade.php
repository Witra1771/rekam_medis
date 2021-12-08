@include('common.header', ['titlePage' => 'Data Pasien'])
@include('common.navbar', ['linkActive' => 'dataPasien'])
@include('common.menu')



<!-- Begin Page Content -->
<div class="container-fluid">
@include('sweetalert::alert')
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Data Pasien</label>
  <div class="card">

<!-- /.card-header -->
<div class="card-body">    
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No Antrean</th>
        <th>NIK</th>
        <th>Nama Pasien</th>
        <th>Alamat</th>
        <th>Status Perkawinan</th>
        <th>Status Pemeriksaan</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pasien as $d)
          @foreach ($antrean as $a)
            @if($a->Status == 'Menunggu')
            <tr>
              <td>
                  @if($a->antreana != "")
                    {{ $a->antreana }}
                  @elseif($a->antreanb != "")
                    {{ $a->antreanb }}
                  @endif
              </td>
              <td>{{ $d->nik }}</td>
              <td>{{ $d->nama_pasien }}</td>
              <td>{{ $d->alamat }}</td>
              <td>{{ $d->status_perkawinan }}</td>
              <td>{{ $a->Status }}</td>
              <td class="btn-group">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah-{{  $d->id_pasien }}">
                  Periksa
                </button>
              </td>
            </tr>
            @endif
          @endforeach
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>No Antrean</th>
        <th>NIK</th>
        <th>Nama Pasien</th>
        <th>Alamat</th>
        <th>Status Perkawinan</th>
        <th>Status Pemeriksaan</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- /.card-body -->
</div>

<!-- Tambah User -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg" style="width:600px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pendaftar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/pendaftaran/tambah') }}" enctype="multipart/form-data">
          @csrf
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm" hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text">ID</span>
                    </div>
                    <input type="text" class="form-control" name="id_pasien" id="" value="{{ @$Id }}">
                  </div>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">NIK</span>
                    </div>
                    <input type="text" class="form-control" name="nik" id="">
                  </div>
                </div>
                <div class="form-group col-md-7">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nama</span>
                    </div>
                  <input type="text" class="form-control" name="nama_pasien" id="" placeholder="">
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="form-group col-md-12">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">TTL</span>
                    </div>
                    <input type="text" class="form-control" name="tempat_lahir" id="tem" placeholder="Tempat" >
                    <input type="date" class="form-control" name="tanggal_lahir"  id="tl">
                    <input type="text" class="form-control" name="umur" id="umur" placeholder="0" style="max-width:10%;">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Thn</span>
                    </div>
                  </div>
                  <div class="input-group col-md-4 float-left">
                  </div>
                </div>
              </div>
              <div class="row">
              </div>
              <div class="row"> 
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">JK</span>
                    </div>
                    <select class="custom-select" name="jk" id="">
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div> 
                <div class="form-group col-md-7">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Pekerjaan</span>
                    </div>
                  <input type="text" class="form-control" name="pekerjaan" id="" placeholder="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Alamat</span>
                    </div>
                    <textarea class="form-control" name="alamat" aria-label="With textarea"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-7">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Status Perkawinan</span>
                    </div>
                    <select class="custom-select" name="status_perkawinan" id="">
                      <option value="Belum Menikah">Belum Menikah</option>
                      <option value="Menikah">Menikah</option>
                      <option value="Cerai Hidup">Cerai Hidup</option>
                      <option value="Cerai MAti">Cerai Mati</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">No HP</span>
                    </div>
                  <input type="text" class="form-control" name="nohp" id="" placeholder="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Foto KTP</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto_ktp" id="inputGroupFile01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Foto Pasien</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto_pasien" id="inputGroupFile01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Pemeriksaan</span>
                    </div>
                    <select class="custom-select" name="spesialis" id="">
                      <option value="">--Spesialis--</option>
                      @foreach($spesialis as $d)
                      <option value="{{ $d->kode_spesialis }}">{{ $d->spesialis_kedokteran }}</option>
                      @endforeach
                    </select>
                    <select class="custom-select" name="nama_dokter" id="">
                      <option value="">--Dokter--</option>
                      @foreach($user as $d)
                      <option value="{{ $d->id }}">{{ $d->name }}</option>
                      @endforeach
                    </select>
                    <div class="input-group-prepend">
                      <span class="input-group-text">Kunjungan Ke</span>
                    </div>
                  <input type="text" class="form-control" id="" style="max-width: 10%;" placeholder="" readonly>
                  </div>
                </div>
                <div class="form-group col-md-12">
                </div>
             </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<!-- Ubah User -->
  @foreach ($pasien as $d)
  <div class="modal fade" id="modal-ubah-{{ $d->id_pasien }}">
    <div class="modal-dialog modal-lg" style="width:600px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Pasien</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- Body   -->  
            <!-- form start -->
            <form role="form" name="edit" method="post" action="{{ url('/kelola_obat/ubah', $d->id_obat) }}" enctype="multipart/form-data">
            @csrf
            
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-5">
                  
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">NIK</span>
                            </div>
                            <input type="text" class="form-control" name="id_pasien" id="" value="{{ $d->id_pasien }}" hidden>
                            <input type="text" class="form-control" name="nik" id="" value="{{ $d->nik }}" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-7">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nama</span>
                            </div>
                            <input type="text" class="form-control" name="nama_pasien" id="" placeholder="" value="{{ $d->nama_pasien }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group col-md-4">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">JK</span>
                            </div>
                            <input type="text" class="form-control" name="jk" id="jk" placeholder=""  value="{{ $d->jk }}" readonly>
                        </div>
                    </div> 
                    <div class="form-group col-md-3">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="umur" id="umur" placeholder="0"  value="{{ $d->umur }}" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Thn</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pekerjaan</span>
                            </div>
                            <input type="text" class="form-control" name="pekerjaan" id="" placeholder="" value="{{ $d->pekerjaan }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pemeriksaan</span>
                            </div>
                            <input type="text" class="form-control" name="tekanan_darah" id="" placeholder="Tekanan Darah"  style="max-width:25%;">
                            <input type="text" class="form-control" name="suhu" id="" placeholder="Suhu" style="max-width:10%;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">&#8451;</span>
                            </div>
                            <select class="custom-select" name="test_urine" id="" style="max-width:25%;">
                                <option value="">-- Test Urine --</option>
                                <option value="Negativa">Negative</option>
                                <option value="Positive">Positive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Keluhan</span>
                            </div>
                            <textarea class="form-control" name="alamat" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Diagnosa</span>
                            </div>
                            <textarea class="form-control" name="alamat" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pengobatan</span>
                            </div>
                            <select name="obat[]" class="form-control" id="">
                                @foreach($obat as $obt)
                                    <option value="$obt->id_obat">{{$obt->nama_obat}}</option>
                                @endforeach
                            </select>
                            <!-- <select class="js-example-basic-single" name="obat" style="max-width:30%;">
                                @foreach($obat as $d)
                                    <option value="{{ $d->id_obat }}">{{ $d->nama_obat }}</option>
                                @endforeach
                            </select> -->
                            <select class="custom-select" name="dosis[]" id="" style="max-width:20%;">
                                <option value="">-- Dosis --</option>
                                @foreach($obat as $obt)
                                    <option value="$obt->dosis">{{$obt->dosis}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" name="pekerjaan[]" id="" placeholder="Aturan Pakai">
                            <input type="text" class="form-control" name="jumlah[]" id="" placeholder="Jumlah" style="max-width:10%;">
                            <input type="button" class="btn btn-primary btn-sm" name="pekerjaan" id="" placeholder="Aturan Pakai"  onclick="myFunction()" value="+">
                        </div>
                        <table id="example1" class="table">
                            <thead>
                            <tr>
                                <th>Obat</th>
                                <th>Dosis</th>
                                <th>Aturan Pakai</th>
                                <th>Jumlah Pakai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($obat as $index=>$cart)
                                    <tr>
                                        <td>{{ $cart['nama_obat'] }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @endforeach
  <!-- /.modal -->

  
<!-- Ubah User -->
@foreach ($pasien as $d)
  <div class="modal fade" id="modal-hapus-{{ $d->id_pasien }}">
    <div class="modal-dialog modal-lg" style="width:600px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Pasien</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/pendaftaran/hapus', $d->id_pasien) }}">
          @csrf
            <div class="card-body">
              Apakah anda yakin akan menghapus data pasien <b>{{ $d->nama_pasien }}</b>?
            </div>
            <!-- /.card-body -->
            <div class="card-footer modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger toastsDefaultSuccess">Hapus</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @endforeach
</div>

<!-- /.container-fluid -->
@include('common.footer')