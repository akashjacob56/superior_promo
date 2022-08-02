@extends('layouts.admin')
@section('content')

 @php 

 @endphp
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<style type="text/css">

  input.purchase_order_input{
    width: 100px;
  }

  select.select_vendor{
    width: 100px;
  }
  /*.modal-backdrop {
    position: absolute !important;

}*/
td.art_proof_mng_path_td{
      max-width: 175px !important;overflow: auto;
    }
.hidden{
  display: none !important;
}

input[type=checkbox]{
    margin: 4px 0px 5px 0 !important;
}

  .search-row{
      margin-bottom:5px;
  }

input.input-width{
  width: 300px;
  /*border-radius: 3px;*/
}

select.select-width{
  width: 300px;
  /*border-radius: 3px;*/
}
/*.modal.fade.show{
  display: block;
}
*/
.modal {
  background: rgba(0, 0, 0, 0.5); 
}
.modal-backdrop {
  display: none;
}
.modal-backdrop {
  position: fixed;
  z-index: -1 !important;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #000000;
}
.small-inpul-len{
  width: 134px;
}
</style>

<style type="text/css">
.all-button-div{
    padding-top: 20px;
}

.all-button-div>i{
    color: deepskyblue;
    font-size: 30px;
    width: 50px;
}

.admin-modal{
    width: 950px;
    right: 202px;
    top: 25px;
}

.border-text{
    border: solid 1px !important;
}

 .btn-stage{
    width: 150px;
    height: 40px;
    background-color: #F0F0F0;
    border-color: #EAEAEA;
    border: solid 0px #F0F0F0;
}

.note-table{
    overflow: scroll;
}


.head-color{
    background: #6bd1fc;
}

.note-editor .note-toolbar>.note-btn-group, .note-popover .popover-content>.note-btn-group {
    margin-top: 5px;
    margin-left: 0;
    margin-right: 5px;
    overflow: visible;
}


.short_divider {
        margin: 0 0 0.2rem;
        width: 100%;
    }


.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    width:100%;
    max-width: 100%;
    padding: 25px;
    border-radius: 3px;
    transition: 0.2s
    background: #F8F8F8;
    border: 5px dashed #DDD;
    height: 150px;
    text-align: center;
    padding-top: 55px;
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}

img.admin-thumbnail {
    width: 80px;
    height: 80px;
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    cursor: pointer;
    opacity: 0
}

.mt-100 {
    margin-top: 100px
}

.input-width{
    width: 100%;
}


input.art_proof_request_checkbox{
  margin-left: -15px !important;
}

  .color_orange{
    background-color: rgb(255, 130, 130) !important;
  }

  p.paid-unpaid-status{
                            border:1px solid #337ab7;background-color: #337ab7; width: 20px;height: 24px;color: white;font-weight: 500;font-size:16px;text-align: center;
                          }

  .note-editable p{
    margin-top: 38px !important;
  }
</style>

<!-- for summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- for summernote -->

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#summernote2').summernote();
        $('.summernote').summernote();
    });
  </script>



  <script type="text/javascript">
$(document).on('change', '.file-input', function() {
var filesCount = $(this)[0].files.length;

var textbox = $(this).prev();

if (filesCount === 1) {
var fileName = $(this).val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
});
  </script>
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item">
            <a>Order Detail</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4 >{{$order_item->order_id}}S{{$order_item->id}}</h4>
                  <span class="text-muted">You can view all orders, Process order, as well as print invoices slip for orders placed from your online business store.</span>
                </div>

               

                

              

                <style type="text/css">
                  #footer-search{
                    /*border: 1px solid black;*/
                  }
                  select.production_stage_select_box{
                        padding: 0px 12px;
                  }
                  input.stage_management_input_checkbox{
                    margin-left: -15px !important;
                  }

                </style>



                <!-- ---------------------------------------- Invoice Modal Start --------------------------- -->

                <div class="modal fade" id="invoice_modal">
                          <div class="modal-dialog">
                          <div class="modal-content admin-modal">
                          <div class="modal-header">
                          <div class="row">
                            <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Upload Invoice</h4></div>
                            
                          </div>
                          <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                       
                                    

                                    <div class="file-drop-area">
                                        <span class="file-message">Drop file to upload</span>
                                        <input class="file-input" name="upload_invoice_file" type="file" id="invoice_file" onchange="uploadFile(this)">
                                    </div>
                                    <br>

                                    <p>Uploaded File: <span id="uploaded_file_name_mention" class="uploaded_file_name_mention"></span></p>
                                    <div>
                                      <input type="checkbox" name="invoice">&nbsp;&nbsp;Notify Customer
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-md-2"></div>
                                      <div class="col-md-10 invoice_upload"><button class="upload_invoice_save_button" order_item_id="{{$order_item->id}}">Save</button></div>
                                    </div>

                                    <style type="text/css">
                                      button.upload_invoice_button{
                                            background-color: #F0F0F0;
                                            border-color: #EAEAEA;
                                      }
                                    </style>

                                    <script type="text/javascript">
                                      $(document).ready(function(){
                                        $('.invoice_upload').on('click','.upload_invoice_save_button',function(){
                                          var order_item_id = $(this).attr('order_item_id');

                                          form_data = new FormData();
                                          jQuery.each($("#invoice_file")[0].files, function(i, file) {
                                              form_data.append('files['+i+']', file);
                                          });
                                          form_data.append("order_item_id",order_item_id);
                                          form_data.append("_token","{{csrf_token()}}");

                                          $.ajaxSetup({
                                              headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
                                          });

                                              $.ajax({
                                                        method: "POST",
                                                        url: "/admin/order/order_item/invoice-upload",
                                                        dataType: 'json',
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        data: form_data,
                                                        success: function(data){
                                                            if(data!=""){
                                                              alert('Invoice Uploaded');
                                                            }
                                                        },
                                                        error: function(result){

                                                            }           
                                                  });




                                        });
                                      });
                                    </script>


                                    <br><br>
                            </div>
                            
                            </div>
                          </div>
                          </div>
                          </div>
                          </div>



                <!-- ---------------------------------------- Invoice Modal Start --------------------------- -->



                <!-- ------------------------------------- Tracking Information Start ----------------------------------- -->
                  <div class="modal fade" id="tracking_modal">
                          <div class="modal-dialog">
                          <div class="modal-content admin-modal">
                          <div class="modal-header">
                          <div class="row">
                            <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Tracking Information</h4></div>
                            
                          </div>
                          <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                       
                                    <!-- Form group start -->
                                      <div class="row mb-1">
                                         <div class="col-md-2 text-right"><label for="tracking_shipping_date">Date Shipped</label></div>
                                         <div class="col-md-10">
                                          <input type="datetime-local" class="" id="tracking_shipping_date" placeholder="Title" value="">
                                        </div>
                                      </div>
                                    <!-- Form group End -->

                                    <!-- Form group start -->
                                      <div class="row mb-1">
                                         <div class="col-md-2 text-right"><label for="tracking_number">Tracking Number</label></div>
                                         <div class="col-md-10">
                                          <input type="text" class="max_input_width" id="tracking_number" placeholder="Tracking Number" value="">
                                        </div>
                                      </div>
                                    <!-- Form group End -->

                                    <!-- Form group start -->
                                      <div class="row mb-1">
                                         <div class="col-md-2 text-right"><label for="tracking_shipping_company">Shipping Company</label></div>
                                         <div class="col-md-10">
                                          <input type="text" class="max_input_width" id="tracking_shipping_company" placeholder="Shipping Company" value="">
                                        </div>
                                      </div>
                                    <!-- Form group End -->

                                    <!-- Form group start -->
                                      <div class="row mb-1">
                                         <div class="col-md-2 text-right"><label for="tracking_note">Note</label></div>
                                         <div class="col-md-10">
                                          <textarea class="" name="tracking_note" id="tracking_note" placeholder="Note" style="width: 100%;" rows="5"></textarea>
                                        </div>
                                      </div>
                                    <!-- Form group End -->

                                    <!-- Form group start -->
                                      <div class="row mb-1">
                                         
                                         <div class="col-md-12">
                                          <input type="checkbox" class="" id="tracking_notify_customer" value="">&nbsp;&nbsp;Notify Customer
                                        </div>
                                      </div>
                                    <!-- Form group End -->

                                    <!-- Form group start -->
                                      <div class="row mb-1">
                                         
                                         <div class="col-md-12">
                                          <input type="checkbox" class="" id="tracking_request_rating" value="">&nbsp;&nbsp;Request rating
                                        </div>
                                      </div>
                                    <!-- Form group End -->

                                    <!-- Form group start -->
                                      <div class="row mb-1">
                                         <div class="col-md-2 text-right"><label for=""></label></div>
                                         <div class="col-md-10 track_route">
                                            <button type="button" class="tracking_save" order_item_id={{$order_item->id}}>Save</button>
                                        </div>
                                      </div>
                                    <!-- Form group End -->



                                    <br>
                                    <!-- Tracking Modal Table Start-->

                                    <div class="col-md-12">Tracking Information List</div>

                                    <div class="col-md-12 note-table">
    <table class="table table-bordered">
    <thead class="head-color">
      <tr>
        <th scope="col" class="b-none">ID</th>
        <th scope="col" class="b-none"> Date Shipped</th>
        <th scope="col" class="b-none">Tracking Number</th>
        <th scope="col" class="b-none">Shipping Company</th>
        <th scope="col" class="b-none">Note</th>
        <th scope="col" class="b-none">Created</th>
      </tr>
    </thead>
    <tbody class="tbody_tracking_append">
      @if($all_trackings!=[])
      @foreach($all_trackings as $tracking)
        <tr>
          <td>{{$tracking->id}}</td>
          <td><?php echo date("m-d-Y H:i:s", strtotime($tracking->tracking_shipping_date)); ?></td>
          <td>{{$tracking->tracking_number}}</td>
          <td>{{$tracking->tracking_shipping_company}}</td>
          <td><?php echo $tracking->tracking_note; ?></td>
          <td><?php echo date("m-d-Y H:i:s", strtotime($tracking->created_at)); ?></td>
        </tr>
        @endforeach
      @endif
      
    </tbody>
  </table> 
  
    
  </div>


                                    <!-- Tracking Modal Table End -->



                                    


                            </div>
                            
                            </div>
                          </div>
                          </div>
                          </div>
                          </div>



                <!-- ------------------------------------- Tracking Information End -------------------------------------- -->




