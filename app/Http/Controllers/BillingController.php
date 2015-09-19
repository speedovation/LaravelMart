<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBillingRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\BillingRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class BillingController extends AppBaseController
{

	/** @var  BillingRepository */
	private $billingRepository;

	function __construct(BillingRepository $billingRepo)
	{
		$this->middleware('auth');
		$this->billingRepository = $billingRepo;
	}

	/**
	 * Display a listing of the Billing.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->billingRepository->search($input);

		$billings = $result[0];

		$attributes = $result[1];

		return view('billings.index')
		    ->with('billings', $billings)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Billing.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('billings.create');
	}

	/**
	 * Store a newly created Billing in storage.
	 *
	 * @param CreateBillingRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBillingRequest $request)
	{
        $input = $request->all();

		$billing = $this->billingRepository->store($input);

		Flash::message('Billing saved successfully.');

		return redirect(route('billings.index'));
	}

	/**
	 * Display the specified Billing.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$billing = $this->billingRepository->findBillingById($id);

		if(empty($billing))
		{
			Flash::error('Billing not found');
			return redirect(route('billings.index'));
		}

		return view('billings.show')->with('billing', $billing);
	}

	/**
	 * Show the form for editing the specified Billing.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$billing = $this->billingRepository->findBillingById($id);

		if(empty($billing))
		{
			Flash::error('Billing not found');
			return redirect(route('billings.index'));
		}

		return view('billings.edit')->with('billing', $billing);
	}

	/**
	 * Update the specified Billing in storage.
	 *
	 * @param  int    $id
	 * @param CreateBillingRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateBillingRequest $request)
	{
		$billing = $this->billingRepository->findBillingById($id);

		if(empty($billing))
		{
			Flash::error('Billing not found');
			return redirect(route('billings.index'));
		}

		$billing = $this->billingRepository->update($billing, $request->all());

		Flash::message('Billing updated successfully.');

		return redirect(route('billings.index'));
	}

	/**
	 * Remove the specified Billing from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$billing = $this->billingRepository->findBillingById($id);

		if(empty($billing))
		{
			Flash::error('Billing not found');
			return redirect(route('billings.index'));
		}

		$billing->delete();

		Flash::message('Billing deleted successfully.');

		return redirect(route('billings.index'));
	}

}
