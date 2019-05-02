             
<div class="select">
    {{ trans('labels.city') }} 
    <select id="city_search" name="city_search">
        <option value="ALL">ALL</option> 
        @foreach ($result['city_search'] as $key=>$row)
            <option value="{{$row->id}}">{{$row->name}}</option> 
        @endforeach
    </select>
</div>
