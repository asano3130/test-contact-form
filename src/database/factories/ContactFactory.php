<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => '太郎',
            'last_name'  => '山田',
            'gender'     => '1',
            'email'      => 'test@example.com',
            'tel'        => '08012345678',
            'address'    => '東京都渋谷区千駄ヶ谷1-2-3',
            'building'   => 'テストビル101',
            'category_id'=> 1,
            'detail'     => '届いた商品が注文した商品ではありませんでした。
            商品の交換をお願いします。',
        ];
    }
}
