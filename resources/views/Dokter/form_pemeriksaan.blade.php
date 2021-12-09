@include('common.header', ['titlePage' => 'Pemeriksaan'])
@include('common.navbar', ['linkActive' => 'pemeriksaan'])
@include('common.menu')

<!-- Begin Page Content -->
<div class="container-fluid">
    @include('sweetalert::alert')
    <h3 class="card-title">Operation</h3>
    <label for="">Operation/Pemeriksaan</label>
    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            @foreach ($Fantrean as $d)
                <form role="form" name="edit" method="post" action="{{ url('/pemeriksaan/tambahJiwa') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-7">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nama</span>
                                    </div>
                                    <input type="text" class="form-control" name="nama_pasien" id="" placeholder=""
                                        value="{{ $d->nama_pasien }}" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-5" hidden>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">NIK</span>
                                    </div>
                                    <input type="text" class="form-control" name="id_antrean" id=""
                                        value="{{ $d->id_antrean }}">
                                    <input type="text" class="form-control" name="id_pasien" id=""
                                        value="{{ $d->pasien }}">
                                    <input type="text" class="form-control" name="nik" id=""
                                        value="{{ $d->nik }}" readonly><br>
                                    <input type="text" class="form-control" name="idRO" id=""
                                        value="{{ $IdRO }}" readonly>
                                </div>
                                <input type="text" class="form-control" name="idP" id="" value="{{ $IdP }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Status Pekerjaan</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Status
                                                                    Pekerjaan</span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                name="status_pekerjaan"
                                                                value="{{ $d->status_pekerjaan }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Pola
                                                                    Pekerjaan</span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                name="pola_pekerjaan" value="{{ $d->pola_pekerjaan }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Keterampilan
                                                                    Teknis</span>
                                                            </div>
                                                            <input type="text" name="keterampilan_teknis" id=""
                                                                class="form-control"
                                                                placeholder="lihat petunjuk pengisian"
                                                                value="{{ $d->keterampilan_teknis }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Adakah yang
                                                                    Memeberi Dukungan Hidup?</span>
                                                            </div>
                                                            <input required type="text" name="dukungan_hidup" id=""
                                                                class="form-control"
                                                                placeholder="lihat petunjuk pengisian">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Siapa</span>
                                                            </div>
                                                            <input required type="text" name="pemberi_dukungan" id=""
                                                                class="form-control"
                                                                placeholder="lihat petunjuk pengisian">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        Bantuan Dalam Bentuk
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Finansial</span>
                                                            </div>
                                                            <select required name="finansial" id="" class="form-control">
                                                                <option value="Tidak">Tidak</option>
                                                                <option value="Ya">Ya</option>
                                                            </select>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Tempat
                                                                    Tinggal</span>
                                                            </div>
                                                            <select required name="tempat_tinggal" id="" class="form-control">
                                                                <option value="Tidak">Tidak</option>
                                                                <option value="Ya">Ya</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Makan</span>
                                                            </div>
                                                            <select required name="makan" id="" class="form-control">
                                                                <option value="Tidak">Tidak</option>
                                                                <option value="Ya">Ya</option>
                                                            </select>
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text">Pengobatan/Perawatan</span>
                                                            </div>
                                                            <select required name="pngbtn_prwtn" id="" class="form-control">
                                                                <option value="Tidak">Tidak</option>
                                                                <option value="Ya">Ya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        Informasi Demografis
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Status Perkawinan</span>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $d->status_perkawinan }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Pendidikan Terakhir</span>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $d->pendidikan_terakhir }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Pemeriksaan Fisik
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">T</span>
                                                        </div>
                                                        <input required type="text" class="form-control" name="T" id="jk"
                                                            placeholder="">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">N</span>
                                                        </div>
                                                        <input required type="text" class="form-control" name="N" id="jk"
                                                            placeholder="">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">RR</span>
                                                        </div>
                                                        <input required type="text" class="form-control" name="RR" id="jk"
                                                            placeholder="">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">SB</span>
                                                        </div>
                                                        <input required type="text" class="form-control" name="SB" id="jk"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Penampilan</span>
                                                        </div>
                                                        <select required name="penampilan" id="" class="form-control">
                                                            <option value="Rapi">Rapi</option>
                                                            <option value="Kurang Rapi">Kurang Rapi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Cara Berjalan</span>
                                                        </div>
                                                        <select required name="cara_berjalan" id="" class="form-control">
                                                            <option value="Sempoyongan">Sempoyongan</option>
                                                            <option value="Biasa">Biasa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Cara Bicara</span>
                                                        </div>
                                                        <select required name="cara_bicara" id="" class="form-control">
                                                            <option value="Pelo/Cadel">Pelo/Cadel</option>
                                                            <option value="Biasa">Biasa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Konjungtiva</span>
                                                        </div>
                                                        <select required name="konjungtiva" id="" class="form-control">
                                                            <option value="Kemerahan">Kemerahan</option>
                                                            <option value="Normal">Normal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Bekas Suntikan</span>
                                                        </div>
                                                        <select required name="bekas_suntikan" id="" class="form-control">
                                                            <option value="Ada">Ada</option>
                                                            <option value="Tidak Ada">Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Tremor</span>
                                                        </div>
                                                        <select required name="tremor" id="" class="form-control">
                                                            <option value="Ada">Ada</option>
                                                            <option value="Tidak Ada">Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Pemeriksaan Psikiatrik
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Pembicaraan</span>
                                                        </div>
                                                        <select required name="alur_pembicaraan" id="" class="form-control">
                                                            <option value="Normal">Normal</option>
                                                            <option value="Tidak Normal">Tidak Normal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Waham</span>
                                                        </div>
                                                        <select required name="waham" id="" class="form-control">
                                                            <option value="Ada">Ada</option>
                                                            <option value="Tidak Ada">Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Halusinasi</span>
                                                        </div>
                                                        <select required name="halusinasi" id="" class="form-control">
                                                            <option value="Aada">Ada</option>
                                                            <option value="Tidak Ada">Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Akustik</span>
                                                        </div>
                                                        <textarea name="akustik" id="" class="form-control" cols="40"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Visual</span>
                                                        </div>
                                                        <textarea name="visual" id="" class="form-control" cols="40"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Lain-lain</span>
                                                        </div>
                                                        <textarea name="psik_lain" id="" class="form-control"
                                                            cols="20" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card form-group">
                                        <div class="card-header">
                                            Pemeriksaan Tambahan
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox1" name="benzodiazepine"
                                                                value="Benzodiazepine">
                                                            <label for="customCheckbox1"
                                                                class="custom-control-label">Benzodiazepine</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox2" name="cocaine" value="Cocaine">
                                                        <label for="customCheckbox2"
                                                            class="custom-control-label">Cocaine</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" name="amphetamin" value="Amphetamin">
                                                        <label for="customCheckbox3"
                                                            class="custom-control-label">Amphetamin</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="form-group col-md-4">
                                                    <div class="input-group input-group-sm">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="customCheckbox4" name="cthc_marijuana"
                                                                value="CTHC/Marijuana">
                                                            <label for="customCheckbox4"
                                                                class="custom-control-label">CTHC/Marijuana</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox5" name="methaphetamine"
                                                            value="Methaphetamine">
                                                        <label for="customCheckbox5"
                                                            class="custom-control-label">Methaphetamine</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox6" name="morphin" value="Morphin">
                                                        <label for="customCheckbox6"
                                                            class="custom-control-label">Morphin</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- rapihkan -->
                        <div class="row form-group">
                            <div class="col-md-12">
                                <?php
                                $gb = 'kk';
                                $array = [
                                    $gb => [2, 4, 6, 7],
                                    'dua' => [3],
                                ];
                                $id_antrean = 12;
                                ?>
                                <div class="card">
                                    <div class="card-header">Status Medis</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">Riwayat Rawat Inap yang tidak
                                                        terkait masalah narkotika</div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <p id="contoh2"></p>
                                                            <div class="form-group col-md-12">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Jenis
                                                                            Penyakit</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="sm_jenis_penyakit{{ $id_antrean }}[]"
                                                                        id="sm_jenis_penyakit{{ $id_antrean }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Dirawat</span>
                                                                    </div>
                                                                    <input type="date" class="form-control"
                                                                        name="dari{{ $id_antrean }}[]" id="dari"
                                                                        onchange="tahun_rawat_inap()">
                                                                    <input type="date" class="form-control"
                                                                        name="sampai{{ $id_antrean }}[]" id="sampai"
                                                                        onchange="tahun_rawat_inap()">
                                                                    <input type="text" class="form-control"
                                                                        id="tahun_rawatInap" style="max-width:10%;"
                                                                        readonly>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Thn</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card_footer">
                                                            <input type="button"
                                                                class="btn btn-primary btn-sm float-right"
                                                                name="pekerjaan" id=""
                                                                onclick="rawat_inap({{ $id_antrean }})"
                                                                value="tambah">
                                                        </div><br><br>
                                                        <table id="Table" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Jenis Penyakit</th>
                                                                    <th>Dari</th>
                                                                    <th>Sampai</th>
                                                                    <th>Lamanya</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="rawat_inap{{ $id_antrean }}">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Riwayat Penyakit
                                                                    Kronis</span>
                                                            </div>
                                                            <select required name="penyakit_kronis" id=""
                                                                class="form-control">
                                                                <option value="Tidak Ada">Tidak Ada</option>
                                                                <option value="Ada">Ada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Jenis
                                                                    Penyakit</span>
                                                            </div>
                                                            <textarea name="jenis_penyakit_kronis" id="" cols="20"
                                                                rows="3" class="form-control"
                                                                placeholder="Isi jika memiliki riwayat penyakit kronis"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Terapi
                                                                    Medis</span>
                                                            </div>
                                                            <select name="terapi_medis" id="" class="form-control">
                                                                <option value="Tidak Menjalani">Tidak Menjalani</option>
                                                                <option value="Sedang Menjalani">Sedang Menjalani</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Jenis
                                                                    Terapi</span>
                                                            </div>
                                                            <textarea name="jenis_terapi" id="" cols="20" rows="3"
                                                                class="form-control"
                                                                placeholder="Isi jika sedang menjalani terapi medis"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="card">
                                                        <div class="card-header">Status Kesehatan</div>
                                                        <div class="card-body">
                                                            <div class="row form-gruop">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">4,1</span>
                                                                    </div>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">HIV</span>
                                                                    </div>
                                                                    <select name="hiv" id="" class="form-control">
                                                                        <option value="Pernah Menjalani">Pernah Menjalani Test
                                                                        </option>
                                                                        <option value="Tidak Pernah Menjalani">Tidak pernah menjalani
                                                                            test</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row form-gruop">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">4,2</span>
                                                                    </div>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Hepatitis
                                                                            B</span>
                                                                    </div>
                                                                    <select name="hepatitib" id=""
                                                                        class="form-control">
                                                                        <option value="Pernah Menjalani">Pernah Menjalani Test
                                                                        </option>
                                                                        <option value="Tidak Pernah Menjalani">Tidak pernah menjalani
                                                                            test</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row form-gruop">
                                                                <div class="input-group input-group-sm">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">4,3</span>
                                                                    </div>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Hepatitis
                                                                            C</span>
                                                                    </div>
                                                                    <select name="hepatitisc" id=""
                                                                        class="form-control">
                                                                        <option value="Pernah Menjalani">Pernah Menjalani Test
                                                                        </option>
                                                                        <option value="Tidak Pernah Menjalani">Tidak pernah menjalani
                                                                            test</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Status Penggunaan Narkotika</div>
                                <div class="row card-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Jenis <br> Penggunaan</span>
                                                </div>
                                                <div class="input-group-sm">
                                                    <span class="input-group-text">0. Tidak Memakai</span>
                                                    <span class="input-group-text">1. Oral</span>
                                                    <span class="input-group-text">2.
                                                        Nasal/Sublingal/Suppositoria</span>
                                                    <span class="input-group-text">3. Merokok</span>
                                                    <span class="input-group-text">4. Ijeksi non-IV</span>
                                                    <span class="input-group-text">5. IV</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">Isi berdasarkan dari petunjuk di atas</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Pernah Menjalani terapi
                                                        Rehabilitas?</span>
                                                </div>
                                                <select name="terapi_rehab" id="" class="form-control">
                                                    <option required value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Jenis Terapi</span>
                                                </div>
                                                <input type="text" name="SPN_jenis_terapi" id="" class="form-control"
                                                    placeholder="Isi Jika Pernah Menjalani terapi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Pernah Mengalami
                                                        Overdosis?</span>
                                                </div>
                                                <select name="overdosis" id="" class="form-control">
                                                    <option required value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Kapan Waktu <br>
                                                        Overdosis</span>
                                                </div>
                                                <textarea name="waktu_overdosis" id="" cols="20" rows="2"
                                                    class="form-control"
                                                    placeholder="Isi Jika Pernah Mengalami Overdosis"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Cara Penanggulangan</span>
                                                </div>
                                                <select name="cara_penanggulangan" id="" class="form-control">
                                                    <option required value="Perawatan di RS">Perawatan Di RS</option>
                                                    <option value="Perawatan di Puskesmas">Perawatan Di Puskesmas</option>
                                                    <option value="Sendiri">Sendiri</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Obat</th>
                                                    <th>Pengunaan</th>
                                                    <th>Nama Obat</th>
                                                    <th>Pengunaan</th>
                                                    <th>Nama Obat</th>
                                                    <th>Pengunaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Alkohol</td>
                                                    <td>
                                                        <input required type="radio" name="Alkohol" id="" value="">0
                                                        <input type="radio" name="Alkohol" id="" value="1">1
                                                        <input type="radio" name="Alkohol" id="" value="2">2
                                                        <input type="radio" name="Alkohol" id="" value="3">3
                                                        <input type="radio" name="Alkohol" id="" value="4">4
                                                        <input type="radio" name="Alkohol" id="" value="5">5
                                                    </td>
                                                    <td>Heroin</td>
                                                    <td>
                                                        <input required type="radio" name="Heroin" id="" value="">0
                                                        <input type="radio" name="Heroin" id="" value="1">1
                                                        <input type="radio" name="Heroin" id="" value="2">2
                                                        <input type="radio" name="Heroin" id="" value="3">3
                                                        <input type="radio" name="Heroin" id="" value="4">4
                                                        <input type="radio" name="Heroin" id="" value="5">5
                                                    </td>
                                                    <td>Metadon</td>
                                                    <td>
                                                        <input required type="radio" name="Metadon" id="" value="">0
                                                        <input type="radio" name="Metadon" id="" value="1">1
                                                        <input type="radio" name="Metadon" id="" value="2">2
                                                        <input type="radio" name="Metadon" id="" value="3">3
                                                        <input type="radio" name="Metadon" id="" value="4">4
                                                        <input type="radio" name="Metadon" id="" value="5">5
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Analgesik</td>
                                                    <td>
                                                        <input required type="radio" name="Analgesik" id="" value="">0
                                                        <input type="radio" name="Analgesik" id="" value="1">1
                                                        <input type="radio" name="Analgesik" id="" value="2">2
                                                        <input type="radio" name="Analgesik" id="" value="3">3
                                                        <input type="radio" name="Analgesik" id="" value="4">4
                                                        <input type="radio" name="Analgesik" id="" value="5">5
                                                    </td>
                                                    <td>Barbibutat</td>
                                                    <td>
                                                        <input required type="radio" name="Barbibutat" id="" value="">0
                                                        <input type="radio" name="Barbibutat" id="" value="1">1
                                                        <input type="radio" name="Barbibutat" id="" value="2">2
                                                        <input type="radio" name="Barbibutat" id="" value="3">3
                                                        <input type="radio" name="Barbibutat" id="" value="4">4
                                                        <input type="radio" name="Barbibutat" id="" value="5">5
                                                    </td>
                                                    <td>Sedatif/Hipnotik</td>
                                                    <td>
                                                        <input required type="radio" name="SedaHip" id="" value="">0
                                                        <input type="radio" name="SedaHip" id="" value="1">1
                                                        <input type="radio" name="SedaHip" id="" value="2">2
                                                        <input type="radio" name="SedaHip" id="" value="3">3
                                                        <input type="radio" name="SedaHip" id="" value="4">4
                                                        <input type="radio" name="SedaHip" id="" value="5">5
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kokain</td>
                                                    <td>
                                                        <input required type="radio" name="Kokain" id="" value="">0
                                                        <input type="radio" name="Kokain" id="" value="1">1
                                                        <input type="radio" name="Kokain" id="" value="2">2
                                                        <input type="radio" name="Kokain" id="" value="3">3
                                                        <input type="radio" name="Kokain" id="" value="4">4
                                                        <input type="radio" name="Kokain" id="" value="5">5
                                                    </td>
                                                    <td>Amfetamin</td>
                                                    <td>
                                                        <input required type="radio" name="Amfetamin" id="" value="">0
                                                        <input type="radio" name="Amfetamin" id="" value="1">1
                                                        <input type="radio" name="Amfetamin" id="" value="2">2
                                                        <input type="radio" name="Amfetamin" id="" value="3">3
                                                        <input type="radio" name="Amfetamin" id="" value="4">4
                                                        <input type="radio" name="Amfetamin" id="" value="5">5
                                                    </td>
                                                    <td>Kanabis</td>
                                                    <td>
                                                        <input required type="radio" name="Kanabis" id="" value="">0
                                                        <input type="radio" name="Kanabis" id="" value="1">1
                                                        <input type="radio" name="Kanabis" id="" value="2">2
                                                        <input type="radio" name="Kanabis" id="" value="3">3
                                                        <input type="radio" name="Kanabis" id="" value="4">4
                                                        <input type="radio" name="Kanabis" id="" value="5">5
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Halusinogen</td>
                                                    <td>
                                                        <input required type="radio" name="Halusinogen" id="" value="">0
                                                        <input type="radio" name="Halusinogen" id="" value="1">1
                                                        <input type="radio" name="Halusinogen" id="" value="2">2
                                                        <input type="radio" name="Halusinogen" id="" value="3">3
                                                        <input type="radio" name="Halusinogen" id="" value="4">4
                                                        <input type="radio" name="Halusinogen" id="" value="5">5
                                                    </td>
                                                    <td>Inhalan</td>
                                                    <td>
                                                        <input required type="radio" name="Inhalan" id="" value="">0
                                                        <input type="radio" name="Inhalan" id="" value="1">1
                                                        <input type="radio" name="Inhalan" id="" value="2">2
                                                        <input type="radio" name="Inhalan" id="" value="3">3
                                                        <input type="radio" name="Inhalan" id="" value="4">4
                                                        <input type="radio" name="Inhalan" id="" value="5">5
                                                    </td>
                                                    <td>Lebih dari 4 Zat</td>
                                                    <td>
                                                        <input required  type="radio" name="empat_zat" id="" value="">0
                                                        <input type="radio" name="empat_zat" id="" value="1">1
                                                        <input type="radio" name="empat_zat" id="" value="2">2
                                                        <input type="radio" name="empat_zat" id="" value="3">3
                                                        <input type="radio" name="empat_zat" id="" value="4">4
                                                        <input type="radio" name="empat_zat" id="" value="5">5
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped table-hover col-md-6">
                                            <thead>
                                                <tr>
                                                    <th>Zat Lain</th>
                                                    <th>Penggunaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td><input type="text" name="zat_lain_isi" id="" class="form-control"
                                                        placeholder="Isi jika menggunakan zat lain"></td>
                                                <td>
                                                    <input required type="radio" name="zat_lain" id="" value="">0
                                                    <input type="radio" name="zat_lain" id="" value="1">1
                                                    <input type="radio" name="zat_lain" id="" value="2">2
                                                    <input type="radio" name="zat_lain" id="" value="3">3
                                                    <input type="radio" name="zat_lain" id="" value="4">4
                                                    <input type="radio" name="zat_lain" id="" value="5">5
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Status Legal | Berapa kalikah dalam hidup anda
                                    ditangkap dan dituntut dengan hal berikut : (pilih 1 untuk Ya, pilih 2 untuk
                                    Tidak)</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            <table class="table table-steiped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Jenis Pelangggaran</th>
                                                        <th>Tindakan</th>
                                                        <th>Jenis Pelangggaran</th>
                                                        <th>Tindakan</th>
                                                        <th>Jenis Pelangggaran</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Mencuri Toko/ Vandalisme</td>
                                                        <td>
                                                            <input type="radio" name="mnc" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Pelanggaran Bebas Bersyarat / Masa Percobaan</td>
                                                        <td>
                                                            <input type="radio" name="pbbmp" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Masalah Narkoba</td>
                                                        <td>
                                                            <input type="radio" name="mn" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pemalsuan</td>
                                                        <td>
                                                            <input type="radio" name="pmls" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Penyerangan Bersenjata</td>
                                                        <td>
                                                            <input type="radio" name="pnbs" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Pembobolan dan Pencurian</td>
                                                        <td>
                                                            <input type="radio" name="pbpn" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Perampokan</td>
                                                        <td>
                                                            <input type="radio" name="prm" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Penyerangan</td>
                                                        <td>
                                                            <input type="radio" name="pnr" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Pembakaran Rumah</td>
                                                        <td>
                                                            <input type="radio" name="pr" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pemerkosaan</td>
                                                        <td>
                                                            <input type="radio" name="pmrk" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Pembunuhan</td>
                                                        <td>
                                                            <input type="radio" name="pbn" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>Pelacuran</td>
                                                        <td>
                                                            <input type="radio" name="pnr" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Melecehkan Pengadilan</td>
                                                        <td>
                                                            <input type="radio" name="mlpg" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Lain -
                                                                        lain</span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    name="SL_lain_isi">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="pnr" id="" value="Ya">Ya
                                                            <input type="radio" name="mnc" id="" value="Tidak">Tidak
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Riwayat Keluarga / Sosial | Dalam Situasi Seperti Apakah Anda Tinggal 3
                                    Tahun Belakangan Ini?
                                </div>
                                <div class="row card-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Kondisi Hidup Dengan</span>
                                                </div>
                                                <select name="kondisi_hidup" id="" class="form-control">
                                                    <option required value="1">Pasangan dan Anak</option>
                                                    <option value="2">Pasangan Saja</option>
                                                    <option value="3">Anak Saja</option>
                                                    <option value="4">Orangtua</option>
                                                    <option value="5">Keluarga</option>
                                                    <option value="6">Teman</option>
                                                    <option value="7">Sendiri</option>
                                                    <option value="8">Lingkungan Terkontrol</option>
                                                    <option value="9">Kondisi yang Tidak Stabil</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Hidup dengan seseorang
                                                        dengan penyalahgunaan zat?</span>
                                                </div>
                                                <select name="hidup_dgn_pgn_zat" id="" class="form-control">
                                                    <option required value="0">Tidak</option>
                                                    <option value="1">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                Dengan siapa sajakah penyalah guna zat tersebut
                                            </div>
                                            <div class="row card-body">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Saudara
                                                                    Kandung/Tiri</span>
                                                            </div>
                                                            <select name="saudara_kandung_tiri" id=""
                                                                class="form-control">
                                                                <option required value="0">Tidak</option>
                                                                <option value="1">Ya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Ayah/Ibu</span>
                                                            </div>
                                                            <select name="ayah_ibu" id="" class="form-control">
                                                                <option required value="0">Tidak</option>
                                                                <option value="0">Ya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Om/Tante</span>
                                                            </div>
                                                            <select name="om_tante" id="" class="form-control">
                                                                <option required value="0">Tidak</option>
                                                                <option value="1">Ya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Teman</span>
                                                            </div>
                                                            <select name="teman" id="" class="form-control">
                                                                <option required value="0">Tidak</option>
                                                                <option value="1">Ya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Pasangan</span>
                                                            </div>
                                                            <select name="pasangan" id="" class="form-control">
                                                                <option required value="0">Tidak</option>
                                                                <option value="1">Ya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Lainnya</span>
                                                            </div>
                                                            <input type="text" name="RL_lainnya_isi" id=""
                                                                class="form-control">
                                                            <select name="RL_lainnya" id="" class="form-control"
                                                                style="max-width:30%;">
                                                                <option required value="0">Tidak</option>
                                                                <option value="1">Ya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                Apakah pasien memiliki konflik serius dalam berhubungan dengan :
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-sm table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Dengan</th>
                                                            <th>Tidak Ada</th>
                                                            <th>30 hari terakhir</th>
                                                            <th>Sepanjang Hidup</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Ibu</td>
                                                            <td><input required type="radio" name="KIbu" id="" value="">0</td>
                                                            <td><input type="radio" name="KIbu" id="" value="1">1</td>
                                                            <td><input type="radio" name="KIbu" id="" value="2">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Adik/Kakak</td>
                                                            <td><input required type="radio" name="KAdiKa" id="" value="">0</td>
                                                            <td><input type="radio" name="KAdiKa" id="" value="1">1</td>
                                                            <td><input type="radio" name="KAdiKa" id="" value="2">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pasangan</td>
                                                            <td><input required type="radio" name="KPas" id="" value="0">0</td>
                                                            <td><input type="radio" name="KPas" id="" value="1">1</td>
                                                            <td><input type="radio" name="KPas" id="" value="2">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Anak-anak</td>
                                                            <td><input required type="radio" name="KAnak" id="" value="0">0</td>
                                                            <td><input type="radio" name="KAnak" id="" value="1">1</td>
                                                            <td><input type="radio" name="KAnak" id="" value="2">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keluarga lain
                                                                <input type="text" name="Klain_isi" id=""
                                                                    class="form-control" placeholder="Isi jika ada">
                                                            </td>
                                                            <td><input required type="radio" name="KLain" id="" value="">0</td>
                                                            <td><input type="radio" name="KLain" id="" value="1">1</td>
                                                            <td><input type="radio" name="KLain" id="" value="2">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Teman Akrab</td>
                                                            <td><input required type="radio" name="TmnAkrab" id="" value="">0
                                                            </td>
                                                            <td><input type="radio" name="TmnAkrab" id="" value="1">1
                                                            </td>
                                                            <td><input type="radio" name="TmnAkrab" id="" value="2">2
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tetangga</td>
                                                            <td><input required type="radio" name="ttg" id="" value="">0
                                                            </td>
                                                            <td><input type="radio" name="ttg" id="" value="1">1
                                                            </td>
                                                            <td><input type="radio" name="ttg" id="" value="2">2
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Teman Kerja</td>
                                                            <td><input required type="radio" name="TmnKerja" id="" value="">0
                                                            </td>
                                                            <td><input type="radio" name="TmnKerja" id="" value="1">1
                                                            </td>
                                                            <td><input type="radio" name="TmnKerja" id="" value="2">2
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Status Psikiatris | Apakah pernah mengalami hal-hal berikut ini (yang bukan
                                    akibat langsung dari pengguna napza)
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ciri Ciri / Gejala yang dialami pasien</th>
                                                <th>Tidak Ada</th>
                                                <th>30 Hari Terakhir</th>
                                                <th>Sepanjang Hidup</th>
                                                <th>Ciri Ciri / Gejala yang dialami pasien</th>
                                                <th>Tidak Ada</th>
                                                <th>30 Hari Terakhir</th>
                                                <th>Sepanjang Hidup</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mengalami depresi serius (kesedihan, putus asa)</td>
                                                <td><input required type="radio" name="C1" id="" value="0">0</td>
                                                <td><input type="radio" name="C1" id="" value="1">1</td>
                                                <td><input type="radio" name="C1" id="" value="2">2</td>
                                                <td>Mengalami rasa cemas serius / ketegangan gelisah</td>
                                                <td><input type="radio" name="C2" id="" value="">0</td>
                                                <td><input type="radio" name="C2" id="" value="1">1</td>
                                                <td><input type="radio" name="C2" id="" value="2">2</td>
                                            </tr>
                                            <tr>
                                                <td>Mengalami halusinasi kesulitan (melihat / mendengar sesuatu
                                                    yang tidak ada objeknya)</td>
                                                    <td><input required type="radio" name="C3" id="" value="">0</td>
                                                <td><input type="radio" name="C3" id="" value="1">1</td>
                                                <td><input type="radio" name="C3" id="" value="2">2</td>
                                                <td>Mengalami kesulitan mengingat atau fokus ke sesuatu</td>
                                                <td><input required type="radio" name="C4" id="" value="">0</td>
                                                <td><input type="radio" name="C4" id="" value="1">1</td>
                                                <td><input type="radio" name="C4" id="" value="2">2</td>
                                            </tr>
                                            <tr>
                                                <td>mengalami kesukaran mengontrol perilaku kasar, termasuk
                                                    kemarahan atau kekerasan</td>
                                                    <td><input required type="radio" name="C5" id="" value="">0</td>
                                                <td><input type="radio" name="C5" id="" value="1">1</td>
                                                <td><input type="radio" name="C5" id="" value="2">2</td>
                                                <td>Mengalami pikiran serius unuk bunuh diri</td>
                                                <td><input required type="radio" name="C6" id="" value="">0</td>
                                                <td><input type="radio" name="C6" id="" value="1">1</td>
                                                <td><input type="radio" name="C6" id="" value="2">2</td>
                                            </tr>
                                            <tr>
                                                <td>Berusaha untuk bunuh diri</td>
                                                <td><input required type="radio" name="C7" id="" value="">0</td>
                                                <td><input type="radio" name="C7" id="" value="1">1</td>
                                                <td><input type="radio" name="C7" id="" value="2">2</td>
                                                <td>Menerima pengobatan dari psikiater</td>
                                                <td><input required type="radio" name="C8" id="" value="">0</td>
                                                <td><input type="radio" name="C8" id="" value="1">1</td>
                                                <td><input type="radio" name="C8" id="" value="2">2</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <?php $i = 0; ?>
        @foreach ($pemeriksaan as $p)
            @if ($p->id_pasien == $d->id_pasien)
                <?php $i += 1; ?>
                <div class="row">
                    <div class="col-md-1">
                        <input type="button" class="btn btn-link" data-toggle="collapse"
                            data-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>"
                            value="+">
                    </div>
                    <div class="col-md-11">
                        <p style="padding:5px 0 0 5px;">Pemeriksaan <?= substr($p->created_at, 0, -9) ?>
                        </p>
                        <div id="collapse<?= $i ?>" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Obat</th>
                                                <th>Dosis</th>
                                                <th>Aturan Pakai</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            @foreach ($resepObat as $RO)
                                                @if ($RO->id_RO == $p->id_RO)
                                                    <tr>
                                                        <td>{{ $RO->id_obat }}</td>
                                                        <td>{{ $RO->dosis }}</td>
                                                        <td>{{ $RO->aturan_pakai }}</td>
                                                        <td>{{ $RO->jumlah }}</td>
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


    <div class="row">
      <div class="col-md-12">
        <h5>Biaya Konsultasi Dokter</h5>
      </div>
      <div class="col-md-12">
        <div class="row form-group">
          <div class="form-group col-md-6">
              <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="text" class="form-control" id="rupiah" name="biaya_pemeriksaan">
              </div>
          </div>
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
                <select class="form-control" name="obat[]" id="obat{{ $id_antrean }}" style="max-width:30%;">
                    @foreach ($obat as $d)
                        <option value="{{ $d->id_obat }}">{{ $d->nama_obat . ' ' . $d->dosis }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control" required name="aturan_pakai[]" id="aturan_pakai{{ $id_antrean }}"
                    placeholder="Aturan Pakai">
                <input type="text" class="form-control" required name="jumlah[]" id="jumlah{{ $id_antrean }}"
                    placeholder="Jumlah Pemakaian" style="max-width:10%;">

                <div class="input-group-prepend">
                    <input type="button" required class="btn btn-primary btn-sm" name="pekerjaan" id=""
                        onclick="myFunction({{ $id_antrean }})" value="+">
                </div>
            </div><br>
            <table id="Table" class="table">
                <thead>
                    <tr>
                        <th>Obat</th>
                        <th>Aturan Pakai</th>
                        <th>Jumlah Pemakaian</th>
                    </tr>
                </thead>
                <tbody id="myTable{{ $id_antrean }}">
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary float-right">Submit</button>
</div>
</form>
@endforeach
<!-- /.modal -->




</div>

<!-- /.card-body -->
</div>


<!-- /.container-fluid -->
@include('common.footer')
