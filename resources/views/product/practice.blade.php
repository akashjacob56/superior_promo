 





 <div class="imprint_data_content">
              @if($imprints!="[]")
                @foreach($imprints as $imprint)
                  <div class="imprint_data_content_new">
                    <h5>Imprints</h5>
                    <div class="form-group row">

                      <div class="col-md-6 {{ $errors->has('imprint_name') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Name</label>
                          <input type="text" id="imprint_name" name="imprint_name[]"   class="form-control thresold-i" placeholder="imprint name" value="{{$imprint->name}}">
                          @if ($errors->has('imprint_name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('imprint_name') }}</strong>
                          </span>
                          @endif
                      </div>

                      <div class="col-md-6 {{ $errors->has('max_colors') ? ' has-error' : '' }}">
                          <label class="form-control-label">Maximum Colors</label>
                          <input type="text" id="max_colors" name="max_colors[]"   class="form-control thresold-i" placeholder="Max Colors" value="{{$imprint->max_colors}}">
                          @if ($errors->has('max_colors'))
                          <span class="help-block">
                            <strong>{{ $errors->first('max_colors') }}</strong>
                          </span>
                          @endif
                      </div>

                    </div>



                    <div class="form-group row">
                      <div class="col-md-12 {{ $errors->has('color_group_id') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Color Group</label>
                          <select name="color_group_id[]" class="form-control thresold-i color_group_id_{{$imprint->id}}" >
                            <option selected="" disabled="">Select Color Group</option>
                            @foreach($color_groups as $color_group)
                            <option value="{{$color_group->id}}">{{$color_group->name}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('color_group_id'))
                          <span class="help-block">
                            <strong>{{ $errors->first('color_group_id') }}</strong>
                          </span>
                          @endif
                      </div>
                    </div>

                     <div class="form-group row">
                      <div class="col-md-12 {{ $errors->has('color_id') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Custom Color</label>
                          <div class="row">
                         <div class="col-12">
                            @foreach($imprint->imprint_colors as $imprint_color)
                              {{$imprint_color->colors->name}}&nbsp;<a href="/admin/product/imprint_color_delete/{{$imprint_color->id}}">
                                  <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                              </a>&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                           </div>
                        </div>

                          <select  name="color_id[0][]" multiple="multiple" class="form-control js-example-basic-multiple color_id_{{$imprint->id}}" >
                            <option disabled="">Select Color</option>
                            @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('color_id'))
                          <span class="help-block">
                            <strong>{{ $errors->first('color_id') }}</strong>
                          </span>
                          @endif
                      </div>
                    </div>



                    @foreach($imprint->imprint_price as $imprint_price)
                 

                    <div class="form-group row">
                      <div class="col-md-12">
                          
                          <div class="row">
                              <div class="col-md-2">
                                  <label class="form-control-label">Count <br>From<br><br><br></label>
                                  <input type="text" id="imprint_count_from" name=""  class="form-control thresold-i" placeholder="Count From" maxlength="10" value="{{$imprint_price->quantity}}" disabled="">
                              </div>

                              <div class="col-md-2">
                                  <label class="form-control-label">Location Setup <br>Fee<br><br></label>
                                  <input type="text" id="imprint_location_setup_fee" name=""  class="form-control thresold-i" placeholder="Location Setup" maxlength="10" value="{{$imprint_price->setup_price}}" disabled="">
                              </div>

                              <div class="col-md-2">
                                  <label class="form-control-label">Additional Location Running Fee</label>
                                  <input type="text" id="imprint_additinal_location_running_fee" name=""   class="form-control thresold-i" placeholder="Additional Location" maxlength="10" value="{{$imprint_price->item_price}}" disabled="">
                              </div>

                              <div class="col-md-2">
                                  <label class="form-control-label">Additional Color<br> Setup<br> Fee</label>
                                  <input type="text" id="imprint_additional_setup_fee" name=""   class="form-control thresold-i" placeholder="addn setup fee" maxlength="10" value="{{$imprint_price->color_setup_price}}" disabled="">                                  
                              </div>

                              <div class="col-md-2">
                                  <label class="form-control-label">Additional Color Running Fee</label>
                                  <input type="text" id="imprint_additional_running_fee" name=""  class="form-control thresold-i" placeholder="addn runn fee" maxlength="10" value="{{$imprint_price->color_item_price}}" disabled="">
                              </div>

                              <div class="col-md-2 {{ $errors->has('count_from') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Actions<br><br><br><br></label>
                                  <a href="/admin/product/imprintProductPriceDelete/{{$imprint_price->id}}">
                                    <button class="form-control add_imprint_child" type="button"><i class="fa fa-trash"></i></button>
                                  </a>
                              </div>

                          </div>
                          <!-- end imprint data row -->

                      </div>

                    </div>

                     @endforeach


                    <div class="form-group row">
                      <div class="col-md-12 add_new_imprint_values">
                          
                          <div class="row">
                              <div class="col-md-2 {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Count <br>From<br><br><br></label>
                                  <input type="text" name="imprint_count_from[0][]"  class="form-control thresold-i" placeholder="Count From" maxlength="10">
                                  @if ($errors->has('imprint_count_from'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_count_from') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-2 {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Location Setup <br>Fee<br><br></label>
                                  <input type="text" name="imprint_location_setup_fee[0][]"  class="form-control thresold-i" placeholder="Location Setup" maxlength="10">
                                  @if ($errors->has('imprint_location_setup_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_location_setup_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-2 {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Additional Location Running Fee</label>
                                  <input type="text" name="imprint_additinal_location_running_fee[0][]"   class="form-control thresold-i" placeholder="Additional Location" maxlength="10">
                                  @if ($errors->has('imprint_additinal_location_running_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-2 {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Additional Color<br> Setup<br> Fee</label>
                                  <input type="text" name="imprint_additional_setup_fee[0][]"   class="form-control thresold-i" placeholder="addn setup fee" maxlength="10">
                                  @if ($errors->has('imprint_additional_setup_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-2 {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Additional Color Running Fee</label>
                                  <input type="text" name="imprint_additional_running_fee[0][]"   class="form-control thresold-i" placeholder="addn runn fee" maxlength="10">
                                  @if ($errors->has('imprint_additional_running_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_additional_running_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-2 {{ $errors->has('count_from') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Actions<br><br><br><br></label>
                                  <button class="form-control add_imprint_child" type="button"><i class="fa fa-plus"></i></button>
                                  
                              </div>

                          </div>
                          <!-- end imprint data row -->
                      </div>

                    </div>





                  </div>
                    <!-- Imprint Data Ended -->
                  @endforeach
                  @endif
                    <div class="form-group row add_new_imprint_all_row">
                        <div class="col-12 text-right">
                          <button class="btn btn-info add_new_imprint_all" type="button">Add Imprint</button>
                        </div>
                    </div>

                  </div>