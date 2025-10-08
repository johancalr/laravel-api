<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    private $includeRecipes;

    public function __construct($resource, bool $includeRecipes = true) {
        parent::__construct($resource);
        $this->includeRecipes = $includeRecipes;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        $data = [
            'id' => $this->id,
            'type' => 'category',
            'attributes' => [
                'name' => $this->name,
            ],
        ];

        if ($this->includeRecipes) {
            $data['relationships']['recipes'] = $this->recipes;
        }

        return $data;
    }
}
