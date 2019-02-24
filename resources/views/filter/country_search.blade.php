             
<div class="select">
    {{ trans('labels.country') }} 
    <select id="country_search" name="country_search">
        <option value="ALL">ALL</option> 
        @foreach ($result['country_search'] as $key=>$row)
            <option value="{{$row->id}}">{{$row->name}}</option> 
        @endforeach     
    </select>
</div>
