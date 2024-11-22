<?php

namespace Modules\Motors\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    public function view(User $user): bool
    {
        return $user->access_type == 'motors';
    }

    public function create(User $user): bool
    {
        return $user->access_type == 'motors';
    }

}
