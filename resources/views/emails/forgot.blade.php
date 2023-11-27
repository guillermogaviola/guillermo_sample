@component('mail::message')

<p>Hello {{ $user->name }}</p>

<p>"Can you provide some tips for dealing with unexpected setbacks? Sometimes, we understand it happens, but it's challenging to cope with such situations."</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset your password again.
@endcomponent

<p>Please contact us if you need assistance retrieving your password.</p>

Thank you.<br />

{{ config('Guillermosample')}}

@endcomponent