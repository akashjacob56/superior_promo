@extends('layouts.admin')
@section('content')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
<!-- Treeview css -->
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
            <a href="">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item">
            <a>Categories
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
                <h5> Categories</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('CATEGORY_ADD'))
                  <a href="/admin/category/add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Category
                    </button>
                  </a>
                  @endif
                </span>
                <span class="text-muted">You can view all Categories of product,  Category are the primary way to combine products with similar characteristic.</span>

              </div>
              
              <!-- <div class="row">
                <div class="col-sm-8">
                    <div class="card-block">
                      <div class="dt-responsive table-responsive mobile-responsive">
                            <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                              <label class="">jsdljf</label>
                          </div>
                      </div>
                    </div>
                </div>
               </div>
              
             -->
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
$child_category_translation = $child_category->category->default_category_translation;    
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


<li class="subchild_content" id="{{$sub_child_category->category->category_id}}" style="flex: 0 0 96%;margin-left: 4%;">


  <a class="" href="#">{{$sub_child_category_translation->category_name}}</a> &nbsp;<i class="fa fa-pencil sub_child_category_edit_{{$sub_child_category->category->category_id}} sub_child_category_edit" category_id="{{$sub_child_category->category->category_id}}"></i>&nbsp;<i class="fa fa-trash sub_child_category_inactive_{{$sub_child_category->category->category_id}} sub_child_category_inactive" category_id="{{$sub_child_category->category->category_id}}"></i>

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
</div>
</div>
</div>
</div>
<script src="https://get.foundation/building-blocks/assets/js/app.js?rev=@@hash"></script>

<!-- <script type="text/javascript">




function allowDrop(event) {
  event.preventDefault();
}

function drop(event) {
  event.preventDefault();
  var data = event.dataTransfer.getData("Text");
  event.target.appendChild(document.getElementById(data));
  console.log(data);
}
</script> -->


<script type="text/javascript">
  $(document).ready(function(){
 var menu_categories=<?php echo json_encode($menu_categories);?>;

    $.each(menu_categories,function(index,item){         
       
          // //Remove Category from Database start----------------------
          // $('.category_inactive_'+item.category_id).on('click',function(){
          //   category_id = item.category_id;
          //         $.ajax({
          //         type: 'post',
          //         url: 'category/delete',
          //         data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
          //         success: function (result) {
          //           if(result!=""){
          //             if(result==0){
          //               location.reload();
          //             }else{
          //               alert('Category Not Deleted');
          //             }
          //           }
          //         },
          //         error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
          //       });
          // });
          // //Remove Category from Database End----------------------------
          

          // //Edit Category Start -----------------------------------------
          //   $('.category_edit_'+item.category_id).on('click',function(){
          //     category_id = item.category_id;
          //   //   url = "/admin/category/"+category_id;
          //     window.location.href = "/admin/category/"+category_id;
          //   //   window.open(url,'_blank');
          //   });
          // //Edit Category Start -----------------------------------------
         

          ////////////////////Child Categories Start----------------------
              var child_categories = item.child_categories;

              $.each(child_categories,function(index,item){
                        // //edit child category id Start-----------
                        // $('.child_category_edit_'+item.child_category_id).on('click',function(){
                        //     var category_id = item.child_category_id;
                        //     url = "/admin/category/"+category_id;
                        //     window.open(url);
                        // });
                        // //edit child category id End----------

                        // //Remove child Category id Start----
                        //   $('.child_category_inactive_'+item.child_category_id).on('click',function(){
                        //     var category_id = item.child_category_id;
                        //           $.ajax({
                        //           type: 'post',
                        //           url: 'category/delete',
                        //           data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
                        //           success: function (result) {
                        //             if(result!=""){
                        //               if(result.status_id==0){
                        //                 alert('Category Deleted Successfully');
                        //               }else{
                        //                 alert('Category Not Deleted');
                        //               }
                        //             }
                        //           },
                        //           error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                        //         });
                        //   });
                        // //Remove child Category id End----
                        
                        // console.log(item.sub_child_categories);
                        // console.log('fdf');

                      //Sub Child Start---------------
                        var sub_child_categories = item.sub_child_categories;

                        /*console.log(item.sub_child_categories);*/

                        $.each(sub_child_categories,function(index,item){
                            
                              // //sub child categories start-----------------
                              //   $('.sub_child_category_edit_'+item.category.category_id).on('click',function(){
                                  
                              //       var category_id = item.category.category_id;
                              //       url = "/admin/category/"+category_id;
                              //       window.open(url);
                              //   });
                              // //sub child Categories end--------------------
                              // $('.sub_child_category_inactive_'+item.category.category_id).on('click',function(){
                              //       var category_id = item.category.category_id;
                              //       $.ajax({
                              //       type: 'post',
                              //       url: 'category/delete',
                              //       data: {"_token": "{{ csrf_token() }}",'category_id':category_id},
                              //       success: function (result) {
                              //         if(result!=""){
                              //           if(result==0){
                              //             location.reload();
                                           
                              //           }else{
                              //             alert('Category Not Deleted');
                              //           }

                              //         }
                              //       },
                              //       error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                              //     });
                              // });
                        });
                    //Sub Child End---------------
              });
            ////////////////////Child Categories End------------------------
        });
  });
 

