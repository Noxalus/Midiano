<?php

namespace AppBundle\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Translation\TranslatorInterface;


class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface
{
    protected $router;
    protected $userManager;
    protected $serviceContainer;
    protected $translator;

    public function __construct(RouterInterface $router, $userManager, $serviceContainer, TranslatorInterface $translator)
    {
        $this->router = $router;
        $this->userManager = $userManager;
        $this->serviceContainer = $serviceContainer;
        $this->translator = $translator;

    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token) 
    {
        if ($request->isXmlHttpRequest()) 
        {
            $result = array('success' => true);
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }
        else
        {
            // Create a flash message with the authentication error message
            //$request->getSession()->getFlashBag()->set('error', $exception->getMessage());
            $url = $this->router->generate('fos_user_security_login');

            return new RedirectResponse($url);
        }

        return new RedirectResponse($this->router->generate('anag_new')); 
    }

	public function onAuthenticationFailure(Request $request, AuthenticationException $exception) 
	{
	    $result = array(
	        'success' => false, 
	        'function' => 'onAuthenticationFailure', 
	        'error' => true, 
	        'message' => $this->translator->trans($exception->getMessage(), array(), 'FOSUserBundle')
	    );

	    $response = new Response(json_encode($result));
	    $response->headers->set('Content-Type', 'application/json');

	    return $response;
	}
}