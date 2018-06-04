<?php

namespace App\Repositories;

use App\Dishwasher;
use DB;
use Goutte;

class DishwasherRepository
{
	protected $dishwasher;

	public function __construct(Dishwasher $dishwasher)
	{
		$this->dishwasher = $dishwasher;
	}

	public function getDishwashersFromExternal()
	{
		/* Using Goutte to fill in the array of dishwashers on page 'https://www.appliancesdelivered.ie/dishwashers' */
        $crawler = Goutte::request('GET', 'https://www.appliancesdelivered.ie/dishwashers');
        $dishwashers = $crawler->filter('.search-results-product')->each(function ($node) {
            $dish = new DishWasher;
            $dish->title = $node->filter('.product-description h4 a')->text();
            $dish->price = str_replace('€', '', $node->filter('.product-description h3.section-title')->text());
            $dish->image = $node->filter('.product-image img')->attr('src');
            return $dish;
        });
        return $dishwashers;
	}

	public function getPaginate($n)
	{
		return $this->dishwasher->paginate($n);
	}

	public function getPaginateByIdUser($user_id)
	{
		return DB::table('dishwashers')->where('user_id', '=', $user_id)->get();
	}
	public function store(Array $inputs)
	{
		return $this->dishwasher->create($inputs);
	}

	public function destroyToWishlist($id)
	{
		$this->dishwasher->findOrFail($id)->delete();
	}

	public function existsForUser($nameProduct, $user_id)
	{
		$dish = DB::table('dishwashers')->where('title', '=', $nameProduct)->where('user_id', '=', $user_id)->first();
		if($dish === null)
			return false;
		return true;
	}
}