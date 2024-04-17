<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public $data = [];
  private $post = [
        1 => [
            'title' => 'Furniture',
            'description' => 'Furniture Description',
            'price' => 100,
            'image' => 'furniture.jpg',
            'category' => 'furniture',
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00',
        ],
        2 => [
            'title' => 'Furniture 2',
            'description' => 'Furniture Description 2',
            'price' => 200,
            'image' => 'furniture.jpg',
            'category' => 'furniture2',
            'created_at' => '2021-01-05 00:00:00',
            'updated_at' => '2021-01-05 00:00:00',
        ]
    ];

    public function index()
    {
        $this->data['title'] = 'Blog';
        return view('furniture_page.blogs.index', ['post' => $this->post], $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort_if(!isset($this->post[$id]), 404);
        return view('furniture_page.blogs.show', ['post' => $this->post[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
