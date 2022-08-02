@extends('layouts.admin')
@section('content')

<style type="text/css">
 .descrtion-para{
    overflow: scroll;
    overflow-y: hidden;
    overflow-x: auto;
    flex-wrap: unset !important;
    max-width: 900px;
    height: 50px;
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
          <li class="breadcrumb-item">
            <a>Our Guarantee</a>
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
                <h5>Our Guarantee</h5>
                <span class="upper-buttons pull-right">

                  <a href="add-guarantee" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right"> Add Guarantee
                    </button>
                  </a>
              

                </span>
                <span class="text-muted">You can view all Our Guarantee, add and modify Guarantee details using selected part of your online business.</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Guarantee title</th>
                        <th>Guarantee descriprtion</th>
                        <th>image</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>

                        <th>Guarantee title</th>
                        <th>Guarantee descriprtion</th>
                        <th>image</th>
                        <th>Status</th>
                        <th>Action</th>

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

  $(document).ready(function() {
    $('#footer-search').DataTable($.extend({     
      "ajax":{
        url: "all-guaranteedata",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 0, "asc" ]],                                
      "columns": [{
        "data": "title"
      },

        { "targets":-1,
          "mData":"descriprtion",
          "bSortable": false,
          "ilter":false,
          "mRender": function(data, type, row){
             var myContent = '<div>'+row.descriprtion+'</div>';

             var descriprtion =$(myContent).text();

             return '<p class="descrtion-para">'+descriprtion+'</p>';
          }
        },


      {
        "mData": "image",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<div class="product-div" style="height:50px;width:50px"><center><img class="img-fluid" id="image" src="/storage/app/'+row.image+'" style="max-height:50px;max-width:45px;" onerror=this.src="/files/assets/images/product.png"; ></center></div>';
        }
       },


      {
        "mData": "status.status_name",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';  
        }
      },

    {
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { 
        var button="";
        return '<a href="'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>'+button;
      }
    },
    ]
  }, dataTableDesign) );
  } );
</script>

@endsection
