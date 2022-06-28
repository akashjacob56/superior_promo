@section('updatedshipaddress')
@if($data['user']!="")
<ul id="ship-add-order" value="{{$data['user']->address_id}}">
<li><span id="address_name">{{$data['user']->name}}</span></li>
<li><span id="address_address">{{$data['user']->address}}</span></li>
<li><span id="address_address2">{{$data['user']->address2}}</span></li>
<li><span id="address_zipcode">{{$data['user']->zip_code}}</span></li>
</ul>
@endif
@endsection