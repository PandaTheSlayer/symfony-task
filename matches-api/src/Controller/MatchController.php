<?php

namespace App\Controller;

use App\Entity\League;
use App\Entity\Match;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchController extends AbstractController
{
    /**
     * @Route("/match", name="match")
     * @param EntityManagerInterface $entityManager
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $league = new League();
        $league->setTitle("first league");
        $league->setDescription("description");

        $match = new Match();
        $match->setType("football");
        $match->setLeague($league);
        $match->setFirstTeam("first command");
        $match->setSecondTeam("second command");
        $match->setSource("data.com");
        $match->setStartAt(new \DateTime());

        $entityManager->persist($league);
        $entityManager->persist($match);

        $entityManager->flush();

        return new Response('Saved new match');
    }
}
