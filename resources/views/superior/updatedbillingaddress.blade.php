@section('updatedbilladdress')        
              @if($data['all_billing_address']!="[]")
                <div class="col-md-6"> 
                <span class="shipp-add-txt">Select One Billing Address</span>
                @foreach($data['all_billing_address'] as $billing_address)
                 <div class="row d-flex align-items-center pt-3 pb-3 multiple-add-bill-{{$billing_address->address_id}}">
                   <div class="col-md-7">
                    <ul>
                       <li><span>{{$billing_address->name}}</span></li>
                        <li><span>{{$billing_address->address}}</span></li>
                        <li><span>{{$billing_address->address2}}</span></li>
                        <li><span>{{$billing_address->zip_code}}</span></li>
                    </ul>
                   </div>

                   <div class="col-md-5 use-billing-address">
                    <button class="edit-add use-bill-address" value="{{$billing_address}}">Use  Address</button>
                   </div>
                                                           
                    <div class="row edit-delete-billing">

                    <a href="javascript:void(0);" class="add-link edit-add-bill" id="{{$billing_address}}">Edit Address</a>

                    <a href="javascript:void(0);" class="add-link delete-bill-add" id="{{$billing_address->address_id}}">Delete Address</a>

                    </div>

                     </div>
                     @endforeach

<!--                       <div class="row pt-5 pb-5 address-new">
                          <button class="btn-address in-edit-addnew"> Add a New Address</button>
                      </div> -->

                    </div> 
                    @else
                    <div class="col-md-6"> 
                    <span class="shipp-add-txt"> Billing Address Are Empty Please Add first Then select Address</span> 
                    </div>
                    @endif

          


                    <div class="col-md-6 edit-billing-address hidden">
                        <span class="add-add pb-3">Edit Billng Address</span>
                         <p>Starred(*) Fields are required.</p>
                        <div class="row  pt-3 pl-5">
                            <div class="account-content">
                                <form>

                                   <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

                                         <div class="form-group form-check">

                                            <input type="checkbox" class="form-check-input united-state-bill-edit" id="united-state-bill-edit" checked="">
                                            <label class="form-check-label check-checkout" for="united-state-bill-edit">United States</label>
                                       
                                            <input type="checkbox" class="form-check-input canada-bill-edit" id="canada-bill-edit">
                                            <label class="form-check-label check-checkout" for="canada-bill-edit">Canada</label>

                                          </div>
                                     </div>


                        <input type="hidden" class="form-control txt-lbl" placeholder="David" id="add-id-bill" name="add-id-bill" value=" ">


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="David" id="fname-bill-edit" name="fname-bill-edit" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="lname-bill-edit" placeholder="xyz" name="lname-bill-edit" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="companyname-bill-edit" name="companyname-bill-edit" placeholder="David" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="add1-bill-edit" name="add1-bill-edit" placeholder="2543  0042 3562 0210" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add2-bill-edit" name="add2-bill-edit" placeholder="2543  0042 3562 0210" >
                                    </div>



                                   <div class="row">     
                                    <div class="col">
                            
                                        <label class="form-lbl">City<span class="required">*</span></label>
<!--                                         <select name="city-bill-edit" id="city-bill-edit" class="form-control txt-lbl"  required=" ">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select> -->

                                 <input placeholder="City Name"  name="city-bill-edit" list="city-bill-edit-datalist" id="city-bill-edit" class="form-control txt-lbl">
                                    <datalist id="city-bill-edit-datalist">
                                        @if($data['Allcity']!="[]")
                                            @foreach($data['Allcity'] as $city)
                                                <option value="{{$city->city_name}}">
                                                     </option>                      
                                            @endforeach
                                        @endif
                                    </datalist>

                                   </div>
                              

                                     
                                      <div class="col">
                                       <div class="select-custom">
                                        
                                        <label class="form-lbl" id="editbill-State">State<span class="required">*</span></label>
                                        <label class="form-lbl hidden" id="editbill-Province">Province <span class="required">*</span></label>


                                        <select name="state-bill-edit" id="state-bill-edit" class="form-control txt-lbl" required="">
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

                                        
                    <label for="acc-text" id="editbill-ZipCode" class="form-lbl">ZipCode<span class="required">*</span></label>

                   <label for="acc-text" id="editbill-PostalCode" class="form-lbl hidden">PostalCode<span class="required">*</span></label>



                                        <input type="number" class="form-control txt-lbl" id="zipcode-bill-edit" name="zipcode-bill-edit" placeholder="123456" required="">
                                    </div>                                         
                                    </div>

                                   </div>


                                      <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                                <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="tel-bill-edit" name="tel-bill-edit" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="ext-bill-edit" placeholder="Ext" name="ext-bill-edit" >
                                            </div>
                                        </div>

                                    </div>  



<!--                                     <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="fax-bill-edit" name="fax-bill-edit" placeholder="Fax" >
                                    </div> -->


                                    <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input default-ship-addn" id="default-ship-addn">
                                            <label class="form-check-label check-checkout" for="default-ship-addn">Make this my default shipping address</label>
                                    </div>


                                    <div class="row">
                                        <div class="col bill-edit-address">
                                         <button type="button" class="btn-save-changes">Save Change</button>   
                                        </div>
                                        <div class="col bill-edit-cancel">
                                          <button type="button" class="btn-cancel">Cancel</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
    </div> 
@endsection