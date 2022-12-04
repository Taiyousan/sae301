<?php

namespace App\Controller\Admin;

use App\Entity\Manifestation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;


class ManifestationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manifestation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('manif_titre', 'Titre'),
            TextField::new('manif_desc', 'Description'),
            TextField::new('manif_horaire', 'Horaire'),
            TextField::new('manif_date', 'Date'),
            IntegerField::new('manif_prix', 'Prix'),
            ImageField::new('manif_affiche')->setBasePath('img/')->setUploadDir('public/img/'),
            AssociationField::new('manif_lieu', 'Lieu')
        ];
    }
}
