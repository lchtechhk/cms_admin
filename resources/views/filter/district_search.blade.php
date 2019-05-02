<div class="select">
    {{ trans('labels.district') }} 
    <select id="district_search" name="district_search">
        <option value="ALL">ALL</option> 
        @foreach ($result['district_search'] as $key=>$row)
            <option value="{{$row->id}}">{{$row->name}}</option> 
        @endforeach     
    </select>
</div>
    