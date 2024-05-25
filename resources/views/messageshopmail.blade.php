@component('mail::message')
{{$shop_name}},

you have a message from {{$sender_name}}, 
<br>
Email: <font color="green">{{$sender_email}}</font>
<br>
Subject: <font color="green"><b>{{$subjects}}</b></font>
<br>
Message: {{$message}}
<br>

{{$shop_name}} - [{{$shop_auth_id}}]

Thanks,<br>
Katsina Nysc Team. 
@endcomponent