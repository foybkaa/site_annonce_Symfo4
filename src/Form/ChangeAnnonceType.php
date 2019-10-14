<?php

namespace App\Form;

use App\Entity\ChangeAnnonce;
use App\Form\ApplicationType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangeAnnonceType extends ApplicationType
{  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant', IntegerType::class, $this->getConfiguration("Combien","Veuillez indiquer le vous montant que vous souhaitez échanger"))
            ->add('deviseA', ChoiceType::class, [
                'label'=>"La devise que vous possédez",
                'choices'  => [
                    'Euro' => "Euro",
                    'Dirham marocain' => "Dirham marocain",
                    'Dollar Américain' =>'Dollar Américain',
                    'Yen Japonais' => 'Yen Japonais',
                    'Dinar algérien' => 'Dinar algérien',
                    'Livre Sterling' => 'Livre Sterling',
                    'Dollar Australien' => 'Dollar Australien',
                    'Franc Suisse' => 'Franc Suisse',
                    'Dollar Canadien'=> 'Dollar Canadien',
                    'Peso Mexicain' => 'Peso Mexicain',
                    'Yuan Chinois' => 'Yuan Chinois',
                    'Dollar Néo-Zélandais' => 'Dollar Néo-Zélandais',
                    'Autre*' => 'Autre',
                ],
            ], )
            
            ->add('deviseB', ChoiceType::class, [
                'label'=>"La devise que vous recherchez",
                'choices'  => [
                    'Euro' => "Euro",
                    'Dirham marocain' => "Dirham marocain",
                    'Dollar Américain' =>'Dollar Américain',
                    'Yen Japonais' => 'Yen Japonais',
                    'Dinar algérien' => 'Dinar algérien',
                    'Livre Sterling' => 'Livre Sterling',
                    'Dollar Australien' => 'Dollar Australien',
                    'Franc Suisse' => 'Franc Suisse',
                    'Dollar Canadien'=> 'Dollar Canadien',
                    'Peso Mexicain' => 'Peso Mexicain',
                    'Yuan Chinois' => 'Yuan Chinois',
                    'Dollar Néo-Zélandais' => 'Dollar Néo-Zélandais',
                    'Autre*' => 'Autre',
                ],
            ], )
            ->add('ville', TextType::class, $this->getConfiguration("Où", "Veuillez indiquer la ville ou l'échange aura lieux"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChangeAnnonce::class,
        ]);
    }
}
