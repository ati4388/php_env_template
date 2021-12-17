<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// app.get('/',(req,res)=>{
//     res.send('meryem');
// });

$app->get('/user', function (Request $request, Response $response, $args) {
    $db = new PostgresDao();

    try {
        $baglanti = $db->connect();


        $stmt = $baglanti->prepare("SELECT * FROM unvanlar");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $payload = json_encode($data);
        $response
                ->withStatus(200)
                ->withHeader('Content-Type', 'application/json');
        $response->getBody()->write($payload);
        return $response;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // $returnValue ="";
        // foreach ($data as $row) {
        //     $returnValue .= $row['pergemunvanid'];
        //     $returnValue .= "\t";
        //     $returnValue .= $row['pergemunvanadi'];
        //     $returnValue .="<br />\n";
        // }
        //
        // $baglanti = null;
        //
        // $response->getBody()->write($returnValue);
        return $response;
    } catch (PDOException $e) {
        $data =  array(
            "error"=> array(
            "text" => $e->getMessage(),
            "code" =>$e->getCode()
            )
        );
        $db = null;
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
});

$app->get('/user/{mis}', function (Request $request, Response $response, $args) {
    $db = new PostgresDao();

    try {
        //$mis = $request->getAttribute("mis");
        $mis = $args['mis'];

        $baglanti = $db->connect();


        $stmt = $baglanti->prepare("SELECT * FROM unvanlar where mis =:mis");
        $stmt->execute(['mis' =>$mis]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $payload = json_encode($data);
        $response
                ->withStatus(200)
                ->withHeader('Content-Type', 'application/json');
        $response->getBody()->write($payload);
        return $response;

        return $response;
    } catch (PDOException $e) {
        $data =  array(
            "error"=> array(
            "text" => $e->getMessage(),
            "code" =>$e->getCode()
            )
        );
        $db = null;
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
});

$app->get('/unvan', function (Request $request, Response $response, $args) {
    $db = new PostgresDao();

    try {
        //$mis = $request->getAttribute("mis");
        $mis = $args['mis'];

        $baglanti = $db->connect();


        $stmt = $baglanti->prepare("SELECT * FROM unvanlar");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $payload = json_encode($data);
        $response
                ->withStatus(200)
                ->withHeader('Content-Type', 'application/json');
        $response->getBody()->write($payload);
        return $response;

        return $response;
    } catch (PDOException $e) {
        $data =  array(
            "error"=> array(
            "text" => $e->getMessage(),
            "code" =>$e->getCode()
            )
        );
        $db = null;
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
});
