@component('mail::message')
#Hi {{$sender_name}} ,

{{$body}}
<br>
Subject: <font color="green"><b>{{$subjects}}</b></font>
<br>
Shop: [{{$shop_auth_id}}] - {{$shop_name}}


Thanks,<br>
Katsina Nysc Team. 
@endcomponent