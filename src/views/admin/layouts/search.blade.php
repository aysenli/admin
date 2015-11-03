<div class="row"> 
  <div class="col-lg-12 col-lg-12"> 
  @include('admin.layouts.table_tips')
  <!-- general form elements --> 
  <form role="form" class="form-inline" method="get" id="searchForm"> 
   <div class="box "> 
    <!-- /.box-header --> 
    <div class="box-body"> 
       <!-- text input --> 
       <div class="form-group col-xs-12"> 
            @foreach($show['search'] as $item)
            <div class="col-xs-4 box-body">
                <label><span style="display:block;">{{$item->title}}：</span></label>

                @if ($item->type == 'text')
                <input name="{{$item->name}}" type="text" class="form-control" style="width:65%" placeholder="{{$item->title}}"  value="{{\Input::get($item->name)}}"/>
                @endif

                @if ($item->type == 'select')
                <select class="form-control" name="{{$item->name}}">
                @foreach($item->value as $key=>$select)
                  <option value="{{$key}}" {{(Input::get($item->name) == $key)?'selected':''}}>{{$select}}</option>
                @endforeach
                </select>
                @endif
                
            </div>
            @endforeach
       </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">查询</button>   
        <button type="button" class="btn btn-primary" id="reset">重置</button>   
    </div>
    <!-- /.box-header --> 
   </div>
   <!-- /.box --> 
  </form> 
  </div> 
</div>
<script type="text/javascript">
$(function() {

    $("#reset").click(function(){
        $("input",'#searchForm').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked');
        $("select option",'#searchForm').removeAttr('selected');
    })
})
</script>