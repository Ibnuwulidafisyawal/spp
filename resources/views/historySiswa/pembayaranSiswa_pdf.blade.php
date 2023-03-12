<!DOCTYPE html>
<html>
<head>
	<title>Laporan SPP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pembayaran SPP</h4>
	</center>

    <table class="table table-bordered justify-center" >
        <tr class="bg-primary">
            {{-- <th>No</th> --}}
            <th>nisn</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Bayar</th>
            <th>Nominal</th>
            <th>Jumlah Bayar</th>
        </tr>
    
        @foreach ($pembayaranSiswa as $pembayaranSiswa)
        <tr>

            @if($pembayaranSiswa->id_siswa == Auth::user()->id_siswa)
            {{-- <td>{{ ++$i }}</td> --}}
            <td>{{ $pembayaranSiswa->nisn }}</td>
            <td>{{ $pembayaranSiswa->tgl_bayar }}</td>
            <td>{{ Carbon\Carbon::parse($pembayaranSiswa->bulan_bayar)->format('d M') }}</td>
            <td>{{ Carbon\Carbon::parse($pembayaranSiswa->tahun_bayar)->format('Y')  }}</td>
            <td>{{ $pembayaranSiswa->nominal }}</td>
            <td>{{ $pembayaranSiswa->jumlah_bayar }}</td>

            @endif
        </tr>
    
        @endforeach
    
    </table>
 
</body>
</html>