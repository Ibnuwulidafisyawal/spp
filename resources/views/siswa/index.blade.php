<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">

        <center>
            <h1 style="font-size: 200%">Data Siswa</h1>
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
                    <a class="btn btn-primary" href="{{ route('siswa.create') }}"> Create</a>
                </div>
            </div>
        </div>
    </div>
    <br>
 
<table class="table table-bordered justify-center" >
    <tr>
        <th>No</th>
        <th>Nisn</th>
        <th>Nis</th>
        <th>nama</th>
        <th>nama Kelas</th>
        <th>alamat</th>
        <th>No Telpon</th>
        <th>Nominal SPP</th>
        <th>Action</th>
    </tr>


    @foreach ($siswa as $siswa)
    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $siswa->nisn }}</td> 
        <td>{{ $siswa->nis }}</td>
        <td>{{ $siswa->nama }}</td>
        <td>{{ $siswa->nama_kelas }}</td>
        <td>{{ $siswa->alamat }}</td>
        <td>{{ $siswa->no_telp }}</td>
        <td>{{ $siswa->nominal }}</td>
        <td>
            <form action="{{ route('siswa.destroy',$siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
       
                <a class="btn btn-primary" href="{{ route('siswa.edit',$siswa->id) }}"><i class="fas fa-edit"></i></a>
 
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>
    </tr>

    @endforeach

    {{-- {{!! $siswa->links() !!}} --}}
</table>
  

    </div>
</div>
</x-app-layout>
