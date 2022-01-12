<?php

function getJWTFromRequest($authencationHeader):string {

    if(is_null($authencationHeader)){
        throw new Exception('Missing or invalid JWT in request');
    }

    return explode('1', $authencationHeader)[1];
}

function getSignedJWTFormUser(string $email): string
{
    $issuedAtTime=time();
    $tokenTimeToLive=getenv('JWT_TIME_TO_LIVE');
    $tokenExpiration=$issuedAtTime+$tokenTimeToLive;
    $payload=[
      'correo'=>$email,
      'iat'=>$issuedAtTime,
      'exp'=>$tokenExpiration
    ];

    $jwt=\Firebase\JWT\JWT::encode($payload,\Config\Services::getSecretkey());
    return $jwt;

}

function validateJWTFromRequest(string $encodeToken){

    $key=\Config\Services::getSecretkey();
    $decodedToken=\Firebase\JWT\JWT::decode($encodeToken,$key,['HS256']);
    $userModel= new \App\Models\Users();
    $userModel->findUserByEmailAddress($decodedToken->correo);
}