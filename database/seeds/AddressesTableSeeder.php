<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public
	function run ()
	{
		Address::create (
			[
				'streetnumber' => 222,
				'street'       => 'Popjesstraat',
				'postcode'     => '3333ZZ',
				'state'        => 'Amsterdan',
				'company_id'   => 1,
			]);

		Address::create (
			[
				'streetnumber' => 145,
				'street'       => 'Volhovenstraat',
				'postcode'     => '5355QF',
				'state'        => 'Rotterdam',
				'company_id'   => 2,
			]);

		Address::create (
			[
				'streetnumber' => 56,
				'street'       => 'Havenstraat',
				'postcode'     => '2233ZZ',
				'state'        => 'Rotterdam',
				'location_id'  => 1,
			]);
		Address::create (
			[
				'streetnumber' => 22,
				'street'       => 'Hoevenstraat',
				'postcode'     => '2433ZZ',
				'state'        => 'Rotterdam',
				'location_id'  => 1,
			]);
		Address::create (
			[
				'streetnumber' => 56,
				'street'       => 'Bradenstraat',
				'postcode'     => '2723ZZ',
				'state'        => 'Rotterdam',
				'location_id'  => 2,
			]);
	}
}
