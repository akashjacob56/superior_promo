  'use strict';
  $(document).ready(function() {

    

// Setup - add a text input to each footer cell
$('#advanced-table tfoot th').each( function () {
  var title = $(this).text();
  if(title=="Disabled"){
    $(this).html( '<div class="md-input-wrapper md-disable"><input type="text" class="md-form-control" placeholder="Search '+title+'" disabled="disabled"/></div>' );
  }else{
    $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>' );
  }
} );

$('#advanced-table1 tfoot th').each( function () {
  var title = $(this).text();
  if(title=="Disabled"){
    $(this).html( '<div class="md-input-wrapper md-disable"><input type="text" class="md-form-control" placeholder="Search '+title+'" disabled="disabled"/></div>' );
  }else{
    $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>' );
  }
} );
      // Apply the search
      if(advance!=undefined){
        advance.columns().every( function () {
          var that = this;
          $( 'input', this.footer() ).on( 'keyup change', function (e) {
            var key = e.which;
            if(key == 13) 
              if ( that.search() !== this.value && key==13) {
                that
                .search( this.value )
                .draw();
              }
            } );
        } );
      }
      
      if(advance1!=undefined){
        advance1.columns().every( function () {
          var that = this;
          $( 'input', this.footer() ).on( 'keyup change', function (e) {
            var key = e.which;
            if(key == 13) 
              if ( that.search() !== this.value && key==13) {
                that
                .search( this.value )
                .draw();
              }
            } );
        } );
      }

    $.fn.dataTableExt.sErrMode = 'none';

  } );
