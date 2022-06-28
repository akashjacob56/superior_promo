@extends('layouts.admin')
@section('content')


<style type="text/css">
  [type='text'], [type='password'], [type='date'], [type='datetime'], [type='datetime-local'], [type='month'], [type='week'], [type='email'], [type='number'], [type='search'], [type='tel'], [type='time'], [type='url'], [type='color'], textarea {
    display: block;
    box-sizing: border-box;
    width: 100%;
    height: 2.4375rem;
    margin: 0 0 1rem;
    padding: 0.5rem;
    border: 1px solid #D0D0D0;
    border-radius: 0.1875rem;
    background-color: #fff;
    box-shadow: inset 0 1px 2px rgb(10 10 10 / 10%);
    font-family: inherit;
    font-size: 1rem;
    font-weight: normal !important;
    color: #0a0a0a;
    transition: box-shadow 0.5s, border-color 0.25s ease-in-out;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
</style>

<style type="text/css">


  img#category_image{
    max-height: 200px !important;
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


<style type="text/css">
  .menu.vertical > li > a {
   font-weight: 700;
  }
  .fa-pencil{
   color: #dc3545;
  }
  .fa-trash{
    color: #28a745;
  }
  .is-accordion-submenu-parent > a::after {
    display: block;
    width: 0;
    height: 0;
    border: inset 6px;
    content: '';
    border-bottom-width: 0;
    border-top-style: solid;
    border-color: #1d92cf transparent transparent;
    position: absolute;
    top: 50%;
    margin-top: -3px;
    right: 1rem;
}
/*Today*/
.is-accordion-submenu-parent > a::after {
    display: block;
    width: 0;
    height: 0;
    border: inset 6px;
    content: '';
    border-bottom-width: 0;
    border-top-style: solid;
    border-color: #1d92cf transparent transparent;
    position: absolute;
    top: 50%;
    margin-top: -3px;
    left: 0rem !important;
    /* right: 1rem; */
}

.menu > li > a {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: inline-block !important;
}


</style>

<link rel="stylesheet" type="text/css" href="https://get.foundation/building-blocks/assets/css/app.css?rev=@@hash">

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
          <li class="breadcrumb-item"><a href="all">Categories</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add categories
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
              <div class="card-header no-border">
                <h5>Using Add Categories</h5>
                <span class="upper-buttons pull-right">
                  <!-- @if($my_permissions->contains('CATEGORY_ADD'))
                  <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  @endif
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a> -->
                </span>
                <span>Categories are the primary way to combine products with similar characteristic. You can also add sub-categories if required.</span>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            

            <div class="card">
              <div class="card-block">



                         <div class="header-bottom sticky-header d-none d-lg-block">
              <div class="container">
                <ul class="multilevel-accordion-menu vertical menu" id="outer" data-accordion-menu>

              @if(count($menu_categories)>0) 
                  @foreach($menu_categories as $category)

                      @php
                        $category_translation=$category->category_translation;

                        if($category_translation==""){
                          $category_translation=$category->default_category_translation;    
                        }


                      @endphp

                      @if(count($category->child_categories)>0)
                          <li class="parent_content" id="{{$category->category_id}}">
                            <a  class="" href="javascript:void(0);">{{$category_translation->category_name}} &nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil category_edit_{{$category->category_id}} category_edit" category_id="{{$category->category_id}}"></i>&nbsp;<i class="fa fa-trash category_inactive_{{$category->category_id}} category_inactive" category_id="{{$category->category_id}}"></i>


                            
                            <ul class="menu vertical sublevel-1">
                                  @foreach($category->child_categories as $child_category)

                                         @php
                                          $child_category_translation=$child_category->category->category_translation;

                                          if($child_category_translation==""){
                                              $child_category_translation=$child_category->category->default_category_translation;    
                                          }

                                        @endphp



                                        @if(count($child_category->sub_child_categories)>0)

                                               <li id="{{$child_category_translation->category_id}}" class="child_content" style="flex: 0 0 98%;margin-left: 2%;">
                                                  <a  class="" href="#">{{$child_category_translation->category_name}}</a>&nbsp;<i class="fa fa-pencil  child_category_edit_{{$child_category_translation->category_id}} child_category_edit" category_id="{{$child_category_translation->category_id}}"></i>&nbsp;<i class="fa fa-trash child_category_inactive_{{$child_category_translation->category_id}} child_category_inactive" category_id="{{$child_category_translation->category_id}}"></i>
                                                  <ul class="menu vertical sublevel-2">
                                                    @foreach($child_category->sub_child_categories as $sub_child_category)

                                                    

                                                        @php

                                                           $sub_child_category_translation=$sub_child_category->category->category_translation;

                                                           if($sub_child_category_translation==""){
                                                           $sub_child_category_translation=$sub_child_category->category->default_category_translation;  
                                                         }
                                                        @endphp
                                                        
                                                        <li class="subchild_content" id="{{$sub_child_category->category->category_id}}" style="flex: 0 0 96%;margin-left: 4%;"><a  class="" href="#">{{$sub_child_category_translation->category_name}}</a> &nbsp;<i class="fa fa-pencil sub_child_category_edit_{{$sub_child_category->category->category_id}} sub_child_category_edit" category_id="{{$sub_child_category->category->category_id}}"></i>&nbsp;<i class="fa fa-trash sub_child_category_inactive_{{$sub_child_category->category->category_id}} sub_child_category_inactive" category_id="{{$sub_child_category->category->category_id}}"></i>
                                                        </li>

                                                    @endforeach
                                                  </ul>
                                                </li>
                                        @else
                                                <li id="{{$child_category_translation->category_id}}"   class="child_content" style="flex: 0 0 98%;margin-left:2%;">
                                                    <a class="" href="">{{$child_category_translation->category_name}}</a> &nbsp;<i class="fa fa-pencil child_category_edit_{{$child_category_translation->category_id}} child_category_edit" category_id="{{$child_category_translation->category_id}}"></i>&nbsp;<i class="fa fa-trash child_category_inactive_{{$child_category_translation->category_id}} child_category_inactive" category_id="{{$child_category_translation->category_id}}"></i>
                                                </li>
                                        @endif
                                  @endforeach
                            </ul>
                          </li>
                      @else

                          <li id="{{$category->category_id}}" class="parent_content">
                            <a  class="" class="subitem" href="#">{{$category_translation->category_name}}</a> &nbsp;<i class="fa fa-pencil category_edit_{{$category->category_id}} category_edit" category_id="{{$category->category_id}}"></i>&nbsp;<i class="fa fa-trash category_inactive_{{$category->category_id}} category_inactive" category_id="{{$category->category_id}}"></i>
                          </li>

                      @endif

                  @endforeach
              @endif
</ul>






<input type="hidden" name="parent" class="parent">
<input type="hidden" name="child" class="child">
<input type="hidden" name="subchild" class="subchild">








</div><!-- End .container -->
</div><!-- End .header-bottom -->











          </div>
        </div>

          </div>
          <div class="col-sm-8">
          <form id="personal-info-form" method="post" action="add" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">


          

          <div class="col-md-12">
            <div class="card">
              <div class="card-block">

                <input type="hidden" name="language_id" value="1">

                <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                  <label class="form-control-label">Category name *</label>
                  <input id="category_name" type="text" name="category_name" value="{{old('category_name')}}"  class="form-control thresold-i" maxlength="25" placeholder="e.g. Men, Women, Furniture, etc" >
                  @if ($errors->has('category_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('category_name') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('category_url') ? ' has-error' : '' }}">
                  <label class="form-control-label">Category Url *</label>
                  <input id="category_url" type="text" name="category_url" value="{{old('category_url')}}"  class="form-control thresold-i" placeholder="Category Url" >
                  @if ($errors->has('category_url'))
                  <span class="help-block">
                    <strong>{{ $errors->first('category_url') }}</strong>
                  </span>
                  @endif
                </div>



                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Description</label>
                  <textarea name="description" class="form-control summernote-editor" rows="" placeholder="Enter Category description">{{old('description')}}</textarea>
                  @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                  @endif
                </div>




                <div class="checkbox-fade fade-in-primary">
                  <label class="pull-left">
                    <input type="checkbox" name="is_main_category" value="1">      
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                  </label>
                  <label class="form-control-label pull-left">Set this Category as "Top Category".</label>
                </div>


                <div class="form-group">
                  <label for="file"  class="col-form-label form-control-label">Category image (optional)</label><br>
                  <img src="{{$base_url}}/files/assets/images/preview.png" id="category_image">
                  <label for="file" class="custom-file">
                    <input type="file" name="category_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('category_image').src = window.URL.createObjectURL(this.files[0])"/>
                    <span class="custom-file-control"></span>
                  </label>
                </div>

                <div class="form-group">
                  <label for="file"  class="col-form-label form-control-label">Category Banner image (optional)</label><br>
                  <img src="{{$base_url}}/files/assets/images/preview.png" id="category_banner_image">
                  <label for="file" class="custom-file">
                    <input type="file" name="category_banner_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('category_banner_image').src = window.URL.createObjectURL(this.files[0])"/>
                    <span class="custom-file-control"></span>
                  </label>
                </div>



              </div>
            </div>
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
                <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta title">
                @if ($errors->has('meta_title'))
                <span class="help-block">
                  <strong>{{ $errors->first('meta_title') }}</strong>
                </span>
                @endif
              </div>

              <div class="meta form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                <label class="form-control-label">Meta keywords </label>
                <input type="text" name="meta_keywords" value="{{old('meta_keywords')}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta keywords">
                @if ($errors->has('meta_keywords'))
                <span class="help-block">
                  <strong>{{ $errors->first('meta_keywords') }}</strong>
                </span>
                @endif
              </div>

              <div class="meta form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                <label class="form-control-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="5" maxlength="1000" placeholder="Enter meta description">{{old('meta_description')}}</textarea>
                @if ($errors->has('meta_description'))
                <span class="help-block">
                  <strong>{{ $errors->first('meta_description') }}</strong>
                </span>
                @endif
              </div>



            </div>

          </div>

          <div class="col-sm-12">    
            <div class="main-footer">  
              <span class="lower-buttons">  
                @if($my_permissions->contains('CATEGORY_ADD'))
                <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                <a href="{{$base_url}}/admin/categories/all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                </button></a>
              </span>
            </div>   
          </div>
         
        </form>
        </div>




      </div>
    </div>
  </div>
</div>
</div>

<script src="https://get.foundation/building-blocks/assets/js/app.js?rev=@@hash"></script>
<script type="text/javascript">

  $("#category_name").keyup(function(){
    var Text = $(this).val();
       /* Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');*/
        $("#category_url").val(Text);        
      });

  var categories=<?php echo json_encode($categories);?>;
  $.each(categories,function(index,item){
    select_text=item.default_category_translation.category_name;
    select_value=item.default_category_translation.category_id;
    var o= new Option(select_text,select_value);
    $("#category_id").append(o);
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




<!-- All Category Page Start -->

<script type="text/javascript">
//   $(document).ready(function(){
//  var menu_categories=<?php echo json_encode($menu_categories);?>;

//     $.each(menu_categories,function(index,item){         
       
//           //Remove Category from Database start----------------------
//           $('.category_inactive_'+item.category_id).on('click',function(){
//             category_id = item.category_id;
//                   $.ajax({
//                   type: 'post',
//                   url: 'category/delete',
//                   data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
//                   success: function (result) {
//                     if(result!=""){
//                       if(result==0){
//                         location.reload();
//                       }else{
//                         alert('Category Not Deleted');
//                       }
//                     }
//                   },
//                   error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
//                 });
//           });
//           //Remove Category from Database End----------------------------
          

//           //Edit Category Start -----------------------------------------
//             $('.category_edit_'+item.category_id).on('click',function(){
//               category_id = item.category_id;
//               window.location.href = "{{$base_url}}/admin/category/"+category_id;
//             //   url = "{{$base_url}}/admin/category/"+category_id;
//             //   window.open(url);
//             });
//           //Edit Category Start -----------------------------------------
         

//           ////////////////////Child Categories Start----------------------
//               var child_categories = item.child_categories;

//               $.each(child_categories,function(index,item){
//                         //edit child category id Start-----------
//                         $('.child_category_edit_'+item.child_category_id).on('click',function(){
//                             var category_id = item.child_category_id;
//                             url = "{{$base_url}}/admin/category/"+category_id;
//                             window.open(url);
//                         });
//                         //edit child category id End----------

//                         //Remove child Category id Start----
//                           $('.child_category_inactive_'+item.child_category_id).on('click',function(){
//                             var category_id = item.child_category_id;
//                                   $.ajax({
//                                   type: 'post',
//                                   url: 'category/delete',
//                                   data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
//                                   success: function (result) {
//                                     if(result!=""){
//                                       if(result.status_id==0){
//                                         alert('Category Deleted Successfully');
//                                       }else{
//                                         alert('Category Not Deleted');
//                                       }
//                                     }
//                                   },
//                                   error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
//                                 });
//                           });
//                         //Remove child Category id End----
                        
//                         // console.log(item.sub_child_categories);
//                         // console.log('fdf');

//                       //Sub Child Start---------------
//                         var sub_child_categories = item.sub_child_categories;
//                         console.log(item.sub_child_categories);
//                         $.each(sub_child_categories,function(index,item){
                            
//                               //sub child categories start-----------------
//                                 $('.sub_child_category_edit_'+item.category.category_id).on('click',function(){
                                  
//                                     var category_id = item.category.category_id;
//                                     url = "{{$base_url}}/admin/category/"+category_id;
//                                     window.open(url);
//                                 });
//                               //sub child Categories end--------------------
//                               $('.sub_child_category_inactive_'+item.category.category_id).on('click',function(){
//                                     var category_id = item.category.category_id;
//                                     $.ajax({
//                                     type: 'post',
//                                     url: 'category/delete',
//                                     data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
//                                     success: function (result) {
//                                       if(result!=""){
//                                         if(result==0){
//                                           location.reload();
                                           
//                                         }else{
//                                           alert('Category Not Deleted');
//                                         }

//                                       }
//                                     },
//                                     error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
//                                   });
//                               });
//                         });
//                     //Sub Child End---------------
//               });
//             ////////////////////Child Categories End------------------------
//         });
//   });
 
</script>





<script type="text/javascript">
  $(function(){
      

$( ".subchild_content" ).draggable();
        $( ".subchild_content" ).droppable({
            activeClass: "ui-state-hover",
            hoverClass: "ui-state-active",
            drop: function( event, ui ) {
              event.preventDefault();

              alert("subchild");
              
                // alert(ui.draggable.attr('id') + ' was dropped from ' + ui.draggable.parent().attr('id'));
                // $( this ).addClass( "ui-state-highlight" );

                var current_parent_content_id = ui.draggable.parent().parent().attr('id');
                var child_id = ui.draggable.attr('id');
                var parent_id = event.target.id;
               

                 var subchild=2;

                  var child=$('.child').val();

                  
                    console.log("2"+current_parent_content_id+": "+child_id +": "+parent_id);
                    $(".subchild").val(subchild);

                // $.ajax({
                //   type: 'post',
                //   url: '{{$base_url}}/admin/category/drag-drop',  
                //   data: {"_token": "{{ csrf_token() }}",'child_category_id':child_id,'new_parent_category_id':parent_id,'old_parent_category_id':current_parent_content_id},
                //   success: function (result){
                    
                //   },
                //   error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                // });

                  
                
                // Move the dragged element into its new container
                // ui.draggable.attr('style','position:relative');
                // $(this).append(ui.draggable);
                // return false;
                 
            }    
                  
        });

        $( ".child_content" ).draggable();

        $(".child_content").droppable({
            activeClass: "ui-state-hover",
            hoverClass: "ui-state-active",
            drop: function( event, ui ) {
              
               
                // $( this ).addClass( "ui-state-highlight" );

                var current_parent_content_id = ui.draggable.parent().parent().attr('id');
                // alert(current_parent_content_id);
                var child_id = ui.draggable.attr('id');
                var parent_id = event.target.id;
                 console.log("1"+current_parent_content_id+": "+child_id +": "+parent_id);
                  var child=1;
                 $(".child").val(child);

                 var subchild=$('.subchild').val();

                  if (subchild==null || subchild==undefined || subchild=="") {
                $.ajax({
                  type: 'post',
                  url: '{{$base_url}}/admin/category/drag-drop',  
                  data: {"_token": "{{ csrf_token() }}",'child_category_id':child_id,'new_parent_category_id':parent_id,'old_parent_category_id':current_parent_content_id},
                  success: function (result){
                    location.reload();
                  },
                  error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                });
              }
                // Move the dragged element into its new container
                // ui.draggable.attr('style','position:relative');
                // $(this).append(ui.draggable);
                // return false;
             
            }            
        });


        $( ".parent_content" ).draggable();
        $(".parent_content").droppable({
            activeClass: "ui-state-hover",
            hoverClass: "ui-state-active",
            drop: function( event, ui ) {
              
                // alert(ui.draggable.attr('id') + ' was dropped from ' + ui.draggable.parent().attr('id'));
                // $( this ).addClass( "ui-state-highlight" );

              
               var current_parent_content_id = ui.draggable.parent().parent().attr('id');
                var child_id = ui.draggable.attr('id');
                var parent_id = event.target.id;
                

                 // alert(current_parent_content_id);

                  var parent=3;
                  var child=$('.child').val();
                  var subchild=$('.subchild').val();
                 $(".parent").val(parent);

               if (child==null || child==undefined || child=="") {
                if (subchild==null || subchild==undefined || subchild=="") {
                  console.log("3"+current_parent_content_id+": "+child_id +": "+parent_id);
                $.ajax({
                  type: 'post',
                  url: '{{$base_url}}/admin/category/drag-drop',  
                  data: {"_token": "{{ csrf_token() }}",'child_category_id':child_id,'new_parent_category_id':parent_id,'old_parent_category_id':current_parent_content_id},
                  success: function (result){
                    location.reload();
                  },
                  error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                });
                // Move the dragged element into its new container
                // ui.draggable.attr('style','position:relative');
                // $(this).append(ui.draggable);
                // return false;
              }
              }
                
            }  
                    
        });
  });
</script>



<!-- All Category Page End -->


<script type="text/javascript">
  //Remove Category from Database start----------------------
          $('.category_inactive').on('click',function(){
            category_id = $(this).attr('category_id');
                 
                  $.ajax({
                  type: 'post',
                  url: 'category/delete',
                  data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
                  success: function (result) {
                    if(result!=""){
                      if(result==0){
                        location.reload();
                      }else{
                        alert('Category Not Deleted');
                      }
                    }
                  },
                  error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                });
          });
          //Remove Category from Database End----------------------------

          //Edit Category Start -----------------------------------------
            $('.category_edit').on('click',function(){
              category_id = $(this).attr('category_id');
              
            //   url = "{{$base_url}}/admin/category/"+category_id;
              window.location.href = "{{$base_url}}/admin/category/"+category_id;
            //   window.open(url,'_blank');
            });
          //Edit Category Start -----------------------------------------

          //edit child category id Start-----------
                        $('.child_category_edit').on('click',function(){
                            var category_id = $(this).attr('category_id');
                            

                            window.location.href = "{{$base_url}}/admin/category/"+category_id;
                            // url = "{{$base_url}}/admin/category/"+category_id;
                            // window.open(url);
                        });
                        //edit child category id End----------

                        //Remove child Category id Start----
                          $('.child_category_inactive').on('click',function(){
                            var category_id = $(this).attr('category_id');
                                
                                  $.ajax({
                                  type: 'post',
                                  url: 'category/delete',
                                  data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
                                  success: function (result) {
                                    if(result!=""){
                                      if(result.status_id==0){
                                        alert('Category Deleted Successfully');
                                      }else{
                                        alert('Category Not Deleted');
                                      }
                                    }
                                  },
                                  error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                                });
                          });
                        //Remove child Category id End----


                        //sub child categories start-----------------
                                $('.sub_child_category_edit').on('click',function(){
                                  
                                    var category_id = $(this).attr('category_id');
                                   

                                    window.location.href = "{{$base_url}}/admin/category/"+category_id;
                                    // url = "{{$base_url}}/admin/category/"+category_id;
                                    // window.open(url);
                                });
                              //sub child Categories end--------------------


                              $('.sub_child_category_inactive').on('click',function(){
                                    var category_id = $(this).attr('category_id');
                                    
                                    $.ajax({
                                    type: 'post',
                                    url: 'category/delete',
                                    data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
                                    success: function (result) {
                                      if(result!=""){
                                        if(result==0){
                                          location.reload();
                                           
                                        }else{
                                          alert('Category Not Deleted');
                                        }

                                      }
                                    },
                                    error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                                  });
                              });
</script>

@endsection