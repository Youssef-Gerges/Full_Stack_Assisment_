<?php

namespace Modules\General\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    public function view(User $user): bool
    {
        return $user->access_type == 'general';
    }

    public function create(User $user): bool
    {
        return $user->access_type == 'general';
    }

}
