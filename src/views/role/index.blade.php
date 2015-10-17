@extends('admin.layouts.layout1')

@section('content')



<div class="row"> 
<div class="col-lg-12 col-lg-12"> 

  @if ($errors->all())
  <div class="callout callout-success">
      <h4>
      @foreach($errors->all() as $error)
      {{ $error }}
      @endforeach
      </h4>
  </div>
  @endif
<!-- general form elements --> 
<!-- form start --> 
<form role="form" class="form-inline" method="get"> 
 <div class="box box-primary"> 
  <!-- /.box-header --> 
  <div class="box-body"> 
   <!-- text input --> 
   <div class="form-group col-xs-4"> 
        <label><span style="display:block;">角色名称：</span></label> 
        <input name="name" type="text" class="form-control" placeholder="模糊搜索角色名称" value="{{\Input::get('name')}}"  />
        <button type="submit" class="btn btn-success">查询</button>   
   </div> 
  </div> 
  <div class="box-footer"> 
    <a href="/admin/role/add" class="btn btn-primary">新增</a>
  </div>
  <!-- /.box-header --> 
 </div>
 <!-- /.box --> 
</form> 
</div> 
</div>

<div class="row"> 
<div class="col-xs-12"> 
<div class="box"> 
 <div class="box-header"> 
 </div>
 <!-- /.box-header --> 
 <div class="box-body table-responsive ">
  
  <table class="table table-bordered"> 
   <tbody>
    <tr> 
     <th>#</th> 
     <th>角色名称</th> 
     <th>简介</th> 
     <th>创建时间</th> 
     <th>更新时间</th> 
     <th>操作</th> 
    </tr> 

    @foreach ($show['roles'] as $role)
    <tr> 
        <td>{{ $role->id }}</td> 
        <td>{{ $role->display_name }}</td> 
        <td>{{ $role->description }}</td> 
        <td>{{ $role->created_at }}</td> 
        <td>{{ $role->updated_at }}</td> 
        <td> 
            <a type="button" class="btn btn-default" href="/admin/role/edit/{{ $role->id}}">修改</a> 
            <a type="button" class="btn btn-default" href="/admin/role/destroy/{{ $role->id}}">删除</a> 
        </td> 
    </tr> 
    @endforeach
   
   </tbody>
  </table> 
 </div>
 <!-- /.box-body --> 
 <div class="box-footer text-center"> 
 </div>
 <!-- /.box-header --> 
</div>
<!-- /.box --> 
</div> 
</div>
     
@endsection