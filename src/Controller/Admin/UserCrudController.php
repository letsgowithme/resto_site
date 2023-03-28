<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
->hideOnForm(),
TextField::new('fullName')
->setLabel('Nom/Prénom'),
TextField::new('email'),
TextField::new('plainPassword', 'password')
    ->setFormType(PasswordType::class)
    ->setRequired($pageName === Crud::PAGE_NEW)
    ->onlyOnForms()
    ->setLabel('Mot de passe'),
        ];
    }
    
}