<!-- ------------------------------------- Stage Management Start - --------------------------------->
                        <!-- model for first button  -->
                          <div class="modal fade" id="exampleModalLong{{$order_item->id}}">
                          <div class="modal-dialog">
                          <div class="modal-content admin-modal">
                          <div class="modal-header">
                          <div class="row">
                            <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Stage Management</h4></div>
                            <div class="col-md-12"><h6 class="modal-title">Order # {{$order_item->order_id}}</h6></div>
                          </div>
                          <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                          <div class="row">
                          <div class="col-md-6">
                          <div class="col-md-12"><h6>Production Stage Management</h6></div>
                          <div class="col-md-12">
                          <div class="select-custom">
                              <label class="lbl-ship">Set new stage<span class="required"></span></label>
                              <select name="orderby" class="form-control border-text production_stage_select_box" id="production_stage_id_{{$order_item->id}}">
                                <option value="0" selected="" disabled="">Select Production Stages</option>
                                @if($production_stages!="[]")
                                @foreach($production_stages as $production_stage)
                                  <option value="{{$production_stage->id}}">{{$production_stage->name}}</option>
                                @endforeach
                                @endif
                              </select>
                          </div>
                          </div>
                          <div class="col-md-12 pt-2">
                                  <div class="form-group form-check ">
                                      <input type="checkbox" class="form-check-input stage_management_input_checkbox" id="notifycustomer">&nbsp;&nbsp;
                                      <label for="notifycustomer">Notify Customer</label>
                                 </div>
                          </div>
                          <div class="col-md-12 pb-2 btn-stage-section">
                            <button class="btn-stage" order_item_id="{{$order_item->id}}">Set New Stage</button>
                          </div>
                          <div class="col-md-12 pt-2">
                                  <div class="form-group form-check ">
                                      <input type="checkbox" class="form-check-input stage_management_input_checkbox" id="autoremind">&nbsp;&nbsp;
                                      <label for="autoremind">Auto Remind</label>
                                 </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="col-md-12">
                            <h6>Stage History</h6>
                          </div>
                          <div class="col-md-12">
                          <table class="table table-bordered" id="stage_history_table_{{$order_item->id}}">
                            <tbody class="stage-historydata stage-historydata-{{$order_item->id}}">
                              <!-- <tr>
                                <td>Jan/14/2022 07:17</td>
                                <td>New Sample Request</td>
                                <td>Arun</td>
                              </tr> -->

                              @if($order_item->order_item_stage!="[]")

                                @foreach($order_item->order_item_stage as $order_item_stage)
                                <tr>
                                  <!-- <td>Jan/14/2022 07:17</td> -->
                                  <td><?php echo date("m-d-Y H:i:s", strtotime($order_item_stage->created_at)); ?></td>
                                  <td>@if($order_item_stage->stage!="") {{$order_item_stage->stage->name}} @endif</td>
                                  <td>@if($order_item_stage->user!="") {{$order_item_stage->user->name}} @endif</td>
                                </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                          </div> 
                          </div> 
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
        <!-- ---------------------------------- Stage Management End --------------------------------- -->

<!-- ---------------------------------- Order Notes Start ------------------------------------ -->

<div class="modal fade order_notes_modal_start_here" id="exampleModalLong-model-second-{{$order_item->id}}">
  <div class="modal-dialog">
  <div class="modal-content admin-modal">

  <div class="modal-header">
  <div class="row">
      <div class="col-md-12 pb-2"><h4 class="modal-title ">Order Notes / Virtual File Cabinet</h4></div>
      <div class="col-md-12"><h6 class="modal-title">Order # {{$order_item->order_id}}</h6></div>
  </div>
  <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
  </button>
  </div>



  <div class="modal-body">
  <div class="row">
    <div class="col-md-12"><h6>Order Notes Management (these are internal notes)</h6></div>

    <div class="col-md-12 note-table">
    <table class="table table-bordered">
    <thead class="head-color">
      <tr>
        <th scope="col" class="b-none">Date</th>
        <th scope="col" class="b-none">User</th>
        <th scope="col" class="b-none">Note</th>
      </tr>
    </thead>
    <tbody class="tbody_{{$order_item->id}}">

      @if($order_item->order_notes!="[]")
        @foreach($order_item->order_notes as $order_note)

          <tr>
            <td><?php echo date("m-d-Y H:i:s", strtotime($order_note->created_at)); ?></td>
            <td>
              @if($order_note->user!="")
                {{$order_note->user->name}}
              @endif
            </td>
            <td>
              <p>
                <?php echo $order_note->note; ?>
              </p>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table> 
  <style type="text/css">
    input.check_notes{
      margin-left: -15px !important;
    }
    textarea.check-notes-textarea{
      padding-top: 17px !important;
    }
    td.art_proof_mng_path_td{
      max-width: 175px !important;overflow: auto;
    }
    button.btn-add-note{
      border: 1px solid #F0F0F0;
    background-color: #F0F0F0;
    padding: 10px 10px;
    }
  </style>
    <div class="form-group form-check ">
      @php
        if($order_item->check_notes==1){
              $checked_check_notes="checked";
        }else{
              $checked_check_notes="";
        }
      @endphp 
        <input  type="checkbox" class="form-check-input check_notes check_order_notes check_notes_checkbox_order_notes_{{$order_item->id}}" order_item_id="{{$order_item->id}}" id="check-notes" {{$checked_check_notes}}>&nbsp;
        <label for="check-notes">Check Notes</label>
   </div>
  </div>


  <div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

  <div class="col-md-12">
   <!-- <div id="summernote" class="pt-4 pb-4">Enter Your Data</div> -->
   <textarea class="summernote check-notes-textarea order_note_textarea_fileld_{{$order_item->id}}"></textarea>
  </div>

  <!-- <div class="col-md-12 pb-3 pt-3">
    <button class="btn-stage">Add Note</button>
  </div> -->

  <div class="col-md-12"><hr class="short-divider short_divider"></div>
      
  <div class="col-md-12 pt-2 pb-2"><h6>Virtual File Cabinet</h6></div> 

  <div class="col-md-12 head-color pt-1 pb-1"><div class="col-md-6">Date</div><div class="col-md-6">Name</div></div>


  <div class="col-md-12 pt-4 pb-4">
  <div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input drop_virtual_file_cabinet_{{$order_item->id}}" name="virtual_file_cabinet" type="file">
  </div>
  <input type="hidden" class="order_not_user_id_{{$order_item->id}}" name="" value="{{$order_item->order->user_id}}">
  <div class=" pt-3 order_note">
    <button class="btn-add-note" order_item_id="{{$order_item->id}}">Add Note</button>
  </div>
  </div>

  </div>

  </div>
  </div>
  </div>
