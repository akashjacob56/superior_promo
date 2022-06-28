 <script type="text/javascript">
  $(".language_item").click(function(){
    language_id=$(this).attr("class")[0];
    
    $.ajax({
      type: 'post',
      url: "{{$base_url}}/changeLanguage",
      data: {"_token": "{{ csrf_token() }}",'language_id':language_id},
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      success: function (result) {
        if(result!=0){
         var language_id=result.language_id;

          console.log(result);
          window.location.reload()+ "/"+ result.language_id;
        }
      },
      error: function (xhr, textStatus, errorThrown) { 
      }
    });
  });

  $("#search-span").click(function(event){
    var search_width=$('.main-search .form-control').width();
    if(search_width>0){
      $("#search-form").submit();
    }
  });
  $(".search-close").click(function(event){
   $('#keyword').val("");   
 });

</script>


<script type="text/javascript">
  $(document).ajaxStart(function () {
    $(".se-pre-con").fadeIn("slow");;
  }).ajaxStop(function () {
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
<style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  display: none;
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: none center no-repeat rgba(255,255,255,0.5);
}


.loader {
  margin-top: 18%;
  border: 6px solid #ccc;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<!-- <div class="se-pre-con">
  <div class="loader">
  </div>
</div>
 -->

<script type="text/javascript" src="{{asset('dist/summernote.min.js')}}" > </script>

<script type="text/javascript" src="{{asset('files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>

<script type="text/javascript" src="{{asset('files/bower_components/popper.js/js/popper.min.js')}}"></script>

<script type="text/javascript" src="{{asset('files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- waves js -->
<script src="{{asset('files/assets/pages/waves/js/waves.min.js')}}"></script>
<!-- jquery slimscroll js -->

<script type="text/javascript" src="{{asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<!-- Float Chart js -->
<!-- <script src="{{asset('files/assets/pages/chart/float/jquery.flot.js')}}"></script>
<script src="{{asset('files/assets/pages/chart/float/jquery.flot.categories.js')}}"></script>
<script src="{{asset('files/assets/pages/chart/float/curvedLines.js')}}"></script>
<script src="{{asset('files/assets/pages/chart/float/jquery.flot.tooltip.min.js')}}"></script>
-->

<script src="{{asset('files/assets/js/pcoded.js')}}"></script>
<script src="{{asset('files/assets/js/vertical/vertical-layout.js')}}"></script>


<script type="text/javascript" src="{{asset('files/assets/js/script.js')}}"></script>


<!-- data-table js -->
<script src="{{asset('files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<!-- <script src="{{asset('files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('files/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script> -->
<script src="{{asset('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>



<!-- Custom js -->
<script src="{{asset('files/assets/js/select-box.js')}}"></script>

