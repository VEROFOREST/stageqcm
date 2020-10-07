<?php

namespace App\Form;

use App\Entity\Question;
use App\Entity\ReponseProf;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class ReponseProfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question',
                    HiddenType::class,[],
                    EntityType::class, array(
                    'class' => Question::class,
                    'choice_label' => 'id',
                    'multiple'  => false,
            ))
            ->add ('libelleReponse')
            ->add('isJust')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReponseProf::class,
        ]);
    }
}
