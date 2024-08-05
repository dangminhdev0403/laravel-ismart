<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            //
            'name' => 'required',

            'quantity' => 'required',
            'category_id' => 'required',
            'price' => 'required',

            'description' => 'required',
            'content' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
        ];
    }
    /**
     * Xác định các thông báo lỗi tuỳ chỉnh cho các quy tắc xác thực.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute có độ dài ít nhất :min ký tự',
            'confirmed' => 'Xác nhận mật khẩu không thành công',
            'category_id.required' => 'Hãy chọn danh mục',
            'images.required' => 'Bạn phải chọn ít nhất một hình ảnh',
            'images.*.image' => 'Tất cả các tệp phải là hình ảnh',
            'images.*.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg','jfif',
            'images.*.max' => 'Hình ảnh không được vượt quá 2MB',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'tên',
            'quantity' => 'số lượng',
            'category_id' => 'danh mục',
            'price' => 'giá',
            'description' => 'mô tả',
            'content' => 'nội dung',
            'images' => 'hình ảnh',
        ];
    }
}
