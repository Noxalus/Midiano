<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use JMS\SecurityExtraBundle\Annotation\Secure;
use AppBundle\Entity\Music as Music;
use AppBundle\Form\Type\MusicType as MusicType;
use AppBundle\Entity\MusicArrangement as MusicArrangement;
use AppBundle\Form\Type\MusicArrangementType as MusicArrangementType;
use AppBundle\Entity\MidiFile as MidiFile;
use AppBundle\Form\Type\MidiFileType as MidiFileType;
use AppBundle\Entity\ScoreFile as ScoreFile;
use AppBundle\Form\Type\ScoreFileType as ScoreFileType;
use AppBundle\Entity\Composer as Composer;
use AppBundle\Form\Type\ComposerType as ComposerType;
use AppBundle\Entity\FamousBy;
use AppBundle\Form\Type\FamousByType;
use AppBundle\Entity\MusicGenre;
use AppBundle\Form\Type\MusicGenreType;

class MusicsController extends Controller
{
    /**
     * @Route("/musics/list")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()
           ->getManager()
           ->getRepository('AppBundle:MusicArrangement');
             
        $musicArrangements = $repository->findAll();

        return $this->render('musics/list.html.twig', array(
            'music_arrangements' => $musicArrangements
        ));
    }

    /**
     * @Route("/musics/{id}/detail", requirements={"id": "\d+"})
     */
    public function detailAction($id)
    {
        $repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('AppBundle:MusicArrangement');
             
        $musicArrangement = $repository->find($id);

        return $this->render('musics/detail.html.twig', array(
            'id' => $id,
            'music_arrangement' => $musicArrangement
        ));
    }

    /**
     * @Route("/musics/add")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addAction(Request $request)
    {
        $music = new MusicArrangement();

        $form = $this->createForm(new MusicArrangementType(), $music);
        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $user = $this->get('security.context')->getToken()->getUser();
            $music->setUploader($user);

            // TODO: If $music->getMusic() already exists in the database, we get its id

            // ... perform some action, such as saving the task to the database
            $em = $this->getDoctrine()->getManager();
            $em->persist($music);
            $em->flush();

            $session = $this->get("session");
            $session->getFlashBag()->add(
                'success',
                'New arrangement for "' . $music->getMusic()->getTitle() . '" successfully added to the database!'
            );
        }

        return $this->render('musics/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/composers/add")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addComposerAction(Request $request)
    {
        $composer = new Composer();

        $form = $this->createForm(new ComposerType(), $composer);
        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $composerExists = $this->getDoctrine()
                ->getRepository('AppBundle:Composer')
                ->findOneBy(array('name' => $composer->getName()));

            $session = $this->get("session");

            if (!$composerExists)
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($composer);
                $em->flush();

                $session->getFlashBag()->add(
                    'success',
                    '"' . $composer->getName() . '" successfully added to the database!'
                );
            }
            else
            {
                $session->getFlashBag()->add(
                    'error',
                    '"' . $composer->getName() . '" already exists into the database!'
                );
            }
        }

        return $this->render('composers/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/famous-by/add")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addFamousByAction(Request $request)
    {
        $famousBy = new FamousBy();

        $form = $this->createForm(new FamousByType(), $famousBy);
        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $exists = $this->getDoctrine()
                ->getRepository('AppBundle:FamousBy')
                ->findOneBy(array('name' => $famousBy->getName()));

            $session = $this->get("session");

            if (!$exists)
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($famousBy);
                $em->flush();

                $session->getFlashBag()->add(
                    'success',
                    '"' . $famousBy->getName() . '" successfully added to the database!'
                );
            }
            else
            {
                $session->getFlashBag()->add(
                    'error',
                    '"' . $famousBy->getName() . '" already exists into the database!'
                );
            }
        }

        return $this->render('famous-by/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/music-genre/add")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addMusicGenreAction(Request $request)
    {
        $musicGenre = new MusicGenre();

        $form = $this->createForm(new MusicGenreType(), $musicGenre);
        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $exists = $this->getDoctrine()
                ->getRepository('AppBundle:MusicGenre')
                ->findOneBy(array('name' => $musicGenre->getName()));

            $session = $this->get("session");

            if (!$exists)
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($musicGenre);
                $em->flush();

                $session->getFlashBag()->add(
                    'notice',
                    '"' . $musicGenre->getName() . '" successfully added to the database!'
                );
            }
            else
            {
                $session->getFlashBag()->add(
                    'error',
                    '"' . $musicGenre->getName() . '" already exists into the database!'
                );
            }
        }

        return $this->render('genre/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/musics/{id}/edit", requirements={"id": "\d+"})
     */
    public function editAction($id)
    {
        return $this->render('musics/edit.html.twig', array(
            'id' => $id
        ));
    }
}