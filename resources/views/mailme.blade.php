@component('mail::message')''
#From {{$sender_name}},

Email: <font color="green">{{$sender_email}}</font>
<br>
Subject: <font color="green"><b>{{$sender_subject}}</b></font>
<br>
Message: {{$sender_message}}
<br>



Thanks,<br>
Katsina Nysc Team. 
@endcomponent