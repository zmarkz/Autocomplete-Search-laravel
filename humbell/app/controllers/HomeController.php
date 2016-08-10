<?php

class HomeController extends BaseController {

	public function getItems($parentID){
		$input = Input::all();
		$query = $input["q"];
		$items = DB::select(DB::raw('select name from items WHERE NAME  LIKE "%'.$query.'%"'));
		$itemsArray = array();

		foreach ($items as $item){
			array_push($itemsArray, array("label"=>$item->name,"value"=>$item->name));
		}
		$result = Response::json($itemsArray);
		return $result;
	}

	function getAllChildrens($categoryID){
		$nexteLevelChildren = Categories::select('id','level')->where('parentID','=',$categoryID)->get();
		if(!$nexteLevelChildren){
			return array($categoryID);
		}else{
			$nexteLevelChildren[0]->level;	//max level can be 2
			
		}
	}

	public function getCategories(){
		$input = Input::all();
		$query = $input["q"];
		$items = DB::select(DB::raw('select name,id from categories WHERE NAME  LIKE "%'.$query.'%"'));
		$itemsArray = array();

		foreach ($items as $item){
			array_push($itemsArray, array("label"=>$item->name,"value"=>$item->name,"id"=>$item->id));
		}
		$result = Response::json($itemsArray);
		return $result;
	}

}
