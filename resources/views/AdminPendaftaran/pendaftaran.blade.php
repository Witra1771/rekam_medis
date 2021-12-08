@include('common.header', ['titlePage' => 'Pendaftaran'])
@include('common.navbar', ['linkActive' => 'pendaftaran'])
@include('common.menu')



<!-- Begin Page Content -->
<div class="container-fluid">
@include('sweetalert::alert')
  <h3 class="card-title">Operation</h3>
  <div class="card">
  <div class="card-header">
  <!-- <button type="button" class="btn btn-success swalDefaultSuccess">
    Launch Success Toast
  </button> -->
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">
    Tambah Pendaftar
  </button>
  
</div>

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped table-hover" style="overflow: auto;">
    <thead>
      <tr>
        <th>Nama Pasien</th>
        <th>NIK</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <!-- <th>Umur</th> -->
        <th>JK</th>
        <th>Pekerjaan</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Status Perkawinan</th>
        <th>Foto KTP</th>
        <th>Foto Pasien</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Tpasien as $d)
            
            @if($d->nik == @$lantrean->pasien && $lantrean->Status == 'Selesai')
            <tr>
              <td>{{ $d->nama_pasien }}</td>
              <td>{{ $d->nik }}</td>
              <td>{{ $d->tempat_lahir }}</td>
              <td>{{ $d->tanggal_lahir }}</td>
                  <?php
                    $y = substr($d->tanggal_lahir,0,4);
                    $td = date('Y');
                    $umur = $td - $y;
                  ?>
              <!-- <td><?= $umur?></td> -->
              <td>{{ $d->jk }}</td>
              <td>{{ $d->pekerjaan }}</td>
              <td>{{ $d->alamat }}</td>
              <td>{{ $d->nohp }}</td>
              <td>{{ $d->status_perkawinan }}</td>
              <td><img src="{{ asset('img/') }}{{'/'.$d->foto_ktp}}" alt=""></td>
              <td><img src="{{ asset('img/') }}{{'/'.$d->foto_pasien}}" alt=""></td>
              <td class="btn-group">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-ubah-{{  $d->id_pasien }}">
                  Ubah
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-{{  $d->id_pasien }}">
                  Hapus
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-daftar-{{  $d->id_pasien }}">
                  Daftar
                </button>
              </td>
            </tr>
            @endif
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>Nama Pasien</th>
        <th>NIK</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <!-- <th>Umur</th> -->
        <th>JK</th>
        <th>Pekerjaan</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Status Perkawinan</th>
        <th>Foto KTP</th>
        <th>Foto Pasien</th>
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
                    <input type="text" class="form-control" name="IdP" id="" value="{{ @$IdP }}">
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
                    <input type="text" class="form-control" name="tempat_lahir" id="tem" style="max-width:30%;" placeholder="Tempat" >
                    <input type="date" class="form-control" name="tanggal_lahir"  id="tanggal_lahir" onchange="umur_pasien()">
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
                      <option value="Duda/Janda">Duda/Janda</option>
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
                      <option value="">--Pemeriksaan--</option>
                      @foreach($spesialis as $d)
                      <option value="{{ $d->kode_spesialis }}">{{ $d->spesialis_kedokteran }}</option>
                      @endforeach
                    </select>
                    <select class="custom-select" name="nama_dokter" id="">
                      <option value="">--Dokter--</option>
                      @foreach($user as $d)
                      <option value="{{ $d->id_user }}">{{ $d->nama }}</option>
                      @endforeach
                    </select>
                    <div class="input-group-prepend">
                      <span class="input-group-text">Kunjungan Ke</span>
                    </div>
                  <input type="text" class="form-control" id="" style="max-width: 10%;" placeholder="" value="1" readonly>
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
          <form role="form" name="edit" method="post" action="{{ url('/pendaftaran/ubah', $d->id_pasien) }}" enctype="multipart/form-data">
          @csrf
            
          <div class="card-body">
              <div class="row">
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm" hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text">ID</span>
                    </div>
                    <input type="text" class="form-control" name="id_pasien" id="" value="{{ $d->id_pasien }}">
                  </div>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">NIK</span>
                    </div>
                    <input type="text" class="form-control" name="nik" id="" value="{{ $d->nik }}">
                  </div>
                </div>
                <div class="form-group col-md-7">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nama</span>
                    </div>
                    <input type="text" class="form-control" name="nama_pasien" id="" placeholder="" value="{{ $d->nama_pasien }}">
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="form-group col-md-12">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">TTL</span>
                    </div>
                    <input type="text" class="form-control" name="tempat_lahir" id="tem" placeholder="Tempat" value="{{ $d->tempat_lahir }}">
                    <input type="date" class="form-control" name="tanggal_lahir"  id="tl"  value="{{ $d->tanggal_lahir }}">
                    <input type="text" class="form-control" name="umur" id="umur" placeholder="0"  value="{{ $d->umur }}">
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
                <div class="form-group col-md-4">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">JK</span>
                    </div>
                    <select class="custom-select" name="jk" id="">
                      
                      <option value="Laki-laki" <?php if ($d->jk  == "Laki-laki") { echo "selected";}?>>Laki-laki</option>
                      <option value="Perempuan"<?php if ($d->jk  == "Perempuan") { echo "selected";}?>>Perempuan</option>
                    </select>
                  </div>
                </div> 
                <div class="form-group col-md-7">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Pekerjaan</span>
                    </div>
                  <input type="text" class="form-control" name="pekerjaan" id="" placeholder="" value="{{ $d->pekerjaan }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Alamat</span>
                    </div>
                    <textarea class="form-control" name="alamat" aria-label="With textarea">{{ $d->alamat }}</textarea>
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
                      <option value="Belum Menikah" <?php if ($d->status_perkawinan  == "Belum Menikah") { echo "selected";}?>>Belum Menikah</option>
                      <option value="Menikah" <?php if ($d->status_perkawinan  == "Menikah") { echo "selected";}?>>Menikah</option>
                      <option value="Cerai Hidup" <?php if ($d->status_perkawinan  == "Cerai Hidup") { echo "selected";}?>>Cerai Hidup</option>
                      <option value="Cerai MAti" <?php if ($d->status_perkawinan  == "Cerai Mati") { echo "selected";}?>>Cerai Mati</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">No HP</span>
                    </div>
                  <input type="text" class="form-control" name="nohp" id="" placeholder="" value="{{ $d->nohp }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Foto KTP</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto_ktp" id="fotoKtp" value="{{  $d->foto_ktp}}">
                      <label class="custom-file-label" for="inputGroupFile01">Pilih Image</label>
                    </div>
                  </div>
                  <input type="text" name="foto_ktp" class="form-control" value="{{ $d->foto_ktp}}" hidden>
                </div>
                <div class="col-md-6">
                  <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Foto Pasien</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto_pasien" id="inputGroupFile01" value="{{  $d->foto_pasien}}">
                      <label class="custom-file-label" for="inputGroupFile01">Pilih</label>
                    </div>
                  </div>
                      <input type="text" name="foto_pasien" class="form-control" value="{{ $d->foto_pasien}}" hidden>
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

  
<!-- Ubah User --><!-- Ubah User -->
  @foreach ($pasien as $d)
  <div class="modal fade" id="modal-daftar-{{ $d->id_pasien }}">
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
          <form role="form" name="edit" method="post" action="{{ url('/pendaftaran/daftar', $d->id_pasien) }}" enctype="multipart/form-data">
          @csrf
            
          <div class="card-body">
              <div class="row">
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm" hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text">ID</span>
                    </div>
                    <input type="text" class="form-control" name="id_pasien" id="" value="{{ $d->id_pasien }}">
                  </div>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">NIK</span>
                    </div>
                    <input type="text" class="form-control" name="nik" id="" value="{{ $d->nik }}">
                  </div>
                </div>
                <div class="form-group col-md-7">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nama</span>
                    </div>
                    <input type="text" class="form-control" name="nama_pasien" id="" placeholder="" value="{{ $d->nama_pasien }}">
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
                      <option value="">--Pemeriksaan--</option>
                      @foreach($spesialis as $d)
                      <option value="{{ $d->kode_spesialis }}">{{ $d->spesialis_kedokteran }}</option>
                      @endforeach
                    </select>
                    <select class="custom-select" name="nama_dokter" id="">
                      <option value="">--Dokter--</option>
                      @foreach($user as $d)
                      <option value="{{ $d->id_user }}">{{ $d->nama }}</option>
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
<script>
function myFunction() {
  var x = document.getElementById("tl").value;
  const d = new Date("yyyy");
  var thn = x.substr(0,4);

  document.getElementById("umur").value = String(d);
}
</script>
<!-- /.container-fluid -->
@include('common.footer')