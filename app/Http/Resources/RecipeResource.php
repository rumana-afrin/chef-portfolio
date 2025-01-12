<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category->category_name ?? null, 
            'description' => $this->description,
            'ingredients' => $this->ingredients,
            'instructions' => $this->instructions,
            'nutritious' => $this->nutritious,
            // 'description' => strip_tags($this->description),
            // 'ingredients' => strip_tags($this->ingredients),
            // 'instructions' => strip_tags($this->instructions),
            // 'nutritious' => strip_tags($this->nutritious),
            'image' => url('storage/' . $this->image),
        ];
    }
}
