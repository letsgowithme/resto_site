<?php

namespace App\Controller\Admin;

use App\Entity\DaySlots;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DaySlotsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DaySlots::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
