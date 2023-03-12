<x-app-layout>
    <x-auth-card>
    <div class="py-12">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('spp.store') }}" enctype="multipart/form-data">
            @csrf


            <!--tahun-->
            <div>
                <x-label for="tahun" :value="__('Tahun')" />
                <x-input id="tahun" class="block mt-1 w-full" type="text" name="tahun"  />
            </div>

            <!--id spp-->
            <div>
                <x-label for="nominal" :value="__('Nominal')" />
                <x-input id="nominal" class="block mt-1 w-full" type="text" name="nominal"  />
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

