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
                <form action="/admin/user/store/" method="post">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">用户名：</span></label>
                            <input name='name' type="text" class="form-control" placeholder="用户名" 
                            {{ isset($show['user']->name)?"disabled":'' }} value='{{isset($show['user']->name)?$show['user']->name:''}}'/>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">邮箱：</span></label>
                            <input name='email' type="text" class="form-control" placeholder="邮箱" {{isset($show['user']-> email)?"disabled":''}} value='{{isset($show['user']->email)?$show['user']->email:''}}'/>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">密码：</span></label>
                            <input name='password' type="password" class="form-control" placeholder="为空则不修改" value=''/>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">密码确认：</span></label>
                            <input name='confirmation_password' type="password" class="form-control" placeholder="两次密码必须一致" value=''/>
                        </div>
                        <div class="form-group col-xs-12 col-md-12" style="margin-bottom:0px">
                          <label><span style="width:155px;display:block;">所属角色：</span></label>
                        </div>
                        <div class="form-group has-warning col-xs-12 col-md-12" style="display:block;overflow:hidden;">
                        @foreach($show['role'] as $role)
                            <label class="col-md-2">
                              <input type="checkbox" class="minimal" name="role_id[]" value="{{ $role->id }}" {{isset($show['role_user'][$role->id])?"checked":''}} /> {{ $role->display_name }}
                            </label>
                        @endforeach
                        </div>
                    </div>
                    <div class="box-footer text-left">
                        <input name='id' type="hidden"  value='{{isset($show['user']->id)?$show['user']->id:''}}'/>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
  
@endsection