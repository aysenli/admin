@extends('admin.layouts.layout1')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @if ($errors->all())
            <div class="callout callout-danger">
                <h4>
                @foreach($errors->all() as $error)
                {{ $error }}
                @endforeach
                </h4>
            </div>
            @endif
            <div class="box">
                <form action="{{isset($show['role']->id)?'/admin/role/update/'.$show['role']->id:'/admin/role/create/'}}" method="post">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">角色名：</span></label>
                            <input name='display_name' type="text" class="form-control" placeholder="角色名" 
                            value='{{isset($show['role']->display_name)?$show['role']->display_name:''}}'/>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">简介：</span></label>
                            <input name='description' type="text" class="form-control" placeholder="简介" value='{{isset($show['role']->description)?$show['role']->description:''}}'/>
                        </div>
                        <div class="form-group col-xs-12 col-md-12" style="margin-bottom:0px">
                          <label><span style="width:155px;display:block;">权限列表：</span></label>
                        </div>
                        <div class="form-group col-xs-12 col-md-12" style="display:block;overflow:hidden;">
                        @if (isset($show['permissions']))
                        @foreach($show['permissions'] as $permission)
                            <label class="col-md-2">
                              <input type="checkbox" class="minimal" name="permission_id[]" value="{{ $permission->id }}" {{isset($show['selected_permissions'][$permission->id])?"checked":''}} /> {{ $permission->description }}
                            </label>
                        @endforeach
                        @endif
                        </div>
                        
                        
                    </div>
                    <div class="box-footer text-left">
                        <input name='id' type="hidden"  value='{{isset($show['role']->id)?$show['role']->id:''}}'/>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
  
@endsection