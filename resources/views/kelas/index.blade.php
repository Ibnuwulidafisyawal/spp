<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">

        <center>
            <h1 style="font-size: 200%">Kelas</h1>
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
                    <a class="btn btn-primary" href="{{ route('kelas.create') }}"> Create</a>
                </div>
            </div>
        </div>
    </div>
    <br>
        <table class="table table-bordered justify-center" >
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th>Tanggal Create</th>
                <th>Action</th>
            </tr>


            @foreach ($kelas as $kelas)
            
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kelas->nama_kelas }}</td>
                <td>{{ $kelas->kompetensi_keahlian }}</td>
                <td>{{ $kelas->created_at }}</td>
                <td>
                    <form action="{{ route('kelas.destroy',$kelas->id_kelas) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
            
                        <a class="btn btn-primary" href="{{ route('kelas.edit',$kelas->id_kelas) }}"><i class="fas fa-edit"></i></a>
        
                        @csrf
                        @method('DELETE')
            
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>

            @endforeach

            {{-- {{!! $kelas->links() !!}} --}}
        </table>
    </div>
</div>

    </div>
</x-app-layout>
