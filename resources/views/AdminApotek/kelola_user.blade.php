@include('common.header', ['titlePage' => 'Kelola User'])
@include('common.navbar', ['linkActive' => 'kelola_user'])
@include('common.menu')


<!-- Begin Page Content -->
<div class="container-fluid">
@include('sweetalert::alert')
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Kelola User</label>
  <div class="card">
  <div class="card-header">
  <!-- <button type="button" class="btn btn-success swalDefaultSuccess">
    Launch Success Toast
  </button> -->
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">
    Tambah User
  </button>
</div>

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>Hak Akses</th>
        <th>Dokter Spesialis</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $u)
          @if($u->hak_akses != "Admin")
          <tr>
            <td>{{ $u->nama }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->hak_akses }}</td>
            <td>{{ $u->dokter_spesialis }}</td>
            <td class="btn-group">
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-ubah-{{  $u->id_user }}">
              Ubah
            </button>
            <!-- <a class="btn btn-warning btn-sm" href="{{ url('/kelola_user/ubah/'. $u->id_user) }}">Ubah</a> -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-{{  $u->id_user }}">
              Hapus
            </button>
          </td>
        </tr>
        @endif
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>Hak Akses</th>
        <th>Dokter Spesialis</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- /.card-body -->
</div>

<!-- Tambah User -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/kelola_user/tambah') }}">
          @csrf
            <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm" hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text">ID</span>
                    </div>
                    <input type="text" class="form-control" name="id_user" id="" value="{{ @$Id }}">
                  </div>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nama Lengkap</span>
                    </div>
                    <input type="text" class="form-control" name="nama" id="">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Username</span>
                    </div>
                    <input type="text" class="form-control" name="username" id="" placeholder="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">TTL</span>
                    </div>
                    <input type="text" class="form-control" name="tempat_lahir" id="tem" placeholder="Tempat Lahir" >
                    <input type="date" class="form-control" name="tanggal_lahir"  id="tl">
                  </div>
                  <div class="input-group col-md-4 float-left">
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">JK</span>
                    </div>
                    <select class="custom-select" name="jk" id="">
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Hp</span>
                      </div>
                      <input type="text" class="form-control" name="no_hp" id="" placeholder="">
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
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Hak Akses</span>
                    </div>
                  <select class="form-control" name="hak_akses" id="">
                    <option value="Admin Pendaftaran">Admin Pendaftaran</option>
                    <option value="Dokter">Dokter</option>
                    <option value="Apoteker">Apoteker</option>
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Spesialis</span>
                    </div>
                  <select class="form-control" name="dokter_spesialis" id="">
                    <option value="">---Pilih---</option>
                    <option value="Dokter Umum">Dokter Umum</option>
                    <option value="Dokter Jiwa">Dokter Jiwa</option>
                  </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary toastsDefaultSuccess">Submit</button>
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
  @foreach ($user as $u)
  <div class="modal fade" id="modal-ubah-{{ $u->id_user }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/kelola_user/ubah', $u->id_user) }}">
          @csrf
            <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm" hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text">ID</span>
                    </div>
                    <input type="text" class="form-control" name="id_user" id="" value="{{ $u->id_user }}">
                    <input type="text" class="form-control" name="password" id="" value="{{ $u->password }}">
                  </div>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nama Lengkap</span>
                    </div>
                    <input type="text" class="form-control" name="nama" id="" value="{{ $u->nama }}">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Username</span>
                    </div>
                    <input type="text" class="form-control" name="username" id="" placeholder="" value="{{ $u->username }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">TTL</span>
                    </div>
                    <input type="text" class="form-control" name="tempat_lahir" id="tem" placeholder="Tempat Lahir"  value="{{ $u->tempat_lahir }}">
                    <input type="date" class="form-control" name="tanggal_lahir"  id="tl" value="{{ $u->tanggal_lahir }}">
                  </div>
                  <div class="input-group col-md-4 float-left">
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">JK</span>
                    </div>
                    <select class="custom-select" name="jk" id="">
                      <option value="L" <?php if ($u->jk  == "L") { echo "selected";}?>>Laki-laki</option>
                      <option value="P"<?php if ($u->jk  == "P") { echo "selected";}?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Hp</span>
                      </div>
                      <input type="text" class="form-control" name="no_hp" id="" placeholder="" value="{{ $u->no_hp }}">
                    </div>
                  </div>
              </div>
               
              <div class="row">
                <div class="form-group col-md-12">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Alamat</span>
                    </div>
                    <textarea class="form-control" name="alamat" aria-label="With textarea">{{ $u->alamat }}</textarea>
                  </div>
                </div>
              </div> 
                
              <div class="row">
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Hak Akses</span>
                    </div>
                  <select class="form-control" name="hak_akses" id="">
                    <option value="Admin Pendaftaran" <?php if ($u->hak_akses  == "Admin Pendaftaran") { echo "selected";}?>>Admin Pendaftaran</option>
                    <option value="Dokter" <?php if ($u->hak_akses  == "Dokter") { echo "selected";}?>>Dokter</option>
                    <option value="Apoteker" <?php if ($u->hak_akses  == "Apoteker") { echo "selected";}?>>Apoteker</option>
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-5">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Spesialis</span>
                    </div>
                  <select class="form-control" name="dokter_spesialis" id="">
                    <option value="">---Pilih---</option>
                    <option value="Dokter Umum" <?php if ($u->dokter_spesialis  == "Dokter Umum") { echo "selected";}?>>Dokter Umum</option>
                    <option value="Dokter Jiwa" <?php if ($u->dokter_spesialis  == "Dokter Jiwa") { echo "selected";}?>>Dokter Jiwa</option>
                  </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary toastsDefaultSuccess">Submit</button>
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

  @foreach ($user as $d)
  <div class="modal fade" id="modal-hapus-{{ $d->id_user }}">
    <div class="modal-dialog modal-lg" style="width:600px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/kelola_user/hapus/'. $u->id_user) }}">
          @csrf
            <div class="card-body">
              Apakah anda yakin akan menghapus data pasien <b>{{ $d->nama }}</b>?
              <input type="text" name="id_user" id="" value="{{$d->id_user}}" hidden>
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