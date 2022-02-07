@component('mail::message')
# Usuário criado

Novo usuário criado na plataforma.

@component('mail::button', ['url' => route('dashboard')])
Acessar Plataforma para Autorizar
@endcomponent

@endcomponent
