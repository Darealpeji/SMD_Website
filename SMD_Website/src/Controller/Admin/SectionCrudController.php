<?php

namespace App\Controller\Admin;

use App\Entity\Section;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Controller\Admin\NavBarLinkCrudController;
use App\Controller\Admin\NavBarMenuCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Section::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Sections")
            ->setEntityLabelInSingular("Section")
            ->setPageTitle('index', "Gestion de la %entity_label_singular%")
            ->setPageTitle('new', "Création d'une %entity_label_singular%")
            ->setPageTitle('detail', "Détail de la %entity_label_singular%")
            ->setPageTitle('edit', "Modification de la %entity_label_singular%")
            ->setDefaultSort(['name' => 'ASC'])
            ->showEntityActionsInlined()
            ->hideNullValues()
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
            IntegerField::new('id', 'ID :')->onlyOnIndex(),

            FormField::addTab('Données Générales'),

            FormField::addFieldset('Informations Générales'),
            TextField::new('name', "Nom de la Section :")->setColumns(6),
            AssociationField::new('association', 'Association :')->setColumns(6)->hideOnIndex(),
            TextField::new('motto', 'Devise :')->setColumns(8)->hideOnIndex(),
            BooleanField::new('manageConvocation', 'Gestion des Convocations :')->setColumns(4)->hideOnIndex(),

            FormField::addFieldset('Coordonnées'),
            TextField::new('adress', 'Adresse :')->setColumns(6)->hideOnIndex(),
            FormField::addFieldset(),
            TextField::new('postalCode', 'Code Postal :')->setColumns(2)->hideOnIndex(),
            TextField::new('city', 'Ville :')->setColumns(4)->hideOnIndex(),
            TextField::new('phone', 'Téléphone :')->setColumns(2)->hideOnIndex(),
            TextField::new('mail', 'Email :')->setColumns(4)->hideOnIndex(),

            FormField::addFieldset('Liens'),
            SlugField::new('slug', "Nom dans l'url :")->setTargetFieldName('name')->setColumns(6)->hideOnIndex()
                ->setUnlockConfirmationMessage(
                    "Il est fortement recommandé d'utiliser les slugs automatiques, mais vous pouvez les personnaliser"
                ),
            TextField::new('scoreNCoCode', "Lien Score'n'Co :")->setColumns(6)->hideOnIndex(),

            FormField::addTab('Barre de Navigation'),
            CollectionField::new('navBarMenus', 'Barre de Navigation :')->useEntryCrudForm(NavBarMenuCrudController::class)->setColumns(8)->hideOnIndex(),

            FormField::addTab('Infos Pratiques'),
            AssociationField::new('activityPlaces', "Lieu(x) d'activités :")->setColumns(6)->hideOnIndex(),

            DateTimeField::new('createdAt', 'Date de Création :')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Date de Mise à Jour :')->onlyOnIndex(),
        ];
    }
}
