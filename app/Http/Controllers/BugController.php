<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bug;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
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
		$bugs = Bug::all();
		return view('bugs/index',[
			'bugs' => $bugs
		]);
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
			'users' => User::all(),
			'bug' => new Bug()
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
			$this->_saveTags($request->tags, $bug);
			return redirect()->action('BugController@show',['id' => $bug->id]);
		}else{
			abort(403,'Could not save new bug.');
		}
	}

	private function _saveTags($tagNames, &$bug){
		if (empty($tagNames)) {
			# code...
			$bug->tags()->detach();
			return;
		}
		$newTags = [];
		$tagIds = [];
		// get all tags from db
		// if doesnt exist, create it
		// save the ids for bug sync
		foreach ($tagNames as $key => $tagName) {
			$tag = Tag::where('name','LIKE',$tagName)->first();
			if (!$tag) {
				$tag = new Tag();
				$tag->name = $tagName;
				$tag->saveOrFail();

			}
			$tagIds[] = $tag->id;
		}
		return $bug->tags()->sync($tagIds);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$bug = Bug::findOrFail($id);
		return view('bugs/edit',[
			'bug' => $bug,
			'users' => User::all()
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$bug = Bug::findOrFail($id);
		$bug->fill($request->all());
		if ($bug->save()) {
			$this->_saveTags($request->tags, $bug);
			return redirect()->action('BugController@show',['id' => $bug->id]);
		}else{
			abort(403,'Could not save bug.');
		}
	}

}
