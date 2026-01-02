<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\SubCategory;

class SubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $subParam = $this->route('subcategory'); // null no store, id (ou Model) no update

        // Compatível com Route Model Binding (caso você use SubCategory $subcategory na rota/controller)
        $subcategoryId = $subParam instanceof SubCategory ? $subParam->getKey() : $subParam;

        $uniqueName = Rule::unique('sub_categories', 'name');
        $uniqueSlug = Rule::unique('sub_categories', 'slug');

        if (!empty($subcategoryId)) {
            $uniqueName = $uniqueName->ignore($subcategoryId);
            $uniqueSlug = $uniqueSlug->ignore($subcategoryId);
        }

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255', $uniqueName],
            'slug' => ['nullable', 'string', 'max:255', $uniqueSlug],
        ];
    }
}
