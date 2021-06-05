<?php

namespace App\Services;

class Cart
{
    public function __construct()
    {
    }

    public function add(int $userId, $data)
    {
        $collection = $this->get($userId);

        $collection->add($data);

        session([$this->getKey($userId) => $collection]);
    }

    public function get(int $userId)
    {
        return session($this->getKey($userId), new CartCollection());
    }

    public function clear(int $userId)
    {
        session()->forget($this->getKey($userId));
    }

    public function remove(int $userId, $id)
    {
        $collection = $this->get($userId);

        $collection->remove($id);

        session([$this->getKey($userId) => $collection]);
    }

    private function getKey(int $userId)
    {
        return 'shopping_cart_' . $userId;
    }

}
