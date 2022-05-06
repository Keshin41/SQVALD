<?php

namespace App\Controller;


use App\Entity\CategoryDonnees;
use App\Entity\CategoryNews;
use App\Entity\Document;
use App\Entity\Event;
use App\Entity\Partner;
use App\Entity\News;
use App\Repository\CategoryDonneesRepository;

use App\Repository\CategoryNewsRepository;
use App\Repository\DocumentRepository;
use App\Repository\NewsRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{

	private $repoDocumentType;
	private $repoCategoryDoc;
	private $repoCategoryNews;
	private $repoNewsType;
	private $entityManager;


	public function __construct(DocumentRepository        $repoDocumentType,
								CategoryDonneesRepository $repoCategoryDoc,
								CategoryNewsRepository    $repoCategoryNews,
								NewsRepository            $repoNewsType, EntityManagerInterface $entityManager)
	{
		$this->repoDocumentType = $repoDocumentType;
		$this->repoCategoryDoc = $repoCategoryDoc;
		$this->repoCategoryNews = $repoCategoryNews;
		$this->repoNewsType = $repoNewsType;
		$this->entityManager = $entityManager;

	}

	/**
	 * @Route("/", name="home")
	 */
	public function index(): Response
	{

		$documents = $this->entityManager->getRepository(Document::class)->findBy(['isActive' => true], ['createdAt' => 'DESC'], 2);

		$news = $this->entityManager->getRepository(News::class)->findBy(['isActive' => true], ['createdAt' => 'DESC'], 3);

		$events = $this->entityManager->getRepository(Event::class)->findSinceDate(date_create(), 2);

		$partners = $this->entityManager->getRepository(Partner::class)->findAll();

		return $this->render('home/index.html.twig', [
			'documents' => $documents,
			'news' => $news,
			'events' => $events,
			'partners' => $partners
		]);
	}
}