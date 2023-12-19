<?php

namespace App\Controller\Admin;

use App\Entity\Association;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AssociationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Association::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Associations")
            ->setEntityLabelInSingular("Association")
            ->setPageTitle('index', "Gestion de l'%entity_label_singular%")
            ->setPageTitle('new', "Création d'une %entity_label_singular%")
            ->setPageTitle('detail', "Détail de l'%entity_label_singular%")
            ->setPageTitle('edit', "Modification de l'%entity_label_singular%")
            ->setDefaultSort(['name' => 'ASC'])
            ->showEntityActionsInlined()
            ->renderContentMaximized();
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_NEW, Action::INDEX)
            ->add(Crud::PAGE_EDIT, Action::INDEX)
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)

            // Page "INDEX"
            ->update(
                Crud::PAGE_INDEX,
                Action::NEW,
                fn (Action $action) => $action->setIcon('fa fa-plus')->setLabel(false)
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::EDIT,
                fn (Action $action) => $action->setIcon('fa fa-pen')->setLabel(false)
            )
            ->update(
                Crud::PAGE_INDEX,
                Action::DELETE,
                fn (Action $action) => $action->setIcon('fa fa-trash')->setLabel(false)
            )

            // Page "EDIT"
            ->update(
                Crud::PAGE_EDIT,
                Action::INDEX,
                fn (Action $action) => $action->setIcon('fa fa-left-long')->setLabel(false)
            )
            ->update(
                Crud::PAGE_EDIT,
                Action::SAVE_AND_RETURN,
                fn (Action $action) => $action->setIcon('fa fa-floppy-disk')->setLabel(false)
            )

            // Page "NEW"
            ->update(
                Crud::PAGE_NEW,
                Action::INDEX,
                fn (Action $action) => $action->setIcon('fa fa-left-long')->setLabel(false)
            )
            ->update(
                Crud::PAGE_NEW,
                Action::SAVE_AND_RETURN,
                fn (Action $action) => $action->setIcon('fa fa-floppy-disk')->setLabel(false)
            )
            ->update(
                Crud::PAGE_NEW,
                Action::SAVE_AND_ADD_ANOTHER,
                fn (Action $action) => $action->setIcon('fa fa-plus')->setLabel(false)
            );
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addFieldset('Informations Générales'),
            TextField::new('name', "Nom de l'Association :")->setColumns(6),
            FormField::addFieldset(),
            TextField::new('motto', 'Devise :')->setColumns(6)->hideOnIndex(),

            FormField::addFieldset('Coordonnées'),
            TextField::new('adressName', "Titre de l'adresse :")->setColumns(2)->hideOnIndex(),
            TextField::new('adress', 'Adresse :')->setColumns(4)->hideOnIndex(),
            FormField::addFieldset(),
            TextField::new('postalCode', 'Code Postal :')->setColumns(2)->hideOnIndex(),
            TextField::new('city', 'Ville :')->setColumns(4)->hideOnIndex(),
            FormField::addFieldset(),
            TextField::new('phone', 'Téléphone :')->setColumns(2)->hideOnIndex(),
            TextField::new('mail', 'Email :')->setColumns(4)->hideOnIndex(),
            FormField::addFieldset('Liens'),
            CollectionField::new('navBarLinks', 'Barre de Navigation :')->useEntryCrudForm(NavBarLinkCrudController::class)->setColumns(12)->hideOnIndex(),

            DateTimeField::new('createdAt', 'Date de Création :')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Date de Mise à Jour :')->onlyOnIndex(),
        ];
    }
}
