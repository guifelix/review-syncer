
@extends('layouts.public.home')

@push('styles')
@endpush

@push('scripts')
    <!-- Datatables 1.10.19 -->
    <script src="{{ URL::asset('components/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('components/datatables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('components/datatables/datatables-plugins/cache/pipelining.js') }}"></script>
    <script src="{{ URL::asset('components/momentjs/moment.min.js') }}"></script>
@endpush

@section('title', 'See our reviews')

@section('content')

<section id="reviews">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <h1 class="title-h2 mb-xs-16 main-header">
                    See our product's <strong>reviews</strong>.
                </h1>
                <hr class="title-spacer center">
            </div>
        </div>
    </div>
</section>
<section id="reviewsList">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                {{ Form::bsSelect('Product',null,camelize(products('keyvalArray')),null,['placeholder' => 'Select one product','required'=>true, 'id'=>'product']) }}
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-lg btn-filled inner-link btnRefresh" onclick="refreshReviews()">
                    <i class="fas fa-sync-alt"></i> Refresh list
                </button>
            </div>
        </div>
        <div class="row">
            <div class="contentpanel">
                {{-- <div class="row"> --}}
                    <div class="col-md-12">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="tableReviews" width="100%" >
                                <thead class="active row">
                                    <tr>
                                        <th class="sorting_disabled" style="text-align: center;">id</th>
                                        <th style="text-align: center;">Shopify domain</th>
                                        <th style="text-align: center;">Bold Product</th>
                                        <th style="text-align: center;">Rating</th>
                                        <th style="text-align: center;">Previus Rating</th>
                                        <th style="text-align: center;">Update Date</th>
                                        <th style="text-align: center;">Creation Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
    <script>
        $(function(){
                @component('components.datatable.defaults')
                {!! route( 'jsonReviews' ) !!}
                @endcomponent

                var tableReviews = $('#tableReviews').DataTable({
                    columns: [
                        {
                            data: 'id',
                            class: 'text-center',
                            visible:false,
                            searchable: false,
                        },
                        {
                            data: 'shopify_domain',
                            class: 'text-left'
                        },
                        {
                            data: 'app_slug',
                            class: 'text-center',
                            searchable: false,
                            render: function(data) {
                                return camelize(data);

                            }
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
                                if (data !== null ) {
                                    return moment(data).format('MM/DD/YYYY HH:mm:ss');
                                }
                                return data;
                            }
                        },
                        {
                            data: 'created_at',
                            class: 'text-center',
                            render: function(data){
                                if (data !== null ) {
                                    return moment(data).format('MM/DD/YYYY HH:mm:ss');
                                }
                                return data;
                            }
                        }
                    ],
                    dom:"<'row'<'col-sm-6'l><'col-sm-6 float-right'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                });

                $('#product').on('change',function(){
                    let product = $('#product option:selected').val();
                    tableReviews.ajax.url( `{{ route( 'jsonReviews' ) }}/${product}` ).load();
                });

        }); // end of function

        function refreshReviews(){
            $.ajax({
                url: "{!! route('jsonRefresh') !!}" ,
                type: 'post',
                data:{
                    _token: '{!! csrf_token() !!}',
                },
                success: function(data) {
                    if (data.status == true) {
                         $('#tableReviews').DataTable().ajax.url( `{{ route( 'jsonReviews' ) }}` ).load();
                         $('#tableReviews').DataTable().clearPipeline().draw();
                    }
                }
            });
        }



    </script>
@endpush
