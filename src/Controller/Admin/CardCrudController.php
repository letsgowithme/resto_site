<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class CardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Card::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Photo')
            ->setEntityLabelInPlural('Photo')
            ->setPageTitle(pageName:Crud::PAGE_INDEX, title: 'Photos')
            ->setPageTitle(pageName:Crud::PAGE_NEW, title: 'Ajouter une Photo')
            ->setPageTitle(pageName:Crud::PAGE_EDIT, title: 'Modifier la Photo')
            ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(), 
            TextField::new('name')
            ->setLabel('Titre'),
            ImageField::new('imageName')
                ->setFormType(FileUploadType::class)
                ->setUploadDir('/public/images/gallery')
                ->setRequired(false)
                ->setLabel('Image'),
        ];
    }
    
}
