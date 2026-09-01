<?php

/**
 * Contact type.
 */

namespace App\Form\Type;

use App\Entity\Contact;
use App\Entity\Enum\PhoneNumberType;
use App\Entity\Group;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ContactType.
 */

class ContactType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array<string, mixed> $options Form options
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'firstName',
            TextType::class,
            [
                'label' => 'label.first_name',
                'required' => true,
            ]
        );
        $builder->add(
            'lastName',
            TextType::class,
            [
                'label' => 'label.last_name',
                'required' => true,
            ]
        );
        $builder->add(
            'email',
            EmailType::class,
            [
                'label' => 'label.email',
                'required' => true,
            ]
        );
        $builder->add(
            'phone_number',
            TextType::class,
            [
                'label' => 'label.phone_number',
                'required' => false,
            ]
        );
        $builder->add(
            'phone_number_type',
            EnumType::class,
            [
                'class' => PhoneNumberType::class,
                'choice_label' => fn (PhoneNumberType $choice): string => $choice->label(),
                'label' => 'label.phone_number_type',
                'placeholder' => 'label.none',
                'required' => false,
            ]
        );
        $builder->add(
            'contactGroups',
            EntityType::class,
            [
                'class' => Group::class,
                'choice_label' => fn (Group $group): string => $group->getName(),
                'label' => 'label.contact_groups',
                'required' => false,
                'multiple' => true,
                'expanded' => true,
            ]
        );
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Contact::class]);
    }
    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     *
     * @psalm-return 'task'
     */
    public function getBlockPrefix(): string
    {
        return 'contact';
    }
}
