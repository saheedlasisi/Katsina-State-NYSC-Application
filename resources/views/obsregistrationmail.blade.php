@component('mail::message')
{{$name}} ,

you have been successfully registered as obs member, 
<br>
Here are your login details:
<br>
Email: <font color="green">{{$email}}</font>
<br>
Password: <font color="green">{{$password}}</font>
<br>
Note: only you know about the password generate for you.
<br>
Here is the login url: 
@component('mail::button', ['url' => 'katsinastatenysc.com/obs/login'])
Login
@endcomponent
or click here: https://katsinastatenysc.com/obs/lgoin 
if you have problem logging in or you are not suppose to see the message, please contact the management through the helpdesk system,

Thanks,<br>
Katsina Nysc Team. 
@endcomponent