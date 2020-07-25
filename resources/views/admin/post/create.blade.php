@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ url('admin/post/index') }}" class="btn btn-default pull-right">Back</a>
@stop

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Post</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('post.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="judul" class="form-control {{ $errors->has('judul') ? 'is-invalid':'' }}" placeholder="Masukkan title">
                                <p class="text-danger">{{ $errors->first('judul') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">Pilih</option>
                                    @foreach ($categorys as $category) 
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="isi" cols="5" rows="5" class="form-control {{ $errors->has('isi') ? 'is-invalid':'' }}"></textarea>
                                <p class="text-danger">{{ $errors->first('isi') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
