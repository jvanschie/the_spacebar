<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    public function homepage()
    {
        return new Response('OMG!');
    }

    public function show($slug)
    {
        $comments = [
            'This is awesome!',
            'So good!',
            'This is a never ending story.'
        ];

        return $this->render(
            'article/show.html.twig',
            [
                'title' => ucwords(str_replace('-', ' ', $slug)),
                'comments' => $comments
            ]
        );
    }
}
