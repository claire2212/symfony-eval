<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Publication;
use AppBundle\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppController
 * @package AppBundle\Controller
 */
class AppController extends Controller
{
    /**
     * Home page action.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('AppBundle:Publication')->findBy([], ['publishedAt' => 'DESC']);

        return $this->render('AppBundle:App:home.html.twig', array(
            'publications' => $publications,

        ));

    }

    public function publicationAction(Request $request)
    {
        $publication = new Publication();
        $form = $this->createForm('AppBundle\Form\PublicationType', $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush($publication);

            return $this->redirectToRoute('app_home');
        }

        return $this->render('AppBundle:App:publication.html.twig', array(
            'publication' => $publication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a publication entity.
     *
     */
    public function showAction(Publication $publication)
    {
        $deleteForm = $this->createDeleteForm($publication);

        return $this->render('AppBundle:App:show.html.twig', array(
            'publication' => $publication,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
