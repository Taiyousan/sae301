<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);

$request = Request::createFromGlobals();

// Ajoute un middleware CORS
$response = new Response();
$response->headers->set('Access-Control-Allow-Origin', '*');
if ($request->getMethod() === 'OPTIONS') {
    $response->headers->set('Access-Control-Allow-Methods', 'GET');
    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
    $response->setStatusCode(204);
    return $response;
}

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
