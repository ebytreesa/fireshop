<?php

class HomeController extends BaseController {

	

	public function index()
	{

		$forside = Forside::first();
		return View::make('index')->withforside($forside);
	}
	public function a()
	{

		
		return "b";
	}
	public function ovne()
	{
		$ovne 	= Ovn::get();
		return View::make('ovne')->withOvne($ovne);
	}

	public function ovnItems($name)
	{

		$ovn = Ovn::where('name',$name)->first();
		if($ovn)
		{
			$name = $ovn->name;
			$id  = $ovn->id;
		}
		$item = OvnItem::where('ovn_id', $id)->get();
		return View::make('ovnItems')->withItem($item)->withOvn($ovn);
	}

	public function showOvnItem($name,$id)
	{
		$ovn = Ovn::where('name', $name)->first();
		$item = OvnItem::where('id', $id)->first();
		return View::make('showOvnItem')->withOvn($ovn)->withItem($item);
	}

	public function Tilbehør()
	{
		$acc 	= Accessory::get();
		return View::make('accessory')->withAcc($acc);
	}

	public function TilbehørItems($name)
	{

		$acc = Accessory::where('name',$name)->first();
		if($acc)
		{
			$name = $acc->name;
			$id  = $acc->id;
		}
		$item = AccItem::where('acc_id', $id)->get();
		return View::make('accItems')->withItem($item)->withAcc($acc);
	}


	public function kontakt()
	{
		return View::make('kontakt');
	}
	
	public function postKontakt()
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
			return Redirect::to('/kontakt')
					->withErrors($validator->messages())
					->withInput(Input::all());
		}else
		{
		

			$kontakt 	= new Kontakt;
			$kontakt->firmanavn	= Input::get('firmanavn');
			$kontakt->kontaktperson	= Input::get('kontaktperson');
			
			$kontakt->phone	= Input::get('phone');
			$kontakt->email	= Input::get('email');
			$kontakt->question	= Input::get('question');
			$kontakt->save();
			return Redirect::to('/')->withSuccess('Dit spørgsmål blev sendt');
		}
	}

	

	public function nyheder()
	{
		// $nyhed = new Nyhed;
		// $nyhed->title = 'aaaaaaaa';
		// $nyhed->description = 'sfajhdlgfdgf';
		// $nyhed->save();

		$nyhed = Nyhed::orderBy('created_at','DESC')->take(3)->get();
		return View::make('nyheder')->withNyhed($nyhed);
	}

	public function advSearch()
	{
		$ovn = Ovn::get();
		$item = OvnItem::get();
		return View::make('advSearch')->withOvn($ovn)->withItem($item);

	}




}
