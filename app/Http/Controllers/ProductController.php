<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repository\ProductRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    protected $prodRepository;

    public function __construct(ProductRepository $prodRepository) {
        $this->prodRepository = $prodRepository;
    }

    public function index(Request $request)
    {
        # code...
        return view('products.list');
    }

    public function json(Request $request)
    {
        # code...
        $data = $this->prodRepository->getAll();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            return '<a href="javascript:void(0)" onclick="edit('.$row->id.')"
                title="Edit '.$row->nama.'" class="btn btn-info btn-sm btn-icon" data-dismiss="modal"><i class="fas fa-edit">&nbsp;edit</i></a>
                <a href="javascript:void(0)" onclick="hapus('.$row->id.')"
                title="Delete '.$row->nama.'" class="btn btn-danger btn-sm btn-icon" data-dismiss="modal"><i class="fas fa-trash">&nbsp;delete</i></a>
                         <meta name="csrf-token" content="{{ csrf_token() }}">';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function findById($id)
    {
        # code...
        $product = $this->prodRepository->findById($id);
        return $product;
    }

    public function store(ProductRequest $request)
    {
        # code...
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $data = $request->all();
            $store = $this->prodRepository->store($data);
            DB::commit();
            if ($store) {
                return response()->json(['status' => True, 'message' => 'Berhasil menambah product']);
            }else{
                return response()->json(['status' => false, 'message' => 'Tidak berhasil menambah product']);
            }
        } catch(Exception $exp) {
            DB::rollBack();
            Log::debug($exp->getMessage());
            return response()->json(['status' => false, 'message' => $exp->getMessage()]);
        }
    }

    public function update(ProductRequest $request)
    {
        # code...
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $data = $request->all();
            $store = $this->prodRepository->store($data, $data['id']);
            DB::commit();
            if ($store) {
                return response()->json(['status' => True, 'message' => 'Berhasil merubah product']);
            }else{
                return response()->json(['status' => false, 'message' => 'Tidak berhasil merubah product']);
            }
        } catch(Exception $exp) {
            DB::rollBack();
            Log::debug($exp->getMessage());
            return response()->json(['status' => false, 'message' => $exp->getMessage()]);
        }
    }

    public function destroy($id)
    {
        # code...
        try {
            DB::beginTransaction();
            $delete = $this->prodRepository->deleteById($id);
            DB::commit();
            if ($delete) {
                return response()->json(['status' => True, 'message' => 'Berhasil menghapus product']);
            }else{
                return response()->json(['status' => True, 'message' => 'Tidak berhasil menghapus product']);
            }
        }catch(Exception $exp) {
            DB::rollBack();
            Log::debug($exp->getMessage());
            return response()->json(['status' => false, 'message' => $exp->getMessage()]);
        }
    }
}