</div>

<!-- -------------------------------------- Order Notes End ---------------------------------------- -->

               




                <!-- -------------------------------------- Art Proof Management End   ---------------------------------- -->


<div class="modal fade" id="exampleModalLong-model-fourth-{{$order_item->id}}">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Art Proof Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # {{$order_item->order_id}}</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">
  

<div class="col-md-12">
<h6 class="modal-title pt-1 pb-2">Art Proofs</h6>

  <table class="table table-bordered" >
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Submitted On</th>
      <th >User</th>
      <th>File</th>
      <th >Admin Note</th>
      <th >Customer Note</th>
      <th >Status</th>
      <th >Date of Approval / Denial</th>
    </tr>
  </thead>
  <tbody class="art_proof_management_tbody_{{$order_item->id}}">
    @if($order_item->artproofs!="[]")
    @foreach($order_item->artproofs as $artproof)
    <tr>
      <td>{{$artproof->id}}</td>
      <td><?php echo date("m-d-Y H:i:s", strtotime($artproof->created_at)); ?></td>
      <td>
        @if($artproof->user!="")
        {{$artproof->user->name}}
        @endif
      </td>
      
      @php
    $filepathstr=trim(substr($artproof->path, strpos($artproof->path, '/') + 1));
    @endphp
   
      
      <td class="art_proof_mng_path_td">{{$filepathstr}}</td>
      <td><?php echo $artproof->note; ?></td>
      <td>{{$artproof->customer_note}}</td>
      <td>
          @if($artproof->approved==1)
            Approved
          @elseif($artproof->approved==0)
            Declined
          @elseif($artproof->approved==2)
            N/A
          @endif

      </td>
      <td><?php echo date("m-d-Y H:i:s", strtotime($artproof->updated_at)); ?></td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table> 

</div>


<div class="col-md-12 pt-3"><h6>Add New Art Proof</h6></div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <!-- <input type="checkbox" class="form-check-input art_proof_request_checkbox request_approval_{{$order_item->id}}" id="approvel">
      <label for="approvel">Request Approval</label> -->
 </div>
</div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <textarea class="summernote form-control art_proof_management_textarea_{{$order_item->id}}"></textarea>
 </div>
</div>

<input type="hidden" class="art_proof_user_id_{{$order_item->id}}" value="{{$order_item->order->user_id}}" name="">

<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input drop_file_art_proof_management_{{$order_item->id}}" type="file">
</div>
<div class=" pt-3 art_proof_management">
  <button class="btn-art-proof" order_item_id="{{$order_item->id}}">Add Art Proof</button>
</div>
</div>

<style type="text/css">
  button.btn-art-proof{
    border: 1px solid #F0F0F0;
    background-color: #F0F0F0;
    padding: 10px 10px;
  }
</style>

</div>



</div>
</div>
</div>
</div>



<!-- -------------------------------------- Art Proof Management End ---------------------------------- -->



<!-- --------------------------------------- Extra Payment Management Start ------------------------ -->
  
<div class="modal fade" id="exampleModalLong-model-third-{{$order_item->id}}">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Extra Payment Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # {{$order_item->order_id}}</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
  
<div class="col-md-12 pt-5">
  <div class="form-group form-check ">
    @php
        if($order_item->not_paid==1){
            $checked_not_paid = "checked";
        }else{
            $checked_not_paid = "";
        }
    @endphp
      <input type="checkbox" class="form-check-input order_item_payment_management_paid" order_item_id="{{$order_item->id}}" id="check-notes" {{$checked_not_paid}} style="margin-left: -15px !important;">
      <label for="check-notes">Not Paid</label>
 </div>
</div>


<div class="col-md-12"><h6 class="modal-title">Extra billing</h6></div>
<div class="col-md-12"><span>Sorry, this customer does not have any CIM account.</span></div>

<div class="col-md-12 pt-4"><h6 class="modal-title">Apply Credit</h6></div>
<div class="col-md-12"><span>Transaction ID is not avaiable. Credit transaction disabled.</span></div>

<div class="col-md-12 pt-4">
<h6 class="modal-title pt-1 pb-1">Payment History</h6>

  <table class="table table-bordered">
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Payment Profile ID</th>
      <th >Status</th>
      <th >Transaction ID</th>
      <th >Date</th>
      <th >Type</th>
      <th >Tax</th>
      <th >Total Cost</th>
      <th >Credit</th>
      <th >Overall</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table> 

</div>



</div>
</div>
</div>
</div>
</div>

<!-- -------------------------------------- Extra Payment Management End -------------------------- -->

<style type="text/css">
  .max_input_width{
    width: 100%;
    border-color: #e4eaec;
  }
</style>

