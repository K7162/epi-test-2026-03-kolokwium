<?php

namespace App\DataFixtures;

use App\Entity\Group;

class GroupFixtures extends AbstractBaseFixtures
{
    private readonly array $groupNameList;

    public function __construct()
    {
        $this->groupNameList = [
            'Family',
            'Work',
            'Other',
            'Friends'
        ];
    }

    protected function loadData(): void
    {
        $this->createMany(count($this->groupNameList), 'groups', function (int $i) {
            $group = new Group();
            $group->setName($this->groupNameList[$i]);

            return $group;
        });
    }
}
