@extends('layouts.admin')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>



<style type="text/css">

  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
  }

  #cancel-order-button, .order-attachment-button {
  border: 1px solid #a09898;
  background-color: #ffffff;
}

.search-row{
  margin-bottom:5px;
}

input.input-width{
  width: 300px;
}
select.select-width{
  width: 300px;
}

</style>
<!-- [ breadcrumb ] start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{$base_url}}">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{$base_url}}/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item">
            <a>Products</a>
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
                  <h5> All Products</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('PRODUCT_ADD'))
                    <a href="add" class="pull-right">
                      <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Product
                      </button>
                    </a>
                    @endif
                  </span>
                  <span class="text-muted">You can see all products, add products, get product details from the selected part of your online business .  </span>

                </div>

                <div class="card-block">
                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">ID</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" id="id" type="number" name="id" placeholder="ID">
                            </div>
                        </div>

                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Name Contains</label></div>
                            <div class="col-8"><input id="name" class="input-width" type="text" name="name" placeholder="Name"></div>
                      </div>

                    </div>
                  </div>
                  <!-- row end -->
                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right"><label class="">Vendor</label></div>
                            <div class="col-8">
                              
                              <select id="vendor_id" class="select-width" name="vendor_id">
                                <option value="">select vendor</option>
                                @if($vendors!="[]")
                                  @foreach($vendors as $vendor)
                                    <option value="{{$vendor->id}}">
                                      {{$vendor->name}}
                                    </option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-6">
                      <!-- <div class="row">
                        <div class="col-4 text-right"><label class="">Vendor SKU</label></div>
                            <div class="col-8"><input id="vendor_sku" class="input-width" type="text" name="vendor_sku" placeholder="SKU"></div>
                      </div> -->

                    </div>
                  </div>
                  <!-- row end -->
                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right"><label class="">Color Images</label></div>
                            <div class="col-8">
                              <!-- <input class="input-width" type="number" name=""> -->
                              <select id="color_image" class="select-width" name="color_image">
                                <option value="">select Color Progress</option>
                                <option value="complete">Complete</option>
                                <option value="empty">Empty</option>
                                <option value="none">None</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Category</label></div>
                            <div class="col-8">
                              <!-- <input class="input-width" type="number" name=""> -->
                              <select id="category_id" class="select-width" name="category_id">
                                <option value="">Select Category</option>
                                @if($categories!="[]")
                                  @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">
                                      @if($category->category_translation!="")
                                        {{$category->category_translation->category_name}}
                                      @endif
                                    </option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- row end -->

                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div id class="col-4 text-right"><label class="">Creation Date From</label></div>
                            <div class="col-8">
                              <input id="date_from" class="input-width" type="date" name="date_from" placeholder="From">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Creation Date To</label></div>
                            <div class="col-8"><input id="date_to" class="input-width" type="date" name="date_to" placeholder="To"></div>
                      </div>
                    </div>
                  </div>
                  <!-- row end -->

                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right"><label class="">Activity</label></div>
                            <div class="col-8">
                              <!-- <input class="input-width" type="number" name=""> -->
                              <select id="activity_status" class="select-width" name="activity_status">
                                <option value="">select Activity</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Have SAGE Id</label></div>
                            <div class="col-8">
                                <input id="sage_id" class="input-width" type="number" name="sage_id" placeholder="Sage Id">
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- row end -->
                  <br>
                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-12 text-right">
                          <button type="button" class="btn btn-secondary search-filter-button">Search</button>
                          <button type="button" class="btn btn-secondary reset-filter-button">Reset</button>
                          <button type="button" class="btn btn-secondary clear-filter-button">Clear</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- row end -->






                </div>
               
                <div class="card-block">
                  <div class="dt-responsive table-responsive mobile-responsive">
                <!--   <form class="w-100" action="{{$base_url}}/admin/product/export" method="post">

                  <button id="cancel-order-button" type="submit" class="btn btn-light waves-effect waves-light m-b-20" >
                      Export
                    </button>
                  
                  </form> -->


                    <table id="footer-search" class="table nowrap">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Item No</th>
                          <th>Status</th>
                         
                          <th>Last updated on</th>     
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Disabled</th>
                          <th>Name</th>
                          <th>Item No</th>
                          
                          <th>Status</th>
                         
                          <th>Last updated on</th> 
                          <th>Disabled</th>
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

  <!-- modal for variants -->

  <div class="col-sm-12" >
    <div class="modal fade" id="exampleModalCenter" tabindex="2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #eee;">
            <h5 class="modal-title" id="exampleModalLongTitle">Variants</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="dt-responsive table-responsive">
            <div class="mobile-responsive">
              <table  class="table nowrap" id="modal-table">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Variants</th>
                    <th>Quantity</th>
                    <th>Add/Set Qty</th>
                  </tr>
                </thead>
                <tbody id="variant_data">
                  <td colspan="3" align="center">Please selected the product</td>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!--  <button type="submit" class="btn btn-primary">Yes, Confirm</button> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end variant -->
