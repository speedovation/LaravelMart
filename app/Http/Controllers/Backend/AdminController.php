<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Repositories\ProductRepository;
use Illuminate\Http\Request;


class AdminController extends Controller {

    
    /** @var  ProductRepository */
	private $productRepository;

	function __construct(ProductRepository $productRepo)
	{
		$this->productRepository = $productRepo;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $table = $request->segment(3);
    	
    	
    	
        ///TODO if item is empty then 404
    	
        $fields = \Config::get("laravelmart.$table.index");

        //$result = $this->productRepository->search($input);

        $products = \DB::table($table)->paginate(10);

        //$products =  $result[0];

        $attributes =  ""; //$result[1];

        return view('admin.products.index')
            ->with('products', $products)
            ->with('attributes', $attributes)
            ->with('fields',$fields)
            ->with('table',$table);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $$table = $request->segment(3);
        $fields = \Config::get("laravelmart.$item.fields");
        $url = action('Backend\AdminController@store', [$table]);
        
        $product = $this->productRepository->search([],$table);
    	
        return  view('admin.products.create')
                ->with('fields',$fields)
                ->with('url',$url)
                ->with('table',$table);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $item = $request->segment(3);

		$product = $this->productRepository->store($input, $item);

		\Flash::message( ucfirst(str_singular($item)). ' saved successfully.');

		return redirect(route("admin.manage.index",[$item]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