<!-- ------------------------------------- Shipping Address Edit Start - --------------------------------->
                        <!-- model for first button  -->
                          <div class="modal fade" id="edit_shipping_address_modal">
                          <div class="modal-dialog">
                          <div class="modal-content admin-modal">
                          <div class="modal-header">
                          <div class="row">
                            <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Shipping Address</h4></div>
                            
                          </div>
                          <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">

                          <div class="row">
                          <div class="col-md-12">
                       
                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_title">Title</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" id="shipping_title" placeholder="Title" value="{{$order_item->shipping_title}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_first_name">First Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_first_name" id="shipping_first_name" placeholder="First Name" value="{{$order_item->shipping_first_name}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_middle_name">Middle Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_middle_name" id="shipping_middle_name" placeholder="Middle Name" value="{{$order_item->shipping_middle_name}}">
                              </div>
                              
                            </div>
                          
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_last_name">Last Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_last_name" id="shipping_last_name" placeholder="Last Name" value="{{$order_item->shipping_last_name}}">
                              </div>
                              
                            </div>
                        
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_suffix">Suffix</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_suffix" id="shipping_suffix" placeholder="Suffix" value="{{$order_item->shipping_suffix}}">
                              </div>
                              
                            </div>
                         
                          <!-- Form group End -->

                          <!-- Form group start -->
                         
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_company_name">Company Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_company_name" id="shipping_company_name" placeholder="Company Name" value="{{$order_item->shipping_company_name}}">
                              </div>
                              
                            </div>
                          
                          <!-- Form group End -->


                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_address_line_1">Address 1</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_address_line_1" id="shipping_address_line_1" placeholder="Address 1" value="{{$order_item->shipping_address_line_1}}">
                              </div>
                              
                            </div>
                          
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_address_line_2">Address 2</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_address_line_2" id="shipping_address_line_2" placeholder="Address 2" value="{{$order_item->shipping_address_line_2}}">
                              </div>
                              
                            </div>
                          
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_city">City</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_city" id="shipping_city" placeholder="City" value="{{$order_item->shipping_city}}">
                              </div>
                              
                            </div>
                         
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_state">State</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_state" id="shipping_state" placeholder="State" value="{{$order_item->shipping_state}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_zip">ZIP</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_zip" id="shipping_zip" placeholder="Zip" value="{{$order_item->shipping_zip}}">
                              </div>
                              
                            </div>
                          
                          <!-- Form group End -->

                           <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_country">Country</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_country" id="shipping_country" placeholder="Country" value="{{$order_item->shipping_country}}">
                              </div>
                              
                            </div>
                          
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_province">Province</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_province" id="shipping_province" placeholder="Country" value="{{$order_item->shipping_province}}">  
                              </div>
                              
                            </div>
                         
                          <!-- Form group End -->


                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_day_telephone">Day Telephone</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="shipping_day_telephone" id="shipping_day_telephone" placeholder="Day Telephone" value="{{$order_item->shipping_day_telephone}}"> 
                              </div>
                              
                            </div>
                     
                          <!-- Form group End -->

                          <!-- Form group start -->
                          
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="shipping_address_save"></label></div>
                               <div class="col-md-9 shipping-address">
                                <button type="button" class="btn-save" order_item_id="{{$order_item->id}}">Save</button>
                              </div>
                              
                            </div>
                          
                          <!-- Form group End -->








                        
                          </div> 
                          </div>





                          </div>
                          </div>
                          </div>
                          </div>
        <!-- ---------------------------------- Shipping Address Edit End --------------------------------- -->




        <!-- ------------------------------------- Billing Address Edit Start - --------------------------------->
                        <!-- model for first button  -->
                          <div class="modal fade" id="edit_billing_address_modal">
                          <div class="modal-dialog">
                          <div class="modal-content admin-modal">
                          <div class="modal-header">
                          <div class="row">
                            <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Billing Address</h4></div>
                            
                          </div>
                          <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                          <div class="row">
                          <div class="col-md-12">
                       

                          <!-- Form group start -->
                         
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_title">Title</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" id="billing_title" placeholder="Title" value="{{$order_item->billing_title}}">
                              </div>
                              
                            </div>
                      
                          <!-- Form group End -->

                          <!-- Form group start -->
                     
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_first_name">First Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_first_name" id="billing_first_name" placeholder="First Name" value="{{$order_item->billing_first_name}}">
                              </div>
                              
                            </div>
                    
                          <!-- Form group End -->

                          <!-- Form group start -->
           
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_middle_name">Middle Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_middle_name" id="billing_middle_name" placeholder="Middle Name" value="{{$order_item->billing_middle_name}}">
                              </div>
                              
                            </div>
                     
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_last_name">Last Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_last_name" id="billing_last_name" placeholder="Last Name" value="{{$order_item->billing_last_name}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_suffix">Suffix</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_suffix" id="billing_suffix" placeholder="Suffix" value="{{$order_item->billing_suffix}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_company_name">Company Name</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_company_name" id="billing_company_name" placeholder="Company Name" value="{{$order_item->billing_company_name}}">
                              </div>
                            </div>
                          <!-- Form group End -->


                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_address_line_1">Address 1</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_address_line_1" id="billing_address_line_1" placeholder="Address 1" value="{{$order_item->billing_address_line_1}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_address_line_2">Address 2</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_address_line_2" id="billing_address_line_2" placeholder="Address 2" value="{{$order_item->billing_address_line_2}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_city">City</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_city" id="billing_city" placeholder="City" value="{{$order_item->billing_city}}">
                              </div>
                              
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_state">State</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_state" id="billing_state" placeholder="State" value="{{$order_item->billing_state}}">
                              </div>
                              
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_zip">ZIP</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_zip" id="billing_zip" placeholder="Zip" value="{{$order_item->billing_zip}}">
                              </div>
                            </div>
                          <!-- Form group End -->

                           <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_country">Country</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_country" id="billing_country" placeholder="Country" value="{{$order_item->billing_country}}">
                              </div>
                            </div>

                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_province">Province</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_province" id="billing_province" placeholder="Country" value="{{$order_item->billing_province}}">  
                              </div>
                              
                            </div>
                          <!-- Form group End -->


                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_day_telephone">Day Telephone</label></div>
                               <div class="col-md-9">
                                <input type="text" class="max_input_width" name="billing_day_telephone" id="billing_day_telephone" placeholder="Day Telephone" value="{{$order_item->billing_day_telephone}}">  
                              </div>
                              
                            </div>
                          <!-- Form group End -->

                          <!-- Form group start -->
                            <div class="row mb-1">
                               <div class="col-md-3 text-right"><label for="billing_address_save"></label></div>
                               <div class="col-md-9 billing-address">
                                <button type="button" class="btn-save" order_item_id="{{$order_item->id}}">Save</button>
                              </div>
                              
                            </div>
                          <!-- Form group End -->








                        
                          </div> 
                          </div>





                          </div>
                          </div>
                          </div>
                          </div>
        <!-- ---------------------------------- Billing Address Edit End --------------------------------- -->












                <div class="card-block">

                  <!-- Row Start -->
                  <div class="row search-row">
                  <div class="col-md-12">
                  <button  class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalLong-model-second-{{$order_item->id}}">Order Notes / File
                  Cabinet
                  </button>
                  <!-- <i class="fa fa-folder-open" data-toggle="modal" data-target="#exampleModalLong-model-second"></i> -->
                  <!-- <button ng-click="showUserNotesForm()" class="btn btn-primary btn-xs">User Notes
                  </button> -->
                  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalLong-model-fourth-{{$order_item->id}}">Art Proofs
                  </button>
                  <button  class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalLong-model-third-{{$order_item->id}}">Extra Billing
                  </button>
                  <div class="float-right">
                  <!-- ngIf: canRemoveOrderItem('Sent to Production') -->
                  </div>
                  </div>

                  </div>
                </div>















                <!-- <div class="card-block">
                	<div class="row search-row">
                		<div class="col-6">
                			<table>
                				<thead>
                					
                				</thead>
                				<tbody>
                					<tr>
                						
                						<td>jsdfj</td>
                					</tr>
                				</tbody>
                			</table>
                		</div>

                		<div class="col-6">
                			xdfdsf
                		</div>
                	</div>
               	</div>
 -->




                            
                  
                <style type="text/css">
                  .back_color_c4e3f3{
                        background-color: #c4e3f3;
                        border-bottom: 1px solid #696969;
                  }
                </style>
                <!-- Filter Start -------------------------------------->
                <div class="card-block">

                  <!-- Row Start -->
                  <div class="row search-row ml-1">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6 back_color_c4e3f3">
                              <label class="font-weight-normal">Reference #</label>
                            </div>
                            <div class="col-6">
                             <p>{{$order_item->order_id}}S{{$order_item->id}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6  back_color_c4e3f3"><label class="font-weight-normal">Order Total</label></div>
                            <div class="col-6">
                            	{{$order_item->price}}
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row ml-1">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6 back_color_c4e3f3">
                              <label class=" font-weight-normal">Order Date</label>
                            </div>
                            <div class="col-6">
                             <p> <?php echo date("m-d-Y H:i:s", strtotime($order_item->created_at)); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6 back_color_c4e3f3"><label class="font-weight-normal"> In-Hand Date</label></div>
                            <div class="col-6">
                              {{$order_item->received_date}}
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row ml-1">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6  back_color_c4e3f3">
                              <label class="font-weight-normal">Customer ID</label>
                            </div>
                            <div class="col-6">
                              <p>
                                <style type="text/css">
                                  .underline_a {
                                  text-decoration: underline;
                                }
                                </style>
                              	@if($order_item->order!="")
                                <a class="underline_a" href="/admin/customer/{{$order_item->order->user_id}}">
                                  {{$order_item->order->user_id}}
                                </a>
                                  
                                @endif
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6 back_color_c4e3f3"><label class="font-weight-normal">Order Status</label></div>
                            <div class="col-6">
                                <p>
                                  Sent to Production <i class="fa fa-pencil"  data-toggle="modal" data-target="#exampleModalLong{{$order_item->id}}" aria-hidden="true"></i>
                                </p>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row ml-1">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6 back_color_c4e3f3">
                              <label class="font-weight-normal">Contact Name</label>
                            </div>
                            <div class="col-6">
                              <p>
                                 @if($order_item->order!="")
                                @if($order_item->order->user!="")

                                  {{$order_item->order->user->name}} {{$order_item->order->user->last_name}}

                                @endif
                                @endif
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6 back_color_c4e3f3"><label class="font-weight-normal">Purchase Order #</label></div>
                            <div class="col-6">
                                <p class="default_purchase">                                  
                                    @if($order_item->purchase_order_id!="")
                                        filled
                                    @else
                                        empty
                                    @endif
                                    <i class="fa fa-pencil purchase_order_open_dialogue" aria-hidden="true"></i>
                                </p>

                                <p class="purchase_data hidden">
                                  <input type="text" class="purchase_order_input" name="purchase_input">
                                  <button type="button" class="save_purchase_button" order_item_id="{{$order_item->id}}">save</button>
                                  <button type="button" class="cancel_purchase_button">cancel</button>
                                </p>



                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->



                  <!-- Row Start -->
                  <div class="row search-row ml-1">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6 back_color_c4e3f3">
                              <label class="">Contact Email</label>
                            </div>
                            <div class="col-6">
                              <p>
                                @if($order_item->order!="")
                                  @if($order_item->order->user!="")
                                  <a href="mailto:{{$order_item->order->user->email}}">{{$order_item->order->user->email}}</a>
                                    
                                  @endif
                                @endif
                             
                            </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-6 back_color_c4e3f3"><label class="font-weight-normal"> Vendor</label></div>
                            

                            <div class="col-6">
                                <p class="vendor_default">

                                    <span class="remove_defaul_vendor">
                                      @if($order_item->vendor!="")
                                         {{ $order_item->vendor->name}} {{$order_item->vendor->last_name}}
                                      @else
                                        empty
                                      @endif
                                    </span>
                                    

                                    &nbsp;&nbsp;
                                    <i class="fa fa-pencil update_vendor" aria-hidden="true"></i>
                                </p>

                                <p class="hidden vendor_data">
                                   <select class="select_vendor" name="vendor_id" id="select_vendor">
                                    <option value=""></option>
                                  @if($all_vendors!="[]")
                                    @foreach($all_vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->name}} {{$vendor->last_name}}</option>
                                    @endforeach
                                  @endif
                                    </select>

                                  <button type="button" class="save_vendor_button" order_item_id="{{$order_item->id}}">save</button>
                                  <button type="button" class="cancel_vendor_button">cancel</button>
                                </p>
                            </div>
                        
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  

                  <!-- Row Start -->
                  <div class="row search-row ml-1">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6 back_color_c4e3f3"><label class="">Customer Ph</label></div>
                            <div class="col-6">
                                <p>
                                Customer Ph
                                </p>
                            </div>
                      </div>
                    </div>  
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6 back_color_c4e3f3"><label class="font-weight-normal"> Tracking #</label></div>
                            <div class="col-6">
                                <p>
                                  @if($order_item->tracking_user_id!="")

                                    @if($order_item->track_user!="")
                                        {{$order_item->track_user->name}} {{$order_item->track_user->last_name}}
                                    @endif

                                  @else
                                      empty
                                  @endif
                                  <i class="fa fa-pencil" aria-hidden="true" data-toggle="modal" data-target="#tracking_modal"></i>
                                </p>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row ml-1">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6 back_color_c4e3f3"><label class="">Invoice</label></div>
                            <div class="col-6">
                                <p>
                                  @if($order_item->invoice_file!="")
                                      Uploaded
                                  @else
                                      Not Uploaded
                                  @endif

                                  &nbsp;&nbsp;

                                  <i class="fa fa-pencil" aria-hidden="true" data-toggle="modal" data-target="#invoice_modal"></i>

                                </p>
                            </div>
                      </div>
                    </div>  
                  </div>
                  <!-- Row End -->
                </div>
                <!-- Filter End ------------------------------------>



                <!-- Shipping and Billing Address Start -->

                <div class="card-block">
                	
                	<div class="row search-row">


                		<!-- Shipping Address Start -->
                    	<div class="col-6">
                    		<h5 class="font-weight-bold">Shipping Address&nbsp;<i class="fa fa-pencil" aria-hidden="true"  data-toggle="modal" data-target="#edit_shipping_address_modal"></i></h5>
                    		<p class="shipping_address_append">
                    			{{$order_item->shipping_first_name}} {{$order_item->shipping_last_name}} <br>
                          {{$order_item->shipping_address_line_1}} <br>
                          {{$order_item->shipping_city}}, {{$order_item->shipping_state}},<br> {{$order_item->shipping_country}}, 
                          {{$order_item->shipping_zip}}
                    		</p>
                    	</div>
                    	<!-- Shipping Address End -->
                    	<!-- Billing Address Start -->
                    	<div class="col-6">
                    		<h5 class="font-weight-bold">Billing Address&nbsp;<i class="fa fa-pencil" aria-hidden="true" data-toggle="modal" data-target="#edit_billing_address_modal"></i></h5>

                    		<p class="billing_address_append">
                    			  {{$order_item->billing_first_name}} {{$order_item->billing_last_name}} <br>
                            {{$order_item->billing_address_line_1}} <br>
                            {{$order_item->billing_city}}, {{$order_item->billing_state}},<br> {{$order_item->billing_country}}, 
                            {{$order_item->billing_zip}}
                    		</p>
                    	</div>
                    	<!-- Billing Address End -->

                	</div>

                </div>

                <!-- Shipping and Billing Address End -->

                <!-- Order Contents Start -->
                	
 <style type="text/css">
 	#footer-search th.info{
 		    background-color: #d9edf7;
 		    color: #09486b;
 	}

 	#footer-search tbody tr td{
 		border:1px solid #d9edf7;
 	}

 </style>
                	 


                <div class="card-block">
                	<div class="row search-row">


                    
                      <div class="col-6">
                        <h5 class="font-weight-bold">Order Details</h5>
                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Delivery Date</label>
                              </div>
                              <div class="col-8">
                               <p>{{$order_item->received_date}}</p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Colors</label>
                              </div>
                              <div class="col-8">
                               

                               <p>
                                  @if($main_selected_color!="")
                                      Item Colors: {{$main_selected_color->name}}
                                  @else
                                      empty
                                  @endif  
                               </p>

                              </div>
                          </div>
                          <!-- Row End -->
                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Options </label>
                              </div>
                              <div class="col-8">
                               <p>
                                 
                               </p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Imprints</label>
                              </div>
                              <div class="col-8">
                               <p>
                                 @if($order_item->cart_item!="")
                                  @if($order_item->cart_item->cartitemimprint!="[]")
                                        @foreach($order_item->cart_item->cartitemimprint as $cartitemimprint)
                                            {{$cartitemimprint->imprint_name}},
                                        @endforeach
                                  @endif
                                 @endif
                               </p>
                              </div>
                          </div>
                          <!-- Row End -->
                        
                	   </div>

                     <div class="col-6">
                        <h5 class="font-weight-bold">Product Info</h5>

                        <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Preview</label>
                              </div>
                              <div class="col-8">
                               <p>
                                 <img class="img-thumbnail admin-thumbnail" src="/storage/app/{{$order_item->product->product_image}}">
                               </p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">ID</label>
                              </div>
                              <div class="col-8">
                               <p>Item <a href="/admin/product/{{$order_item->product_id}}">#{{$order_item->product_id}}</a></p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Name</label>
                              </div>
                              <div class="col-8">
                                @if($order_item->product!="")
                                  @if($order_item->product->product_translation!="")
                                      <p>{{$order_item->product->product_translation->product_name}}</p>
                                  @endif
                               @endif
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Sage ID</label>
                              </div>
                              <div class="col-8">
                                @if($order_item->product!="")
                                  {{$order_item->product->sage_id}}
                                @endif
                              </div>
                          </div>
                          <!-- Row End -->

                           <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Vendor</label>
                              </div>
                              <div class="col-8">
                                @if($order_item->product!="")
                                  @if($order_item->product->seller!="")
                                    {{$order_item->product->seller->name}} {{$order_item->product->seller->last_name}}
                                  @endif
                                @endif
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">SKU Vendor</label>
                              </div>
                              <div class="col-8">
                                sku _ vendor
                              </div>
                          </div>
                          <!-- Row End -->
                          

                     </div>


                   </div>

                </div>



                <div class="card-block">
                  <div class="row search-row">


                    
                      <div class="col-6">
                        <h5 class="font-weight-bold">Pricing $</h5>

                        <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Quantity</label>
                              </div>
                              <div class="col-8">
                               <p>{{$order_item->quantity}}</p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Base Unit Price</label>
                              </div>
                              <div class="col-8">
                               <p>{{$order_item->item_price}}</p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Side One-Padprint Imprint Setup Fee</label>
                              </div>
                              <div class="col-8">
                               <p>--</p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Shipping Cost</label>
                              </div>
                              <div class="col-8">
                               <p>${{$order_item->shipping_price}}</p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Total Billed</label>
                              </div>
                              <div class="col-8">
                               <p>${{$order_item->price}}</p>
                              </div>
                          </div>
                          <!-- Row End -->


                      </div>

                      <div class="col-6">
                        <h5 class="font-weight-bold">Extra</h5>
                        <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">User<br> Comments</label>
                              </div>
                              <div class="col-8">
                               <p>--</p>
                              </div>
                          </div>
                          <!-- Row End -->
                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Own account<br> data</label>
                              </div>
                              <div class="col-8">
                               <p>--</p>
                              </div>
                          </div>
                          <!-- Row End -->

                          <!-- Row Start -->
                          <div class="row">
                              <div class="col-4 back_color_c4e3f3">
                                <label class="font-weight-normal">Shipping estimate</label>
                              </div>
                              <div class="col-8">
                               <p>
                                  @if($order_item->estimation_zip)
                                      Zip Codes : {{$order_item->estimation_zip}},
                                  @endif 

                                  @if($order_item->estimation_shipping_method )
                                      Method: {{$order_item->estimation_shipping_method }},
                                  @endif

                                  @if($order_item->estimation_shipping_price )
                                      Estimate cost: ${{$order_item->estimation_shipping_price }}
                                  @endif

                                  </p>
                              </div>  
                          </div>
                          <!-- Row End -->

                      </div>


                  </div>
                </div>

                <!-- Order Note  -->

                <div class="card-block">
                    <h5 class="font-weight-bold">Order Notes <i class="fa fa-pencil" aria-hidden="true" data-toggle="modal" data-target="#exampleModalLong-model-second-{{$order_item->id}}"></i></h5>
                  <div class="dt-responsive table-responsive">
                    <table id="footer-search" class="table nowrap">
                      <thead>
                        <tr>

                            <th class="info">Date</th>
                            <th class="info">User</th>
                            <th class="info">Note</th>

                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      
                    </table>
                  </div>
                </div>


                <!-- Art proofs Start -->
                  <div class="card-block">
                    <h5 class="font-weight-bold">Art Proofs <i class="fa fa-pencil" aria-hidden="true" data-toggle="modal" data-target="#exampleModalLong-model-fourth-{{$order_item->id}}"></i></h5>
                    <div class="dt-responsive table-responsive">
                      <table id="footer-search-artproofs" class="table nowrap">
                        <thead>
                          <tr>

                              <th class="info">ID</th>
                              <th class="info">Submitted On</th>
                              <th class="info">User</th>
                              <th class="info">File</th>
                              <th class="info">Admin Note</th>
                              <th class="info"> Customer Note</th>
                              <th class="info">Status</th>
                              <th class="info">Date of Approval / Denial</th>

                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        
                      </table>
                    </div>
                  </div>

                <!-- Art proofs End -->











              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>







<script type="text/javascript">

  'use strict';
  $(document).ready(function() {
   $('#footer-search').DataTable($.extend( {
   	responsive: true,
    "ajax": {
      url: "/admin/order/allOrderItemNotesData?order_item_id={{$order_item->id}}",
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      dataType: "json",
    },
    "order": [[ 0, "asc" ]],
    "columns": [

      { 
          "data": "created_at"
      },



    

    {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return row.user.name+" "+row.user.last_name;
    }
},

    
      
      
      {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
       var user_note = '<div>'+row.note+'</div>';
        var user_note =$(user_note).text();
        return user_note;
        
      }
    }

    ]
  },dataTableDesign)) ;
 });
