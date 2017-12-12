<?php

class OvnController extends BaseController {

	public function createNyOvn()
	{
		return View::make('ovn.createNyOvn');
	}

	public function postCreateNyOvn()
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
			return Redirect::to('/admin/createNyOvn')->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
			$ovn 	= new Ovn;
			$ovn->name = Input::get('name');
			if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/ovn/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/ovn/' . $filename . '_thumb');
			$ovn->pic = $filename;
		    }
			$ovn->save();

			return Redirect::to('/admin/listOvne')->withSuccess('Ny ovn blev oprettet');
		}
	}

	public function listOvne()
	{
		$ovne 	= Ovn::get();
		return View::make('ovn.listOvne')->withOvne($ovne);
	}

	public function editOvn($id)
	{
		$ovn 	= Ovn::where('id', $id)->first();
		return View::make('ovn.editOvn')->withOvn($ovn);
	}

	public function postEditOvn()
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
			return Redirect::to('/admin/editOvn/'.$id)->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
			$ovn 	= Ovn::where('id', Input::get('id'))->first();
			$ovn->name = Input::get('name');
			if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/ovn/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/ovn/' . $filename . '_thumb');
			$ovn->pic = $filename;
		    }
			$ovn->save();
			
			return Redirect::to('/admin/listOvne')->withSuccess(' ovn blev rettet');
		}

	}

	public function deleteOvn($id)
	{   
		$ovn = Ovn::where('id',$id)->first();		
		unlink(public_path(). '/ovn/' . $ovn->pic);
		unlink(public_path(). '/ovn/' . $ovn->pic. '_thumb');
		Ovn::destroy($id);
		return Redirect::to('/admin/listOvne')->withSuccess('Ovn blev slettet');
	}

	public function createNyOvnItem($name)
	{
		$ovn = Ovn::where('name',$name)->first();
		if($ovn)
		{
			$name = $ovn->name;
			$id  = $ovn->id;
		}
		return View::make('ovn.nyOvnItem')->withOvn($ovn);

	}

	public function listOvnItems($name)
	{
		$ovn = Ovn::where('name',$name)->first();
		if($ovn)
		{
			$name = $ovn->name;
			$id  = $ovn->id;
		}
		$item = OvnItem::where('ovn_id', $id)->get();
		return View::make('ovn.listOvnItems')->withItem($item)->withOvn($ovn);

	}

	public function postCreateOvnItem()
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
			return Redirect::to('/admin/createNyOvn')->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
		
		$item = new OvnItem;
		$item->ovn_id = Input::get('id');
		$item->name 	= Input::get('name');
		$item->pris 	= Input::get('pris');
		$item->description 	= Input::get('description');
		$item->product_details 	= nl2br(Input::get('product_det'));
		if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/ovn/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/ovn/' . $filename . '_thumb');
			$item->image = $filename;
		    }
		$item->save();
		$ovn = Ovn::where('id',Input::get('id'))->first();
		if($ovn)
		{
			$name = $ovn->name;
			
		}
		return Redirect::to('/admin/'.$name.'/list')->withSuccess('ny item blev oprettet');
	    }

	}

	public function editOvnItem($name,$id)
	{
		$ovn = Ovn::where('name', $name)->first();
		$item = OvnItem::where('id', $id)->first();
		return View::make('ovn.editOvnItem')->withOvn($ovn)->withItem($item);
	}

	public function posteditOvnItem()
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
			
		
		$item 	= OvnItem::where('id', Input::get('id'))->first();
		
		$item->name 	= Input::get('name');
		$item->pris 	= Input::get('pris');
		$item->description 	= Input::get('description');
		$item->product_details 	= Input::get('product_det');
		if(Input::hasFile('pic'))
			{
			$filename = md5(microtime());

			Image::make(Input::file('pic'))->save(public_path() . '/ovn/' . $filename);
			Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/ovn/' . $filename . '_thumb');
			$item->image = $filename;
		    }
		$item->save();
		
		$item 	= OvnItem::where('id', Input::get('id'))->first();
		$id = $item->ovn_id;
		$ovn = Ovn::where('id', $id)->first();
		
		if($ovn)
		{
			$name = $ovn->name;
			
		}
		return Redirect::to('/admin/'.$name.'/list')->withSuccess('item blev rettet');
	    }

	}

	public function deleteOvnItem($name,$id)
	{
		$ovn = Ovn::where('name', $name)->first();
		$item = OvnItem::where('id', $id)->first();

		if(public_path(). '/ovn/' . $item->image)
		{	
		unlink(public_path(). '/ovn/' . $item->image);
		unlink(public_path(). '/ovn/' . $item->image. '_thumb');
	    }
		OvnItem::destroy($id);
		return Redirect::back()->withSuccess('Ovn Item blev slettet');
	}

	public function createTilbud()
	{
		
		$item = OvnItem::get();
		$accItem = AccItem::get();
		return View::make('ovn.createTilbud')->withAccItem($accItem)->withItem($item);
	}

	public function postCreateTilbud()
	{

		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'nypris' => 'required',
				'start_dato' => 'required',
				'slut_dato' => 'required'
				), $messages);

		if ($validator->fails())
		{
			return Redirect::to('/admin/createTilbud')->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
		$id = Input::get('id');
		$tilbud = new Tilbud;
		$tilbud->item_id = Input::get('id');
		$tilbud->nypris = Input::get('nypris');
		$tilbud->startdato = Input::get('start_dato');
		$tilbud->slutdato = Input::get('slut_dato');
		$tilbud->save();
		return Redirect::to('/admin/listTilbud')->withSuccess('tilbud blev oprettet');
	    }
	}

	public function listTilbud()
	{

		$tilbud = Tilbud::get();
		return View::make('ovn.listTilbud')->withTilbud($tilbud);
	}

	public function editTilbud($id)
	{
		
		$tilbud = Tilbud::where('id', $id)->first();
		$item = OvnItem::where('id', $tilbud->item_id)->first();
		return View::make('ovn.editTilbud')->withTilbud($tilbud)->withItem($item);

	}

	public function postEditTilbud()
	{
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'nypris' => 'required',
				'start_dato' => 'required',
				'slut_dato' => 'required'
				), $messages);

		if ($validator->fails())
		{
			return Redirect::to('/admin/editTilbud/'.$id)->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
		$id = Input::get('id');
		$tilbud = Tilbud::where('id', $id)->first();
		
		$tilbud->nypris = Input::get('nypris');
		$tilbud->startdato = Input::get('start_dato');
		$tilbud->slutdato = Input::get('slut_dato');
		$tilbud->save();
		return Redirect::to('/admin/listTilbud')->withSuccess('tilbud blev rettet');
	    }
	}

	public function deleteTilbud($id)
	{
		Tilbud::destroy($id);
		return Redirect::back()->withSuccess('Tilbud blev slettet');
	}


}