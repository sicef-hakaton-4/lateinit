<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class BaseModel extends Model
{

    use CustomCarbon;


    public $timestamps = false;

    public $skipMut = false;

    public static $listData = ['id', 'name'];

    public static $listRel = [];

    protected static $dropdownValue = 'id';

    protected static $dropdownName = 'name';

    public static function findBy($key, $value) {
        $query = static::where($key, $value);
        $instance = $query->first();
        return (is_null($instance)) ? false : $instance;
    }

    public static function filterByDate($consts, $column = null) {
        if (is_null($column)) {
            $column = 'date';
        }
        if (is_array($consts)) {
            $consts = collect($consts);
        }
        $query = static::query();
        if ($consts->has('month')) {
            $query->whereMonth($column, '=', $consts['month']);
        }
        else {
            if ($consts->has('startDate')) {
                $query->whereDate($column, '>=', $consts['startDate']);
            }
            if ($consts->has('endDate')) {
                $query->whereDate('date', '<=', $consts['endDate']);
            }
        }
        $query->orderBy($column);
        return $query;
    }

    public function setOriginal($key, $value) {
		$this->skipMut = true;
		$this->{$key} = $value;
		$this->skipMut = false;
	}

    public function skipAllAccessors() {
        $this->skipAccessors = true;
    }

    public static function tableName() {
        return with(new static)->getTable();
    }

    public static function baseCreate($request) {
		if (method_exists(static::class, 'creationValidation')) {
			if (!$static::creationValidation($request)) {
				return JSONResponse(false, 400, 'Invalid data');
			}
		}
		$instance = new static;
		$instance->fill($request->all());
		if (!$instance->save()) {
			return JSONResponse(false, 500, 'Database communication error');
		}
		$message = 'Created succesfully!';
		return JSONResponse(true, 200, $message);
	}

    public static function patchInitialize($id) {
        $selects = with(new static)->getFillable();
        if (property_exists(static::class, 'modalData')) {
            $selects = static::$modalData;
        }
        $key = with(new static)->getKeyName();
        $instance = static::select($selects)->where($key, $id)->first();
        if (!$instance) {
            return JSONResponse(false, 404, 'Not found.');
        }
        $instance->makeVisible($selects);
        $instance->skipAllAccessors();
        return JSONResponse(true, 200, $instance);
    }

	public static function baseUpdate($id, $request) {
		if (method_exists(static::class, 'updateValidation')) {
			if (!static::updateValidation($request)) {
				return JSONResponse(false, 400, 'Invalid data');
			}
		}
		$instance = static::find($id);
		$instance->fill($request->all());
		if (!$instance->save()) {
			return JSONResponse(false, 500, 'Database communication error');
		}
		$message = 'Update completed!';
		return JSONResponse(true, 200, $message);
	}

    public static function loadSingle($id) {
    	if (property_exists(static::class, 'relationships')) {
    		$instance = static::with(static::$relationships)->where('id', $id)->get();
    	}
    	else {
    		$instance = static::find($id);
    	}
    	if (!$instance) {
    		$message = 'Not found';
    		return JSONResponse(false, 404, $message);
    	}
    	$message = 'Instance loaded succesfully!';
    	return JSONResponse(true, 200, $message, $instance);
    }

    public static function loadAll() {
    	$listData = static::$listData;
    	$rels = static::$listRel;
    	$data = static::with($rels)->select($listData)->get();
    	return JSONResponse(true, 200, 'Loaded succesfully', $data);
    }

    public static function baseDelete($id) {
    	$instance = static::find($id);
    	if (!$instance) {
    		return JSONResponse(false, 404, 'Not found.');
    	}
    	if (!$instance->delete()) {
    		return JSONResponse(false, 500, 'Database communication error.');
    	}
    	return JSONResponse(true, 200);
    }

    public static function dropdown($order = null) {
        $value = static::dropValue();
        $name = static::dropName();
        $selects = [$value, $name];
        $query = static::select($selects);
        if (!is_null($order)) {
            $query->orderBy($order['name'], $order['dir']);
        }
        $data = $query->get();
        return JSONResponse(true, 200, $data);
    } 

    public static function dropValue() {
        $value = static::$dropdownValue;
        $value = $value . ' as value';
        return $value;
    }

    public static function dropName() {
        $name = static::$dropdownName;
        $name = $name . ' as name';
        return $name;
    }
}
