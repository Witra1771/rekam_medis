<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Apotek Jati Ukir | Nomor Antrean</title>
 <style>
*{margin:0;padding:0}

 </style>
</head>
<body style="width:75mm;">

<h1 style="font-size:8mm;"><center>Apotek Jati Ukir</center></h1>
<p><center>Jl. Arya Wiratanudatar</center></p><br>
<p><b>=============================</b></p>

  <div style="font-size:4mm;">
  <center>
    <?php $sekarang = 0 ?>
      <table width="100%">
        <thead>
          <tr>
            <td><b>Obat</b></td>
            <td><b>Jml</b></td>
            <td><b>Sub Total</b></td>
          </tr>
        <tr>
          <td colspan="3">---------------------------------------------------</td>
        </tr>
        </thead>
        @foreach($tebusObat as $TB)
            @for($i =0; $i < count($id_obat); $i++))
              @if($id_obat[$i] == $TB->id_obat)
                <tr>
                  <td>{{$TB->nama_obat}} {{$TB->dosis}}<br>Rp.{{$TB->harga_jual}}</td>
                  <td>{{$jumlah_beli[$i]}}</td>
                  <td>Rp. {{$jumlah_beli[$i] * $TB->harga_jual}}</td>
                </tr>
              <?php
                $temp     = $jumlah_beli[$i] * $TB->harga_jual;
                $total    = $temp + $sekarang;
                ?>
              @endif
            @endfor
        @endforeach
        <tr>
          <td colspan="3">---------------------------------------------------</td>
        </tr>
        <tr>
          <td colspan=2>Total Bayar</td>
          <td>Rp. {{$total}}</td>
        </tr>
      </table>
    </center>
<p><b>===============================</b></p>
      <br>
      <p><center>Semoga Lekas Sembuh</center></p>
  </div>
</body>
</html>