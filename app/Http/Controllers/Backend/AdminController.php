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
    
    
    public function dashboard()
    {
        return view('admin.products.dashboard');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
    */
    public function index(Request $request)
    {
        $input = $request->all();
        $table = $request->segment(2);
        
        
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
        $table = $request->segment(2);
        
             
        $fields = \Config::get("laravelmart.$table.fields");
        $url = action('Backend\AdminController@store', [$table]);
        
        $product = $this->productRepository->search([],$table);
        
        return  view('admin.products.create')
        ->with('data', [])
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
        $table = $request->segment(2);
        
        $Model = "\\App\\Models\\".ucfirst(str_singular($table));
       
        $this->validate($request, $Model::$rules);
        
        
        $product = $this->productRepository->store($input, $table);
        
        \Flash::message( ucfirst(str_singular($table)). ' saved successfully.');
        
        return redirect(route("admin.index",[$table]));
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
    public function edit(Request $request)
    {
        
        $table = $request->segment(2);
        $id = $request->segment(4);
        
        $fields = \Config::get("laravelmart.$table.fields");
        
        $data = $this->productRepository->findProductById($id,$table);
        $url = route('admin.update', [$table, $id ]);
        
        if(empty($data))
        {
            \Flash::error( ucfirst(str_singular($table)). ' not found');
            return redirect(route('admin.index',[$table]));
        }
        
        return view('admin.products.edit')
        ->with('data', $data)
        ->with('fields',$fields)
        ->with('url',$url)
        ->with('table',$table);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
    */
    public function update(Request $request)
    {
        $table = $request->segment(2);
        $id = $request->segment(4);
        
        $data = $this->productRepository->findProductById($id,$table);
        
        if(empty($data))
        {
            \Flash::error(ucfirst(str_singular($table)).' not found');
            return redirect(route('admin.index',[$table]));
        }
        
        $data = $this->productRepository->update($data, $request->all());
        
        \Flash::message(ucfirst(str_singular($table)).' updated successfully.');
        
        return redirect(route('admin.index',[$table]));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
    */
    public function destroy(Request $request)
    {
        $table = $request->segment(2);
        $id = $request->segment(4);
        
        $data = $this->productRepository->findProductById($id,$table);
        
        if(empty($data))
        {
            \Flash::error(ucfirst(str_singular($table)).' not found');
            return redirect(route('admin.index',[$table]));
        }
        
        $data->delete();
        
        \Flash::message(ucfirst(str_singular($table)).' updated successfully.');
        
        return redirect(route('admin.index',[$table]));
    }
    
}


