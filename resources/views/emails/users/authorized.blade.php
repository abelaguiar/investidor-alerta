@component('mail::message')
# Usuário autorizado.

Seu usuário foi autorizado, acesse a plataforma para finalizar seu cadastro.

@component('mail::button', ['url' => route('dashboard')])
Acessar Plataforma
@endcomponent

@endcomponent
