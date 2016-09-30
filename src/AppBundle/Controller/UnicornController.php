<?php

declare(strict_types = 1);

namespace AppBundle\Controller;

use AppBundle\Form\Type\UnicornSearchType;
use RulerZ\Spec\AndX;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UnicornController extends Controller
{
    public function searchAction(Request $request)
    {
        $results = [];
        $form = $this->createForm(UnicornSearchType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $spec = new AndX((array) $form->getData());
            $results = $this->get('app.unicorn_repository')->matchSpec($spec);
        }

        return $this->render('unicorn/search.html.twig', [
            'form' => $form->createView(),
            'results' => $results,
        ]);
    }
}
