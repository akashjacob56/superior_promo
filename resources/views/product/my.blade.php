@extends('layouts.admin')
@section('content')
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
            <a>My Products  </a>
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
                  <h5> My Products</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('PRODUCT_ADD'))
                    <a href="add" class="pull-right">
                      <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Product
                      </button>
                    </a>
                    @endif
                  </span>
                  <span class="text-muted">You view, add, modify, and organize all of your products and variants from the Products page in the Swaas admin.</span>
                </div>
                <div class="col-sm-12">
                  <div class="card-block">
                   <div class="dt-responsive table-responsive mobile-responsive">
                    <table id="footer-search" class="table nowrap photo-table">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Seller</th>
                          <th>Last updated on</th>     
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Disabled</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Seller</th>
                          <th>Last updated on</th> 
                          <th>Disabled</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      </tbody>
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
          <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Variants</th>
                <th>Quantity</th>
                <th>Add Or Set Quantity</th>
              </tr>
            </thead>
            <tbody id="variant_data">
              <td colspan="3" align="center">Please selected the product</td>
            </tbody>
          </table>
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
<script type="text/javascript">
  'use strict';
  $(document).ready(function() {
    advance = $('#footer-search').DataTable($.extend({      
      "ajax": {
        url: "myData",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 1, "asc" ]],                                
      "columns": [{
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<img class="img-fluid" src="{{$base_url}}/storage/app/'+row.product_image+'" style="height:50px;width:50px;" onerror=this.src="{{$base_url}}/files/assets/images/product.png";>';
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
        "mData": "status.status_name",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
         return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';
       }
     },{ 
       "data": "seller.business_name" 
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
       details=details +' <a  disabled class="m-l-10"><button style="background-color:#eee;pointer-events:none;color:black;" disabled="disabled" class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Inventory</button></a>';
     }
     return details;
     @else
     return "-";
     @endif

   }
 }]
},dataTableDesign) );
  } );
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
</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>


@endsection


























