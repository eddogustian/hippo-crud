<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category  = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.category.index', compact('category'));
    }

    public function loadData()
    {
        $arr_data   = array();
        $categorys  = Category::orderBy('created_at', 'DESC')->get();

        $counter = 0;
        foreach ($categorys as $category) {
            //  echo $category->nama_kategori; die();
    
            $arr_data['data'][$counter][] = $counter+1;
            $arr_data['data'][$counter][] = $category->nama_kategori ? $category->nama_kategori : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($category->created_at));
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($category->updated_at));
            $arr_data['data'][$counter][] = "<a href='".url('admin/category/edit/'.$category->id)."' class='btn btn-warning'><i class='glyphicon glyphicon-edit'></i>Edit</a>";
            $counter++;

        }
        return json_encode($arr_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // dd('masuk');
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);
        
        try {
            $post = Category::create([
                'id'            => $request->id,
                'nama_kategori' => $request->nama_kategori
            ]);
			
            return redirect('/admin/category/index')->with(['success' => 'Data telah disimpan']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        
        if(!empty($category->toArray())){
            // cek kode title
            $cek_kategori   = Category::where('nama_kategori', '=', $request->nama_kategori)->get();

            if($request->nama_kategori == $category->nama_kategori ){
                $total = 0;
            }else{
                $total = count($cek_kategori);
            }

            if( $total == 0){
                $category->nama_kategori        = $request->nama_kategori;
                $category->updated_at           = date("Y-m-d H:i:s");

                if ($category->save()) {
                    return redirect('admin/category/index')->with('success','Data Category "'.$category->nama_kategori.'" berhasil diubah.');
                }
                else
                {
                    return redirect()->back()->withInput()->withErrors($category->getErrors());   
                }

            }else{
                return redirect('admin/category/index')->with('error','Data Post "'.$request->nama_kategori.'" sudah ada.');
            }
        }
        else
        {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
