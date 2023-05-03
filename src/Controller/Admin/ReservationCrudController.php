<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

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
            NumberField::new('nbPeople')
                ->setLabel('Convives'),
            AssociationField::new('allergies')
                ->setLabel('Allèrgies'),
            
            // AssociationField::new('daySlot')
            //     ->setLabel('Heure du midi'),
            // AssociationField::new('eveningSlot')
            //     ->setLabel('Heure du soir'),
        ];
    }
}