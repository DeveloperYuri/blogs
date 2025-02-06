@component('mail::message')
    
<p>Hello {{ $user->name }}</p>

<p>We Understand it happens</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
    Reset Your Password
@endcomponent

<p>In case you have issues recovering your password, please contact our us</p>

Thanks <br>
{{ config('app.name') }}

@endcomponent