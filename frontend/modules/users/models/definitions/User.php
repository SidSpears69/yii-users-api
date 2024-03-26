<?php

namespace frontend\modules\models\definitions;

/**
 * @SWG\Definition(required={"username", "email", "password"})
 *
 * @SWG\Property(property="id", type="integer")
 * @SWG\Property(property="username", type="string")
 * @SWG\Property(property="email", type="string")
 * @SWG\Property(property="status", type="integer")
 * @SWG\Property(property="created_at", type="integer")
 * @SWG\Property(property="updated_at", type="integer")
 */
class User
{
}