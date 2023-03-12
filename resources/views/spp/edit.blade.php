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
        <form method="POST" action="{{ route('spp.update',$spp->id_spp) }}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
            <!--tahun-->
            <div>
                <x-label for="tahun" :value="__('Tahun')" />
                <x-input id="tahun" class="block mt-1 w-full" type="text" name="tahun"  value="{{ $spp->tahun }}" />
            </div>

            <!--nominal-->
            <div>
                <x-label for="nominal" :value="__('Spp Nominal')" />
                <x-input id="nominal" class="block mt-1 w-full" type="text" name="nominal" value="{{ $spp->nominal }}"  />
            </div>
    
            <div class="mt-4">
                <x-label for="created_at" :value="__('Tanggal Create')" />
                <x-input id="created_at" class="block mt-1 w-full" type="date" name="created_at" value="{{ $spp->created_at }}" />
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

