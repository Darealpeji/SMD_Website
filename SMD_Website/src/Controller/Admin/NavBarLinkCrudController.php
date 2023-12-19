<?php

namespace App\Controller\Admin;

use App\Entity\NavBarLink;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NavBarLinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NavBarLink::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Liens de la Barre de Navigation")
            ->setEntityLabelInSingular("Lien de la Barre de Navigation")
            ->setPageTitle('index', "Gestion du %entity_label_singular%")
            ->setPageTitle('new', "Création d'un %entity_label_singular%")
            ->setPageTitle('detail', "Détail du %entity_label_singular%")
            ->setPageTitle('edit', "Modification du %entity_label_singular%")
            ->setDefaultSort(['name' => 'ASC'])
            ->showEntityActionsInlined()
            ->renderContentMaximized();
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('association', 'Association :')->onlyOnIndex(),
            AssociationField::new('section', 'Section :')->onlyOnIndex(),
            TextField::new('name', 'Nom du menu :')->setColumns(8),
            TextField::new('linkTitle', 'Titre du menu (Affiché sur le site) :')->setColumns(8)->hideOnIndex(),
            TextField::new('pathName', "Nom dans l'url :")->setColumns(8)->hideOnIndex(),
            TextField::new('path', "Adresse de l'url :")->setColumns(8)->hideOnIndex(),
            IntegerField::new('ranking', 'Ordre :')->setColumns(8)->hideOnIndex(),

            DateTimeField::new('createdAt', 'Date de Création :')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Date de Mise à Jour :')->onlyOnIndex(),
        ];
    }
}
