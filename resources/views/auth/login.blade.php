<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" class="form-label" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" class="form-label" :value="__('Senha')" />

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <div class="mt-3 text-end">
                <x-button class="btn btn-primary w-sm waves-effect waves-light">
                    <i class="fa fa-sign"></i> <b>ENTRAR</b>
                </x-button>
            </div>
            <div class="mt-4 text-center">
                <p class="mb-0">Não tem conta? <a href="{{ route('register') }}" class="fw-medium text-primary"> Registre Agora! </a></p>
                <p class="mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="fw-medium text-primary">
                            Esqueceu a senha?
                        </a>
                    @endif
                </p>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
