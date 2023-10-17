<?php
    require_once('init_db.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            $result = get_users($pdo);

            header('Content-type: application/json');
            exit(json_encode($result));
        
        case 'POST':
            $name=$_POST['name'];
            $mail=$_POST['mail'];
            $user=create_user($name, $mail);
            
            http_response_code(201);
            header('Content-type: application/json');
            exit(json_encode($user));

        case 'PUT':    
            $put_data = file_get_contents("php://input");
            $put_data_array = json_decode($put_data, true);

            if (isset($put_data_array['id'], $put_data_array['name'], $put_data_array['email'])) {
                $id = $put_data_array['id'];
                $name = $put_data_array['name'];
                $email = $put_data_array['email'];
                $updated_user = update_user($id, $name, $email);

                if ($updated_user) {
                    http_response_code(201);
                    header('Content-type: application/json');
                    exit(json_encode($updated_user));
                } 
                else 
                    http_response_code(500);
                    exit(json_encode(["message"=>"Erreur lors de la mise à jour de l'utilisateur."]));
                }            
    }