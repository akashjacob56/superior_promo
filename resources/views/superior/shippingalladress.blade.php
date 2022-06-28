@section('shippingalladress')
<div class="col-md-6 " id="shippingalladress"> 
 @foreach($data['all_address'] as $address)
   <div class="row d-flex align-items-center pt-3 pb-3 multiple-add-{{$address->address_id}}">
     <div class="col-md-7">
      <ul>
         <li><span>{{$address->name}}</span></li>
          <li><span>{{$address->address}}</span></li>
          <li><span>{{$address->address2}}</span></li>
          <li><span>{{$address->zip_code}}</span></li>
      </ul>
     </div>

     <div class="col-md-5 use-address">
      <button class="edit-add  use-ship-address" value="{{$address}}">Use Address</button>
     </div>

        <div class="row edit-delete-row">

        <a href="javascript:void(0);" class="add-link edit-addd" id="{{$address}}">Edit Address</a>

        <a href="javascript:void(0);" class="add-link delete-add" id="{{$address->address_id}}">Delete Address</a>

        </div>
</div>
@endforeach
<div class="row pt-5 pb-5 address-new">
    <button class="btn-address in-edit-addnew"> Add a New Address</button>
</div>


</div>

<div class="col-md-6 s-edit-address">
        <span class="add-add pb-3">Edit Address</span>
         <p>Starred(*) Fields are required.</p>
        <div class="row  pt-3 pl-5">
            <div class="account-content">
                <form >

                      <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
                         <div class="form-group form-check">

                            <input type="checkbox" class="form-check-input united-state" id="united-state" checked="">
                            <label class="form-check-label check-checkout" for="united-state">United States</label>
                       
                            <input type="checkbox" class="form-check-input canada" id="canada">
                            <label class="form-check-label check-checkout" for="canada">Canada</label>

                          </div>
                     </div>

                    <input type="hidden" class="form-control txt-lbl" placeholder="David" id="add-id" name="add-id" value="{{$data['user']->address_id}}">


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" placeholder="David" id="f-name" name="f-name" required="" value="{{$data['user']->name}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" id="l-name" placeholder="xyz" name="l-name" required="" value="{{$data['user']->last_name}}">
                            </div>
                        </div>
                    </div>



                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="company-name" name="company-name" placeholder="David" value="{{$data['user']->company_name}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl" id="add-1" name="add-1" placeholder="2543  0042 3562 0210" required=""
                        value="{{$data['user']->address}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="add-2" name="add-2" placeholder="2543  0042 3562 0210" value="{{$data['user']->address2}}" >
                    </div>



                   <div class="row"> 

                    <div class="col">
                
                        <label class="form-lbl">City<span class="required">*</span></label>


<!--                         <select name="city" id="city" class="form-control txt-lbl"  required=" ">
                            <option value="" selected="selected">
                                select City
                            </option>
                            @foreach($data['Allcity'] as $city)
                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select> -->


                    <input placeholder="City Name"  name="city" list="city-datalist" id="city" class="form-control txt-lbl">
                        <datalist id="city-datalist">
                            @if($data['Allcity']!="[]")
                                @foreach($data['Allcity'] as $city)
                                    <option value="{{$city->city_name}}">
                                                              
                                @endforeach
                            @endif
                        </datalist>

                    </div>



                      <div class="col">
                       <div class="select-custom">

                        <label class="form-lbl" id="editState">State<span class="required">*</span></label>

                        <label class="form-lbl hidden" id="editProvince">Province<span class="required">*</span></label>
                        

                        <select name="state" id="state" class="form-control txt-lbl" required="">
                            <option value="" selected="selected">Selecte State
                            </option>
                            @foreach($data['Allstates'] as $state)
                            <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                            @endforeach
                        </select>
                       </div>
                      </div>


                    <div class="col">
                    <div class="form-group mb-2">

                    <label for="acc-text" id="ZipCode" class="form-lbl">ZipCode<span class="required">*</span></label>

                   <label for="acc-text" id="PostalCode" class="form-lbl hidden">PostalCode<span class="required">*</span></label>
                        
                        <input type="number" class="form-control txt-lbl" id="zip-code" name="zip-code" placeholder="David" required=""
                        value="{{$data['user']->zip_code}}">   
                    </div>                                         
                    </div>

                   </div>


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="tel" name="tel" required="" value="{{$data['user']->telephone}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                <input type="text" class="form-control txt-lbl" id="ext" placeholder="Ext" name="ext" value="{{$data['user']->ext}}">
                            </div>
                        </div>
                    </div>  



<!--                     <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="fax" name="fax" placeholder="Fax" value="{{$data['user']->fax}}" >
                    </div> -->


                    <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input default-ship-add" id="default-ship-add">
                            <label class="form-check-label check-checkout" for="default-ship-add">Make this my default shipping address</label>
                    </div>


                    <div class="row">
                        <div class="col edit-ad-check">
                         <button type="button" class="btn-save-changes">Save Change</button>   
                        </div>
                        <div class="col edit-add-cancel">
                          <button type="button" class="btn-cancel">Cancel</button>  
                        </div>
                    </div>

                </form>
            </div>
        </div>
</div>


@endsection

