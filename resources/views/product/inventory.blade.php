@extends('layouts.admin')
@section('content')

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
            <a>Inventory 
            </a>
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
                <h5> Inventory</h5>
                <span class="text-muted">You can view, add, modify, and organize all of your inventories from the inventories page in the admin.</span>
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive mobile-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>Variants</th>
                        <th>Product status</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Seller</th>
                        <th>Add quantity or set quantity</th>                      
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Disabled</th>
                        <th>Product name</th>
                        <th>Disabled</th>
                        <th>Disabled</th>
                        <th>SKU</th>
                        <th>quantity</th>
                        <th>Seller</th>
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

<script type="text/javascript">

  function showDataTable(){
    $('#footer-search').DataTable( $.extend({ 

      "ajax": {
        url: "inventoryData",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 1, "asc" ]],                                
      "columns": [{

        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<img class="img-fluid" src="/storage/app/'+row.product.product_image+'" style="height:50px;width:50px;" onerror=this.src="/files/assets/images/product.png";>';
        }
      },{ 

        "mData":"product.default_product_translation.product_name",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          var string=row.product.default_product_translation.product_name;
          if(string.length>23){
           string=string.substr(0,20)+"...";
         }
         return string;
       }
     },{
      "mData": "child_variant.variant_option_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        if(row.parent_variant.default_variant_option_translation.variant_option_name!=null && row.child_variant.default_variant_option_translation.variant_option_name!=null){
          return row.parent_variant.default_variant_option_translation.variant_option_name+' : '+row.child_variant.default_variant_option_translation.variant_option_name;
        }else if(row.parent_variant.default_variant_option_translation.variant_option_name!=null){
          return row.parent_variant.default_variant_option_translation.variant_option_name;
        }else if(row.child_variant.default_variant_option_translation.variant_option_name!=null){
          return row.child_variant.default_variant_option_translation.variant_option_name;
        }else{
          return '-';
        }
      }
    },{
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
       return '<span class="label label-'+row.product.status.status_class+'">'+row.product.status.status_name+'</span>';
     }
   },{ 
    "bSortable": false,
    "data": "sku_name" 
  },{
    "mData": "quantity",
    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) {
      return '<span class="'+row.sku_id+'">'+row.quantity+'</span>';

    }
  },{ 
    "bSortable": false,
    "data": "product.seller.name" 
  },{

    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) {
     
      @if($my_permissions->contains('INVENTORY_UPDATE'))

      return '<input value="0" class="'+row.sku_id+' form-control pull-left data-table-button m-r-5" style="width:50px;"><button class="add btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button" >Add</button> <button class="set btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button" >Set</button>';

     
      @endif
    }
  }]
},dataTableDesign) );
  }
  'use strict';
  $(document).ready(function() {
    showDataTable();
  } );

</script>

<script src="{{asset('files/assets/pages/data-table.js')}}"></script>

<script type="text/javascript">
  $("#footer-search").on('click','tbody tr td button.add', function(){
    var sku=$(this).parent().find("input")[0];
    var sku_id=(sku).className;

    var quantity=$(sku).val();
    
    $.ajax({
      type: "POST",
      url: "inventory/add",
      data: {quantity: quantity,'sku_id':sku_id},
      success: function(result){

        var quantitySpan=$(sku).parent().parent().find('td span.'+result.sku_id);
        $(quantitySpan).css("font-weight","900");
        $(quantitySpan).css("color","#050449");
        $(quantitySpan).text(result.quantity);
        $(sku).val(0);
        dataTable=$("#footer-search").DataTable();
        dataTable.clear();
        dataTable.destroy();
        showDataTable();

        // notify("Product Quantity Added Successfully");
      }
    });
    
  });

  $("#footer-search").on('click','tbody tr td button.set', function(){
    var sku=$(this).parent().find("input")[0];
    var sku_id=(sku).className;
    var quantity=$(sku).val();
    if(quantity>=0){
      $.ajax({
        type: "POST",
        url: "inventory/set",
        data: {quantity: quantity,'sku_id':sku_id},
        success: function(result){
          var quantitySpan=$(sku).parent().parent().find('td span.'+result.sku_id);
          $(quantitySpan).css("font-weight","900");
          $(quantitySpan).css("color","#050449");
          $(quantitySpan).text(result.quantity);
          $(sku).val(0);
          dataTable=$("#footer-search").DataTable();
          dataTable.clear();
          dataTable.destroy();
          showDataTable();

          // notify("Product Quantity Set Successfully");
        }
      });
    }else{
     // notify("@lang("product.quantity_should_be_greater_than_zero")");
   }

 });

</script>
@endsection


























