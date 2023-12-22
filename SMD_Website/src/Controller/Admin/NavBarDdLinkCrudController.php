<?php

namespace App\Controller\Admin;

use App\Entity\NavBarDdLink;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NavBarDdLinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NavBarDdLink::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Sous-liens de la Barre de Navigation")
            ->setEntityLabelInSingular("Sous-lien de la Barre de Navigation")
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
            AssociationField::new('navBarLink', 'Menu de la Barre de Navigation :')->onlyOnIndex(),
            FormField::addFieldset('Informations Générales'),
            IntegerField::new('ranking', 'Ordre :')->setColumns(12)->hideOnIndex(),
            TextField::new('name', 'Nom du sous-menu :')->setColumns(12),
            FormField::addFieldset('Configuration'),
            SlugField::new('slug', "Nom dans l'url :")->setTargetFieldName('name')->setColumns(12)->hideOnIndex()
            ->setUnlockConfirmationMessage(
                "Il est fortement recommandé d'utiliser les slugs automatiques, mais vous pouvez les personnaliser"),
            TextField::new('path', "Adresse de l'url :")->setColumns(12)->hideOnIndex(),
            
            DateTimeField::new('createdAt', 'Date de Création :')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Date de Mise à Jour :')->onlyOnIndex(),
        ];
    }
}
