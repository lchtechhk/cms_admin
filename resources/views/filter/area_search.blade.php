             
<div class="select">
    {{ trans('labels.area') }} 
    <select id="area_search" name="area_search">
        <option value="ALL">ALL</option> 
        @foreach ($result['area_search'] as $key=>$row)
            <option value="{{$row->id}}">{{$row->name}}</option> 
        @endforeach
    </select>
</div>
