<?php

namespace App\Controllers;

use App\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;

class SiteController extends Controller
{
    public function home($request, $response, $args)
    {
        $message = $args['message'];

        if ($message == 'submitted') {
            $message = 'Thanks for submitting your email.  We\'ll be in touch soon!';
        }

        return $this->c->view->render($response, 'home.twig', compact('message'));
    }

    public function about($request, $response, $args)
    {
        return $this->c->view->render($response, 'about.twig');
    }

    public function beers($request, $response, $args)
    {
        return $this->c->view->render($response, 'beers.twig');
    }

    public function swag($request, $response, $args)
    {
        return $this->c->view->render($response, 'swag.twig');
    }

    public function news($request, $response, $args)
    {
        //
    }

    public function contact($request, $response, $args)
    {
        return $this->c->view->render($response, 'contact.twig');
    }

    public function post($request, $response, $args)
    {
        $name = $request->getParam('name');
        $email = $request->getParam('email');

        $statement = $this->c->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);

        $statement->execute();

        return $response->withRedirect($this->c->router->pathFor('home', [
            'message' => 'submitted',
        ]));
    }
}
