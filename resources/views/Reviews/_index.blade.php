<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title class="bold-font">Welcome to Bold Reviews!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/fonts.css') }}" />
        @stack('styles')
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md" class="bold-font">
                    See our reviews!!
                </div>
                @if(isset($reviewsData))
                <div class="links">
                    {{ Form::bsSelect('Product',null,products(),null,['placeholder' => 'Select one product','required'=>true, 'id'=>'product']) }}
                </div>

                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="tableReviews" width="100%" >
                        <thead class="active row">
                        <tr>
                            <th class="sorting_disabled" style="text-align: center;">id</th>
                            <th style="text-align: center;">Shopify domain</th>
                            <th style="text-align: center;">App Slug</th>
                            <th style="text-align: center;">Star Rating</th>
                            <th style="text-align: center;">Previus Star Rating</th>
                            <th style="text-align: center;">Update Date</th>
                            <th style="text-align: center;">Creation Date</th>
                        </tr>
                        </thead>

                    </table>
                </div>

                @endif
            </div>
        </div>

        @push('scripts')
            <script>

                $(function(){
                    @if(isset($reviewsData))
                        @component('components.datatable.defaults')
                            {!! route( 'jsonReviews' ) !!}
                        @endcomponent

                        var tableReviews = $('#tableReviews').DataTable({
                            columns: [
                                {
                                    data: 'id',
                                    class: 'text-center',
                                    visible:false
                                },
                                {
                                    data: 'shopify_domain',
                                    class: 'text-center'
                                },
                                {
                                    data: 'app_slug',
                                    class: 'text-center'
                                },
                                {
                                    data: 'star_rating',
                                    class: 'text-center'
                                },
                                {
                                    data: 'previous_star_rating',
                                    class: 'text-center'
                                },
                                {
                                    data: 'updated_at',
                                    class: 'text-center',
                                    render: function(data){
                                        return moment(data).format('DD/MM/YYYY HH:mm');
                                    }
                                },
                                {
                                    data: 'created_at',
                                    class: 'text-center',
                                    render: function(data){
                                        return moment(data).format('DD/MM/YYYY HH:mm');
                                    }
                                }
                            ],
                            dom:"flrtip",
                        });
                    @endif

                    $('#product').on('change',function(){
                        let prodId = $(this).val();

                        if (prodId == '' || prodId == 'Select one product' || prodId == null || prodId == 0) {
                            tableReviews.search('').column( 2 ).search(0).draw();
                        } else {
                            tableReviews.column( 2 ).search( prodId ? '^'+prodId+'$' : prodId, true, false ).draw();
                        }
                    });


                }); // end of function

            </script>
        @endpush

    </body>
</html>
