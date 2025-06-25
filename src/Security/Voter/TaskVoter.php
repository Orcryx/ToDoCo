<?php

namespace App\Security\Voter;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class TaskVoter extends Voter
{
    public const DELETE = 'TASK_DELETE';

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::DELETE])) {
            return false;
        }
        if (!$subject instanceof Task) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        // Vérifie que c'est bien une instance de ta classe User
        if (!$user instanceof User) {
            return false;
        }

        /** @var Task $task */
        $task = $subject;

        return match ($attribute) {
            self::DELETE => $this->canDelete($task, $user),
            default => throw new \LogicException('Attribut non pas pris en charge par le TaskVoter.')
        };
    }

    private function canDelete(Task $task, User $user): bool
    {
        if (in_array('ROLE_ADMIN', $user->getRoles(), true) || $user === $task->getUserId()) {
            return true;
        }

        return false;
    }
}
