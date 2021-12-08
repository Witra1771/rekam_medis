@include('common.header', ['titlePage' => 'Kelola Obat'])
@include('common.navbar', ['linkActive' => 'kelola_obat'])
@include('common.menu')


<!-- Begin Page Content -->
<div class="container-fluid">
@include('sweetalert::alert')
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Kelola Obat</label>
  <div class="card">
  <div class="card-header">
  <!-- <button type="button" class="btn btn-success swalDefaultSuccess">
    Launch Success Toast
  </button> -->
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">
    Tambah Obat
  </button>
</div>

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Dosis</th>
        <th>Satuan</th>
        <th>Jenis Obat</th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($obat as $d)
          <tr>
            <td>{{ $d->nama_obat }}</td>
            <td>{{ $d->dosis }}</td>
            <td>{{ $d->satuan }}</td>
            <td>{{ $d->jenis_obat }}</td>
            <td>{{ $d->qty }}</td>
            <td>{{ $d->harga_beli }}</td>
            <td>{{ $d->harga_jual }}</td>
            <td class="btn-group">
              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
              data-target="#modal-ubah-{{  $d->id_obat }}"> Ubah </button>
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
              data-target="#modal-hapus-{{  $d->id_obat }}"> Hapus </button>
            </td>
          </tr>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>Nama</th>
        <th>Satuan</th>
        <th>Jenis Obat</th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
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
          <h4 class="modal-title">Tambah Obat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/kelola_obat/tambah') }}">
          @csrf
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">ID Obat</label>
                  <input type="text" class="form-control" name="id_obat" id="" value="{{ @$Id }}" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputPassword1">Nama Obat</label>
                  <input type="text" class="form-control" name="nama_obat" id="" placeholder="">
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputPassword1">Jenis Obat</label>
                  <select class="form-control" name="jenis_obat" id="">
                    <option value="Set">Set</option>
                    <option value="Pil">Pil</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Botol">Botol</option>
                  </select>
                </div>
               </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Dosis</label>
                  <input type="text" class="form-control" name="dosis" id="" placeholder="">
                </div>
                <div class="form-group col-md-3">
                 <label for="exampleInputPassword1">Satuan</label>
                  <select class="form-control" name="satuan" id="">
                    <option value="mg">Mg</option>
                    <option value="gr">Gr</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Stok</label>
                  <input type="number" class="form-control" name="qty" id="" value="0" min="0">
                </div>    
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Harga Beli</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" name="harga_beli" id="" placeholder="">
                  </div>

                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Harga Jual</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" name="harga_jual" id="" placeholder="">
                  </div>
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
  @foreach ($obat as $d)
  <div class="modal fade" id="modal-ubah-{{ $d->id_obat }}">
    <div class="modal-dialog modal-lg" style="width:600px;">
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
          <form role="form" method="post" action="{{ url('/kelola_obat/ubah', $d->id_obat) }}">
          @csrf
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">ID Obat</label>
                  <input type="text" class="form-control" name="id_obat" id="" value="{{ $d->id_obat }}" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputPassword1">Nama Obat</label>
                  <input type="text" class="form-control" name="nama_obat" id="" value="{{ $d->nama_obat }}" placeholder="">
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputPassword1">Dosis</label>
                  <input type="text" class="form-control" name="dosis" id="" value="{{ $d->dosis }}" placeholder="">
                </div>
               </div>
              <div class="row">
                <div class="form-group col-md-3">
                 <label for="exampleInputPassword1">Satuan</label>
                  <select class="form-control" name="satuan" id="">
                    <option value="mg" <?php if ($d->satuan  == "mg") { echo "selected";}?>>Mg</option>
                    <option value="gr" <?php if ($d->satuan  == "gr") { echo "selected";}?>>Gr</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Jenis Obat</label>
                  <select class="form-control" name="jenis_obat" id="">
                    <option value="Set" <?php if ($d->jenis_obat  == "Set") { echo "selected";}?>>Set</option>
                    <option value="Pil" <?php if ($d->jenis_obat  == "Pil") { echo "selected";}?>>Pil</option>
                    <option value="Tablet" <?php if ($d->jenis_obat  == "Tablet") { echo "selected";}?>>Tablet</option>
                    <option value="Botol" <?php if ($d->jenis_obat  == "Botol") { echo "selected";}?>>Botol</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="exampleInputPassword1">Stok</label>
                  <input type="number" class="form-control" name="qty" id="" value="{{ $d->qty }}" min="0">
                </div>    
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Harga Beli</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" name="harga_beli" id="" value="{{ $d->harga_beli }}" placeholder="">
                  </div>

                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Harga Jual</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" name="harga_jual" id="" value="{{ $d->harga_jual }}" placeholder="">
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

  @foreach ($obat as $d)
  <div class="modal fade" id="modal-hapus-{{ $d->id_obat }}">
    <div class="modal-dialog modal-lg" style="width:600px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Obat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Body   -->  
          <!-- form start -->
          <form role="form" method="post" action="{{ url('/kelola_obat/hapus', $d->id_obat) }}">
          @csrf
            <div class="card-body">
              Apakah anda yakin akan menghapus data obat <b>{{ $d->nama_obat }}</b>?
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
  <!-- /.modal -->
</div>
<!-- /.container-fluid -->
@include('common.footer')