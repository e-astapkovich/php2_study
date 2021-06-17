<?php

namespace app\models;

class Order extends Model {
    private $id_order;
    private $user_id;
    private $user_phone;
    private $pickpoint_id;
    private $created_at;
    private $order_status;
}