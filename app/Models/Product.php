<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table  = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['id', 'code', 'name', 'description', 'price'];

    public function user()
    {
        return $this->belongsTo('UserModel', 'user_id');
    }
    // this is the way to call relationship
    // $post = new PostModel();
    // $user = $post->user()->first();

}
