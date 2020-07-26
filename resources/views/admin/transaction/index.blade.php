@extends('adminlte::page')

@section('title', 'All Transaction')

@section('content_header')
@stop

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
            @if (session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="category_table" style="width:100%;">
                        <thead class=" text-primary">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Transakti</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- Col- 8-->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>Detail</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered"  id="transaction_detail">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>QTY</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                  
                </table>
            </div>
        </div>
    </div> <!-- Col-4 -->
</div>


@section('adminlte_js')
    <script type="text/javascript">

        $(document).ready(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var tabel = $('#category_table');
            tabel.DataTable( {
                "ajax": {
                    "url": "{{ url('api/admin/transaction/data') }}",
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
            });
            $(document).on("click", '.category_table', function() { 
                    alert('masuk table');
            });

        });
       
    function transactionDetail(dataId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ url("api/admin/transaction/data") }}',
            dataType: "json",
            success: function(data) {
                // console.log(data);

                var html = "";
                var i = 0;
                jQuery.each(data,function(key,value) {
                var dataId =  value[i][1];
                // alert(dataId);
                // console.log(value[0]);
                    html +='<tr>';
                    html +='<td>'+ value[i][1] + '</td>';
                    html +='<td>'+ value[i][2] + '</td>';
                    html +='<td>'+ value[i][3] + '</td>';
                    html +='</tr>';

                    i++;
                });
                $('#transaction_detail').html(html);
            }
        });
    }     
    </script>
    @yield('js')
    
@stop

@stop