</script>







<script type="text/javascript">

  'use strict';
  $(document).ready(function() {
   $('#footer-search-artproofs').DataTable($.extend( {
    responsive: true,
    "ajax": {
      url: "/admin/order/allOrderItemArtProofData?order_item_id={{$order_item->id}}",
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      dataType: "json",
    },
    "order": [[ 0, "asc" ]],
    "columns": [

      { 
          "data": "id"
      },

      { 
          "data": "created_at"
      },


    {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return ""+row.user.name+" "+row.user.last_name;
    }
},

{
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return "<a href='/storage/app/"+row.path+"' target='_blank'>"+row.path+"</a>";
    }
},

{
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        var admin_note = '<div>'+row.note+'</div>';
        var admin_note = $(admin_note).text();
        return admin_note;
    }
},

    
      
      
      {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
       var customer_note = '<div>'+row.customer_note+'</div>';
        var customer_note =$(customer_note).text();
        if(customer_note!=""&&customer_note!=null&&customer_note!='[]'&&customer_note!='null'){
          return customer_note;
        }else{
          return "";
        }
        
        
      }
    },

    {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        if(row.approved==1){
          return "Approved";
        }else if(row.approved==0){
          return "Declined";
        }
        
      }
    },

    {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return row.updated_at;
        
      }
    }



    ]
  },dataTableDesign)) ;
 });
