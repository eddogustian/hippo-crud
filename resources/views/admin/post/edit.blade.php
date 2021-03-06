@extends('adminlte::page')

@section('title', 'Edit Post')

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

                        <form action="{{ url('/admin/post/update/' .$post->id) }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="judul" class="form-control {{ $errors->has('judul') ? 'is-invalid':'' }}" value="{{ $post->judul }}" placeholder="Masukkan nama lengkap">
                                <p class="text-danger">{{ $errors->first('judul') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="id_kategori" class="form-control" required>
                                    @foreach ($categorys as $category) 
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="isi" cols="5" rows="5" class="form-control {{ $errors->has('isi') ? 'is-invalid':'' }}">{{ $post->isi }}</textarea>
                                <p class="text-danger">{{ $errors->first('isi') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label">Status</label>
                                <select required name="status" class="form-control">
                                    @if($post->status == 0)
                                        <option value="0" selected="selected">Tidak Aktif</option>
                                    @else
                                        <option value="0">Tidak Aktif</option>
                                    @endif
                                    @if($post->status  == 1)
                                        <option value="1" selected="selected">Aktif</option>
                                    @else
                                        <option value="1">Aktif</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                @if ("/storage/images/{{$post->gambar }}")
                                    <img src="{{ Storage::url('app/public/public/image/' .$post->gambar) }}" height="60" width="80">
                                @else
                                        <p>No image found</p>
                                @endif
                                <label for="">Gambar</label>
                                <input type="file" name="gambar"/>
                                <p class="text-danger">{{ $post->gambar }}</p>
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
            });

        });

    </script>
    @yield('js')
    
@stop

@stop