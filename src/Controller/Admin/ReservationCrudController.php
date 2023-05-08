<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             IdField::new('id')
            ->hideOnForm(),
            TextField::new('fullName')
            ->setLabel('Nom/Prénom'),
            NumberField::new('nbPeople')
                ->setLabel('Convives'),
            NumberField::new('nbChildren')
                ->setLabel('Enfants'),
            AssociationField::new('allergies')
                ->setLabel('Allèrgies'),
            AssociationField::new('daySlot')
                ->setLabel('Heure'),
                // AssociationField::new('table')
                // ->setLabel('table id'),
        ];
    }
}