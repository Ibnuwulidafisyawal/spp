<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">

        <center>
            <h1 style="font-size: 200%">Data Petugas</h1>
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
                    <a class="btn btn-primary" href="{{ route('petugas.create') }}"> Create</a>
                </div>
            </div>
        </div>
    </div>
    <br>
 
<table class="table table-bordered justify-center" >
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama Petugas</th>
        <th>Level User</th>
        <th>Action</th>
    </tr>


    @foreach ($user as $user)
    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->username }}</td> 
        <td>{{ $user->nama_petugas }}</td>
        <td>{{ $user->level_user }}</td>
        <td>
            <form action="{{ route('petugas.destroy',$user->id_petugas) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
       
                <a class="btn btn-primary" href="{{ route('petugas.edit',$user->id_petugas) }}"><i class="fas fa-edit"></i></a>
 
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>
    </tr>

    @endforeach

    {{-- {{!! $user->links() !!}} --}}
</table>
  

    </div>
</div>
</x-app-layout>
