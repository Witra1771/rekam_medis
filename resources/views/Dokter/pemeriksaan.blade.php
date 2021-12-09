@include('common.header', ['titlePage' => 'Pemeriksaan'])
@include('common.navbar', ['linkActive' => 'pemeriksaan'])
@include('common.menu')



<!-- Begin Page Content -->
<div class="container-fluid">
@include('sweetalert::alert')
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Pemeriksaan</label>
  <div class="card">
  <div class="form-group col-md-12">

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>No Antrean</th>
        <th>Tanggal</th>
        <th>Nama Pasien</th>
        <th>Dokter</th>
        <th>Spesialis</th>
        <th>Status Pemeriksaan</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($Pantrean as $d)
          @if($d->Status != 'Selesai')
          <tr>
            <td>
                  @if($d->antreana != "")
                    {{ $d->antreana }}
                  @elseif($d->antreanb != "")
                    {{ $d->antreanb }}
                  @endif
            </td>
              <td>{{ $d->tanggal }}</td>
              <td>{{ $d->nama_pasien }}</td>
              <td>{{ $d->nama }}</td>
              <td>{{ $d->spesialis_kedokteran }}</td>
              <td>{{ $d->Status }}</td>
              <td class="btn-group">
              @if($d->spesialis_kedokteran == "Umum")
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-ubah-{{  $d->id_antrean }}">
                  Periksa
                </button>
              @elseif($d->spesialis_kedokteran == "Kejiwaan")
                  <a class="btn btn-primary btn-sm" href="{{ url('/form_pemeriksaan//') }}/{{$d->id_antrean}}">Periksa</a>
              @endif
              </td>
          </tr>
          @endif
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>No Antrean</th>
        <th>Tanggal</th>
        <th>Nama Pasien</th>
        <th>Dokter</th>
        <th>Spesialis</th>
        <th>Status Pemeriksaan</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>

<!-- /.card-body -->
</div>

<!-- Ubah User -->
  @foreach ($Pantrean as $d)
  <div class="modal fade" id="modal-ubah-{{ $d->id_antrean }}">
    <div class="modal-dialog modal-lg" style="width:600px;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pemeriksaan Umum</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- Body   -->  
            <!-- form start -->
            <form role="form" name="edit" method="post" action="{{ url('/pemeriksaan/tambah') }}" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="id_antrean" id="" value="{{ $d->id_antrean }}" hidden>
                    <input type="text" class="form-control" name="jenis_konsultasi" id="" value="{{ $d->kode_spesialis }}" hidden>
                      <input type="text" class="form-control" name="id_pasien" id="" value="{{ $d->id_pasien }}" hidden>
                    <input type="text" class="form-control" name="idPU" id="" value="{{ $IdPU }}">
                      <input type="text" class="form-control" name="nik" id="" value="{{ $d->nik }}" readonly hidden><br>
                      <input type="text" class="form-control" name="idRO" id="" value="{{ $IdRO }}" readonly>
                    </div>
                    <input type="text" class="form-control" name="idP" id="" value="{{ $IdP }}" hidden>
                  </div>
                </div>
                <div class="accordion" id="accordionExample">
                  <?php $i = 0 ?>
                  @foreach($pemeriksaan as $p)
                  @if($p->id_pasien == $d->id_pasien)
                  <?php $i+=1 ?>
                  <div class="row">
                    <div class="col-md-1">
                      <input type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>"
                      value="+">
                    </div>
                    <div class="col-md-11">
                          <p style="padding:5px 0 0 5px;">Pemeriksaan <?= substr($p->created_at,0,-9) ?></p>

                      <div id="collapse<?=$i?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample"><div class="card-body">
                            <div class="row" style="font-size:14px;">
                                <div class="form-group col-md-5">Tekanan Darah : {{$p->tekanan_darah}}</div>
                                <div class="form-group col-md-3">Suhu : {{$p->suhu}}&#8451;</div>
                                <div class="form-group col-md-3">Test Urine : <b class="text-lg">
                                  @if($p->test_urine == "Negatif") -
                                  @else + @endif
                                </b></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">Keluhan</div>
                                <div class="form-group col-md-5">{{$p->keluhan}}</div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">Diagnosis</div>
                                <div class="form-group col-md-5">{{$p->diagnosis}}</div>
                            </div>
                            <div class="row">
                              <table id="example1" class="table">
                                <thead>
                                  <tr>
                                    <th>Obat</th>
                                    <th>Dosis</th>
                                    <th>Aturan Pakai</th>
                                    <th>Jumlah</th>
                                    </tr>
                                  </thead>
                                  <tbody id="">
                                    @foreach($resepObat as $RO)
                                      @if($RO->id_RO == $p->id_RO)
                                       <tr>
                                         <td>{{$RO->id_obat}}</td>
                                         <td>{{$RO->dosis}}</td>
                                         <td>{{$RO->aturan_pakai}}</td>
                                         <td>{{$RO->jumlah}}</td>
                                       </tr>
                                      @endif
                                    @endforeach
                                </tbody>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                   @endif
                  @endforeach
                </div><br>
                <div class="row" hidden> 
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
                            <input type="text" class="form-control" name="umur" id="umur" placeholder="0"  value="" readonly>
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
                                <option value="Negatif">Negatif</option>
                                <option value="Positi">Positif</option>
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
                            <textarea class="form-control" name="keluhan" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Diagnosis</span>
                            </div>
                            <textarea class="form-control" name="diagnosis" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" id="rupiah" class="form-control" name="biaya_pemeriksaan">
                        </div>
                    </div>
                </div>
                <div class="row">
  <div class="form-group col-md-12">
    <?php
      $id_antrean = 12;
    ?>  
    
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-fw fa-capsules"></i>
          </span>
        </div>
         <select class="form-control" name="obat[]" id="obat{{$d->id_antrean}}" style="max-width:30%;">
          @foreach($obat as $obt)
            <option value="{{ $obt->id_obat }}">{{ $obt->nama_obat." ".$obt->dosis}}</option>
          @endforeach
        </select>
        <input type="text" class="form-control" name="aturan_pakai[]" id="aturan_pakai{{$d->id_antrean}}" placeholder="Aturan Pakai">
        <input type="text" class="form-control" name="jumlah[]" id="jumlah{{$d->id_antrean}}" placeholder="" style="max-width:10%;">
        
        <div class="input-group-prepend">
          <input type="button"  class="btn btn-primary btn-sm" name="pekerjaan" id="" onclick="myFunction({{$d->id_antrean}})" value="+">
        </div>
      </div><br>
      <table id="Table" class="table">
        <thead>
          <tr>
            <th>Obat</th>
            <th>Aturan Pakai</th>
            <th>Anjuran Pemakaian</th>
            </tr>
          </thead>
          <tbody id="myTable{{$d->id_antrean}}">
        </tbody>
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