<?php

namespace App\Controller\Admin;

use App\Entity\Table;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class TableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Table::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ->setEntityLabelInSingular('Table')
            ->setEntityLabelInPlural('Tables')
            ->setPageTitle(pageName: Crud::PAGE_INDEX, title: 'Tables')
            ->setPageTitle(pageName: Crud::PAGE_NEW, title: 'Créer une Table')
            ->setPageTitle(pageName: Crud::PAGE_EDIT, title: 'Modifier la Table');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(), 
            NumberField::new('number')
            ->setLabel('Numéro'),
            NumberField::new('nbPlaces')
            ->setLabel('Nombre de places'),
            
        ];
    }
    
}
