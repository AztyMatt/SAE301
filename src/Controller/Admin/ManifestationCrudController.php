<?php

namespace App\Controller\Admin;

use App\Entity\Manifestation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class ManifestationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manifestation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('manif_titre'),
            TextEditorField::new('manif_description'),
            TextEditorField::new('manif_casting'),
            TextField::new('manif_genre'),
            NumberField::new('manif_prix'),
            ImageField::new('manif_affiche')->setBasePath('images/manifs')->setUploadDir('public/images/manifs'),
            DateField::new('manif_date'),
            TimeField::new('manif_horaire'),
            AssociationField::new('salle'),
        ];
    }
}
