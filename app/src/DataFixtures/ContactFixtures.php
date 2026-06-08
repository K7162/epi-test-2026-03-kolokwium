<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Enum\ContactStatus;
use App\Entity\Enum\PhoneNumberType;
use App\Entity\Group;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ContactFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    protected function loadData(): void
    {
        $this->createMany(128, 'contacts', function (int $i) {
            $contact = new Contact();
            $contact->setFirstName($this->faker->firstName());
            $contact->setLastName($this->faker->lastName());
            $contact->setEmail($this->faker->unique()->safeEmail());
            $contact->setStatus(ContactStatus::from($this->faker->numberBetween(1, 2)));

            $contactGroups = $this->getRandomReferenceList(
                'groups',
                Group::class,
                $this->faker->numberBetween(0, 3)
            );
            foreach ($contactGroups as $contactGroup) {
                $contact->addContactGroup($contactGroup);
            }

            if ($this->faker->boolean()) {
                $contact->setPhoneNumber($this->faker->phoneNumber());
                $contact->setPhoneNumberType(PhoneNumberType::from($this->faker->numberBetween(1, 2)));;
            }

            return $contact;
        });
    }

    public function getDependencies(): array
    {
        return [GroupFixtures::class];
    }
}