</script>




                      
                      
                    



<script type="text/javascript">
  $(document).ready(function(){
    $('.art_proof_management').on('click','.btn-art-proof',function(e){

        var order_item_id = $(this).attr('order_item_id');
        var art_proof_image = $('.drop_file_art_proof_management_'+order_item_id).val();
        var admin_note = $('.art_proof_management_textarea_'+order_item_id).val();
        var user_id = $('.art_proof_user_id_'+order_item_id).val();

        // if($('.request_approval_'+order_item_id).is(':checked')){
        //   var request_approval = 1;
        // }else{
        //   var request_approval = 0;
        // }

        alert(order_item_id);
        alert(admin_note);
        alert(user_id);

        if(art_proof_image==""){
          alert('Please select image');
          return false;
        }

        if(admin_note==""){
          alert('Please Enter Something in Note');
          return false;
        }

        form_data = new FormData();
        jQuery.each($(".drop_file_art_proof_management_"+order_item_id)[0].files, function(i, file) {

            var fileName = file['name'];
            form_data.append('files['+i+']', file);
            form_data.append('filenames['+i+']', fileName);
            
            
        });

        form_data.append('user_id',user_id);
        // form_data.append('request_approval',request_approval);
        form_data.append('admin_note',admin_note);
        form_data.append('order_item_id',order_item_id);
        form_data.append( "_token", "{{ csrf_token() }}" );

        $.ajaxSetup 
            ({
                headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
            });


        $.ajax({
            method: "POST",
            url: "/admin/order/art-proof-management-note",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
              console.log(data);

              if(data['art_proof']['approved']==0){
                  var approve = 'Declined';
              }else if(data['art_proof']['approved']==1){
                  var approve = 'Approved';
              }else if(data['art_proof']['approved']==2){
                  var approve = 'N/A';
              }



              if(data['art_proof']['customer_note']==null){
                customer_note="";
              }else{
                customer_note=data['art_proof']['customer_note'];
              }

             if(data['art_proof']['user']==null){
                username="";
              }else{
                username=data['art_proof']['user']["name"];
              }

              
              console.log(data['art_proof']);
                 var filenameimage=data['art_proof']["path"];
                 var strfilename = filenameimage.split("/").pop();
                $('.art_proof_management_tbody_'+data['art_proof']["order_item_id"]).append('<tr><td>'+data['art_proof']["id"]+'</td><td>'+data["created_at"]+'</td><td>'+username+'</td><td class="art_proof_mng_path_td">'+strfilename+'</td><td>'+data['art_proof']["note"]+'</td><td>'+customer_note+'</td><td>'+approve+'</td><td>'+data['updated_at']+'</td></tr>');
                // $('#exampleModalLong-model-fourth-'+data["order_item_id"]).modal('hide');
            },
            error: function(data){

            }           
        });






    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.order_note').on('click','.btn-add-note',function(){
      
        var order_item_id = $(this).attr('order_item_id');
        // if($('.check_notes_checkbox_order_notes_'+order_item_id).is(':checked')){
        //   check_note = 1;
        // }else{
        //   check_note = 0;
        // }
        var note = $('.order_note_textarea_fileld_'+order_item_id).val();
        if(note==""){
          alert('Please Note Something')
          return false;
        }

        var user_id = $('.order_not_user_id_'+order_item_id).val();
        var virtual_file_cabinet = $('.drop_virtual_file_cabinet_'+order_item_id).val();
        
        form_data = new FormData();
        jQuery.each($(".drop_virtual_file_cabinet_"+order_item_id)[0].files, function(i, file) {
            form_data.append('files['+i+']', file);
        });

        form_data.append('user_id',user_id);
        // form_data.append('check_note',check_note);
        form_data.append('note',note);
        form_data.append('order_item_id',order_item_id);
        form_data.append( "_token", "{{ csrf_token() }}" );

        $.ajaxSetup 
            ({
                headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
            });

$.ajax({
    method: "POST",
    url: "/admin/order/order-notes",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(data){
        console.log(data['order_note']);

        var user_note = '<div>'+data['order_note']["note"]+'</div>';
        var user_note =$(user_note).text();
       
        $('tbody.tbody_'+data['order_note']["order_item_id"]).append('<tr><td>'+data["created_at"]+'</td><td>'+data['order_note']["user"]["name"]+'</td><td><p>'+user_note+'</p></td></tr>');
    },
    error: function(data){

    }           
});

      });
      
  });
