<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // testing:
    public function scopeshowCorePage($query, $take = 1) {
        return $query->where('core', true)->take($take)->get();
        // could put get() on PageTest.php
        // Page::$pages->get() instead if desired.
    }

    public function scopeshowCustomPage($query, $take = 1) {
        return $query->where('core', false)->take($take)->first();
    }

    public function scopecountCustomPages($query) {
        return $query->where('core', false)->get();
    }

}
