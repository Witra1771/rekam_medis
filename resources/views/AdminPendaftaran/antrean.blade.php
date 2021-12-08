@include('common.header', ['titlePage' => 'Antrean'])
@include('common.navbar', ['linkActive' => 'antrean'])
@include('common.menu')



<!-- Begin Page Content -->
<div class="container-fluid">
@include('sweetalert::alert')
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Pendaftaran</label>
  <div class="card">

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nomor Antrean</th>
        <th>Nama Pasien</th>
        <th>Dokter</th>
        <th>Pemeriksaan</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tantrean as $d)
          @if($d->Status != 'Selesai')
            <tr>
                <td>
                    @if($d->antreana != NULL)    
                        {{ $d->antreana }}
                    @elseif($d->antreanb != NULL)
                        {{ $d->antreanb }}
                    @endif
                </td>
                <td>{{ $d->nama_pasien }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->spesialis_kedokteran }}</td>
                <td class="btn-group">
                  @if($d->Status == 'Menunggu')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah-{{$d->id_antrean}}">
                      Tambah Pendaftar
                    </button>
                  @elseif($d->Status == 'Proses')
                  <label for=""> Sedang dalam Pemeriksaan</label>
                  @endif
                </td>
            </tr>
          @endif
        @endforeach
    </tbody>
    <tfoot>
      <tr>
          <th>Nomor Antrean</th>
        <th>Nama Pasien</th>
        <th>Dokter</th>
        <th>Pemeriksaan</th>
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
  @foreach ($antrean as $d)
  <div class="modal fade" id="modal-ubah-{{ $d->id_antrean }}">
  <div class="modal-dialog modal-lg" style="width:600px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Proses</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/antrean/proses/'. $d->id_antrean) }}">
          @csrf
            <div class="card-body">
              Proses pasien <b>
                @foreach($pasien as $p)
                  @if($p->nik == $d->pasien)
                    {{$p->nama_pasien}}
                  @endif
                @endforeach
              </b>
            </div>
            <input type="text" name="IdP" id="" value="{{@$IdP}}" hidden>
            <!-- /.card-body -->
            <div class="card-footer modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary toastsDefaultSuccess">Proses</button>
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