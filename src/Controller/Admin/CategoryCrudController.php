<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Catégorie')
            ->setEntityLabelInPlural('Catégories')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Catégorie')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter une Catégorie')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier la Catégorie')
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),  
            TextField::new('name')
            ->setLabel('Nom'),
            AssociationField::new('dishes')
                ->setLabel('Plats')
        ];
    }
}
