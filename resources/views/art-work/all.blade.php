@extends('layouts.admin')
@section('content')

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


</style>

<!-- for summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- for summernote -->

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#summernote2').summernote();
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

<!-- model for first button  -->
<div class="modal fade" id="exampleModalLong">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">

<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Stage Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
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
    <select name="orderby" class="form-control border-text">
    <option value="" selected="selected">New Sample Request</option>
        <option value="123456789">Art Department</option>
    </select>
</div>
</div>
<div class="col-md-12 pt-2">
        <div class="form-group form-check ">
            <input type="checkbox" class="form-check-input " id="notifycustomer">
            <label for="notifycustomer">Notify Customer</label>
       </div>
</div>
<div class="col-md-12 pb-2 btn-stage-section">
  <button class="btn-stage">Set New Stage</button>
</div>
<div class="col-md-12 pt-2">
        <div class="form-group form-check ">
            <input type="checkbox" class="form-check-input " id="autoremind">
            <label for="autoremind">Auto Remind</label>
       </div>
</div>
</div>


<div class="col-md-6">
<div class="col-md-12"><h6>Stage History</h6></div>
 
<div class="col-md-12">
<table class="table table-bordered">
  <tbody class="stage-historydata">
    <tr>
      <td>Jan/14/2022 07:17</td>
      <td>New Sample Request</td>
      <td>Arun</td>
    </tr>
  </tbody>
</table>
</div> 
</div> 


</div>


</div>
</div>
</div>
</div>


<!-- model 2nd  -->
<div class="modal fade" id="exampleModalLong-model-second">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
    <div class="col-md-12 pb-2"><h4 class="modal-title ">Order Notes / Virtual File Cabinet</h4></div>
    <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
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
  <tbody>
    <tr>
      <td>01/13/22 6:24 PM</td>
      <td>Boris</td>
      <td>
      <p>
      http://www.sgila.com/ProductDetails/?
      productId=552470103&imageId=43268598&tab=Tile&referrerPage=ProductResults&refPgId=516346636&referrerModule=PRDREB
    </p></td>
    </tr>
  </tbody>
</table> 
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="check-notes">
      <label for="check-notes">Check Notes</label>
 </div>
</div>


<div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

<div class="col-md-12">
 <div id="summernote" class="pt-4 pb-4">Enter Your Data</div>
</div>

<div class="col-md-12 pb-3 pt-3">
  <button class="btn-stage">Add Note</button>
</div>

<div class="col-md-12"><hr class="short-divider short_divider"></div>
    
<div class="col-md-12 pt-2 pb-2"><h6>Virtual File Cabinet</h6></div> 

<div class="col-md-12 head-color pt-1 pb-1"><div class="col-md-6">Date</div><div class="col-md-6">Name</div></div>


<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple>
</div>
<div class=" pt-3">
  <button class="btn-stage">Add Note</button>
</div>
</div>

</div>

</div>
</div>
</div>
</div>



<!-- model 3rd  -->
<div class="modal fade" id="exampleModalLong-model-third">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Extra Payment Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
  
<div class="col-md-12 pt-5">
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="check-notes">
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








<!-- model 4th  -->
<div class="modal fade" id="exampleModalLong-model-fourth">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Art Proof Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">
  

<div class="col-md-12">
<h6 class="modal-title pt-1 pb-2">Art Proofs</h6>

  <table class="table table-bordered">
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Submitted On</th>
      <th >User</th>
      <th >File</th>
      <th >Admin Note</th>
      <th >Customer Note</th>
      <th >Status</th>
      <th >Date of Approval / Denial</th>
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
    </tr>
  </tbody>
</table> 

</div>


<div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="approvel">
      <label for="approvel">Request Approval</label>
 </div>
</div>


<div class="col-md-12">
 <div id="summernote2" class="pt-4 pb-4">Enter Your Data</div>
</div>


<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple>
</div>
<div class=" pt-3">
  <button class="btn-stage">Add Art Proof</button>
</div>
</div>



</div>



</div>
</div>
</div>
</div>



<!-- model 5th-->
<div class="modal fade" id="exampleModalLong-model-fifth">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">User Notes</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>
<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">

  
<div class="row">
  
<div class="col-md-12">
<h6 class="modal-title pt-1 pb-2">User Notes Management (this is what customer will see)</h6>

  <table class="table table-bordered">
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Submitted On</th>
      <th >User</th>
      <th >File</th>
      <th >Admin Note</th>
      <th >Customer Note</th>
      <th >Status</th>
      <th >Date of Approval / Denial</th>
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
    </tr>
  </tbody>
