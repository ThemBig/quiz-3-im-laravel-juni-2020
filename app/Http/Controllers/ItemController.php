<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;

class ItemController extends Controller
{
  public function create() {
    return view('pages.artikel.create');
  }

  public function store(Request $req){
    $user_id = 1; //dummy user
    $data = $req->all();
    $data['user_id'] = $user_id;
    $data['slug'] = str_replace(" ", "-", strtolower($data['judul']));
    unset($data['_token']);

    $exec = ArtikelModel::create($data);
    return redirect('/items');
  }

  public function index(){
    $artikels = ArtikelModel::all();
    $tags = [];
    foreach ($artikels as $key => $value) {
      $tag_value= explode(",",$value->tag);
      sort($tag_value);
      $tags[] = $tag_value;
    }
    return view('pages.artikel.index', compact('artikels', 'tags'));
  }

  public function show($id) {
    $artikel = ArtikelModel::findById($id);
    if(!$artikel){
      return redirect('/');
    };
    $tags = explode(",", $artikel->tag);

    return view('pages.artikel.show', compact('artikel', 'tags'));
  }

  public function edit($id) {
    $artikel = ArtikelModel::findById($id);
    return view('pages.artikel.edit', compact('artikel'));
  }

  public function update(Request $req, $id) {
    $user_id = 1; //dummy user
    $data = $req->all();
    $data['user_id'] = $user_id;
    $data['slug'] = str_replace(" ", "-", strtolower($data['judul']));
    unset($data['_token']);
    unset($data['_method']);

    $exec = ArtikelModel::findByIdAndUpdate($id, $data);
    return redirect('/items');
  }

  public function destroy($id) {
    $exec = ArtikelModel::findByIdAndDelete($id);
    if ($exec) {
      return 1;
    }
  }

}
