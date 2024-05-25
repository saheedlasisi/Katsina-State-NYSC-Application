@component('mail::message')
#Hi {{$name}} ,

Welcome on board, 
<br>
Here are your login details:
<br>
Email: <font color="green">{{$email}}</font>
<br>
Password: <font color="green">{{$password}}</font>
<br>
login url: 
@component('mail::button', ['url' => 'katsinastatenysc.com/saedmaster/login'])
Login
@endcomponent
or click here: https://katsinastatenysc.com/saedmaster/lgoin 
if you have problem logging in or you are not suppose to see the message, please contact the management through the helpdesk system,

Thanks,<br>
Katsina Nysc Team. 
@endcomponent