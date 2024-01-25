<?php

namespace App\Controller\Admin;

use App\Entity\Member;
use Symfony\Component\Form\FormEvents;
use Symfony\Bundle\SecurityBundle\Security;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Form\FormBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ArrayFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class MemberCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Member::class;
    }

    private $security;
    public function __construct(
        Security $security,
        public UserPasswordHasherInterface $userPasswordHasher
    ) {
        $this->security = $security;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Adhérents")
            ->setEntityLabelInSingular("Adhérent")
            ->setPageTitle('index', "Gestion des '%entity_label_plural%")
            ->setPageTitle('new', "Création d'un %entity_label_singular%")
            ->setPageTitle('detail', "Détail de l'%entity_label_singular%")
            ->setPageTitle('edit', "Modification de l'%entity_label_singular%")
            ->setDefaultSort(['id' => 'ASC'])
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

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('sections')
            ->add('association')
            ->add('firstName')
            ->add('lastName')
            ->add('roles');
    }


    public function configureFields(string $pageName): iterable
    {
        $user = $this->security->getUser();

        $sectionField = AssociationField::new('sections', 'Sections :');
        $associationField = AssociationField::new('association', 'Association :');

        if ($user instanceof Member) {
            $memberSections = $user->getSections();
            $memberAssociation = $user->getAssociation();

            if ($user->getSections()->count() > 0) {
                $sectionField->setFormTypeOption('query_builder', function ($sectionRepository) use ($memberSections) {
                    return $sectionRepository->createQueryBuilder('s')
                        ->andWhere('s IN (:memberSections)')
                        ->setParameter('memberSections', $memberSections);
                });
            } else {
                $sectionField->hideOnForm();
            };

            if ($user->getAssociation()) {
                $associationField->setFormTypeOption('query_builder', function ($associationRepository) use ($memberAssociation) {
                    return $associationRepository->createQueryBuilder('s')
                        ->andWhere('s IN (:memberAssociation)')
                        ->setParameter('memberAssociation', $memberAssociation);
                });
            } else {
                $associationField->hideOnForm();
            };
        }

        return [
            FormField::addFieldset('Informations Générales'),
            TextField::new('firstName', 'Prénom :')->setColumns(6),
            TextField::new('lastName', 'Nom :')->setColumns(6),
            EmailField::new('email', 'Email :')->setColumns(6),
            FormField::addRow(),
            TextField::new('password', 'Mot de Passe')
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'first_options' => ['label' => 'Mot de Passe :'],
                    'second_options' => ['label' => 'Confirmation du Mot de Passe :'],
                    'mapped' => false,
                ])
                ->setRequired($pageName === Crud::PAGE_NEW)
                ->onlyOnForms()
                ->setColumns(6),

            CollectionField::new('roles', 'Roles :')->setColumns(6)->hideOnIndex(),
            $sectionField->onlyOnForms()->setColumns(6),
            $associationField->onlyOnForms()->setColumns(6),
            CollectionField::new('posts', 'Postes :')->setColumns(6)->hideOnIndex(),
        ];
    }

    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    private function addPasswordEventListener(FormBuilderInterface $formBuilder): FormBuilderInterface
    {
        return $formBuilder->addEventListener(FormEvents::POST_SUBMIT, $this->hashPassword());
    }

    private function hashPassword()
    {
        return function ($event) {
            $form = $event->getForm();
            if (!$form->isValid()) {
                return;
            }
            $user = $this->getUser();
            if ($user instanceof PasswordAuthenticatedUserInterface) {
                $password = $form->get('password')->getData();
                if ($password !== null) {
                    $hash = $this->userPasswordHasher->hashPassword($user, $password);
                    $form->getData()->setPassword($hash);
                }
            }
        };
    }
}
