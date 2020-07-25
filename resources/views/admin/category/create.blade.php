@extends('adminlte::page')

@section('title', 'Create Category')

@section('content_header')
    <a href="{{ url('admin/category/index') }}" class="btn btn-default pull-right">Back</a>
@stop

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Category</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <input type="text" name="nama_kategori" class="form-control {{ $errors->has('nama_kategori') ? 'is-invalid':'' }}" placeholder="Masukkan Nama Kategori">
                                <p class="text-danger">{{ $errors->first('nama_kategori') }}</p>
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
