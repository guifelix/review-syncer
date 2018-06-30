$.extend( true, $.fn.dataTable.defaults, {
    processing: true,
    serverSide: true,
    ajax: $.fn.dataTable.pipeline( {
        url: "{!! $slot !!}",
        pages: 3,
        method: 'post',
        data: function ( d ) {
            return $.extend( {}, d, {
                "_token": '{!! csrf_token() !!}'
            } );
        }
    } ),
    dom:
        "<'row'<'col-sm-6'l><'col-sm-6'>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
    order: [[ 0, "desc" ]]
} );