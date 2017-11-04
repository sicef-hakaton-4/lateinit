<?php



function JSONResponse($outcome, $code, $message, $entity = null) {
	$response['message'] = $message;
	if (!is_null($entity)) {
		$response['entity'] = $entity;
	}
	return response()->json($response, $code);
}