@include('common.header', ['titlePage' => 'Laporan'])
@include('common.navbar', ['linkActive' => 'laporan'])
@include('common.menu')


<!-- Begin Page Content -->
<div class="container-fluid">
                <h3 class="card-title">Operation</h3>
                <label for="">Operation/Laporan</label><div class="card">
              <div class="card-header">
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Laporan</label>
                    <div class="col-sm-4">
                      <!-- <input type="text" class="form-control" id="inputEmail3" placeholder="Pilh "> -->
                      <select class="form-control" name="" id="">
                        <option value="">--Pilih Jenis Laporan --</option>
                        <option value="">Rekam Medis</option>
                        <option value="">Pasien</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Periode</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  <button type="submit" class="btn btn-info">Cari</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>Pemeriksaan</th>
                    <th>Pemeriksa</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Penanganan</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <td>Agung</td>
                    <td>Umum</td>
                    <td>Dr. Ratna</td>
                    <td>10-11-2021</td>
                    <td>Batuk</td>
                    <td>radang tenggorokan</td>
                    <td>banyak minum air putih</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Pasien</th>
                    <th>Pemeriksaan</th>
                    <th>Pemeriksa</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Penanganan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>
<!-- /.container-fluid -->
@include('common.footer')