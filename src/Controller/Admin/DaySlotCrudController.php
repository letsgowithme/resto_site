<?php

namespace App\Controller\Admin;

use App\Entity\DaySlot;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DaySlotCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DaySlot::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Heure du midi')
            ->setEntityLabelInPlural('Heures du midi')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Heure du midi')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter Heure du midi')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier Heure du midi')
            ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('time')
                ->setLabel('Heure'),
                BooleanField::new('isAvailable')
                ->setLabel('Disponible ?'),
               

        ];
    }
    
}
