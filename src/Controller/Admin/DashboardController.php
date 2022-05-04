<?php

namespace App\Controller\Admin;


use App\Entity\CategoryDonnees;
use App\Entity\CategoryNews;
use App\Entity\Document;


use App\Entity\Event;
use App\Entity\Partner;
use App\Entity\News;
use App\Entity\Partners;
use App\Entity\User;

use App\Entity\Video;
use App\Repository\DocumentRepository;
use App\Repository\EventRepository;
use App\Repository\NewsRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
	protected $documentRepository;
	protected $eventRepository;
	protected $newsRepository;
	private $userRepository;

	public function __construct(
		DocumentRepository $documentRepository,
		EventRepository    $eventRepository,
		NewsRepository     $newsRepository,
		UserRepository     $userRepository)
	{
		$this->documentRepository = $documentRepository;
		$this->eventRepository = $eventRepository;
		$this->newsRepository = $newsRepository;
		$this->userRepository = $userRepository;
	}

	/**
	 * @Route("/admin", name="admin")
	 */
	public function index(): Response
	{
		return $this->render("admin/dashboard.html.twig", [
			'documents' => $this->documentRepository->findBy(['isActive' => false], ['createdAt' => 'DESC']),
			'nbDocuments' => $this->documentRepository->count([]),
			'users' => $this->userRepository->findBy(['isVerified' => true, 'isValide' => false], ['createdAt' => 'DESC']),
			'nbUsers' => $this->userRepository->count([]),
			'events' => $this->eventRepository->findBy(['isActive' => false], ['createdAt' => 'DESC']),
			'nbEvents' => $this->eventRepository->count([]),
			'news' => $this->newsRepository->findBy(['isActive' => false], ['createdAt' => 'DESC']),
			'nbNews' => $this->newsRepository->count([])
		]);
	}

	public function configureDashboard(): Dashboard
	{
		return Dashboard::new()
			->setTitle('SQVALD');
	}

	public function configureMenuItems(): iterable
	{
		yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

		yield MenuItem::section('Documents');
		yield MenuItem::linkToCrud('Tous les documents', 'fas fa-file', Document::class);
		yield MenuItem::linkToCrud('Catégories', 'fas fa-list', CategoryDonnees::class);

		yield MenuItem::section('Ėvènements');
		yield MenuItem::linkToCrud('Tous les évènements', 'fas fa-calendar', Event::class);
		yield MenuItem::linkToCrud('Catégories', 'fas fa-list', CategoryNews::class);

		yield MenuItem::section('Nouvelles');
		yield MenuItem::linkToCrud('Toutes les nouvelles', 'fas fa-newspaper', News::class);

		yield MenuItem::section();
		yield MenuItem::linkToCrud('Toutes les vidéos', 'fas fa-video', Video::class);

		yield MenuItem::section();
		yield MenuItem::linkToCrud('Partenaires', 'fas fa-handshake', Partner::class);
		yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);

		yield MenuItem::section();
		yield MenuItem::linkToRoute('Sortie', 'fas fa-arrow-left', 'home');

	}
}
