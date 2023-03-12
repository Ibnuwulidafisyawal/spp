<x-app-layout>
    <x-auth-card>
    <div class="py-12">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('petugas.store') }}" enctype="multipart/form-data">
            @csrf
            <!--username-->
            <div>
                <x-label for="username" :value="__('Username')" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username"  />
            </div>


            <!--password-->
            <div>
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password"  />
            </div>


            <!--nama petugas-->
            <div>
                <x-label for="nama_petugas" :value="__('Nama Petugas')" />
                <x-input id="nama_petugas" class="block mt-1 w-full" type="text" name="nama_petugas"  />
            </div>

            <div>
                <x-label for="level_user" :value="__('Role')" />
                <select class="select2bs4" data-placeholder="Pilih Kelas" style="width: 100%;" name="level_user" >
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                  <option value="siswa">Siswa</option>
                </select>
            </div>

            <div>
                <x-label for="id_siswa" :value="__('Nama Siswa')" />
                <select class="select2bs4" data-placeholder="Pilih Kelas" style="width: 100%;" name="id_siswa" >
                    @foreach ($siswa as $siswa)
                      <option value="{{$siswa->id}}" name="id_siswa">{{$siswa->nama}}</option>
                    @endforeach
                </select>
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

