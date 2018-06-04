<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DishWasher;
use App\Repositories\DishwasherRepository;
use App\Http\Requests\DishwasherCreateRequest;

class DishwasherController extends Controller
{
    protected $dishwasherRepository;

    public function __construct(DishwasherRepository $dishwasherRepository)
    {
    	$this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['except' => 'index']);
    	$this->dishwasherRepository = $dishwasherRepository;
    }

    public function index()
    {
        $dishwashers = $this->dishwasherRepository->getDishwashersFromExternal();
    	return view('welcome')->with('dishwashers', $dishwashers);
    }

    public function wishList()
    {
        $dishwashers = $this->dishwasherRepository->getPaginateByIdUser(Auth::user()->id);

        return view('wishlist')->with('dishwashers', $dishwashers);
    }

    public function addToWishList(DishwasherCreateRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);
        if($this->existsForUser($inputs['title'], $inputs['user_id']))
        {
            return redirect('/')->withNotok('DishWasher already in your wishlist');
        }
        $dish = $this->dishwasherRepository->store($inputs);

        return redirect('/')->withOk('The dishwasher ' . $dish->title . ' was successfully added to wishlist.');
    }

    public function destroy($id)
    {
        $this->dishwasherRepository->destroyToWishlist($id);
        return redirect('/wishlist')->withOk('The dishwasher was successfully removed');
    }

    public function existsForUser($nameProduct, $user_id)
    {
        return $this->dishwasherRepository->existsForUser($nameProduct, $user_id);
    }
}
