<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 17:20
 */


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'Question/index');
    $r->addRoute('GET', '/admin', 'Admin/index');
    $r->addRoute('GET', '/login', 'Login/login');
    $r->addRoute('POST', '/postlogin', 'Login/postlogin');
    $r->addRoute('GET', '/mentions', 'Question/mentions_legales');
    $r->addRoute('GET', '/resultat/{id:\d+}', 'Resultat/validateToken');
    $r->addRoute('GET', '/quizz', 'Admin/introQuizz');
    $r->addRoute('POST', '/mail', 'Mail/mail');
    $r->addRoute('GET', '/mail', 'Mail/mail');
    $r->addRoute('GET', '/questions', 'Question/randomQuizz');
    $r->addRoute('POST', '/validateMail', 'Mail/validateMail');
    $r->addRoute('GET', '/sendMail', 'Mail/sendMail');
    $r->addRoute('POST', '/addQuestionAdmin', 'Admin/addQuestionAdmin');
    $r->addRoute('POST', '/exportsvg', 'Admin/exportsvg');
    $r->addRoute('POST', '/modifIntro', 'Admin/modifIntro');
    $r->addRoute('POST', '/gestionQuest', 'Admin/gestionQuest');
    $r->addRoute('GET', '/deconnexion', 'Admin/deconnexion');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("/", $handler, 2);
        $class = APP_CONTROLLER_NAMESPACE . $class . APP_CONTROLLER_SUFFIX;
        echo call_user_func_array(array(new $class, $method), $vars);
        break;
}
