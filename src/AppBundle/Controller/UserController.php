<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('login_check'))
            ->add('username', TextType::class, ['required' => false])
            ->add('password', PasswordType::class, ['required' => false])
            ->add('login', SubmitType::class)
            ->getForm();

        return $this->render(
            'user/login.html.twig',
            ['form' => $form->createView()]
        );
    }
}
