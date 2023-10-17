<?php
    require_once('init_db.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            $result = get_users($pdo);

            header('Content-type: application/json');
            exit(json_encode($result));
        
        case 'POST':
            http_response_code(501); // à implémenter
            exit(-1); 
    }

    