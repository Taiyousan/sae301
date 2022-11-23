<?php

namespace App\Form;

use App\Entity\Manifestation;
use App\Entity\Lieux;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ManifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('manif_titre')
            ->add('manif_desc', TextareaType::class)
            ->add('manif_casting')
            ->add('manif_genre')
            ->add('manif_affiche')
            ->add('manif_horaire')
            ->add('manif_date')
            ->add('manif_prix')
            ->add('manif_lieu', EntityType::class, [
                'class' => Lieux::class,
                'choice_label' => 'getLieuNom',
                'choice_value' => 'getId'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Manifestation::class,
            'data_class2' => Lieux::class,
        ]);
    }
}
