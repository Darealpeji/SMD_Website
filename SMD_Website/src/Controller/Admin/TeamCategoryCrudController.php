<?php

namespace App\Controller\Admin;

use App\Entity\TeamCategory;
use App\Controller\Admin\TeamCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TeamCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TeamCategory::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Catégories d'Equipe")
            ->setEntityLabelInSingular("Catégorie d'Equipe")
            ->setPageTitle('index', "Gestion des %entity_label_plural%")
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
            TextField::new('name', "Nom Unique de la Catégorie :")->setColumns(3),
            TextField::new('label', "Titre de la Catégorie :")->setColumns(3)->hideOnIndex(),
            AssociationField::new('section', 'Section :')->setColumns(3)->hideOnIndex(),
            SlugField::new('slug', "Nom dans l'url :")->setTargetFieldName('label')->setColumns(6)->hideOnIndex()
                ->setUnlockConfirmationMessage(
                    "Il est fortement recommandé d'utiliser les slugs automatiques, mais vous pouvez les personnaliser"
                ),
            BooleanField::new("competition")->hideOnIndex(),

            FormField::addFieldset('Equipes'),
            CollectionField::new('teams', 'Equipes :')->useEntryCrudForm(TeamCrudController::class)->setColumns(8)->hideOnIndex(),

            DateTimeField::new('createdAt', 'Date de Création :')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Date de Mise à Jour :')->onlyOnIndex(),
        ];
    }
}
