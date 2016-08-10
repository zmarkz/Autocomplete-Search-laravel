<?php

class HomeController extends BaseController {

	public function getItems($parentID){
		$input = Input::all();
		$query = $input["query"];
		$parentIDs = array();
		$categoryIDValidator = Validator::make(
			array(
				'categoryID' => $parentID
			),
			array(
				'categoryID' => array('required', 'numeric')
			)
		);
		if(!$categoryIDValidator->fails()){
			array_push($parentIDs, $parentID);
		}
		$parents = $this->getAllChildrens($parentIDs);
		$items = Items::select('name')->where('name','LIKE','%'.$query.'%')->whereIn('parentID', $parents)->get();
		$itemsArray = array();

		foreach ($items as $item){
			array_push($itemsArray, array("label"=>$item->name,"value"=>$item->name));
		}
		$result = Response::json($itemsArray);
		return $result;
	}

	public function getAllChildrens($categoryIDs){
		$nexteLevelChildren = Categories::select('id')->whereIn('parentID',$categoryIDs)->get();
		$childrens = array();
		foreach ($nexteLevelChildren as $child){
			array_push($childrens, $child->id);
		}
		if(sizeof($childrens) == 0){
			return array_merge($categoryIDs);
		}else{
			return array_merge($categoryIDs,$this->getAllChildrens($childrens));
		}
	}

	public function getCategories(){
		$input = Input::all();
		$query = $input["query"];
//		$items = DB::select(DB::raw('select name,id from categories WHERE NAME  LIKE "%'.$query.'%"'));

		$items = Categories::select('name','id')->where('name','LIKE','%'.$query.'%')->get();
		$itemsArray = array();

		foreach ($items as $item){
			array_push($itemsArray, array("label"=>$item->name,"value"=>$item->name,"id"=>$item->id));
		}
		$result = Response::json($itemsArray);
		return $result;
	}

}
