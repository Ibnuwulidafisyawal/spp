<x-app-layout>
    <x-auth-card>
    <div class="py-12">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('kelas.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Nama kelas-->
            <div>
                <x-label for="nama_kelas" :value="__('Nama Kelas')" />
                <x-input id="nama_kelas" class="block mt-1 w-full" type="text" name="nama_kelas"  />
            </div>

            <!-- Kompetensi Keahlian -->
            <div class="mt-4">
                <x-label for="kompetensi_keahlian" :value="__('Kompetensi Keahlian')" />
                <x-input id="kompetensi_keahlian" class="block mt-1 w-full" type="text" name="kompetensi_keahlian"  />
            </div>

             <!-- create date -->
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

