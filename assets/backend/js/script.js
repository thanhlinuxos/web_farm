var REGIONAL = 'vi';
var BASE_URL = 'http://web_farm.local/'

function ajax_short_list(url, num)
{
    $.ajax({
        url: BASE_URL + url,
        method: "POST",
        data: {page: num},
        beforeSend: function(){
//            $('#short-list').hide();
//            $('#loading_short_list').show();
        },
        success: function(response) {
//            $('#loading_short_list').hide();
//            $('#short-list').show();
            $('#short-list').html(response);
        }

    });
}

function ajax_get_group_permission(group_name)
{
    $.ajax({
        url: BASE_URL + 'acp/auth/group_permission',
        method: "POST",
        data: {group_name: group_name},
        beforeSend: function(){},
        success: function(response) {
            $('#user_permission').html(response);
            $('input[type=checkbox][data-toggle^=toggle]').bootstrapToggle();
        }

    });
}