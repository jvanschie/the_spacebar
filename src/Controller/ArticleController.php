<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    public function homepage()
    {
        return new Response('OMG!');
    }

    public function show($slug)
    {
        return new Response(sprintf('Future page to show one article: %s', $slug));
    }
}
