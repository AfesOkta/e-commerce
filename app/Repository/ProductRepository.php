<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function findById($id)
    {
        # code...
        return $this->product->find($id);
    }

    public function getById($id)
    {
        # code...
        return $this->product->query()->where('id','=',$id)->get();
    }

    public function getAll()
    {
        # code...
        return $this->product->all();
    }

    public function store($data, $id = "")
    {
        # code...
        if ($id == "") {
            return $this->product->create($data);
        }else{
            return $this->product->find($id)->update($data);
        }
    }

    public function deleteById($id)
    {
        return $this->product->find($id)->delete();
    }
}
