@include('common.header', ['titlePage' => 'Data Pasien'])
@include('common.navbar', ['linkActive' => 'DataPasien'])
@include('common.menu')


<!-- Begin Page Content -->
<div class="container-fluid">
  <h3 class="card-title">Operation</h3>
  <label for="">Operation/Kelola Obat</label>
  <div class="card">

<!-- /.card-header -->
<div class="card-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>NIK</th>
        <th>Nama Pasien</th>
        <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tebusObat as $d)
          <tr>
            <td>{{$d->nik}}
            </td>
            <td>{{ $d->nama_pasien }}</td>
            <td class="btn-group">
              <a class="btn btn-primary btn-sm" href="">Detil</a>
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

<!-- /.card-body -->
</div>

</div>
<!-- /.container-fluid -->
@include('common.footer')