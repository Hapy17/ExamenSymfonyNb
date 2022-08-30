<?php

namespace App\Form;

use App\Entity\Listing;
use App\Entity\Model;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Titre',
                    'class' => 'form-control mb-2'
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Description',
                    'class' => 'form-control mb-2'
                ],
            ])
            ->add('productionYear', DateType::class, [
                'label' => 'Année de production',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Année de production',
                    'class' => 'form-control mb-2'
                ],
            ])
            ->add('mileage', NumberType::class, [
                'label' => 'Kilométrage',
                'attr' => [
                    'placeholder' => 'Kilométrage',
                    'class' => 'form-control mb-2'
                ],
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix',
                    'class' => 'form-control mb-2'
                ],
            ])
            ->add('createdAt', DateType::class, [
                'label' => 'Date de création',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Date de création',
                    'class' => 'form-control mb-2'
                ],
            ])
            ->add('model', EntityType::class, [
                'class' => Model::class,
                'choice_label' => 'name',
                'label' => 'Modèle',
                'attr' => [
                    'placeholder' => 'Modèle',
                    'class' => 'form-control mb-2'
                ],
            ])
            -> add('submit', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => [
                    'class' => 'btn btn-primary my-2'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Listing::class,
        ]);
    }
}
