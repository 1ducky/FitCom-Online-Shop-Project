<?php
require ('FetchHooks/Detail.php');
require ('FetchHooks/category.php');

function Router($rest) {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $cut=strpos($url,'api.php');
    if($cut !== false){
        $sanitize=substr($url,$cut+strlen('api.php'));
    }
    $segment= explode("/", trim($sanitize, "/"));
    
    
    $endpoint = $segment[0] ?? null ;

    header('Content-Type: application/json');
    
    if(!$endpoint){
        http_response_code(404);

    }else if ($endpoint && isset($rest[$endpoint])){
        $method= $segment[1] ?? null;
        $param=$segment[2] ?? null;
        $data = $rest[$endpoint]($method,$param) ;
        foreach ($data as &$row) {
            if (isset($row['gambar'])) {
                $row['gambar'] = base64_encode($row['gambar']) ?? 'Tidak ada data gambar';
            }
        }

        if($data == null){
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => 'Bad request or no data found'
            ]);
            return;
        }

        echo json_encode([

            'status' => 'ok',
            'data' => $data
        ]);
        return;
    };
}

Router([
    "detail" => function ($method=null,$params=null) {
        return Detail($method,$params);
    },
    "category" => function ( $category=null, $other=null ){
        return category($category);
    },


])
?>