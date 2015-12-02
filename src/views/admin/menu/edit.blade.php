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
                <form action="/admin/menu/create/" method="post">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">父类ID：</span></label>
                            <select class="form-control" name="display_name">
                            @foreach($show['permission_list'] as $permission)
                                @if (!empty($show['permission']))
                            <option value="{{$permission['id']}}" {{($permission['id'] == $show['permission']->display_name)?'selected':''}}>{{$permission['description']}}</option>
                                @else
                            <option value="{{$permission['id']}}" 'selected'>{{$permission['description']}}</option>
                                @endif
                            @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">权限名称：</span></label>
                            <input name='description' type="text" class="form-control" placeholder="权限名称" 
                            value='{{isset($show['permission']->description)?$show['permission']->description:''}}'/>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">权限地址：</span></label>
                            <input name='name' type="text" class="form-control" placeholder="权限地址" value='{{isset($show['permission']->name)?$show['permission']->name:''}}'/>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label><span style="width:155px;display:block;">正则地址：</span></label>
                            <input name='power' type="text" class="form-control" placeholder="权限地址" value='{{isset($show['permission']->power)?$show['permission']->power:''}}'/>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="isDisplay" value="1" {{(isset($show['permission']) && $show['permission']->isDisplay == 1)?"checked":''}}> 是否显示
                                  </label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="box-footer text-left">
                        <input name='id' type="hidden"  value='{{isset($show['permission']->id)?$show['permission']->id:''}}'/>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
  
@endsection