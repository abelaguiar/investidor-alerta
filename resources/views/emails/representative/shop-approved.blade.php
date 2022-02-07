@component('mail::message')
# Loja aprovada

O administrador aprovou sua loja, em breve comissões seram associadas.

@component('mail::button', ['url' => route('dashboard')])
Acessar Plataforma
@endcomponent

@endcomponent
