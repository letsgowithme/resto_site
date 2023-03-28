<?php

namespace App\Controller\Admin;

use App\Entity\EveningSlots;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EveningSlotsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EveningSlots::class;
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
