<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ProductRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

use App\Models\Product;
use Illuminate\Support\Facades\Config;


class ProductController extends AppBaseController
{

	/** @var  ProductRepository */
	private $productRepository;

	function __construct(ProductRepository $productRepo)
	{
		$this->productRepository = $productRepo;
	}

	/**
	 * Display a listing of the Product.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();
		
		$fields = Config::get('laravelmart.products.index');

		//$result = $this->productRepository->search($input);

		$products = \DB::table('products')->paginate(10);

		//$products =  $result[0];

		$attributes =  ""; //$result[1];

		return view('admin.products.index')
		    ->with('products', $products)
		    ->with('attributes', $attributes)
			->with('fields',$fields);
	}

	/**
	 * Show the form for creating a new Product.
	 *
	 * @return Response
	 */
	public function create()
	{
		$fields = Config::get('laravelmart.products.fields');

		return  view('admin.products.create')
				->with('fields',$fields);
	}

	/**
	 * Store a newly created Product in storage.
	 *
	 * @param CreateProductRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request)
	{
        $input = $request->all();

		$product = $this->productRepository->store($input);

		Flash::message('Product saved successfully.');

		return redirect(route('admin.products.index'));
	}

	/**
	 * Display the specified Product.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$product = $this->productRepository->findProductById($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		return view('admin.products.show')->with('product', $product);
	}

	/**
	 * Show the form for editing the specified Product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = $this->productRepository->findProductById($id);
		$fields = Config::get('laravelmart.products.fields');

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		return view('admin.products.edit')
				->with('product', $product)
				->with('fields',$fields);
	}

	/**
	 * Update the specified Product in storage.
	 *
	 * @param  int    $id
	 * @param CreateProductRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateProductRequest $request)
	{
		$product = $this->productRepository->findProductById($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		$product = $this->productRepository->update($product, $request->all());

		Flash::message('Product updated successfully.');

		return redirect(route('admin.products.index'));
	}

	/**
	 * Remove the specified Product from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = $this->productRepository->findProductById($id);

		if(empty($product))
		{
			Flash::error('Product not found');
			return redirect(route('admin.products.index'));
		}

		$product->delete();

		Flash::message('Product deleted successfully.');

		return redirect(route('admin.products.index'));
	}

}