</table> 

</div>


<div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="approvel">
      <label for="approvel">Request Approval</label>
 </div>

<div class="col-md-12">
  <div class="col-md-1">Subject</div>
  <div class="col-md-11"><input type="text" class="input-width" name="" placeholder="subject" /></div>
</div>

</div>


<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple>
</div>
<div class=" pt-3">
  <button class="btn-stage">Add Note</button>
</div>
</div>


</div>

</div>
</div>
</div>
</div>



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
            <a>Artwork</a>
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
                <h5> All Art-work</h5>
                <span class="upper-buttons pull-right">
              
          
<!--          <a href="add" class="pull-right">
                  <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">Add admin
                  </button>
                </a> -->
          
              </span>

                <!-- <span class="text-muted">You view, add, modify, and organize admin  from the selected page in the  vshopy  admin.</span> -->

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>ArtProofId</th>
                        <th>ProductName</th>
                        <!-- <th>ArtworkfileName</th> -->
                        <th>ArtworkFilePath</th>
                        <th>Approve</th>
                        <th>Customer Note</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Image/File</th>

                        <th>Action</th>                                      
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ArtProofId</th>
                        <th>ProductName</th>
                        <!-- <th>ArtworkfileName</th> -->
                        <th>ArtworkFilePath</th>
                        <th>Approve</th>
                        <th>Customer Note</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Image/File</th>
                        <th>Action</th>
                     </tr>
                   </tfoot>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>


<script type="text/javascript">
  'use strict';
  $(document).ready(function(){
   $('#footer-search').DataTable( $.extend({   
     "ajax":{
       url: "allData?order_item_id={{$order_item_id}}",
       type: "GET",
       contentType: "application/json;charset=UTF-8",
       dataType: "json",
     },
     "order": [[ 0, "asc" ]],                                
     "columns": [
     {
      "data":"id"
     },
     {
      "data": "orderitem.product.product_translation.product_name"
    },
    // {
    //   "data": "name"
    // },
    { 
      "mRender": function(data, type, row){
        return row.path.substring(0, 25)+"...";
      }, 
    },

    {
      "mRender": function(data, type, row){
        if(row.approved=="0"){  
          return '<button type="button" class="btn btn-danger waves-effect waves-light js-programmatic-disable data-table-button">Decline</button>';
        }else if(row.approved=="1"){
          return '<button type="button" class="btn btn-success waves-effect waves-light js-programmatic-disable data-table-button">Approve</button>';
        }else if(row.approved=="2"){
          return '<button type="button" class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Not Approve</button>';
        }
      },
    },

    {
       "mRender": function(data, type, row){
        if(row.customer_note!=""&&row.customer_note!=null){  
          return row.customer_note;
        }else{
          return "<div class='text-center'>-</div>";
        }
      },
    },

    {
      "data": "created_at"
    },

    {
      "data": "updated_at"
    },

    { 
        "mRender": function(data, type, row){
        return "<a href='/storage/app/"+row.path+"'><img src='/storage/app/preview.png' style='width:100px;height:50px;'></a>";
      },
    },   

     { "mRender": function(data, type, row){
      return '<td class="art-work-db-i"><div class="all-button-div"><a class="all-button-div" href="/admin/artwork/'+row.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></a><i class="fa fa-database" data-toggle="modal" data-target="#exampleModalLong"></i><i class="fa fa-folder-open"class="fa fa-database" data-toggle="modal" data-target="#exampleModalLong-model-second"></i><i class="fa fa-usd"data-toggle="modal" data-target="#exampleModalLong-model-third"></i><i class="fa fa-magic" data-toggle="modal" data-target="#exampleModalLong-model-fourth"></i><i class="fa fa-file-text"data-toggle="modal" data-target="#exampleModalLong-model-fifth"></i><i class="fa fa-exclamation"></i><div></td>'
    }, 
    }     
]
}, dataTableDesign) );
 } );
</script>
<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script> 

<!-- for stage append  -->
<script type="text/javascript">
$(document).ready(function(){
$('.btn-stage-section').on('click','button.btn-stage',function (event){
alert("hello");
$('.stage-historydata').append("<tr><td>Jan/14/2022 07:17</td><td>New Sample Request</td><td>Arun</td></tr>");
});
});
</script>




@endsection