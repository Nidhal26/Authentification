<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Livres;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
#use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle',TextType::class,['label'=>'Titre du livre :','required'=>true,
            'Constraints'=>
            [new Length(min:2, max:30,minMessage:'taille min est 2',maxMessage:'taille max est 4')]
            ])
            ->add('prix')
            ->add('description')
            ->add('image')
            ->add('editeur')
            ->add('DateEdition')
            ->add('categorie',EntityType::class,['class'=>Categories::class,
                 'choice_label'=>'libelle',
                  'label'=>'Catégorie'])
            ->add('Enregistrer',SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livres::class,
        ]);
    }
}
