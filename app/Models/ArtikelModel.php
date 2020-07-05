<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArtikelModel {
    public static function all() {
      return DB::table('artikels')->get();
    }

    public static function findById($id) {
      return DB::table('artikels')->where('id', $id)->first();
    }

    public static function findByIdAndUpdate($id, $data) {
      return DB::table('artikels')->where('id', $id)->update($data);
    }

    public static function findByIdAndDelete($id) {
      return DB::table('artikels')->where('id', $id)->delete();
    }

    public static function create($data) {
      return DB::table('artikels')->insert($data);
    }

}
