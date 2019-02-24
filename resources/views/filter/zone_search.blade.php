<div class="select">
    {{ trans('labels.zone') }} 
    <select id="zone_search" name="zone_search">
        <option value="ALL">ALL</option> 
        @foreach ($result['zone_search'] as $key=>$row)
            <option value="{{$row->id}}">{{$row->name}}</option> 
        @endforeach     
    </select>
</div>
        