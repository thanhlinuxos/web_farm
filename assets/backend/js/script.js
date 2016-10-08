/*!
 * Copyright 2016 Thanh Nguyen.
 * Licensed under the MIT license
 */
if (typeof jQuery === 'undefined') {
  throw new Error('Requires jQuery')
}
function ajax_short_list(url, num)
{
    $.ajax({
        url: BASE_URL + url,
        method: "POST",
        data: {page: num},
        beforeSend: function(){
        //$('#short-list').hide();
        //$('#loading_short_list').show();
        },
        success: function(response) {
        //$('#loading_short_list').hide();
        //$('#short-list').show();
            $('#short-list').html(response);
        }

    });
};

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
};

function delete_confirm(title, msg, url)
{
    $('#myModalLabel').html(title);
    $('#myModalBody').html(msg);
    $('#myModal').modal('show');
    $('#btnModalOk').on('click', function (){
        window.location = BASE_URL + url;
        $('#myModal').modal('hide');
    });
};

function clean_cached()
{
    $('#myModalLabel').html('Clean cache');
    $('#myModalBody').html('Are You Sure?');
    $('#btnModalOk').show();
    $('#myModal').modal('show');
    $('#btnModalOk').on('click', function (){
        $.ajax({
            url: BASE_URL + 'acp/dashboard/clean_cached',
            method: "GET",
            success: function(response, textStatus) {
                var data = JSON.parse(response);
                $('#myModalLabel').html('Clean cache');
                $('#myModalBody').html(data.msg);
                $('#btnModalOk').hide();
                $('#myModal').modal('show');
            }
        });
    }); 
}

function get_land_li(branch_id) {
    $.ajax({
        url: BASE_URL + 'acp/land/li_list',
        method: 'POST',
        data: {'branch_id': branch_id},
        success: function(response) {
            $('#land_id').html(response);
            // Reset Duple Select
            if($('#duple_id').length && $('#duple_id').is( "select" )) {
                $('#duple_id').html("<option value=''>---</option>");
            }
            // Reset Row Select
            if($('#row_id').length && $('#row_id').is( "select" )) {
                $('#row_id').html("<option value=''>---</option>");
            }
        }
    });
}

function get_duple_li(land_id) {
    $.ajax({
        url: BASE_URL + 'acp/duple/li_list',
        method: 'POST',
        data: {'land_id': land_id},
        success: function(response) {
            $('#duple_id').html(response);
            // Reset Row Select
            if($('#row_id').length && $('#row_id').is( "select" )) {
                $('#row_id').html("<option value=''>---</option>");
            }
        }
    });
}

function get_row_li(duple_id) {
    $.ajax({
        url: BASE_URL + 'acp/row/li_list',
        method: 'POST',
        data: {'duple_id': duple_id},
        success: function(response) {
            $('#row_id').html(response);
        }
    });
}

    