<!-- <span id="'+row.product_id+'" class="product_variants m-2 btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button" data-toggle="modal" data-target="#exampleModalCenter" >Variants</span>' -->

<script type="text/javascript">
  'use strict';
  // $(document).ready(function() {
    function product_function(id,name,vendor_id,vendor_sku,color_image,category_id,date_from,date_to,activity_status,sage_id){

      // alert('id '+typeof(id));
      // alert('name '+typeof(name));
      // alert('vendor_id '+typeof(vendor_id));
      // alert('vendor_sku '+typeof(vendor_sku));
      // alert('color_image '+typeof(color_image));
      // alert('category_id '+typeof(category_id));
      // alert('date_from '+typeof(date_from));
      // alert('date_to '+typeof(date_to));
      // alert('activity_status '+typeof(activity_status));
      // alert('sage_id '+typeof(sage_id));
    $(function(){

    
    // $(document).ready(function() {
      $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      } );
    // } );

    $('#footer-search').DataTable( $.extend({    
      "ajax": {
        url: "allData?id="+id+"&name="+name+"&vendor_id="+vendor_id+"&vendor_sku="+vendor_sku+"&color_image="+color_image+"&category_id="+category_id+"&date_from="+date_from+"&date_to="+date_to+"&activity_status="+activity_status+"&sage_id="+sage_id,
        type: "GET",
        bFilter: true,
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 1, "asc" ]],                                
      "columns": [{
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<div class="product-div" style="height:50px;width:50px"><center><img class="img-fluid" id="product_img" src="{{$base_url}}/storage/app/'+row.product_image+'" style="max-height:50px;max-width:45px;" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; ></center></div>';
        }
      },{
        "mData": "default_product_translation.product_name",
        "mRender": function(data, type, row) {
          var string=row.default_product_translation.product_name;
          if(string.length>23){
            string=string.substr(0,20)+"...";
          }
          return ' <span data-toggle="tooltip" data-placement="top" title="'+row.default_product_translation.product_name+'">'+string+'</span>';
        }
      },{ 
        "data":"product_id" 
      },{
        "mData": "status.status_name",
        "mRender": function(data, type, row) {

          if(row.status_id==1){
            return '<label class="switch-vshopy"><input class="label label-success status" type="checkbox" value="'+row.product_id+'" checked><span class="slider-vshopy round-vshopy"></span></label>';
          }else{
            return '<label class="switch-vshopy"><input class="label label-success status" type="checkbox" value="'+row.product_id+'"><span class="slider-vshopy round-vshopy"></span></label>';
          }

          // return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';
        }
      },{ 
        "data": "updated_at" 
      },{
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) { @if($my_permissions->contains('PRODUCT_DETAILS'))
        var details='<a href="'+row.product_id+'" class="btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button" >Details</a>'; 
       
        if(row.track_inventory==1){
          details=details +' <span id="'+row.product_id+'" class="product_variants m-2 btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button" data-toggle="modal" data-target="#exampleModalCenter" >Inventory</span>';
        }else{
          details=details +' <a disabled class="m-l-10"><button style="background-color:#eee;pointer-events:none;color:black;" disabled="disabled" class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Inventory</button></a>';
        }
       
        return details;
        @else
        return "-";
        @endif
      }
    }]
  },dataTableDesign) );


  } );

 };

      
product_function();

//Search data to datatable function


$(".search-filter-button").on('click',function(){

    var id = $('#id').val();
    var name = $('#name').val();
    var vendor_id = $('#vendor_id').val();
    

//vendor id
    
    
    var vendor_sku = 1;
    // var vendor_sku = $('#vendor_sku').val();
    var color_image = $('#color_image').val();
    var category_id = $('#category_id').val();
    var date_from = $('#date_from').val();
    var date_to = $('#date_to').val();
    var activity_status = $('#activity_status').val();
    var sage_id = $('#sage_id').val();

    $("#footer-search").DataTable();
    $("#footer-search").DataTable().clear();
    $("#footer-search").DataTable().destroy();
    product_function(id,name,vendor_id,vendor_sku,color_image,category_id,date_from,date_to,activity_status,sage_id);
});



$(".clear-filter-button").on('click',function(){
    $('#id').val('');
    $('#name').val('');
    $('#vendor_id').val('');
    $('#vendor_sku').val('');
    $('#color_image').val('');
    $('#category_id').val('');
    $('#date_from').val('');
    $('#date_to').val('');
    $('#activity_status').val('');
    $('#sage_id').val('');
});


