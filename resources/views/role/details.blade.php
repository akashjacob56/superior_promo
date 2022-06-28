
@extends('layouts.admin')
@section('content')

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
          <li class="breadcrumb-item"><a href="all">Roles</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Role details
              
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
          <form id="personal-info-form" class="w-100" method="post" action="{{$role->role_id}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12 ">
              <div class="card">
                <div class="card-header no-border">
                  <h5><a>{{$role->role}}</a></h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('ROLE_UPDATE'))
                    <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <span class="text-muted">You view, add, update, and organize all of your.</span>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="usr">Role name *</label>
                    <input type="text" name="role" value="{{$role->role}}" class="form-control thresold-i" placeholder="Enter role"  maxlength="20">
                    @if ($errors->has('role'))
                    <span class="help-block">
                      <strong>{{ $errors->first('role') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <!-- NEW -->
          <!--   <div class="col-md-12">
              <div class="main-footer">
                <span class="lower-buttons">
                  @if($my_permissions->contains('ROLE_UPDATE'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  @endif
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>
                </span>
              </div>
            </div> -->
          </form>

          @if($my_permissions->contains('ROLE_UPDATE'))
          <div class="col-sm-12">
            <div class="card">
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Select</th>
                        <th>Permission name</th>                      
                        <th>Assigned permissions to role</th>           
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Disabled</th>
                        <th>Permission name</th>                      
                        <th>Disabled</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
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
  var permission_ids=<?php echo json_encode($permission_ids);?>;
  'use strict';
  $(document).ready(function() {
    advance = $('#footer-search').DataTable( $.extend( {        
      "ajax": {
        url: "{{$base_url}}/admin/permission/allData",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 1, "asc" ]],
      "columns": [{
        "mData": "permission_id",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          var permission_id=parseInt(row.permission_id);
          if($.inArray(permission_id, permission_ids)>-1){
           return '<div class="rkmd-checkbox checkbox-rotate checkbox-ripple"><div class="checkbox-fade fade-in-primary"><label class="input-checkbox checkbox-success"><input value="'+row.permission_id+'" checked class="checked" type="checkbox" id="checkbox-2" > <span class="cr"><i class="cr-icon fa fa-check"></i></span></label></div> </div>';


         }else{
          return '<div class="rkmd-checkbox checkbox-rotate checkbox-ripple"><div class="checkbox-fade fade-in-primary"><label class="input-checkbox checkbox-success"><input  value="'+row.permission_id+'" class="checked" type="checkbox" id="checkbox-2"><span class="cr"><i class="cr-icon fa fa-check"></i></span></label><div class="captions"></div></div> </div>';
        }
      }
    },{
      "data": "permission_name" 
    },{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        var role_permission=row.role_permission;
        var permission_id=row.permission_id;

        var table="<table class='datatable-inner table table-hover table-condensed table-bordered' id='table_"+row.permission_id+"'>";

        if(role_permission.length>0){
          var row="<thead><tr><th>Role</th><th>Action</th></tr></thead>"
          table=table+row;        
        }      
        $.each(role_permission,function(index,item){
          if(role_permission.permission_id==row.permission_id){
            $("#"+row.permission_id).find('input').prop('checked', true);
          }
          row="<tr><td>"+item.role.role+"</td><td><span id="+item.role_permission_id+" class='label label-danger' title='Delete'><i class='fa fa-trash'></i></span></td></tr>";
          table=table+row;

        });
        table=table+"</table>"
        return table;
      }
    },]
  }, dataTableDesign));
  });
</script>
<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>


<script type="text/javascript">
  var permissions=<?php echo json_encode($permissions); ?>;
  $(document).ready(function(){
    $.each(permissions,function(i,item){
      var select_text=item.permission_name;
      var select_value=item.permission_id;
      var o= new Option(select_text,select_value);
      $('#permission_id').append(o);
    });

  });

  var role_id={{$role->role_id}};

  $("#footer-search").on('click',"tr td table tr span", function(){
    var role_permission_id=this.id;

    $.ajax({
      type: 'post',
      url: 'removeRole',
      data: {'role_permission_id':role_permission_id},
      success: function (result) {

        var role_permissions=result['role_permissions'];
        var permission_id=result['permission_id'];
        showRolePermissions(permission_id,role_permissions);
      },
      error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
    });
  });
  $("#footer-search").on('click',"tr td .input-checkbox .checked", function(){
    var permission_id=this.value;
    var permission=0;
    if(this.checked){
      permission=1;
    }
    $.ajax({
      type: 'post',
      url: 'changePermissionRole',
      data: {'permission_id':permission_id,'role_id':role_id,"permission":permission},
      success: function (result) {

        var role_permissions=result['role_permissions'];
        var permission_id=result['permission_id'];
        showRolePermissions(permission_id,role_permissions);
      },
      error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
    });
  });

  function showRolePermissions(permission_id,role_permissions){
    var categoryClass ="";
    var table=$("#table_"+permission_id);
    $(table).find("tr").remove();
    $(table).find("thead").remove();
    var row="";
    if(role_permissions.length>0){
      var row="<thead><tr><th>Role</th><th>Action</th></tr></thead>";
      $(table).append(row);
    }
    $tbody="<tbody>";

    $.each(role_permissions,function(index,item){
      row="<tr><td>"+item.role.role+"</td><td><span id='"+item.role_permission_id+"' class='label label-danger' title='Delete'><i class='fa fa-trash'></i></span></td></tr>";
      $(table).append(row);
    });
  }

</script>   
@endif
@endsection








