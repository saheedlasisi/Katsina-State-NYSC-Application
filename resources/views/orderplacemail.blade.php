@component('mail::message')
#{{$unique}} ,

{{$shop_name}} a new order was made on {{$product_name}}
<br>
Order ID: <font color="green"><b>{{$unique}}</b></font>
<br>
Buyer Name: {{$buyer_name}}
<br>
Product Name: {{$product_name}}
<br>
Unit Price: {{number_format($product_price)}}
<br>
Quantity: {{$quantity}}
<br>
Total: {{number_format($quantity * $product_price)}}
<br>
Deadline: {{date('d-M-Y', strtotime($product_period))}}, in {{date('d-m-Y', strtotime($product_period)) - date('d-m-Y')}} day(s)
<br>
<i>Note, a successful order will earn you star point at both shop and the product sold.</i>

Thanks,<br>
Katsina Nysc Team. 
@endcomponent