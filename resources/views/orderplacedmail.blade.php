@component('mail::message')
#Hi {{$buyer_name}} ,

Thanks for patronizing us, we will process your order as soon as possible.
<br>
Order ID: <font color="green"><b>{{$unique}}</b></font>
<br>
Product Name: {{$product_name}}
<br>
Unit Price: {{number_format($product_price)}}
<br>
Quantity: {{$quantity}}
<br>
Total: {{number_format($quantity * $product_price)}}
<br>
Deadline: {{date('d-M-Y', strtotime($product_period))}}, in {{date('d-m-Y', , strtotime($product_period)) - date('d-m-Y')}} day(s)


Thanks,<br>
Katsina Nysc Team. 
@endcomponent