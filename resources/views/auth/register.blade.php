<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="phone" :value="__('Whatsapp')" />
                <x-input id="phone" class="form-control" type="phone" name="phone" :value="old('phone')" required />
            </div>
            <!-- Password -->
            <div class="mt-2">
                <x-label for="password" :value="__('Senha')" />
                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            <!-- Confirm Password -->
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('Confirmar Senha')" />
                <x-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="text-end mt-2">
                <a class="fw-medium text-primary" href="{{ route('login') }}">
                    Já tem conta ?
                </a>
                <x-button class="btn btn-primary w-sm waves-effect waves-light">
                    <i class="fa fa-save"></i> <b>REGISTRAR</b>
                </x-button>
            </div>
        </form>
    </x-auth-card>

    <x-slot name="scripts">
        <script type="text/javascript" src="/assets/js/locations.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.mask.min.js"></script>
        <script>
            $(function(){
                $('#phone').mask('(99) 99999-9999');
            });
        </script>
    </x-slot>
</x-guest-layout>
