<?php

namespace App\Contracts\Security;

interface UserPermissions
{
    public const VIEW_USER = 'view_user';

    public const SHOW_USER = 'show_user';

    public const CREATE_USER = 'create_user';

    public const UPDATE_USER = 'update_user';

    public const DELETE_USER = 'delete_user';

    public const RESTORE_USER = 'restore_user';
}
