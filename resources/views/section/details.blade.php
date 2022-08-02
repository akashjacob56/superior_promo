@extends('layouts.admin')
@section('content')

<style type="text/css">

img#section_image{
  max-height: 200px;
  padding: 20px;
  max-width: 200px ;
}

.custom-file{
  width: 100%;
}

</style>
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
          <li class="breadcrumb-item"><a href="all">Section</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Section details
            
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
          <form id="personal-info-form" method="post" action="{{$section->section_id}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5>{{$section->default_section_translation->section_name}}</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('CATEGORY_UPDATE'))
                    <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                    @if($my_permissions->contains('CATEGORY_UPDATE'))
                    @if($section->status_id==1)
                    <button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
                    </button>
                    @else
                    <button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
                    @endif
                    @endif
                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  
                  </span>
                  <span class="text-muted">You can modify information for Section according to required types and representations, also you can add product into Section from the given part of your online business  </span>
                </div>
              </div>
            </div>
            <div class="col-md-12 p-0">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group {{ $errors->has('section_name') ? ' has-error' : '' }}">
                      <label class="form-control-label">Section Name*</label>
                      <input type="text" id="section_name" name="section_name" value="{{$section->default_section_translation->section_name}}"  class="form-control thresold-i" maxlength="25" placeholder="Section Name">
                      @if ($errors->has('section_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('section_name') }}</strong>
                      </span>
                      @endif
                    </div>

                    @php
                    $section_url = str_replace('-', ' ', $section->section_url);
                    @endphp

                    <div class="form-group {{ $errors->has('section_url') ? ' has-error' : '' }}">
                      <label class="form-control-label">Section Url *</label>
                      <input type="text" id="section_url" name="section_url" value="{{$section_url}}"   class="form-control thresold-i" placeholder="Section Url" >
                      @if ($errors->has('section_url'))
                      <span class="help-block">
                        <strong>{{ $errors->first('section_url') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('section_position') ? ' has-error' : '' }}">
                      <label class="form-control-label">Section Position*</label>
                      <input type="text" id="section_position" name="section_position" value="{{$section->section_position}}"  class="form-control thresold-i" maxlength="25" placeholder="Section Position">
                      @if ($errors->has('section_position'))
                      <span class="help-block">
                        <strong>{{ $errors->first('section_position') }}</strong>
                      </span>
                      @endif
                    </div>


                  <!--   <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label class="form-control-label">Description</label>
                      <textarea name="description" class="form-control summernote-editor" rows="3" placeholder="Enter product description" >{{$section->default_section_translation->description}}</textarea>
                      @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                      @endif
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="col-md-12 m-b-20">
                <span class="lower-buttons">
                  @if($my_permissions->contains('CATEGORY_DETAILS'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  @if($section->status_id==1)
                  <button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
                  </button>
                  @else
                  <button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
                  @endif
                  @endif

                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>

                

                </span>
              </div>
            </div>
          </form>
                    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5>Section products</h5>
                <span class="upper-buttons pull-right">
                </span>
                <span class="text-muted">You view, add, update, and organize all of your Section products in the Swaas admin.</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Select</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Status</th>
                      
                        <th>Action</th>                 
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Disabled</th>
                        <th>Disabled</th>
                        <th>Name</th>
                        <th>Disabled</th>
                       
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

  $("#section_name").keyup(function(){
    var Text = $(this).val();
    $("#section_url").val(Text);        
  });


</script>


<script type="text/javascript">

//product datatable

'use strict';
$(document).ready(function() {


  $('#footer-search').DataTable( $.extend({ 
    "ajax": {
      url: "allSectionProductData?section_id={{$section->section_id}}",
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      dataType: "json",
    },                               
    "columns": [{
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        if(row.product_section==null){
          return '<div class="checkbox-fade fade-in-primary"><label><input id='+row.product_id+' type="checkbox" name="add_product_to_section" value="1" class="add_product_to_section"><span class="cr"><i class="cr-icon fa fa-check"></i></span><label></div>';
        }else{
          return '<div class="checkbox-fade fade-in-primary"><label><input id='+row.product_id+' type="checkbox" name="add_product_to_section" value="1" class="add_product_to_section" checked><span class="cr"><i class="cr-icon fa fa-check"></i></span><label></div>';
        }
      }
    },{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<img class="img-fluid" src="/storage/app/'+row.product_image+'" style="height:50px;width:50px;" onerror=this.src="/files/assets/images/product.png";>';
      }
    },{ 
      "data":"default_product_translation.product_name"
    },{
      "mData": "status.status_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';
      }
    },{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { 
        return '<a href="../product/'+row.product_id+'" class="btn btn-primary waves-effect waves-light js-programmatic-enable activate data-table-button">Details</a>';
      }
    }]
  }, dataTableDesign) );
} );
</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
<script src="{{asset('files/assets/pages/data-table/js/data-table-custom.js')}}"></script>

<script type="text/javascript">


//add selected section to child section table  
var section_id='{{$section->section_id}}';



//add selected product to section product table  
var section_id='{{$section->section_id}}';

$("#footer-search").on('click',"tr td .add_product_to_section", function(){
  var id=this.id;
  $.ajax({
    type: 'post',
    url: 'addSectionProduct',
    data: { "_token": "{{ csrf_token() }}",'id':id,'section_id':section_id},
    success: function (result) {
      if(result==1){
        title="This product are no more part of section";
        // notify(title);
      }else{
        showProductSections(id,result);
        title="Product added to section successfully";
        // notify(title);
      }
    },
    error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
  });
});

function showProductSections(product_id,sections){
  var sectionClass ="";
  var table=$("#table_"+product_id);
  $(table).find("tr").remove();
  var row="";
  if(sections.length>1){
    row="<thead><tr><th>section Name</th><th>Status</th><th>Action</th></tr></thead>";
    $.each(sections,function(index,item){
      if(item.section_id!=1){
        if(item.status_id==1){
          sectionClass="label-success"; 
          status="Active";
        }else{
          sectionClass="label-danger";
          status="In-Active";
        }
        row=row+"<tr><td>"+item.default_section_translation.section_name+"</td><td><span class='label "+sectionClass+"'>"+status+"</span></td><td><span class='"+product_id+" "+item.section_id+" label label-danger' title='Delete'><i class='fa fa-trash'></i></span></td></tr>";
        
      }
    });
    $(table).append(row);
  }
}

// remove this selected section for product
$("#footer-search").on('click',"tr td table tr span.label-danger", function(){
  var id=this.className[0];
  var res = this.className.split(" ");
  var section_id=res[1];

  $.ajax({
    type: 'post',
    url: 'removeSectionProduct',
    data: { "_token": "{{ csrf_token() }}",'id':id,'section_id':section_id},
    success: function (result){
      showProductSections(id,result);
      title="Product removed from section successfully";
      // notify(title);
    },
    error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
  });
});

</script>
@endsection
