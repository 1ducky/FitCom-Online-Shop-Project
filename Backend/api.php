<?php
require ('FetchHooks/Detail.php');
require ('FetchHooks/category.php');
require ('logic/review/fetch.php');
require ("FetchHooks/myproduct.php");

function Router($rest) {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $cut=strpos($url,'api.php');
    if($cut !== false){
        $sanitize=substr($url,$cut+strlen('api.php'));
    }
    $segment= explode("/", trim($sanitize, "/"));
    $endpoint = $segment[0] ?? null ;

    // Defining Json Content
    header('Content-Type: application/json');

    //Checking Endponint
    if(!$endpoint){
        //No EndPoint
        http_response_code(404);

    }else if ($endpoint && isset($rest[$endpoint])){
        //Do Logic EndPoint
        $method= $segment[1] ?? null;
        $param = $segment[2] ?? null;
        $param=str_replace('-',' ',$param) ?? null;
        [$data,$total,$limit,$offset] = $rest[$endpoint]($method,$param) ?? [null,null,$limit,$offset];


        if($data == null){
            //No Data Found
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => 'Bad request or no data found'
            ]);
            return;
        }
        
        //Send Json Data
        echo json_encode([

            'status' => 'ok',
            'data' => $data,
            'total' => $total,
            'limit' => $limit,
            'offset' => $offset


        ]);
        return;
    };
}

Router([
    "detail" => function ($method=null,$params=null) {
        return @Detail($method,$params);
    },
    "category" => function ( $category=null, $other=null ){
        return @category($category);
    },
    "comment" => function($id=null, $other=null) {
        return @Comment($id);
    },
    "myproduct" => function($id=null, $other=null){
        return @myproduct($id);
    }


])
?>