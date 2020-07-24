<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Auth;
use DataTables;
use Response;



class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::with(['category'])->orderBy('created_at', 'DESC')->get();
        // var_dump($posts);die();
        return view('admin.post.index', compact('posts'));
    }
    public function loadData()
    {
        $arr_data   = array();
        $posts = Post::with(['category'])->orderBy('created_at', 'DESC')->get();

        $counter = 0;
        foreach ($posts as $value) {
    
            $arr_data['data'][$counter][] = $counter+1;
            $arr_data['data'][$counter][] = $value->judul ? $value->judul : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = $value->gambar ? $value->gambar : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = $value->nama_kategori ? $value->nama_kategori : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = $value->isi ? $value->isi : "<p class='text-center'> - </p>";
            if ($value->status == 0) {
                $arr_data['data'][$counter][] = "<span class='badge badge-danger'>Tidak Aktif</span>";
            }
            else{
                $arr_data['data'][$counter][] = "<span class='badge badge-primary'>Aktif</span>";
            }
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($value->created_at));
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($value->updated_at));
            $arr_data['data'][$counter][] = "<a href='".url('admin/post/edit/'.$value->id)."' class='btn btn-warning'><i class='glyphicon glyphicon-edit'></i>Edit</a><a class='btn btn-danger' onclick='return confirm(\"Anda yakin akan menghapus data ini?\")' href='".url('admin/post/delete/'.$value->id)."'><i class='glyphicon glyphicon-trash'>Hapus</i></a>";
            $counter++;

        }
        
        return json_encode($arr_data);
    }
}
