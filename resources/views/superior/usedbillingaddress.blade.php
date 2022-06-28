@section('usedbillingaddress')
@if($data['user']!="")
<ul id="billing-add-order" value="{{$data['user']->address_id}}" >
<li><span id="address_name_bill">{{$data['user']->name}}</span></li>
<li><span id="address_address_bill">{{$data['user']->address}}</span></li>
<li><span id="address_address2_bill">{{$data['user']->address2}}</span></li>
<li><span id="address_zipcode_bill">{{$data['user']->zip_code}}</span></li>
</ul>
@else
<ul id="billing-add-order" value="" >
<li><span id="address_name_bill"></span></li>
<li><span id="address_address_bill"></span></li>
<li><span id="address_address2_bill"></span></li>
<li><span id="address_zipcode_bill"></span></li>
</ul>
@endif
@endsection