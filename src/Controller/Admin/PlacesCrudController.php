<?php

namespace App\Controller\Admin;

use App\Entity\Places;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class PlacesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Places::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(), 
            NumberField::new('nbTotalPlaces')
            ->setLabel('Nombre totale de places'),
            NumberField::new('nbAvailablePlaces')
            ->setLabel('Nombre de places disponibles'),
            DateField::new('date')
            ->setLabel('Date'),
        ];
    }
    
}
