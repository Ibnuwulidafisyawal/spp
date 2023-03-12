<x-app-layout>
    <x-auth-card>
    <div class="py-12">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('pembayaran.store') }}" enctype="multipart/form-data">
            @csrf
            <!--Nisn-->
            <div>
                <x-label for="nisn" :value="__('NISN')" />
                <select class="select2bs4" data-placeholder="Pilih Kelas" style="width: 100%;" name="nisn" >
                    @foreach ($siswa as $siswa)
                      <option value="{{$siswa->nisn}}" name="nisn">{{$siswa->nisn.' | '}}{{ $siswa->nis .' | '}} {{ $siswa->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-label for="id_siswa" :value="__('Akun Login Siswa')" />
                <select class="select2bs4" data-placeholder="Pilih Kelas" style="width: 100%;" name="id_siswa" >
                    @foreach ($petugas as $petugas)
                      <option value="{{$petugas->id_siswa}}" name="id_siswa">{{$petugas->nama_petugas}}</option>
                    @endforeach
                </select>
            </div>


            <!--Tanggal Bayar-->
            <div>
                <x-label for="tgl_bayar" :value="__('Tanggal Bayar')" />
                <x-input id="tgl_bayar" class="block mt-1 w-full" type="date" name="tgl_bayar"  />
            </div>


            <!--Bulan Bayar-->
            <div>
                <x-label for="bulan_bayar" :value="__('Bulan Bayar')" />
                <x-input id="bulan_bayar" class="block mt-1 w-full" type="month" name="bulan_bayar"  />
            </div>

            <!--Tahun Bayar-->
            <div>
                <x-label for="tahun_bayar" :value="__('Tahun Bayar')" />
                <x-input id="tahun_bayar" class="block mt-1 w-full" type="month" name="tahun_bayar"  />
            </div>

            <div>
                <x-label for="id_spp" :value="__('SPP')" />
                <select class="select2bs4" data-placeholder="Pilih Kelas" style="width: 100%;" name="id_spp" >
                    @foreach ($spp as $sppSiswa)
                      <option value="{{$sppSiswa->id_spp}}" name="id_spp">{{$sppSiswa->nominal}}</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                <x-label for="jumlah_bayar" :value="__('Jumlah Bayar')" />
                <x-input id="jumlah_bayar" class="block mt-1 w-full" type="text" name="jumlah_bayar"  />
            </div>
         
            <div class="mt-4">
                <x-label for="created_at" :value="__('Tanggal Create')" />
                <x-input id="created_at" class="block mt-1 w-full" type="date" name="created_at"  />
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

