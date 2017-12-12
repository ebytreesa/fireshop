<?php

class AccessoryController extends BaseController {

	public function listTilbehør()
	{
		// $acc = new Accessory;
		// $acc->name = 'tilb 1';
		// $acc->save();
		$acc = Accessory::get();
		return View::make('accessory.listAcc')->withAcc($acc);
	}

	public function createNyTilbehør()
	{
		return View::make('accessory.createAcc');
	}

	public function postCreateNyTilbehør()
	{	
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' => 'required',
				'pic' => 'image'), $messages);

		if ($validator->fails())
		{
			return Redirect::to('/admin/createNyTilbehør')->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
			$acc 	= new Accessory;
			$acc->name = Input::get('name');
			if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/accessory/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/accessory/' . $filename . '_thumb');
			$acc->image = $filename;
		    }
			$acc->save();

			return Redirect::to('/admin/listTilbehør')->withSuccess('Ny tilbehør blev oprettet');
		}
	}


	public function editTilbehør($id)
	{
		$acc 	= Accessory::where('id', $id)->first();
		return View::make('accessory.editAcc')->withAcc($acc);
	}

	public function postEditTilbehør()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' => 'required',
				'pic' => 'image'), $messages);

		if ($validator->fails())
		{
			return Redirect::to('/admin/editTilbehør')->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
			$acc 	= Accessory::where('id', Input::get('id'))->first();
			$acc->name = Input::get('name');
			if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/accessory/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/accessory/' . $filename . '_thumb');
			$acc->image = $filename;
		    }
			$acc->save();
			
			return Redirect::to('/admin/listTilbehør')->withSuccess(' tilbehør blev rettet');
		}

	}

	public function deleteTilbehør($id)
	{   
		$acc = Accessory::where('id',$id)->first();		
		unlink(public_path(). '/accessory/' . $acc->image);
		unlink(public_path(). '/accessory/' . $acc->image. '_thumb');
		Accessory::destroy($id);
		return Redirect::to('/admin/listTilbehør')->withSuccess('tilbehør blev slettet');
	}

	public function createNyTilbehørItem($name)
	{
		$acc = Accessory::where('name',$name)->first();
		if($acc)
		{
			$name = $acc->name;
			$id  = $acc->id;
		}
		return View::make('accessory.nyAccItem')->withAcc($acc);

	}

	public function postCreateTilbehørItem()
	{	
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' => 'required',
				'pris' => 'required',
				'pic' => 'image'), $messages);

		if ($validator->fails())
		{
			return Redirect::to('/admin/createNyTilbehørItem')->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
		
		$item = new AccItem;
		$item->acc_id = Input::get('id');
		$item->name 	= Input::get('name');
		$item->pris 	= Input::get('pris');
		$item->description 	= Input::get('description');
		
		if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/accessory/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/accessory/' . $filename . '_thumb');
			$item->image = $filename;
		    }
		$item->save();
		$acc = Accessory::where('id',Input::get('id'))->first();
		if($acc)
		{
			$name = $acc->name;
			
		}
		return Redirect::to('/admin/'.$name.'/listTilbehørItems')->withSuccess('ny item blev oprettet');
	    }

	}

	public function listTilbehørItems($name)
	{
		$acc = Accessory::where('name',$name)->first();
		if($acc)
		{
			$name = $acc->name;
			$id  = $acc->id;
		}
		$item = AccItem::where('acc_id', $id)->get();
		return View::make('accessory.listAccItems')->withItem($item)->withAcc($acc);

	}

	public function editTilbehørItem($name,$id)
	{ 
		$acc = Accessory::where('name', $name)->first();
		$item = AccItem::where('id', $id)->first();
		return View::make('accessory.editAccItem')->withAcc($acc)->withItem($item);
	}

	public function posteditTilbehørItem()
	{

		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'name' => 'required',
				'pris' => 'required',
				'pic' => 'image'), $messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
			
		
		$item 	= AccItem::where('id', Input::get('id'))->first();
		
		$item->name 	= Input::get('name');
		$item->pris 	= Input::get('pris');
		$item->description 	= Input::get('description');
		
		if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/accessory/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/accessory/' . $filename . '_thumb');
			$item->image = $filename;
		    }
		$item->save();
		
		$item 	= AccItem::where('id', Input::get('id'))->first();
		$id = $item->acc_id;
		$acc = Accessory::where('id', $id)->first();
		
		if($acc)
		{
			$name = $acc->name;
			
		}
		return Redirect::to('/admin/'.$name.'/listTilbehørItems')->withSuccess('item blev rettet');
	    }

	}

	public function deleteTilbehørItem($name,$id)
	{
		$acc = Accessory::where('name', $name)->first();
		$item = AccItem::where('id', $id)->first();

		if(public_path(). '/accessory/' . $item->image)
		{	
		unlink(public_path(). '/accessory/' . $item->image);
		unlink(public_path(). '/accessory/' . $item->image. '_thumb');
	    }
		AccItem::destroy($id);
		return Redirect::back()->withSuccess('Tilbehør Item blev slettet');
	}


}
