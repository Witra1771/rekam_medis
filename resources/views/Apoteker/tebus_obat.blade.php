@include('common.header', ['titlePage' => 'Tebus Obat'])
@include('common.navbar', ['linkActive' => 'TebusObat'])
@include('common.menu')


<!-- Begin Page Content -->
<div class="container-fluid">
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Tebus Obat</label>
  <div class="card">

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No Antrean</th>
        <th>Nama</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tebusObat as $d)
          @if($d->jumlah >= 1)
        <tr>
          <td>
            @if($d->antreana != "")
              {{ $d->antreana }}
            @elseif($d->antreanb != "")
              {{ $d->antreanb }}
            @endif
          </td>
            <td>{{ $d->nama_pasien }}</td>
            <td class="btn-group">
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tebusObat-{{  $d->id_antrean }}">
                Tebus Obat
              </button>
            </td>
        </tr>
          @endif
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>No Antrean</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- /.card-body -->
</div>

@foreach ($tebusObat as $d)
  <div class="modal fade" id="modal-tebusObat-{{ $d->id_antrean }}">
    <div class="modal-dialog modal-lg" style="width:1000px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tebus Obat</h4>
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
              <div class="row">
                <div class="form-group col-md-7">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Nama</span>
                    </div>
                    <input type="text" class="form-control" name="nama_pasien" id="" placeholder="" value="{{ $d->nama_pasien }}" readonly>
                  </div>
                </div>
                <div class="form-group col-md-5">    
                  <div class="input-group input-group-sm" hidden>
                    <div class="input-group-prepend">
                      <span class="input-group-text">NIK</span>
                    </div>
                    <input type="text" class="form-control" name="idRO" id="" value="{{ $IdRO }}" hidden>
                    <input type="text" class="form-control" name="id_antrean" id="" value="{{ $d->id_antrean }}" hidden>
                      <input type="text" class="form-control" name="id_pasien" id="" value="{{ $d->id_pasien }}" hidden>
                      <input type="text" class="form-control" name="nik" id="" value="{{ $d->nik }}" readonly hidden><br>
                    </div>
                  </div>
              </div>
                <div class="row">
                    <div class="form-group col-md-12"><br>
                        <table id="myTable" class="table">
                          <thead>
                            <tr>
                              <th>Obat</th>
                              <th>Aturan Pakai</th>
                              <th>Jumlah</th>
                              <th>harga satuan</th>
                              <th>jumlah Beli</th>
                              <th>sub Total</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              <?php $i = 1 ?>
                              @foreach($resepObat as $RO)
                                @if($RO->id_RO == $d->id_RO)
                                  @foreach($obat as $obt)
                                    @if($obt->id_obat == $RO->id_obat && $RO->jumlah >= 1)
                                      <?php $i += 1 ?>
                                <tr>
                                    <td>{{$obt->nama_obat}} {{$obt->dosis}}                                   
                                        <input type="text" name="id_ResO" id="" value="{{$RO->id_RO}}" hidden>
                                        <input type="text" name="id_obat[]" id="" value="{{$obt->id_obat}}" hidden>
                                        <input type="text" name="id_resep_obat[]" id="" value="{{$RO->id_RO}}" hidden>
                                    </td>
                                    <td>{{$RO->aturan_pakai}}</td>
                                  <td>{{$RO->jumlah}}</td>
                                    <td><input type="text" name="" id="harga_jual{{$obt->id_obat}}" value="{{$obt->harga_jual}}" hidden>
                                      {{$obt->harga_jual}}</td>
                                    <td><input type="number" name="jumlah_beli[]" class="form-control"  onchange="subTotal({{$obt->id_obat}})"
                                    id="jumlah_beli{{$obt->id_obat}}" min="1" max="{{$RO->jumlah}}" value="1"></td>
                                    <td><input type="text" name="sub_total[]" class="form-control" onchange="totalBayar()"
                                    id="subTotal{{$obt->id_obat}}" value="{{$obt->harga_jual}}" style="max-width:60%;" readonly></td>
                                  
                                  </tr>
                                    @endif
                                  @endforeach
                                @endif

                              @endforeach
                                
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
</div>
<!-- /.container-fluid -->
@include('common.footer')