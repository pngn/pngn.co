<?php namespace PNGN\Http\Controllers;

use PNGN\Contracts\Shortener;
use PNGN\Http\Requests;
use PNGN\Http\Controllers\Controller;
use PNGN\Http\Requests\StoreLinkRequest;
use PNGN\Link;
use PNGN\Exceptions\SelfShortenException;
use Illuminate\Http\Request;

class LinksController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show', 'create', 'store']]);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(View $view)
	{
		return $view->make('home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Shortener $shortener, StoreLinkRequest $request)
	{
		try
		{
			$hash = $shortener->make($request);
		}
		catch (SelfShortenException $e)
		{
			return redirect()->home()->withErrors(['I can\'t shorten a link I\'ve already shortend :)']);
		}

		//Redirect with Success
		$url = route('hash', ['hash' => $hash]);

		return redirect()->home()->with([
			'flash_message'	=> "Here you go! <a href='$url'>$url</a>",
			'hashed'		=> $hash
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Link $link)
	{
		return redirect()->away($link->url);
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
