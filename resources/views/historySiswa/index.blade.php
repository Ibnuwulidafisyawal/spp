<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">

        <center>
            <h1 style="font-size: 200%">History Pembayaran SPP </h1>
        </center>
    </div>
   
    <div>

    @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
    @endif

       
<div class="container">
    <div class="row">
    <table class="table table-bordered justify-center" >
        <a href="/historySiswa/cetak_pdf" class="btn btn-success" target="_blank">CETAK PDF</a>
        <tr class="bg-primary">
            <th>No</th>
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
            <td>{{ ++$i }}</td>
            <td>{{ $pembayaranSiswa->nisn }}</td>
            <td>{{ $pembayaranSiswa->tgl_bayar }}</td>
            <td>{{ Carbon\Carbon::parse($pembayaranSiswa->bulan_bayar)->format('d M') }}</td>
            <td>{{ Carbon\Carbon::parse($pembayaranSiswa->tahun_bayar)->format('Y')  }}</td>
            <td>{{ $pembayaranSiswa->nominal }}</td>
            <td>{{ $pembayaranSiswa->jumlah_bayar }}</td>

            @endif
        </tr>
    
        @endforeach
    
        {{-- {{!! $pembayaran->links() !!}} --}}
    </table>
</div>
</div>
  

    </div>
</x-app-layout>
