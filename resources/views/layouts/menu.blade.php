<style type="text/css">
  .pcoded .pcoded-navbar .pcoded-item {
    line-height: 1.1 !important;
  }
</style>
<!-- [ navigation menu ] start -->



<nav class="pcoded-navbar no-print">
 
 <div class="main-menu-header">
  <center>
    <a href="{{$base_url}}">
      <img class="logo-image" style="height: 60px !important;margin-top: 10px !important;" src="{{$base_url}}/" alt="">
    </a>
  </center>
  <div class="user-details">
    <hr>
  </div>
</div>


<div class="pcoded-inner-navbar main-menu">


  <ul class="pcoded-item pcoded-left-item">



    @if(count($menu_categories)>0)
    @foreach($menu_categories as $category)

    @php
    $category_translation=$category->category_translation;

    if($category_translation==""){
    $category_translation=$category->default_category_translation;    
  }


  @endphp

  @if(count($category->child_categories)>0)
  <li class="pcoded-hasmenu">
    <a href="javascript:void(0)" class="waves-effect waves-dark">
      <span class="pcoded-micon">
        <i class="fa fa-circle-thin"></i>
      </span>
      <span class="pcoded-mtext parent-link" id="{{$base_url}}/collection/{{$category_translation->category->category_url}}/{{$language_code}}">
        {{$category_translation->category_name}}</span>
      </a>

      <ul class="pcoded-submenu">
       @foreach($category->child_categories as $child_category)

       @php
       $child_category_translation=$child_category->category->category_translation;

       if($child_category_translation==""){
       $child_category_translation=$child_category->category->default_category_translation;    
     }
     @endphp

     @if(count($child_category->sub_child_categories)>0)
     <li class="pcoded-hasmenu ">
      <a href="javascript:void(0)" class="waves-effect waves-dark">
        <span class="pcoded-mtext parent-link" id="{{$base_url}}/collection/{{$child_category_translation->category->category_url}}/{{$language_code}}">{{$child_category_translation->category_name}}</span>
      </a>

      <ul class="pcoded-submenu">
        @foreach($child_category->sub_child_categories as $sub_child_category)



        @php
        $sub_child_category_translation=$sub_child_category->category->category_translation;

        if($sub_child_category_translation==""){
        $sub_child_category_translation=$sub_child_category->category->default_category_translation;    
      }
      @endphp


      <li class="">
        <a href="{{$base_url}}/collection/{{$sub_child_category->category->category_url}}/{{$language_code}}" class="waves-effect waves-dark">
          <span class="pcoded-mtext">{{$sub_child_category_translation->category_name}}</span>
        </a>
      </li>
      @endforeach
    </ul>

  </li>
  @else

  <li class="">
    <a href="{{$base_url}}/collection/{{$child_category->category->category_url}}/{{$language_code}}" class="waves-effect waves-dark">
      <span class="pcoded-mtext">{{$child_category_translation->category_name}}</span>
    </a>
  </li>
  @endif
  @endforeach
</ul>

</li>
@else
<li class="">
  <a href="{{$base_url}}/collection/{{$category->category_url}}/{{$language_code}}" class="waves-effect waves-dark">
    <span class="pcoded-micon">
      <i class="icon-book-open"></i>
    </span>
    <span class="pcoded-mtext">{{$category_translation->category_name}}</span>
  </a>
</li>
@endif

@endforeach
<li class="">
  <a href="{{$base_url}}/collection/{{$language_code}}" class="waves-effect waves-dark">
    <span class="pcoded-micon">
      <i class="fa fa-ellipsis-h"></i>
    </span>
    <span class="pcoded-mtext">@lang("navigation.more")</span>
  </a>
</li>  
@endif



<li class="">
  <a href="{{$base_url}}/about" class="waves-effect waves-dark">
    <span class="pcoded-micon">
      <i class="icon-people"></i>
    </span>
    <span class="pcoded-mtext">@lang("navigation.about_us")</span>
  </a>
</li>

<li class="">
  <a href="{{$base_url}}/contact" class="waves-effect waves-dark">
    <span class="pcoded-micon">
      <i class="icon-phone"></i>
    </span>
    <span class="pcoded-mtext">@lang("navigation.contact_us")</span>
  </a>
</li>


<li class="">
  <a href="{{$base_url}}/faq" class="waves-effect waves-dark">
    <span class="pcoded-micon">
      <i class="fa fa-question-circle"></i>
    </span>
    <span class="pcoded-mtext">@lang("navigation.faq")</span>
  </a>
</li>



</ul>

</div>
</nav>
<script type="text/javascript">
  $(".parent-link").click(function(){
    window.location.href = this.id;
  });
</script>