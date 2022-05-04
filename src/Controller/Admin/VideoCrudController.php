<?php

namespace App\Controller\Admin;

use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class VideoCrudController extends AbstractCrudController
{

	public static function getEntityFqcn(): string
	{
		return Video::class;
	}

	public function configureFields(string $pageName): iterable
	{
		// TODO vich upload video et faire crud entité
		return [
			IdField::new('id')->hideOnForm(),
			TextField::new('title')->setRequired(true),
			TextField::new('link'),
			ImageField::new('src')
				->setBasePath('uploads/videos/')
				->setUploadDir('public/uploads/videos/')
				->setUploadedFileNamePattern('[randomhash].[extension]')
				->setRequired(false),
		];
	}
}