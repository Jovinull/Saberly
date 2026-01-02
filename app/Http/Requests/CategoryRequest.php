<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoryParam = $this->route('category'); // null no store, id no update (ou Model se usar binding)

        // Se um dia você mudar o controller para usar Category $category, isso aqui continua funcionando:
        $categoryId = $categoryParam instanceof Category ? $categoryParam->getKey() : $categoryParam;

        $uniqueSlug = Rule::unique('categories', 'slug');
        if (!empty($categoryId)) {
            $uniqueSlug = $uniqueSlug->ignore($categoryId);
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', $uniqueSlug],
            'image' => ['nullable', 'mimes:jpeg,png,jpg,gif,webp,svg,avif', 'max:15360'],
        ];
    }
}
