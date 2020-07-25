@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
   
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Data</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/admin/category/update/' .$category->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Category</label>
                                <input type="text" name="nama_kategori" class="form-control {{ $errors->has('nama_kategori') ? 'is-invalid':'' }}" value="{{ $category->nama_kategori }}" placeholder="Masukkan nama lengkap">
                                <p class="text-danger">{{ $errors->first('nama_kategori') }}</p>
                            </div>
                           
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
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
                    "url": "{{ url('api/admin/post/data') }}",
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