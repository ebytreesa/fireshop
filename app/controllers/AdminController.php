<?php

class AdminController extends BaseController {

	public function login()
	{
		return View::make('admin.login');
	}

	public function postLogin()
	{
		$rules = array(
				'username' => 'required',
				'password' => 'required'
				);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails())
			{
				return Redirect::to('/login')->withError('login failed');
			}else
			{
				$userdata = array(
					'username' => Input::get('username'),
					'password' => Input::get('password')
					);
				if(Auth::attempt($userdata))
				{
				return Redirect::to('/admin/editForside')->withSuccess('You are now logged in');
			    }else
			    {
				return Redirect::to('/admin')->withError('username or password invalid');
			   }
				
			}
	}

	public function logout()
		{
			Auth::logout();
			return Redirect::to('/admin')->withSuccess('you are logged out');
		}


	public function retForside()
	{
		$forside 	= Forside::first();
		return View::make('admin.editForside')->withForside($forside);
	}

	public function postRetForside()
	{
		
		$messages = array(
			'required' => ':attribute feltet skal udfyldes',
			'image' => 'du skal vælg en billedefil'
			);

		$validator = Validator::make(Input::All(),
			array(
				'description' => 'required',
				'pic' => 'image'), $messages);

		if ($validator->fails())
		{
			return Redirect::to('/admin/editForside')->withErrors($validator->messages())->withInput(Input::all());
		}else
		{
			$forside = Forside::first();	
			$forside->description = Input::get('description');
			if(Input::hasFile('pic'))
			{
				$filename = md5(microtime());
				Image::make(Input::file('pic'))->save(public_path() . '/img/' . $filename);
			 Image::make(input::file('pic'))->resize(120,120)->save(public_path() . '/img/' . $filename . '_thumb');
			 $forside->image = $filename;

			}
			$forside->save();
			return Redirect::to('admin/editForside')->withSuccess('forsiden blev rettet');
		}
	}


	public function listKontakt()
	{
		$kontakt = Kontakt::get();
		return View::make('admin.listKontakt')->withKontakt($kontakt);
	}

	public function createNyhed()
	{
		return View::make('admin.createNyhed');
	}

	
	public function postCreateNyhed()
	{

		$messages	= array('required'	=> ':attribute feltet skal udfyldes');	
			
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'description' => 'required'			
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/admin/createNyhed')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
		$nyhed = new Nyhed;
		$nyhed->title = Input::get('title');
		$nyhed->description = Input::get('description');
		$nyhed->save();
		return Redirect::to('/admin/listNyheder')->withSuccess('nyhed blev oprettet');
	    }
	}

	public function listNyheder()
	{
		$nyheder = Nyhed::get();
		return View::make('admin.listNyheder')->withNyheder($nyheder);
	}

	public function editNyhed($id)
	{
		$nyhed 	= Nyhed::where('id', $id)->first();
		return View::make('admin.editNyhed')->withNyhed($nyhed);

	}

	public function postEditNyhed()
	{ 
	   $id = Input::get('id');

		$messages	= array('required'	=> ':attribute feltet skal udfyldes');	
			
		$validator	= Validator::make(Input::All(), array(
			'title' => 'required',
			'description' => 'required'			
			), $messages);
		if ($validator->fails())
		{ 
			return Redirect::to('/admin/editNyhed/' .$id)
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{

			$nyhed 	= Nyhed::where('id', $id)->first();
			$nyhed->title = Input::get('title');
			$nyhed->description = Input::get('description');
			$nyhed->save();
			return Redirect::to('/admin/listNyheder')->withSuccess('nyhed blev rettet');
	    }
	}

	public function deleteNyhed($id)
	{
		Nyhed::destroy($id);
		return Redirect::back()->withSuccess('Nyhed blev slettet');

	}


	public function editKontakt($id)
	{
		$kontakt = Kontakt::where('id', $id)->first();
		return View::make('admin.editKontakt')->withKontakt($kontakt);
	}

	public function postEditKontakt()
	{
		$messages	= array(
			'required'	=> ':attribute feltet skal udfyldes',
			'email'	=> 'skriv en gyldig email adresse',
			
			'min'	=> ':attribute feltet skal være min 6 tegn'
			);
		$validator	= Validator::make(Input::All(), array(
			'firmanavn' => 'required',
			'kontaktperson' => 'required',
			
			'phone' => 'required|min:6',
			'email'	=> 'required|email',
			'question' => 'required'
			), $messages);
		if ($validator->fails())
		{
			return Redirect::to('/admin/editKontakt/'.$id)
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
		

			$kontakt 	=  Kontakt::where('id', Input::get('id'))->first();
			$kontakt->firmanavn	= Input::get('firmanavn');
			$kontakt->kontaktperson	= Input::get('kontaktperson');
			
			$kontakt->phone	= Input::get('phone');
			$kontakt->email	= Input::get('email');
			$kontakt->question	= Input::get('question');
			$kontakt->save();
			return Redirect::to('/admin/listKontakt')->withSuccess('kontakt er rettet');
		}
	}

	public function postSearch()
	{ 
		$q = Input::get('search');
		$results = OvnItem::where('description', 'like', '%'.$q.'%')
							->orWhere('name', 'like', '%'.$q.'%')->get();	
		
		if(count($results) == 0)
		{
			return View::make('noResult');
			
	    }else
	    {
	    	return View::make('searchResults')->withResults($results);
	    }
	}

	public function postAdvSearch()
	{
		$q = Input::get('search');
		$maxpris = Input::get('pris');
		$ovn = Input::get('ovn');
		$item = Input::get('item');
		$result = DB::table('ovn_items')
					->join('ovne','ovne.id', '=', 'ovn_items.ovn_id')
					->select('ovn_items.*', 'ovne.name as ovn_name');


		if(Input::has('ovn'))
		{
			$result->where('ovn_name','like', '%'.$ovn.'%');
		}
		if(Input::has('item'))
		{
			$result->where('name','like', '%'.$item.'%');
		}

		if(Input::has('pris'))
		{
			$result->whereBetween('pris',[0,$maxpris]);
		}

		if(Input::has('search'))
		{
			$result->where('name','like', '%'.$q.'%');
		}
		
		$result->get(); 

		if(count($result) == 0)
		{
			return View::make('noResult');
			
	    }else
	    {
	    	return View::make('searchResults')->withResults($result);
	    }
		
	}
}