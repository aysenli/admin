<div class="row"> 
  <div class="col-lg-12 col-lg-12"> 
  @include('admin.layouts.table_tips')
  <!-- general form elements --> 
  <form role="form" class="form-inline" method="get"> 
   <div class="box "> 
    <!-- /.box-header --> 
    <div class="box-body"> 
       <!-- text input --> 
       <div class="form-group col-xs-12"> 
            @foreach($show['search'] as $term)
            <div class="col-xs-4 box-body">
                <label><span style="display:block;">{{$term[0]}}：</span></label>
                <input name="{{$term[1]}}" type="text" class="form-control" placeholder="{{$term[0]}}"  value="{{\Input::get($term[1])}}"/>
            </div>
            @endforeach
       </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">查询</button>   
        <button type="reset" class="btn btn-primary">重置</button>   
    </div>
    <!-- /.box-header --> 
   </div>
   <!-- /.box --> 
  </form> 
  </div> 
</div>

