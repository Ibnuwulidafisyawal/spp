<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">

        <center>
            <h1 style="font-size: 200%">Data spp</h1>
        </center>
    </div>
   
    <div>

    @if(session()->get('success'))
        <div class="alert alert-sucscess">
          {{ session()->get('success') }}  
        </div>
    @endif
       
           
<div class="container">
    <div class="row">
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('spp.create') }}"> Create</a>
                </div>
            </div>
        </div>
    </div>
    <br>
 
<table class="table table-bordered justify-center" >
    <tr>
        <th>No</th>
        <th>Tahun</th>
        <th>Nominal</th>
        <th>Action</th>
    </tr>


    @foreach ($spp as $spp)
    
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $spp->tahun }}</td> 
        <td>{{ $spp->nominal }}</td>
        <td>
            <form action="{{ route('spp.destroy',$spp->id_spp) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
       
                <a class="btn btn-primary" href="{{ route('spp.edit',$spp->id_spp) }}"><i class="fas fa-edit"></i></a>
 
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>
    </tr>

    @endforeach

    {{-- {{!! $spp->links() !!}} --}}
</table>
  

    </div>
</div>
</x-app-layout>
