<?php

// src/Form/EventType.php
namespace App\Form;

use App\Entity\Event;
use App\Entity\Place;
use App\Entity\Category;
use App\Entity\User;
use App\Repository\PlaceRepository;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\CategoryRepository;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('place', EntityType::class, [
                'placeholder' => 'Choose a place',
                'class' => Place::class,
                'query_builder' => function(PlaceRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ])
            ->add('user', EntityType::class, [
                'placeholder' => 'Choose a user',
                'class' => User::class,
            ])
            ->add('category', EntityType::class, [
                'placeholder' => 'Choose a category',
                'class' => Category::class,
                'query_builder' => function(CategoryRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ])


            ->add('save', SubmitType::class, array('label' => 'Envoyer'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Event::class,
        ));
    }

}