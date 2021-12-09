</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; BJS 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Dengan menekan tombol "Logout" anda akan kembali pada halaman login</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('global/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('global/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('global/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('global/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('global/js/sb-admin-2.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('global/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('global/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('global/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('global/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('global/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('global/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>






<!-- page script -->
<script>
    var sn = 0; // start a serial number count
            $.each(data, function(index, val) {
                sn++;
                // build a new rows and cols using ES6^ template
                $(".tebus_obat").append(`
                    <tr>
                        <td>${val.id_tebus_obat}</td>
                        <td>${val.id_resep_obat}</td>
                        <td>${val.id_obat}</td>
                        <td>${val.jumlah_beli}</td>
                        <td>${val.sub_total}</td>
                        <td>
                            <a href="javascript:void(0);">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                `);
            });


$(document).ready(function(){
	$("#example").DataTable({
		"ajax": {
			"url" : "data.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data" : "title"},
			{"data": "body"},
			{"data" : "created_at"}
		]
	})
})
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        // Format mata uang.
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

    });
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    const pengobatan = [];

    function myFunction($idAntrean) {
        var obat = document.getElementById("obat" + $idAntrean).value;
        var dosis = document.getElementById("dosis" + $idAntrean).value;
        var aturan_pakai = document.getElementById("aturan_pakai" + $idAntrean).value;
        var jumlah = document.getElementById("jumlah" + $idAntrean).value;
        var x = document.getElementById("contoh" + $idAntrean);
        pengobatan.push([obat, dosis, aturan_pakai, jumlah]);

        var table = document.getElementById("myTable" + $idAntrean);
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        x.innerHTML = pengobatan;
        cell1.innerHTML = "<input type='text' name='obat" + $idAntrean + "[]' value='" + obat + "' hidden>" + obat + "";
        cell2.innerHTML = "<input type='text' name='dosis" + $idAntrean + "[]' value='" + dosis + "' hidden>" + dosis +
            "";
        cell3.innerHTML = "<input type='text' name='aturan_pakai" + $idAntrean + "[]' value='" + aturan_pakai +
            "'' hidden>" + aturan_pakai + "";
        cell4.innerHTML = "<input type='text' name='jumlah" + $idAntrean + "[]' value='" + jumlah + "' hidden>" +
            jumlah + "";

        document.getElementById("obat" + $idAntrean).value = "";
        document.getElementById("dosis" + $idAntrean).value = "";
        document.getElementById("aturan_pakai" + $idAntrean).value = "";
        document.getElementById("jumlah" + $idAntrean).value = "";
        document.getElementById("harga_satuan" + $idAntrean).value = "";
        document.getElementById("jml_beli" + $idAntrean).value = "";
        document.getElementById("sub_total" + $idAntrean).value = "";
    }
    const status_medis = [];
    const obt = [];

    function rawat_inap($idAntrean) {
        var jenis_penyakit = document.getElementById("sm_jenis_penyakit" + $idAntrean).value;
        var dari = document.getElementById("dari").value;
        var sampai = document.getElementById("sampai").value;

        var table = document.getElementById("rawat_inap" + $idAntrean);
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = "<input type='text' name='sm_jenis_penyakit[]' value='" + jenis_penyakit + "' hidden>" +
            jenis_penyakit + "";
        cell2.innerHTML = "<input type='date' name='dari[]' value='" + dari + "' hidden>" + dari + "";
        cell3.innerHTML = "<input type='date' name='sampai[]' value='" + sampai + "'' hidden>" + sampai + "";

        document.getElementById("sm_jenis_penyakit" + $idAntrean).value = "";
        document.getElementById("dari" + $idAntrean).value = "";
        document.getElementById("sampai" + $idAntrean).value = "";
    }

    function myFunction($idAntrean) {
        var obat = document.getElementById("obat" + $idAntrean).value;
        var obatindex = document.getElementById("obat" + $idAntrean).selectedIndex;
        var obatoption = document.getElementById("obat" + $idAntrean).options;
        var aturan_pakai = document.getElementById("aturan_pakai" + $idAntrean).value;
        var jumlah = document.getElementById("jumlah" + $idAntrean).value;

        var table = document.getElementById("myTable" + $idAntrean);
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = "<input type='text' name='obat[]' value='" + obat + "' hidden>" + obatoption[obatindex].text +
            "";
        cell2.innerHTML = "<input type='text' name='aturan_pakai[]' value='" + aturan_pakai + "'' hidden>" +
            aturan_pakai + "";
        cell3.innerHTML = "<input type='text' name='jumlah[]' value='" + jumlah + "' hidden>" + jumlah + "";

        document.getElementById("obat" + $idAntrean).value = "";
        document.getElementById("aturan_pakai" + $idAntrean).value = "";
        document.getElementById("jumlah" + $idAntrean).value = "";
    }

    function nama_obat(idantrean) {
        var nama_obat = document.getElementById("nama_obat" + id_antrean).selectedIndex;
        var obat = document.getElementById("obat" + id_antrean).value;
        sub_total.value = subTotal;
    }

    function subTotal(idobat) {
        var harga_jual = document.getElementById("harga_jual" + idobat).value;
        var jumlah_beli = document.getElementById("jumlah_beli" + idobat).value;
        var sub_total = document.getElementById("subTotal" + idobat);
        var subTotal = harga_jual * jumlah_beli;
        sub_total.value = subTotal;
    }

    function umur_pasien() {
        const tanggal_sekarang = new Date();
        var tanggal_lahir = new Date(document.getElementById("tanggal_lahir").value)

        var umur = document.getElementById("umur");
        var umurPasien = (tanggal_sekarang.getFullYear() - tanggal_lahir.getFullYear())
        umur.value = umurPasien;
    }

    function tahun_rawat_inap() {
        var dari = new Date(document.getElementById("dari").value)
        var sampai = new Date(document.getElementById("sampai").value)

        var tahun_rawatInap = document.getElementById("tahun_rawatInap");
        var tahun = (sampai.getFullYear() - dari.getFullYear())
        tahun_rawatInap.value = tahun;
    }
</script>
</body>

</html>
