<?php

    // Creating routes

    // Psr-7 Request and Response interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;



    // HOME ROUTE
    // 
    $app->get('/', function (Request $request, Response $response, $args)   {

        $vars = [
            'page' => [
            'title' => 'Welcome - Alpha Inc.',
            'description' => 'Welcome to the official page of Alpha Inc.'
            ],
        ];  


        return $this->view->render($response, 'login.twig', $vars);

    })->setName('home');

$app->post('/', function($request, $response, $args){
    $uname = $request->getParam('uname');
    $password = $request->getParam('password');
    if(empty($uname) || (empty($password))){
        echo 'Username / Password is required';
    }else{
        $dbhandler = $this->db;
        $queryUsers = $dbhandler->prepare(" SELECT * FROM registration where username='".$uname."' and password='".$password."' ");
        $queryUsers->execute();
        $result = array(); 
        while ($row = $queryUsers->fetch(\PDO::FETCH_ASSOC)) { 
            $result[] = array($row['user_id'], $row['name']); 
        } 
        if(count($result)>0){
           echo 'success';
        }else{
             echo 'Invalid Username/Password !';
        }
    }
    
    return $this->view->render($response, 'login.twig');
})->setName('login');   


 

  


