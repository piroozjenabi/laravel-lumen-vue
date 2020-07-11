<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->get('/', function () use ($router) {
    $input = request()->input();
    $count = $input['count'] ?? 0;
    $out = [];
    $time = 0;

    if (!$count || $count == null || $count == 'null') {
        $out = ['status' => false, 'msg' => 'Count is wrong!', 'data' => []];
    } elseif (!is_numeric($count)) {
        $out = ['status' => false, 'msg' => 'Count  must be numeric', 'data' => []];
    } elseif ($count <= 0 || $count > 150000) {
        $out = ['status' => false, 'msg' => 'count must biger than 0 and less than 150000', 'data' => []];
    } else {
        $uniqNumbers = App\Uniq::generateUniq($count);

        $out = $uniqNumbers[0] == false
        ? ['status' => false, 'msg' => $uniqNumbers[1], 'data' => []]
        : ['status' => true, 'msg' => $uniqNumbers[1], 'data' => [$uniqNumbers[2]]];
    }

    return response()->json($out);
});
