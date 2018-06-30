
@extends('layouts.public.home')

@push('styles')
@endpush

@push('scripts')
    <script src="{{ URL::asset('components/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('components/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('components/datepicker/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script> --}}
    <script src="{{ URL::asset('datatables-plugins/cache/pipelining.js') }}"></script>
    {{-- <script src="{{ URL::asset('components/momentjs/moment.min.js') }}"></script> --}}
@endpush

@section('title', 'See our reviews')

@section('content')
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
@endsection
@push('scripts')
    <script>
        $(function(){
            @if($product)
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
