<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Services\StoreService;
use Yajra\DataTables\DataTables;

class StoreController extends Controller
{
    public function __construct(public StoreService $storeService)
    {

    }
    public function index()
    {

        $model = Store::with('product','product.productCategory');

        return DataTables::of($model)
            ->editColumn('product.image', function($store) {
                return $store->product->getFirstMediaUrl();
            })
            ->toJson();

    }
    public function store(StoreStoreRequest $request)
    {
        $store= $this->storeService->create($request->validated());
        return $store;
    }

    public function show(Store $store)
    {
        return StoreResource::make($store->load('product'));

    }

    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store= $this->storeService->update($request->validated(),$store);
        return $store;

    }

    public function destroy(Store $store)
    {
        $store->delete();
        return response()->noContent();

    }
}
