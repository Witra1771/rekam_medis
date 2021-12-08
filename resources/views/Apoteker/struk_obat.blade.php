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
<p><center>============================</center></p>

  <div style="font-size:4mm;">
  <center>
      <table width="80%" style="margin-left:50px;">
        <thead>
          <tr>
            <td><b>Obat</b>{{$id_tebus_obat}}</td>
            <td><b>Harga</b></td>
          </tr>
        </thead>
        @foreach($tebusObat as $TB)
        <tr>
          <td>{{$TB->id_tebus_obat}}</td>
        </tr>

        @endforeach
      </table>
      <br>
      <p>Semoga Lekas Sembuh
      </p>
      <p>=================</p>
    </center>
  </div>
</body>
</body>
</html>