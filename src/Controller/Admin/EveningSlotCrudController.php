<?php

namespace App\Controller\Admin;

use App\Entity\EveningSlot;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EveningSlotCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EveningSlot::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Heure du soir')
            ->setEntityLabelInPlural('Heures du soir')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Heure du soir')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter Heure du soir')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier Heure du soir')
            ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('name')
                ->setLabel('Heure'),
                BooleanField::new('isAvailable')
                ->setLabel('Disponible ?')
                
        ];

    }
    
}
