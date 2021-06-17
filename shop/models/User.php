<?php

namespace app\models;

class User extends Model {
    private $id_user;
    private $name_user;
    private $password_hash;
    private $role;
    private $status;
    private $manager_id;
}