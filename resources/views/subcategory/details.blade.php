@extends('layouts.admin')
@section('content')

<style type="text/css">

  img#category_image{
    max-height: 200px;
    padding: 20px;
    max-width: 200px ;
  }

  img#category_banner_image{
    height: 100px !important;
    width: auto;
    margin:10px;
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
          <li class="breadcrumb-item"><a href="all">Sub Category</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Sub Category details
              
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
          <form id="personal-info-form" method="post" action="{{$category->category_id}}" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="col-sm-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>{{$category->default_category_translation->category_name}}</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  @if($category->status_id==1)
                  <button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
                  </button>
                  @else
                  <button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
                  @endif
                  @endif
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>
    
                </span>
                <span class="text-muted">You can modify information for Sub Category according to required types and representations, also you can add product into Sub Category from the given part of your online business  </span>
              </div>
            </div>
          </div>
          <div class="col-md-12 p-0">
            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
                    <label class="form-control-label">Category</label>
                    <select class="form-control select-box" id="category_id" name="category_id">
                      <option value="">Select Category</option>
                      @foreach($categories as $newcategory)
                      <option value="{{$newcategory->category_id}}">{{$newcategory->default_category_translation->category_name}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                    @endif
                   
                  </div>
                  <input type="hidden" name="old_category_id" value="{{$category_hierarchy->parent_category_id}}">
                  <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                    <label class="form-control-label">Sub Category *</label>
                    <input type="text" id="category_name" name="category_name" value="{{$category->default_category_translation->category_name}}"  class="form-control thresold-i" maxlength="25" placeholder="Sub Category Name">
                    @if ($errors->has('category_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('category_name') }}</strong>
                    </span>
                    @endif
                  </div>

                   <!--  @php
                    $category_url = str_replace('-', ' ', $category->category_url);
                    @endphp -->

                    <div class="form-group {{ $errors->has('category_url') ? ' has-error' : '' }}">
                      <label class="form-control-label">Sub Category Url *</label>
                      <input type="text" id="category_url" name="category_url" value="{{$category->category_url}}"   class="form-control thresold-i" placeholder="Sub Category Url" >
                      @if ($errors->has('category_url'))
                      <span class="help-block">
                        <strong>{{ $errors->first('category_url') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label class="form-control-label">Description</label>
                      <textarea name="description" class="form-control summernote-editor" rows="" placeholder="Enter Sub Category description">{{$category->default_category_translation->description}}</textarea>
                      @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                      @endif
                    </div>

                     <div class="form-group">
                      <label for="file"  class="col-form-label form-control-label">Category Banner image (optional)</label>
                      <img src="/storage/app/{{$category->category_banner_image}}" id="category_banner_image" onerror="this.src='/files/assets/images/product.png';">
                      <label for="file" class="custom-file">
                        <input type="file" name="category_banner_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('category_banner_image').src = window.URL.createObjectURL(this.files[0])"/>
                        <span class="custom-file-control"></span>
                      </label>
                    </div>



                    <div class="card">
                      <div class="card-block">
                        <h6>Search engine listing preview (optional)</h6>

                        <div class="form-group">
                          <button id="edit-seo" class="btn btn-link pull-right" type="button">Edit website SEO</button>
                          <button  id="cancel-seo" class="btn btn-link pull-right" type="button">Cancel</button>
                          <p class="text-muted">Add a title and description to see how this category might appear in a search engine listing.</p>
                        </div>

                        <div class="meta form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
                          <label class="form-control-label">Meta title</label>
                          <input type="text" name="meta_title" value="{{$category->default_category_translation->meta_title}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta title">
                          @if ($errors->has('meta_title'))
                          <span class="help-block">
                            <strong>{{ $errors->first('meta_title') }}</strong>
                          </span>
                          @endif
                        </div>

                        <div class="meta form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                          <label class="form-control-label">Meta keywords </label>
                          <input type="text" name="meta_keywords" value="{{$category->default_category_translation->meta_keywords}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta keywords">
                          @if ($errors->has('meta_keywords'))
                          <span class="help-block">
                            <strong>{{ $errors->first('meta_keywords') }}</strong>
                          </span>
                          @endif
                        </div>

                        <div class="meta form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                          <label class="form-control-label">Meta Description</label>
                          <textarea name="meta_description" class="form-control" rows="5" maxlength="1000" placeholder="Enter meta description">{{$category->default_category_translation->meta_description}}</textarea>
                          @if ($errors->has('meta_description'))
                          <span class="help-block">
                            <strong>{{ $errors->first('meta_description') }}</strong>
                          </span>
                          @endif
                        </div>



                      </div>

                    </div>
                    

                  </div>
                </div>
              </div>
              <div class="col-md-12 m-b-20">
                <span class="lower-buttons">
                  @if($my_permissions->contains('CATEGORY_DETAILS'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  @if($category->status_id==1)
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
                <h5>Sub Category products</h5>
                <span class="upper-buttons pull-right">
                </span>
                <span class="text-muted">You view, add, update, and organize all of your categories/Sub Categorys from admin.</span>

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

  if({{$category->is_main_category}}==1){
    $('#is_main_category').prop('checked',true);
  }
  

  $("#category_name").keyup(function(){
    var Text = $(this).val();
    $("#category_url").val(Text);        
  });


  
</script>


<script type="text/javascript">

//product datatable

'use strict';
$(document).ready(function() {


  $('#footer-search').DataTable( $.extend({ 
    "ajax": {
      url: "allCategoryProductData?category_id={{$category->category_id}}",
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      dataType: "json",
    },                               
    "columns": [{
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        if(row.product_category==null){
          return '<div class="checkbox-fade fade-in-primary"><label><input id='+row.product_id+' type="checkbox" name="add_product_to_category" value="1" class="add_product_to_category"><span class="cr"><i class="cr-icon fa fa-check"></i></span><label></div>';
        }else{
          return '<div class="checkbox-fade fade-in-primary"><label><input id='+row.product_id+' type="checkbox" name="add_product_to_category" value="1" class="add_product_to_category" checked><span class="cr"><i class="cr-icon fa fa-check"></i></span><label></div>';
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


$("#category_id option[value={{$category_hierarchy->parent_category_id}}]").prop('selected',true);

//add selected product to category product table  
var category_id='{{$category->category_id}}';

$("#footer-search").on('click',"tr td .add_product_to_category", function(){
  var id=this.id;
  $.ajax({
    type: 'post',
    url: 'addCategoryProduct',
    data: { "_token": "{{ csrf_token() }}",'id':id,'category_id':category_id},
    success: function (result) {
      if(result==1){
        title="This product are no more part of category";
        notify(title);
      }else{
        showProductCategories(id,result);
        title="Product added to category successfully";
        notify(title);
      }
    },
    error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
  });
});

function showProductCategories(product_id,categories){
  var categoryClass ="";
  var table=$("#table_"+product_id);
  $(table).find("tr").remove();
  var row="";
  if(categories.length>1){
    row="<thead><tr><th>Category Name</th><th>Status</th><th>Action</th></tr></thead>";
    $.each(categories,function(index,item){
      if(item.category_id!=1){
        if(item.status_id==1){
          categoryClass="label-success"; 
          status="Active";
        }else{
          categoryClass="label-danger";
          status="In-Active";
        }
        row=row+"<tr><td>"+item.default_category_translation.category_name+"</td><td><span class='label "+categoryClass+"'>"+status+"</span></td><td><span class='"+product_id+" "+item.category_id+" label label-danger' title='Delete'><i class='fa fa-trash'></i></span></td></tr>";
        
      }
    });
    $(table).append(row);
  }
}

// remove this selected category for product
$("#footer-search").on('click',"tr td table tr span.label-danger", function(){
  var id=this.className[0];
  var res = this.className.split(" ");
  var category_id=res[1];

  $.ajax({
    type: 'post',
    url: 'removeCategoryProduct',
    data: { "_token": "{{ csrf_token() }}",'id':id,'category_id':category_id},
    success: function (result){
      showProductCategories(id,result);
      title="Product removed from category successfully";
      notify(title);
    },
    error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
  });
});

$(function() {

  $("#cancel-seo").hide();
  $(".meta").hide();
  $("#edit-seo").click(function(){
    $(".meta").show();
    $("#cancel-seo").show();
    $("#edit-seo").hide();
  });

  $("#cancel-seo").click(function(){
    $("#edit-seo").show();
    $(".meta").hide();
    $("#cancel-seo").hide();
  });
});

</script>

<script type="text/javascript">

  $(function() {
    var options = $.extend(true, {lang: '' , codemirror: {theme: 'monokai', mode: 'text/html', htmlMode: true, lineWrapping: true} } , {
      "toolbar": [
      ["style", ["style"]],
      ["font", ["bold", "underline", "italic", "clear"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["table", ["table"]],
      ["insert", ["link", "picture", "video"]],
      ["view", ["fullscreen", "codeview", "help"]],
      ['fontname', ['fontname']
      ],
      ['fontNames', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
      ['fontNamesIgnoreCheck', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
      ]
    });
    $("textarea.summernote-editor").summernote(options);
  });
</script>
@endsection
