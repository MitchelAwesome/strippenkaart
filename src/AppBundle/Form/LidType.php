<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LidType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('voornaam')
            ->add('achternaam')
            ->add('geboortedatum', DateType::Class,[
                'format' => 'dd-MM-yyyy',
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-70),
                'placeholder' => array(
                    'year' => 'Jaar', 'month' => 'Maand', 'day' => 'dag'
                )
            ])
            ->add('geslacht',ChoiceType::Class,[
                'choices' => [
                    'Man' => 'm',
                    'Vrouw' => 'v'
                ],
                //'data' => ( Lid->getGeslacht() ),
                //'preferred_choices' => array('m'),
                'expanded' => true
            ])
            ->add('email')
            ->add('tel')
            ->add('tel2')->add('straatnaam')->add('huisnummer')->add('postcode')->add('wijk')->add('stad');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Lid'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_lid';
    }


}
