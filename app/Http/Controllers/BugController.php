<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bug;
use App\Models\User;
class BugController extends Controller {
	public function __construct(){
		$this->middleware('auth',['only' =>
		'store',
		'update'
	]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
    return Bug::all();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
		$bug = Bug::findOrFail($id);
		return view('bugs/show',[
			'bug' => $bug
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
    return view('bugs/create',[
			'users' => User::all()
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// return $request->all();
		$request->validate([
	    'title' => 'required|max:1000',
	    'description' => 'max:5000'
		]);
		$bug = new Bug();
		$bug->fill($request->all());
		if ($bug->save()) {
			return redirect()->action('BugController@show',['id' => $bug->id]);
		}else{
			abort(403,'Could not save new bug.');
		}
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
    return 'edit' . $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
    return 'update';
	}

}
