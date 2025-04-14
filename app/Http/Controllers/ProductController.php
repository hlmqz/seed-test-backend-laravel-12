<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
//===================================================================================

public function read(Request $request, Product $product)
{
	response()->json($product);
}

//===================================================================================

public function list(Request $request)
{
	$search = $request->query('search') ?? '';
	$per_page = $request->query('per_page') ?? 15;

	$products = Product::query();

	if($search)
		$products->where('name', '~*', str_sql_regexp($search));

	return response()->json($products->paginate($per_page));
}

//===================================================================================

public function create(ProductRequest $request)
{
	$data = $request->only([
		'name',
		'price',
		'description',
		'active',
	]);

	$product = Product::create($data)->refresh();
	return response()->json($product);
}

//===================================================================================

public function update(ProductRequest $request, Product $product)
{
	$data = $request->only([
		'name',
		'price',
		'description',
		'active',
	]);

	$product->fill($data)->save();

	return response()->json($product);
}
//===================================================================================

public function delete(Request $request, Product $product)
{
	$product->delete();

	return response()->json($product);
}

//===================================================================================
}
