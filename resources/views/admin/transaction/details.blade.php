@extends('adminlte::page')

@section('title', 'All Post')

@section('content_header')
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
        
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="post_table" style="width:100%;">
                        <thead class=" text-primary">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Transaksi</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">qty</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@section('adminlte_js')
    <script type="text/javascript">

        $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var tabel = $('#post_table');
            tabel.DataTable( {
                "ajax": {
                    "url": "{{ url('api/admin/transaction/detail') }}",
                    "dataSrc": function (d) {
                        if (d.length === 0) {
                            result = [];
                        }else{
                            result = d.data
                        }
                        return result;
                    },
                },
                "order": [[ 0, "asc" ]],
                "columnDefs": [
                    { className: 'text-center', targets: [] },
                ],
                "dom": 'lBfrtip',
                "buttons": [
                    {
                        extend: 'excel',
                        title : 'Data Bengkel',
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        title : 'Data Bengkel',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
                        }
                    },
                    {
                        extend: 'print',
                        title : 'Data Bengkel',
                        exportOptions: {
                            columns: [ 0, 1, 2 ]
                        }
                    },
                ],
            });

        });

    </script>
    @yield('js')
    
@stop

@stop