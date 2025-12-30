<?php

namespace App\Policies;

use App\Models\Bundle;
use App\Models\User;

class BundlePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Bundle $bundle): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Bundle $bundle): bool
    {
        return true;
    }

    public function delete(User $user, Bundle $bundle): bool
    {
        return true;
    }

    public function restore(User $user, Bundle $bundle): bool
    {
        return true;
    }

    public function forceDelete(User $user, Bundle $bundle): bool
    {
        return true;
    }
}
