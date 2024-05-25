@component('mail::message')
Hello {{$name}} ,

a reply has been made on your ticket. update this ticket as soon as possible. 
<br>
Subject: <font color="green">{{$subjects}}</font>
<br>
Status: <font color="green">Active</font>
<br>
Ticket Id: <font color="green">{{$ticket}}</font>
<br>
Response: <font color="green">{{$message}}</font>
<br>
@component('mail::button', ['url' => 'katsinanysc.test'])
Click here to view your ticket
@endcomponent
or click here: https://katsinastatenysc.com/showticket/{{$ticket}}


Thanks,<br>
Katsina Nysc Team. 
@endcomponent