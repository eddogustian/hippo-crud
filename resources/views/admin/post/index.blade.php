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
                                <th class="text-center">Judul</th>
                                <th class="text-center">gambar</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">isi</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td><strong>#{{  $post->id }}</strong></td>
                                        <td>{{ $post->judul }}</td>
                                        <td>{{ $post->gambar }}</td>
                                        <td>{{ $post->category->nama_kategori }}</td>
                                        <td>{{ $post->isi }}</td>
                                        <td>@if ($post->status == 0)
                                            <span class='badge badge-danger'>Tidak Aktif</span>
                                            @else
                                                <span class='badge badge-primary'>Aktif</span>
                                            @endif</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td>
                                            <form action="" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a href="" class="btn btn-secondary btn-sm">Print</a>
                                                <a href="" class="btn btn-warning btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                    </tr> 
                                @endforelse
                            </tbody>
                        <!-- </?php foreach ($posts as $post) {
                        echo $post->category->nama_kategori; die();
                        } ?> -->
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@section('adminlte_js')
    <script type="text/javascript">

    </script>
    @yield('js')
    
@stop

@stop