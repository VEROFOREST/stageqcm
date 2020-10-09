<?php

namespace App\Form;

use App\test\QuestionnaireGlobal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionnaireGlobalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('user',HiddenType::class)
            ->add('questionnaire',QuestionnaireType::class)
            ->add('question', CollectionType::class, array(
                                'entry_type' => QuestionType::class,
                                'entry_options' => [
                                    'attr' =>
                                    ['class' => 'questionInput'],
                                    'label'=> false,
                                 ],
                                'block_name' => 'questions',
                                 
                                 'allow_add' => true,
                                'allow_delete' => true,
                                'prototype' => true,
                                'by_reference' => false
            ))
            
           
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QuestionnaireGlobal::class,
        ]);
    }
}
