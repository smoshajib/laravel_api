<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        $content = view('pages.dashboard');
//        return view('master')->with('master-content', $content);
    }

    public function view_product() {
        $product = DB::table('product')->orderBy('id', 'desc')->get();
        return response()->json($product);
    }

    public function delete_product($id) {
        DB::table('product')->where('id', $id)->delete();
        return response([
            'message' => 'Delete Successfully'
                ], 200);
    }

    public function add_product(Request $request) {
        
        if ($request->hasFile('image')) {
//            $file      = $request->file('image');
//            $filename  = $file->getClientOriginalName();
//            $extension = $file->getClientOriginalExtension();
//            $picture   = date('His').'-'.$filename;
//            //move image to public/img folder
//            $file->move(public_path('person'), $picture);

            $data = array();
            $data['title'] = $request->title;
            $data['price'] = $request->price;
            $data['description'] = $request->description;
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $img_url = 'public/product/';
            $file->move($img_url, $fileName);
            $data['image'] = $img_url . $fileName;
             DB::table('product')->insert($data);
        } else {
            return response()->json(["message" => "Select image first."]);
        }

    }

    public function edit_product($id) {

        $editproduct= DB::table('product')->where('id', $id)->first();

        return response()->json($editproduct);
    }

    public function update_product(Request $request, $id) {
        $data = array();
        $data['title'] = $request->title;
        $data['price'] = $request->price;
        $data['description'] = $request->description;
        DB::table('product')->where('id', $id)->update($data);
        //or 
//        return response().json([
//            'message'=>'Update Data Successfully'
//        ],200);
        return response([
            'message' => 'Update Data Successfully'
                ], 200);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
