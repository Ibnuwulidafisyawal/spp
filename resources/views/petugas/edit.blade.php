<x-app-layout>
    <x-auth-card>
    <div class="py-12">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="POST" action="{{ route('siswa.update',$siswa->id) }}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
                <!--Nisn-->
            <div>
                <x-label for="nisn" :value="__('Nisn')" />
                <x-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" value="{{ $siswa->nisn }}" />
            </div>


            <!--Nis-->
            <div>
                <x-label for="nis" :value="__('Nis')" />
                <x-input id="nis" class="block mt-1 w-full" type="text" name="nis" value="{{ $siswa->nis }}" />
            </div>


            <!--nama-->
            <div>
                <x-label for="nama" :value="__('Nama')" />
                <x-input id="nama" class="block mt-1 w-full" type="text" name="nama" value="{{ $siswa->nama }}" />
            </div>

            <!--id kelas-->
            <div>
                <x-label for="id_kelas" :value="__('Nama Kelas')" />
                <select class="select2bs4" data-placeholder="Pilih Kelas" style="width: 100%;" name="id_kelas" >
                    @foreach ($siswa as $siswaKelas)
                      <option value="{{ $siswaKelas->id_kelas }}">{{$siswaKelas->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>

            <!--alamat-->
              <div>
                <x-label for="alamat" :value="__('Alamat')" />
                <x-input id="alamat" class="block mt-1 w-full" type="text" name="alamat"  value="{{ $siswa->alamat }}"/>
            </div>


            <!--No Telp-->
            <div>
                <x-label for="no_telp" :value="__('No Telpon')" />
                <x-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp"  value="{{ $siswa->no_telp }}" />
            </div>

            {{-- <!--id spp-->
            <div>
                <x-label for="id_spp" :value="__('Nominal')" />
                <select class="select2bs4" data-placeholder="Pilih Kelas" style="width: 100%;" name="id_spp" >
                    @foreach ($spp as $sppSiswa)
                      <option value="{{$sppSiswa->id_spp}}" name="id_spp">{{$sppSiswa->nominal}}</option>
                    @endforeach
                </select>
            </div> --}}
    
            <div class="mt-4">
                <x-label for="created_at" :value="__('Tanggal Create')" />
                <x-input id="created_at" class="block mt-1 w-full" type="date" name="created_at" value="{{ $siswa->created_at }}" />
            </div>
      

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    </div>
</x-app-layout>

