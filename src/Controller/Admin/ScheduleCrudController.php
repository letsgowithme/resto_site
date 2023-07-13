<?php

namespace App\Controller\Admin;

use App\Entity\Schedule;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ScheduleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Schedule::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Horaires')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Horaires')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter un jour')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier un jour')
            ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),  
            TextField::new('day')
               ->setLabel('Jour'),
               TextField::new('openingTimeMidday')
               ->setLabel('S\'ouvre à midi'),
               TextField::new('closingTimeMidday')
               ->setLabel('Se ferme à midi'),
               TextField::new('openingTimeEvening')
               ->setLabel('S\'ouvre le soir'),
               TextField::new('closingTimeEvening')
               ->setLabel('Se ferme le soir'),
            //    ArrayField::new('dayTime')
            //    ->setLabel('MIDI')
            //    ->hideOnIndex(),
            //    ArrayField::new('eveningTime')
            //    ->setLabel('SOIR')
            //    ->hideOnIndex(),
              
        ];
    }
    
}
