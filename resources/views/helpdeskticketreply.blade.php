@component('mail::message')
#{{$name}} ,
<font color="green">Message delivered successfully.</font>
<br>
You will be notified when a response is made by email. 
<br>The details of your ticket are shown below.
<br>
Subject: <font color="green">{{$subjects}}</font>
<br>
Status: <font color="green">Active</font>
<br>
Ticket Id: <font color="green">{{$ticket}}</font>
<br>
Message: <font color="green">{{$message}}</font>
<br>
@component('mail::button', ['url' => 'katsinastatenysc.com/showticket/'.$ticket])
Click here to view your ticket
@endcomponent
or click here: https://katsinastatenysc.com/showticket/{{$ticket}}


Thanks,<br>
Katsina Nysc Team. 
@endcomponent