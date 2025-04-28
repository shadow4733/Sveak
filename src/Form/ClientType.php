<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Client;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Имя',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Фамилия',
            ])
            ->add('phone', TelType::class, [
                'label' => 'Номер телефона',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Электронная почта',
            ])
            ->add('education', ChoiceType::class, [
                'label' => 'Образование',
                'choices' => [
                    'Среднее образование' => 'secondary',
                    'Специальное образование' => 'vocational',
                    'Высшее образование' => 'higher',
                ],
            ])
            ->add('consent', CheckboxType::class, [
                'label' => 'Я даю согласие на обработку моих личных данных',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
