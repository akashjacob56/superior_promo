dataTableDesign={
 "responsive": true,
 "oLanguage": {
  "sEmptyTable":     "No Records Found",
  "sInfo":           "Showing _START_ to _END_ of _TOTAL_ entries",
  "sInfoEmpty":      "Showing 0 to 0 of 0 entries",
  "sInfoFiltered":   "(filtered from _MAX_ total entries)",
  "sInfoPostFix":    "",
  "sInfoThousands":  ",",
  "sLengthMenu":     "Show _MENU_ entries",
  "sLoadingRecords": "Loading...",
  /*"sProcessing":     "Processing please wait...",*/
  "sProcessing":     "",
  "sSearch":         "",
  "sZeroRecords":    "No Records Found",
  "sSearchPlaceholder":"Search here...",
  "oPaginate": {
    "sFirst":    "First",
    "sLast":     "Last",
    "sNext":     "Next",
    "sPrevious": "Previous"
  }
},
"autoWidth": false,
"pageLength": 10,
"lengthMenu": [
[10, 25, 50, -1],
[10, 25, 50, "All"]
],        
"stateSave": true,
"processing": true,
"serverSide": true,
/*"dom": 'Bfrtip',
"buttons": [
'copy', 'csv', 'excel', 'pdf', 'print'
],*/
"initComplete": function(settings, json) {
 $('.dataTables_filter input').unbind();

    // Setup - add a text input to each footer cell
    $('#footer-search tfoot th').each(function() {
      var title = $(this).text();
      search=true;

      if (title=="Disabled") {
        search=false;
      }

      old_title=$(this).find("input").attr('placeholder'); 

      if (old_title=="Search Disabled") {
        search=false;
      }

      if(search==true){
        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
      }else{
        $(this).html('<input type="text" class="form-control" placeholder="Search Disabled" disabled="disabled"/>');
      }

    });


    // DataTable
    var table = $('#footer-search').DataTable();

    // Apply the search
    table.columns().every(function() {
      var that = this;

      $('input', this.footer()).on('keyup change', function(e) {
        if (that.search() !== this.value) {
          if(e.keyCode == 13 || this.value=="") {
            that.search(this.value).draw();
          }
        }
      });
    });


    /*bind filter on enter key table1*/
    $('.dataTables_filter input').bind('keyup', function(e) {
     if(e.keyCode == 13 || this.value=="") {
      var table = $('#footer-search').DataTable();
      table.search(this.value).draw();
    }
  }); 

     $('#footer-search1 tfoot th').each(function() {
      var title = $(this).text();
      search=true;

      if (title=="Disabled") {
        search=false;
      }

      old_title=$(this).find("input").attr('placeholder'); 

      if (old_title=="Search Disabled") {
        search=false;
      }

      if(search==true){
        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
      }else{
        $(this).html('<input type="text" class="form-control" placeholder="Search Disabled" disabled="disabled"/>');
      }

    });


       var table = $('#footer-search1').DataTable();

    // Apply the search
    table.columns().every(function() {
      var that = this;

      $('input', this.footer()).on('keyup change', function(e) {
        if (that.search() !== this.value) {
          if(e.keyCode == 13 || this.value=="") {
            that.search(this.value).draw();
          }
        }
      });
    });

        /*bind filter on enter key table1*/
    $('.dataTables_filter input').bind('keyup', function(e) {
     if(e.keyCode == 13 || this.value=="") {
      var table = $('#footer-search1').DataTable();
      table.search(this.value).draw();
    }
  }); 


  }
};
