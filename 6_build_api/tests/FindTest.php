<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FindTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testJavascript()
    {
      //Arrange
      $books = [
        [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
        [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
        [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
        [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
        [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
        [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
        [ 'title' => 'Head First Java', 'pages' => 200 ]
      ];
      $search = new \App\Services\BookSearch('$books');

      //Act
      $result = $search->find('javascript');

      //Assert
      $expected_books = [
        [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
        [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
        [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
      ];
      $this->assertEquals($expected_books, $result);
    }
}