</script>




<script type="text/javascript">

$(document).ready(function(){



//Order Footer search
$('.btn-stage-section').on('click','button.btn-stage',function (event){

  var order_item_id = $(this).attr('order_item_id');
  var stage_id = $('#production_stage_id_'+order_item_id).val();
  
  if(typeof(stage_id)=='object'){
    alert('Please select production stage');
    return false;
  }

  if(stage_id==""&&stage_id=="null"&&stage_id==null){
      alert('Please select production stage');
      return false;
  }

  if(order_item_id==""&&order_item_id==null&&order_item_id!="null"){
    alert('Not get order item id');
    return false;
  }

   $.ajax({
              type:'POST',
              url:"/admin/order/production-stage/update",
              data:{'stage_id':stage_id,'order_item_id':order_item_id,'_token':"{{ csrf_token() }}"},
              success:function(data) {
                
                // $('.tbody_'+data['order_item_id']).parents('.table_'+data['order_item_id']).append('<tr><td>'+data["stage"]["created_at"]+'</td><td>'+data["user_name"]+'</td><td>'+data["stage"]["name"]+'</td></tr>');
                  var created_at = data["stage"]["created_at"];

                  $('.stage-historydata-'+data['order_item_id']).parents('#stage_history_table_'+data['order_item_id']).append('<tr><td>'+data["created_at"]+'</td><td>'+data["stage"]["name"]+'</td><td>'+data["user_name"]+'</td></tr>');

             },
              error: function(data){

              } 
          });

});
});
</script>


        <script type="text/javascript">
                $(document).ready(function(){
                    $('.shipping-address').on("click",'.btn-save',function(){
                        
                        var order_item_id = $(this).attr('order_item_id');
                        var shipping_title = $("#shipping_title").val();
                        var shipping_first_name = $('#shipping_first_name').val();
                        var shipping_middle_name = $('#shipping_middle_name').val();
                        var shipping_last_name = $('#shipping_last_name').val();
                        var shipping_suffix = $('#shipping_suffix').val();
                        var shipping_company_name = $('#shipping_company_name').val();
                        var shipping_address_line_1 = $('#shipping_address_line_1').val();
                        var shipping_address_line_2 = $('#shipping_address_line_2').val();
                        var shipping_city = $('#shipping_city').val();
                        var shipping_state = $('#shipping_state').val();
                        var shipping_zip = $('#shipping_zip').val();
                        var shipping_country = $('#shipping_country').val();
                        var shipping_province = $('#shipping_province').val();
                        var shipping_day_telephone = $('#shipping_day_telephone').val();

                        if(shipping_first_name==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        if(shipping_last_name==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        if(shipping_address_line_1==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        if(shipping_city==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        if(shipping_state==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        if(shipping_country==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        if(shipping_day_telephone==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        form_data = new FormData();
                        form_data.append('order_item_id',order_item_id);
                        form_data.append('shipping_title',shipping_title);
                        form_data.append('shipping_first_name',shipping_first_name);
                        form_data.append('shipping_middle_name',shipping_middle_name);
                        form_data.append('shipping_last_name',shipping_last_name);
                        form_data.append('shipping_suffix',shipping_suffix);
                        form_data.append('shipping_company_name',shipping_company_name);
                        form_data.append('shipping_address_line_1',shipping_address_line_1);
                        form_data.append('shipping_address_line_2',shipping_address_line_2);
                        form_data.append('shipping_city',shipping_city);
                        form_data.append('shipping_state',shipping_state);
                        form_data.append('shipping_zip',shipping_zip);
                        form_data.append('shipping_country',shipping_country);
                        form_data.append('shipping_province',shipping_province);
                        form_data.append('shipping_day_telephone',shipping_day_telephone);
                        form_data.append( "_token", "{{ csrf_token() }}");

                        $.ajax({
                            method: "POST",
                            url: "/admin/order/order_item/shipp-address/edit",
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,

                            success: function(data){
                              $('.shipping_address_append').html('');
                              $('.shipping_address_append').append(data['shipping_first_name']+' '+data['shipping_last_name']+'<br>'+data['shipping_address_line_1']+'<br>'+data['shipping_city']+','+data['shipping_state']+',<br>'+data['shipping_country']+','+data['shipping_zip']);

                        $("#shipping_title").val(data['shipping_title']);
                        $('#shipping_first_name').val(data['shipping_first_name']);
                        $('#shipping_middle_name').val(data['shipping_middle_name']);
                        $('#shipping_last_name').val(data['shipping_last_name']);
                        $('#shipping_suffix').val(data['shipping_suffix']);
                        $('#shipping_company_name').val(data['shipping_company_name']);
                        $('#shipping_address_line_1').val(data['shipping_address_line_1']);
                        $('#shipping_address_line_2').val(data['shipping_address_line_2']);
                        $('#shipping_city').val(data['shipping_city']);
                        $('#shipping_state').val(data['shipping_state']);
                        $('#shipping_zip').val(data['shipping_zip']);
                        $('#shipping_country').val(data['shipping_country']);
                        $('#shipping_province').val(data['shipping_province']);
                        $('#shipping_day_telephone').val(data['shipping_day_telephone']);

                        $('#edit_shipping_address_modal').modal('hide');
                                
                            },

                            error: function(data){

                            }           
                        });




                    });
                });
        </script>

                <script type="text/javascript">
                $(document).ready(function(){
                    $('.billing-address').on("click",'.btn-save',function(){


                        
                        var order_item_id = $(this).attr('order_item_id');
                        var billing_title = $("#billing_title").val();
                        var billing_first_name = $('#billing_first_name').val();
                        var billing_middle_name = $('#billing_middle_name').val();
                        var billing_last_name = $('#billing_last_name').val();
                        var billing_suffix = $('#billing_suffix').val();
                        var billing_company_name = $('#billing_company_name').val();
                        var billing_address_line_1 = $('#billing_address_line_1').val();
                        var billing_address_line_2 = $('#billing_address_line_2').val();
                        var billing_city = $('#billing_city').val();
                        var billing_state = $('#billing_state').val();
                        var billing_zip = $('#billing_zip').val();
                        var billing_country = $('#billing_country').val();
                        var billing_province = $('#billing_province').val();
                        var billing_day_telephone = $('#billing_day_telephone').val();

                        if(billing_first_name==""){
                          alert('Please Enter First Name');
                          return false;
                        }

                        if(billing_last_name==""){
                          alert('Please Enter Last Name');
                          return false;
                        }

                        if(billing_address_line_1==""){
                          alert('Please Enter Address 1');
                          return false;
                        }

                        if(billing_city==""){
                          alert('Please Enter City');
                          return false;
                        }

                        if(billing_state==""){
                          alert('Please Enter State');
                          return false;
                        }

                        if(billing_country==""){
                          alert('Please Enter Country');
                          return false;
                        }

                        if(billing_day_telephone==""){
                          alert('Please Enter Day Telephone');
                          return false;
                        }

                        form_data = new FormData();
                        form_data.append('order_item_id',order_item_id);
                        form_data.append('billing_title',billing_title);
                        form_data.append('billing_first_name',billing_first_name);
                        form_data.append('billing_middle_name',billing_middle_name);
                        form_data.append('billing_last_name',billing_last_name);
                        form_data.append('billing_suffix',billing_suffix);
                        form_data.append('billing_company_name',billing_company_name);
                        form_data.append('billing_address_line_1',billing_address_line_1);
                        form_data.append('billing_address_line_2',billing_address_line_2);
                        form_data.append('billing_city',billing_city);
                        form_data.append('billing_state',billing_state);
                        form_data.append('billing_zip',billing_zip);
                        form_data.append('billing_country',billing_country);
                        form_data.append('billing_province',billing_province);
                        form_data.append('billing_day_telephone',billing_day_telephone);
                        form_data.append("_token", "{{csrf_token()}}");

                        $.ajax({
                            method: "POST",
                            url: "/admin/order/order_item/bill-address/edit",
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,

                            success: function(data){

                              $('.billing_address_append').html('');
                              $('.billing_address_append').append(data['billing_first_name']+" "+data['billing_last_name']+"<br>"+data['billing_address_line_1']+"<br>"+data['billing_city']+","+data['billing_state']+",<br>"+data['billing_country']+","+data['billing_zip']);


                        $("#billing_title").val(data['billing_title']);
                        $('#billing_first_name').val(data['billing_first_name']);
                        $('#billing_middle_name').val(data['billing_middle_name']);
                        $('#billing_last_name').val(data['billing_last_name']);
                        $('#billing_suffix').val(data['billing_suffix']);
                        $('#billing_company_name').val(data['billing_company_name']);
                        $('#billing_address_line_1').val(data['billing_address_line_1']);
                        $('#billing_address_line_2').val(data['billing_address_line_2']);
                        $('#billing_city').val(data['billing_city']);
                        $('#billing_state').val(data['billing_state']);
                        $('#billing_zip').val(data['billing_zip']);
                        $('#billing_country').val(data['billing_country']);
                        $('#billing_province').val(data['billing_province']);
                        $('#billing_day_telephone').val(data['billing_day_telephone']);

                        $('#edit_billing_address_modal').modal('hide');
                                
                            },

                            error: function(data){

                            }           
                        });




                    });
                });
        </script>

        <script type="text/javascript">
                    $('#select_vendor option[value={{$order_item->vendor_id}}]').prop('selected',true);
                    $(document).ready(function(){
                        //Edit Vendor
                        $('.update_vendor').on('click',function(){
                          $('.vendor_data').removeClass('hidden');
                          $('.vendor_default').addClass('hidden');
                        });

                        //Cancel Change
                        $('button.cancel_vendor_button').on('click',function(){
                            $('.vendor_data').addClass('hidden');
                            $('.vendor_default').removeClass('hidden');
                        });

                        //Save Vendor Changes

                        $('button.save_vendor_button').on('click',function(){
                              var vendor_id = $('#select_vendor').val();
                              var order_item_id = $(this).attr('order_item_id');
                              if(vendor_id==""){
                                alert('Please select Vendor');
                                return false;
                              }


                              form_data = new FormData();
                              form_data.append('vendor_id',vendor_id);
                              form_data.append('order_item_id',order_item_id);
                              form_data.append("_token", "{{csrf_token()}}");


                               $.ajax({
                            method: "POST",
                            url: "/admin/order/order_item/vendor/edit",
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,

                            success: function(data){

                               $('.remove_defaul_vendor').html('');

                               $('.remove_defaul_vendor').append(data['vendor']['name']+" "+data['vendor']['last_name']);
                               $('#select_vendor option[value='+data["vendor_id"]+']').prop('selected',true);
                               $('.vendor_data').addClass('hidden');
                               $('.vendor_default').removeClass('hidden');
                                
                            },

                            error: function(data){

                            }           
                        });



                        });


                    });
                  </script>

                   <script type="text/javascript">
                    $(document).ready(function(){
                      //Open Purchase order input
                        $('.purchase_order_open_dialogue').on('click',function(){
                            $('.default_purchase').addClass('hidden');
                            $('.purchase_data').removeClass('hidden');
                        });

                        $('.cancel_purchase_button').on('click',function(){
                            $('.default_purchase').removeClass('hidden');
                            $('.purchase_data').addClass('hidden');
                        });

                        $('.save_purchase_button').on('click',function(){
                            var purchase_input = $('.purchase_order_input').val();
                            

                        });



                    });
                  </script>



  <script type="text/javascript">
                  $(document).ready(function(){
                    $('.track_route').on('click','.tracking_save',function(){
                      var order_item_id = $(this).attr('order_item_id');
                      var tracking_shipping_date = $('#tracking_shipping_date').val();
                      var tracking_number = $('#tracking_number').val();
                      var tracking_shipping_company = $('#tracking_shipping_company').val();
                      var tracking_note = $('#tracking_note').val();

                      if($('#tracking_notify_customer').is(':checked')){
                          var tracking_notify_customer = 1;
                      }else{
                          var tracking_notify_customer = 0;
                      }

                      if($('#tracking_request_rating').is(":checked")){
                          var tracking_request_rating = 1;
                      }else{
                          var tracking_request_rating = 0;
                      }



                              form_data = new FormData();
                              form_data.append('order_item_id',order_item_id);
                              form_data.append('tracking_shipping_date',tracking_shipping_date);
                              form_data.append('tracking_number',tracking_number);
                              form_data.append('tracking_shipping_company',tracking_shipping_company);
                              form_data.append('tracking_note',tracking_note);
                              form_data.append('tracking_notify_customer',tracking_notify_customer);
                              form_data.append('tracking_request_rating',tracking_request_rating);
                              form_data.append("_token", "{{csrf_token()}}");




                              $.ajax({
                            method: "POST",
                            url: "/admin/order/order_item/tracking/add",
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,

                            success: function(data){
                              console.log(data);

                              var tracking_note = '<div>'+data['tracking_information']["tracking_note"]+'</div>';
                              var tracking_note =$(tracking_note).text();
                              console.log(data["created_at"]);

                               $('.tbody_tracking_append').append('<tr><td>'+data["tracking_information"]["id"]+'</td><td>'+data["tracking_shipping_date"]+'</td><td>'+data["tracking_information"]["tracking_number"]+'</td><td>'+data["tracking_information"]["tracking_shipping_company"]+'</td><td>'+tracking_note+'</td><td>'+data["created_at"]+'</td></tr>');
                                
                            },

                            error: function(data){

                            }           
                        });
                      




                    });
                  });
  </script>

  <script type="text/javascript">
  function uploadFile(target){
        document.getElementById("uploaded_file_name_mention").innerHTML = target.files[0].name;
    }
</script>




<script type="text/javascript">
  //order Notes Data
  $(document).ready(function(){
    $('.check_order_notes').on('click',function(){
        var order_item_id = $(this).attr('order_item_id');
        if($(this).is(':checked')){
          var check_notes = 1;
        }else{
          var check_notes = 0;
        }
          
          
          form_data = new FormData();
          form_data.append('order_item_id',order_item_id);
          form_data.append('check_notes',check_notes);
          form_data.append( "_token", "{{ csrf_token() }}" );

          $.ajax({
            method: "POST",
            url: "/admin/order/check-order-notes",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                var order_item_id = data['id'];
                if(data['check_notes']==1){
                  alert('Check Notes Checked Successfully');
                  // $('.status_values_'+order_item_id).append('<span class="d-inline-block order_item_notes_show_'+data["id"]+'" style="background-color: #f2dede;padding:3px;" >N</span>');
                }else if(data['check_notes']==0){
                  alert('Check Notes Unchecked Successfully');
                   // $('.order_item_notes_show_'+order_item_id).remove();
                }
                
                
            },  
            error: function(data){

            }           
        });


        
    });
  });
</script>


<script type="text/javascript">
  $('.order_item_payment_management_paid').on('click',function(){
     
      var order_item_id = $(this).attr('order_item_id');

      if($(this).is(':checked')){
        var not_paid = 1;
      }else{
        var not_paid = 0;
      }

          form_data = new FormData();
          form_data.append('order_item_id',order_item_id);
          form_data.append('not_paid',not_paid);
          form_data.append( "_token", "{{ csrf_token() }}" );

      $.ajax({
            method: "POST",
            url: "/admin/order/check-payment-not-paid",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                var order_item_id = data['id'];

                if(data['not_paid']==1){
                  // $('.status_values_'+order_item_id).prepend('<p class="d-inline-block paid-unpaid-status extra_payment_paid_or_not_paid_'+data["id"]+'">$</p>');
                  alert('Paid Successfully');
                }else if(data['not_paid']==0){
                   // $('.extra_payment_paid_or_not_paid_'+order_item_id).remove();
                   alert('UnPaid Successfully');
                }
                
                
            },  
            error: function(data){

            }           
        });



  });
</script>

@endsection
