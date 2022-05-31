<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class CartPageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_routeToHomepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200); 
    }

    public function test_routeToProductPage()
    {
        $response = $this->get('/product');
        $response->assertStatus(200);
    } 

    public function test_routeToCartPage() 
    {
        $response = $this->get('/cart');
        $response->assertStatus(200);
    }

    public function test_increaseCartProducts(){
        $response = $this->get('cart/increaseCartQuantity/{Product_ID}');
        $response->assertStatus(200);   
    }

    public function test_decreaseCartProducts(){
        $response = $this->get('cart/decreaseCartQuantity/{Product_ID}');
        $response->assertStatus(200);
    }

    public function test_routeToCheckoutPage(){
        $response = $this->get('checkout');
        $response->assertStatus(200);
    }

    public function test_routeToAboutUsPage()
    {
        $response = $this->get('/aboutUs');
        $response->assertStatus(200);
    }

    public function test_routeToContactUsPage()
    {
        $response = $this->get('/contactUs');
        $response->assertStatus(200);
    }
}