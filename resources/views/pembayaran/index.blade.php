<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">

        <center>
            <h1 style="font-size: 200%">Pembayaran</h1>
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
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('pembayaran.create') }}"> Create</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    
        <table class="table table-bordered justify-center" >
            <tr>
                <th>No</th>
                <th>nisn</th>
                <th>Tanggal Bayar</th>
                <th>Bulan Bayar</th>
                <th>Tahun Bayar</th>
                <th>spp</th>
                <th>Jumlah Bayar</th>
                <th>Action</th>
            </tr>


            @foreach ($pembayaran as $pembayaran)
            
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pembayaran->nisn }}</td>
                <td>{{ $pembayaran->tgl_bayar }}</td>
                <td>{{ Carbon\Carbon::parse($pembayaran->bulan_bayar)->format('d M') }}</td>
                <td>{{ Carbon\Carbon::parse($pembayaran->tahun_bayar)->format('Y')  }}</td>
                <td>{{ $pembayaran->nominal }}</td>
                <td>{{ $pembayaran->jumlah_bayar }}</td>
                <td>
                    <form action="{{ route('pembayaran.destroy',$pembayaran->id_pembayaran) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
            
                        <a class="btn btn-primary" href="{{ route('pembayaran.edit',$pembayaran->id_pembayaran) }}"><i class="fas fa-edit"></i></a>
        
                        @csrf
                        @method('DELETE')
            
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>

            @endforeach

            {{-- {{!! $pembayaran->links() !!}} --}}
        </table>
        

    </div>
</div>
</x-app-layout>
