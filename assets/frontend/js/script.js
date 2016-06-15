/*!
 * Copyright 2016 Thanh Nguyen.
 * Licensed under the MIT license
 */
if (typeof jQuery === 'undefined') {
  throw new Error('Requires jQuery')
}

var REGIONAL = 'vi';
var BASE_URL = 'http://web_farm.local/';

function delete_confirm(title, msg, url)
{
    $('#myModalLabel').html(title);
    $('#myModalBody').html(msg);
    $('#myModal').modal('show');
    $('#btnModalOk').on('click', function (){
        window.location = BASE_URL + url;
        $('#myModal').modal('hide');
        consol.log('dadada');
     });
};
