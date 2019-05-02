function all_match_case(id) {
    if (id == 'country_search' || id == 'city_search') {
        return true;
    }
    return false;
}

function cust_filtering(table,json_array) {
    console.log('json_array : ' + JSON.stringify(json_array));
    var input, input_type, filter, tr, td, i;
    var table = jQuery_1_9_1('#'+table).DataTable();
    jQuery_1_9_1.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var is_display = true;
        json_array.some(object => {
            var id = object.id;
            // console.log('id : ' + id);
            var index = object.index;
            var index_2 = isEmpty(object.index_2) ? null : object.index_2;
            var all_match = all_match_case(id);
            input = document.getElementById(id);
            if (isEmpty(input)) {
                return
            } else {
                filter = input.value.toUpperCase();
                if (filter == '' || filter == 'ALL' || filter == 'ALL_ALL') return;
            }
            var inner_value_1 = data[index];
            is_display = filter_checking(all_match, id, inner_value_1, filter)
            if (!is_display && !isEmpty(index_2)) {
                var inner_value_2 = data[index_2];
                is_display = filter_checking(all_match, id, inner_value_2, filter)
            }
            if (!is_display)return true;
            
        })
        return is_display;

    })
    table.draw();
    jQuery_1_9_1.fn.dataTable.ext.search.pop();
}

function filter_checking(all_match, id, inner_value, filter) {
    inner_value = isEmpty(inner_value) ? '' : inner_value.toUpperCase();
    filter = isEmpty(filter) ? '' : filter.toUpperCase();
    var is_display = true;
    switch (all_match) {
        case true:
            if (inner_value == filter) {
            } else {
                is_display = false;
            }
            break;

        case false:
            if (id == 'year_search' || id == 'year_search_2') {
                var year = inner_value.slice(0, 4);
                if (year != filter) {
                    is_display = false;
                }
            } else if (id == 'month_search' || id == 'month_search_2') {
                var month = inner_value.slice(5, 7);
                if (month != filter) {
                    is_display = false;
                }
            } else if ( inner_value.indexOf(filter) < 0) {
                    is_display = false;
            }
            if(id == "city_search"){
                console.log('inner_value : ' + inner_value);
                console.log('filter : ' + filter);
                console.log('indexOf filter : ' +inner_value.indexOf(filter));
                console.log('is_display : ' +  is_display);
            }
            break;
    }
    return is_display;

}