<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\User;

class UserType extends AbstractType {
	
	
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
	
				$builder->add('login')
				->add('visitwith',ChoiceType::class, array ('choices'=>array(
				      'parents'=>'parents',
					  'frineds'=>'friends',
					  'alone'=>'alone'), 'label'=>'Visit With'))
 				->add('insert', SubmitType::class, array('label' => 'Insert Record'))
				->getForm();	
	
	}
	
	public function configureOptions(OptionsResolver $resolver) {
		
		$resolver->setDefaults(array (
			 'data_class'=>User::class));				
	}	
}

?>
