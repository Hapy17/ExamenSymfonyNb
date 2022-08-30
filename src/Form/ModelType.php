<?php

namespace App\Form;

use App\Entity\Model;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Nom du modèle',
                'attr' => [
                    'placeholder' => 'Nom du modèle',
                    'class' => 'form-control mb-3 w-50'
                ]
            ])
            ->add('description', TextareaType::class,[
                //Mettre un texte area pour la description
                'label' => 'Description du modèle',
                'attr' => [

                    'placeholder' => 'Description du modèle',
                    'class' => 'form-control mb-3 w-50'
                ]
            ])
            ->add('brand', EntityType::class,[
                'class' => 'App\Entity\Brand',
                'choice_label' => 'name',
                'label' => 'Marque',
                'attr' => [
                    'class' => 'form-control mb-3 w-50'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Model::class,
        ]);
    }
}
