@extends('adminlte::page')

@section('title', 'All Category')

@section('content_header')
    <h3>
        Category
        <a href="{{ url('admin/category/create') }}" class="btn btn-primary pull-right" style="margin-left: 10px;">Add</a>
    </h3>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
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
                                <th class="text-center">Category</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Action</th>
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
            var tabel = $('#category_table');
            tabel.DataTable( {
                "ajax": {
                    "url": "{{ url('api/admin/category/data') }}",
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
            });

        });

    </script>
    @yield('js')
    
@stop

@stop