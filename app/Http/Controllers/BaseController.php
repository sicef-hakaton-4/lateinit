<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function fullModelName($name) {
		$name = '\App\\' . ucfirst($name);
		return $name;
	}

    public function create($model, Request $request) {
    	$model = $this->fullModelName($model);
    	return $model::baseCreate($request);
    }

    public function readAll($model) {
    	$model = $this->fullModelName($model);
    	return $model::loadAll();
    }

    public function readSingle($model, $id) {
    	$model = $this->fullModelName($model);
    	return $model::loadSingle($id);
    }

    public function update($model, $id, Request $request) {
    	$model = $this->fullModelName($model);
    	return $model::baseUpdate($id, $request);
    }

    public function initializePatch($model, $id) {
        $model = $this->fullModelName($model);
        return $model::patchInitialize($id);
    }

    public function delete($model, $id) {
    	$model = $this->fullModelName($model);
    	return $model::baseDelete($id);
    }

    public function dropdown($class) {
        $model = $this->fullModelName($class);
        return $model::dropdown();
    }

    public function test() {
        echo with(new \App\BaseModel)->dayToString(0);
    }
    
}
