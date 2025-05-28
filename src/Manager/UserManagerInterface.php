<?php

namespace App\Manager;

use App\Entity\User;

interface UserManagerInterface
{
    public function find(int $id, User $currentUser): ?User;
    public function findAll(User $currentUser, int $page, int $limit): array;
    public function create(User $user, User $currentUser, bool $flush = true): void;
    public function remove(User $user, bool $flush = true): void;
    public function edit(User $user, bool $flush = true): void;
}