</script>

<script type="text/javascript">
  //Drop and Drag Category
// $(document).ready(function(){
//     var menu_categories=<?php echo json_encode($menu_categories);?>;

//     $.each(menu_categories,function(index,item){ 

//       // $(".child").draggable({
//       //   revert: true
//       // });


      

      
//     var child_categories = item.child_categories;

//     $.each(child_categories,function(index,item_child){
//       // //parent start
//       //   $(".parent_category_"+item_child.parent_category_id).droppable({

//       //     accept: '.child_category_'+item_child.child_category_id,
//       //     drop: function(event, ui){
//       //       $(this).append($(ui.draggable));
//       //     }  
//       //   });
//       //   //parent end

//         // //child start
//         // $(".child_category_"+item_child.child_category_id).draggable({
//         //   revert: true;
//         // });
//         // //child end
     
      
//         var sub_child_categories = item_child.sub_child_categories;
//         $.each(sub_child_categories,function(index,item_sub_child){

//           child_category_id = item_sub_child.parent_category_id;
//           sub_child_category_id =  item_sub_child.child_category_id;


//           // $(".child").draggable({
//           //   revert: true
//           // });

//           // $(".parent").droppable({
//           //     accept: '.child',
//           //     drop: function(event, ui) {
//           //       $(this).append($(ui.draggable));
//           //     }
//           // });



//         });

//     });



//     });
// });
</script>

<!-- <script type="text/javascript">
  $("document").ready(function() {
  $(".child_content").draggable({
    revert: true;
  });



  $(".parent_content").droppable({
    accept: '.child_content',
    drop: function(event,ui){
      $(this).append($(ui.draggable));
    }
  });
});


</script> -->

<script type="text/javascript">


  // $(".parent_content").on("drop", function(event, ui) {
  //      MyVar = $(this).attr('id');
  //      beh[MyVar] = ui.helper.attr('id');
  //      alert(MyVar + " " + beh[MyVar]);
  //  });



//   $(".parent_content").on("drop", function(event, ui) {  
//     MyVar = $(event.target).attr('id');   // here
//     alert(MyVar);
//     beh[MyVar] = ui.draggable.attr('id');
//     alert(beh[MyVar] + " " + MyVar);
// });




// $(document).ready(function(){
//   var draggedItem 
//     $(".child_content").on("drag", function(event, ui) {
//      draggedItem = $(this).attr('id');
//      // alert(draggedItem);
//     });

//     $(".parent_content").on("drop", function(event, ui) {
//       alert(draggedItem) 
//     });

//   });


</script>



<script type="text/javascript">
//   $("document").ready(function() {
//   $(".child_content").draggable({
//     revert: true
//   });

//   $(".parent_content").droppable({
//     accept: '.child_content',
//     drop: function(event, ui) {
      
//       // $(this).append($(ui.draggable));
//       var id = $(this).attr('id');
//       alert(id);
//     }
//   });
// });
</script>

<script type="text/javascript">
  $(function(){
      

$(".subchild_content").draggable();

$( ".subchild_content" ).droppable({
    activeClass: "ui-state-hover",
    hoverClass: "ui-state-active",
    drop: function( event, ui ) {
      event.preventDefault();
       alert("hello");
      
        // alert(ui.draggable.attr('id') + ' was dropped from ' +  ui.draggable.parent().attr('id'));
        // $( this ).addClass( "ui-state-highlight" );

        var current_parent_content_id = ui.draggable.parent().parent().attr('id');
        var child_id = ui.draggable.attr('id');
        var parent_id = event.target.id;

        var subchild=2;
        var child=$('.child').val();

        alert(child);

        /*console.log("2"+current_parent_content_id+": "+child_id +": "+parent_id);*/

        $(".subchild").val(subchild);


          $.ajax({
          type: 'post',
          url: '/admin/category/drag-drop',
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
                  url: '/admin/category/drag-drop',
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
                  url: '/admin/category/drag-drop',
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
              
            //   url = "/admin/category/"+category_id;
              window.location.href = "/admin/category/"+category_id;
            //   window.open(url,'_blank');
            });
          //Edit Category Start -----------------------------------------

          //edit child category id Start-----------
                        $('.child_category_edit').on('click',function(){
                            var category_id = $(this).attr('category_id');
                            

                            window.location.href = "/admin/category/"+category_id;
                            // url = "/admin/category/"+category_id;
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
                                   

                                    window.location.href = "/admin/category/"+category_id;
                                    // url = "/admin/category/"+category_id;
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