$(".reset-filter-button").on('click',function(){
  $('#id').val('');
    $('#name').val('');
    $('#vendor_id').val('');
    $('#vendor_sku').val('');
    $('#color_image').val('');
    $('#category_id').val('');
    $('#date_from').val('');
    $('#date_to').val('');
    $('#activity_status').val('');
    $('#sage_id').val('');
  var id = "";
    var name = "";
    var vendor_id = "";
    var vendor_sku = "";
    var color_image = "";
    var category_id ="";
    var date_from ="";
    var date_to = "";
    var activity_status ="";
    var sage_id ="";

    $("#footer-search").DataTable();
    $("#footer-search").DataTable().clear();
    $("#footer-search").DataTable().destroy();
    product_function(id,name,vendor_id,vendor_sku,color_image,category_id,date_from,date_to,activity_status,sage_id);
});

</script>
<script type="text/javascript">
  function isNumberKey(evt){
    var numbers = /^[-]?[0-9]+$/;

    if(evt.match(numbers))
    {

      return true;
    }
    else
    {

      return false;
    }
  }

  $("#footer-search").on('click', '.product_variants', function () {
    product_id=this.id;


    $.ajax({
      type: 'post',
      url: "{{$base_url}}/admin/product_inventory",
      data: {'product_id':product_id},
      success: function (result) {

        $('#variant_data').empty();
        showvariants(result);
      },
      error: function (xhr, textStatus, errorThrown) {

      }
    });

  });

  function showvariants(data){

    if(data.length >0){
      $.each(data, function(key,item){
        variant_option_name=item.parent_variant.default_variant_option_translation.variant_option_name;
        if(variant_option_name==null){
          variant_option_name="-";
        }
        variant_option_name=item.child_variant.default_variant_option_translation.variant_option_name;
        if(variant_option_name==null){
          variant_option_name="";
        }
        product_name=item.product.default_product_translation.product_name;
        if(product_name.length >20){
          product_name=product_name.substr(0,20)+"...";
        }else{
          product_name=product_name;
        }

        var variant='<tr><td ><img src="{{$base_url}}/storage/app/'+item.product.product_image+'" alt="user image" class="img-radius img-40 align-top m-r-15" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; style="height:40px"></td><td>'+product_name+'</td><td><div class="d-inline-block"><h6>'+variant_option_name+'</h6><p class="text-muted m-b-0">'+variant_option_name+'</p></div></td><td><span class="'+item.sku_id+'">'+item.quantity+'</span></td><td id="'+item.sku_id+'"><input type="number" value="0"  class="form-control '+item.sku_id +' inventory-quantity" style="width:50px; display:inline; margin:5px;"><button class="add btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button m-1" >Add</button><button class="set btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button m-1" >Set</button></td></tr>';
        $('#variant_data').append(variant);
      });
    }else{
      $('#variant_data').append("<tr><td class='m-20' colspan='6'><h6> Variants are not available for this product.....! </h6></td></tr>");
    }
  }

  $("#variant_data").on('click','tr td button.add', function(){
    var sku=$(this).parent().find("input")[0];
    var sku_id=$(this).parent().attr("id");
    var quantity=$(sku).val();

    var is_number=isNumberKey(quantity);
    if(is_number){

      $.ajax({
        type: "POST",
        url:"{{$base_url}}/admin/inventory/add",
        data: {quantity: quantity,'sku_id':sku_id},
        success: function(result){
          // notify(result.data.msg);
          
          if(result.data.status=="true"){
            var quantitySpan=$(sku).parent().parent().find('td span.'+result.data.sku.sku_id);
            $(quantitySpan).css("font-weight","900");
            $(quantitySpan).css("color","#050449");
            $(quantitySpan).text(result.data.sku.quantity);
            $(sku).val(0);
          }
        }
      });
    }else{
      // notify("Please Enter quantity in proper number format");
    }
  });

 // add or set quantities 
 $("#variant_data").on('click','tr td button.set', function(){
  var sku=$(this).parent().find("input")[0];
  var sku_id=$(this).parent().attr("id");
  var quantity=$(sku).val();

  var is_number=isNumberKey(quantity);
  

  if(is_number){
    $.ajax({
      type: "POST",
      url: "{{$base_url}}/admin/inventory/set",
      data: {quantity: quantity,'sku_id':sku_id},
      success: function(result){

        // notify(result.data.msg);
        if(result.data.status=="true"){
          var quantitySpan=$(sku).parent().parent().find('td span.'+result.data.sku.sku_id);
          $(quantitySpan).css("font-weight","900");
          $(quantitySpan).css("color","#050449");
          $(quantitySpan).text(result.data.sku.quantity);
          $(sku).val(0);
        }
      }
    });
  }else{
    // notify("Please Enter quantity in proper number format");
  }
  
});

$( "tbody" ).on("click", "tr td .status", function( event ) {
  product_id=$(this).attr('value');


  $.ajax({
    type: "post",
    url: "{{$base_url}}/admin/product/active/change/status",
    data: {'product_id':product_id},
    dataType: 'json',
    cache: false,
    success: function (result) {

      if (result.status_id==1) {
      // notify("Product Activated Successfully");
    }else{

      // notify("Product InActivated Successfully");
    }
     
    },
    error: function (error) {
      console.log(error);
    }
  });
});
 
</script>


<script type="text/javascript">
  
</script>



@endsection


























