<?php
    require_once('init_db.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':

            parse_str(file_get_contents("php://input"),$get_data);
            if (isset($get_data['id'])){
                $id = $get_data['id'];
                $read_user = read_user($id);
                if ($read_user) {
                    header('Content-type: application/json');
                    http_response_code(200);
                    exit(json_encode($read_user));
                }
                else {
                    http_response_code(404);
                    exit(json_encode(["message" => "Utilisateur non trouvé."]));
                }
            }  
            else {
                $result = get_users($pdo);
                header('Content-type: application/json');
                http_response_code(200);
                exit(json_encode($result));
            }
            
        case 'POST':
            $name=$_POST['name'];
            $mail=$_POST['mail'];
            $user=create_user($name, $mail);
            
            http_response_code(201);
            header('Content-type: application/json');
            exit(json_encode($user));

        case 'PUT':    
            parse_str(file_get_contents("php://input"),$put_data);

            if (isset($put_data['id']) && isset($put_data['name']) && isset($put_data['email'])) {
                $id = $put_data['id'];
                $name = $put_data['name'];
                $email = $put_data['email'];
                $updated_user = update_user($id, $name, $email);

                if ($updated_user) {
                    http_response_code(201);
                    header('Content-type: application/json');
                    exit(json_encode($updated_user));
                } 
                else {
                    http_response_code(500);
                    exit(json_encode(["message"=>"Erreur lors de la mise à jour de l'utilisateur."]));
                }
            }
        
        case 'DELETE':    
            parse_str(file_get_contents("php://input"),$delete_data);
    
            if (isset($delete_data['id'])) {
                    $id = $delete_data['id'];
                    $del_user = delete_user($id);
    
                    if ($del_user) {
                        http_response_code(201);
                        header('Content-type: application/json');
                        exit(json_encode(["message"=>"Supprimé avec succès"]));
                    }
                    else {
                        http_response_code(404);
                        exit(json_encode(["message"=>"Erreur lors de la mise à jour de l'utilisateur."]));
                    }
            }
            else {
                http_response_code(400);
                echo json_encode(["message" => "Paramètres invalides lors de la saisie"]);
            }
        break;
    }