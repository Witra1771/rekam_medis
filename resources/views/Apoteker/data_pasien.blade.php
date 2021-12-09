@include('common.header', ['titlePage' => 'Data Pasien'])
@include('common.navbar', ['linkActive' => 'dataPasienApoteker'])
@include('common.menu')


<!-- Begin Page Content -->
<div class="container-fluid">
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Data Penjualan</label>
  <div class="card">

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama Pasien</th>
        <th>Pembelian</th>
        </tr>
      </thead>
      <tbody>
        <?php $i =0; ?>
        @foreach ($tebusObat as $d)
        <?php $i +=1; ?>
          <tr>
            <td><?= $i ?></td>
            <td>{{$d->nik}}</td>
            <td>{{ $d->nama_pasien }}</td>
            <td>
              <table>
                <tr>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detil-pembelian-{{  $d->id_tebus_obat }}">
                Detil Pembelian
              </button>
                </tr>
              </table>
            </td>
          </tr>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>NIK</th>
        <th>Nama Pasien</th>
        <th>Aksi</th>
        </tr>
    </tfoot>
  </table>
</div>

@foreach ($tebusObat as $d)
  <div class="modal fade" id="modal-detil-pembelian-{{ $d->id_tebus_obat }}">
    <div class="modal-dialog modal-lg" style="width:1000px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detil Pembelian</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- Body   -->  
            <!-- form start -->
            <form role="form" name="edit" method="post" action="{{ url('/tebusobat/tambah') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="card-body">
                    <div class="form-group col-md-12"><br>
                        <table id="myTable" class="table">
                          <thead>
                            <tr>
                              <th>Obat</th>
                              <th>harga satuan</th>
                              <th>jumlah Beli</th>
                              <th>sub Total</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              @foreach($obat as $obt)
                                @if($obt->id_obat == $d->id_obat)
                                  <tr>
                                    <td>
                                      {{$obt->nama_obat}} {{$obt->dosis}}
                                    </td>
                                    <td>{{$d->jumlah_beli}}</td>
                                    <td>{{$obt->harga_jual}}</td>
                                    <td>{{$d->jumlah_beli * $obt->harga_jual}}</td>
                                  </tr>
                                @endif
                              @endforeach
                          </tbody>
                          </tfoot>
                        </table>
                    </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<!-- /.card-body -->
</div>

</div>
<!-- /.container-fluid -->
@include('common.footer')