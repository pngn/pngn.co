<?php namespace PNGN\Http\Requests;

use PNGN\Http\Requests\Request;

class StoreLinkRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'url' => 'url|required|max:1024'
		];
	}

}
