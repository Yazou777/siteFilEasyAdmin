<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use Symfony\Component\Form\FormBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProduitCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }
  
    
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            // TextField::new('title'),
            // TextEditorField::new('description'),
            TextField::new('pro_nom'),
            //MoneyField::new('pro_prix')->setCurrency('EUR'),
            NumberField::new('pro_prix')->setNumDecimals(2),
            TextField::new('imageFile')->setFormType(VichImageType::class),
            ImageField::new('pro_image')->setBasePath('/images')->onlyOnIndex(),
               // ->setFormType(VichImageType::class)
              //  ->setLabel('Image')
               // ->setUploadDir('public/images'), // Chemin de téléchargement
               // ->setBasePath('/uploads/images'), // URL de base
            TextField::new('pro_description'),
            IntegerField::new('pro_stkphy'),
            IntegerField::new('pro_stkale'),
            //DateField::new('pro_update_at'),
            AssociationField::new('cat')
        ];
    }
    
}
