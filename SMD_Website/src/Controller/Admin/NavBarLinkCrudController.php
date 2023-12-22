<?php

namespace App\Controller\Admin;


use App\Entity\NavBarLink;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Controller\Admin\NavBarDdLinkCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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
            ->hideNullValues()
            ->renderContentMaximized();
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'ID :')->onlyOnIndex(),
            AssociationField::new('association', 'Association :')->onlyOnIndex(),
            AssociationField::new('section', 'Section :')->onlyOnIndex(),
            
            FormField::addFieldset('Informations Générales'),
            IntegerField::new('ranking', 'Ordre :')->setColumns(12)->hideOnIndex(),
            FormField::addRow(),
            TextField::new('name', 'Nom unique :')->setColumns(6),
            TextField::new('title', 'Nom du menu :')->setColumns(6)->hideOnIndex(),
            FormField::addFieldset('Configuration'),
            SlugField::new('slug', "Nom dans l'url :")->setTargetFieldName('name')->setColumns(12)
            ->setUnlockConfirmationMessage(
                "Il est fortement recommandé d'utiliser les slugs automatiques, mais vous pouvez les personnaliser")->hideOnIndex(),
            FormField::addRow(),
            TextField::new('path', "Adresse de l'url :")->setColumns(12)->hideOnIndex(),
            
            CollectionField::new('navBarDdLinks', 'Sous-Menus :')->useEntryCrudForm(NavBarDdLinkCrudController::class)->setColumns(12)->hideOnIndex(),

            DateTimeField::new('createdAt', 'Date de Création :')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Date de Mise à Jour :')->onlyOnIndex(),
        ];
    }
}
