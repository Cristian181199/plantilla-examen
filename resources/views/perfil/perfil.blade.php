<x-contenido>
    <x-slot name="cabecera">
        Perfil
    </x-slot>
    <x-auth-validation-errors />
    <x-success-message/>

    <form method="POST" action="{{ route('perfil.update') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-2 gap-6">
            <div class="grid grid-rows-2 gap-6">
                <div class="mt-4">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" autofocus />
                </div>
            </div>
            <div class="grid grid-rows-2 gap-6">
                <div class="mt-4">
                    <x-label for="new_password" :value="__('New password')" />
                    <x-input id="new_password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <x-label for="confirm_password" :value="__('Confirm password')" />
                    <x-input id="confirm_password" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                                autocomplete="confirm-password" />
                </div>
            </div>
            <div class="grid grid-rows-2 gap-6">
                <div class="mt-4">
                    <x-label for="avatar" :value="__('New avatar')" />
                    <x-input id="avatar" class="block mt-1 w-full"
                                type="file"
                                name="avatar"/>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-3">
                {{ __('Update') }}
            </x-button>
        </div>
    </form>
</x-contenido>
