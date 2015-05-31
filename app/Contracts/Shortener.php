<?php namespace PNGN\Contracts;
use Illuminate\Http\Request;
use PNGN\Http\Requests\StoreLinkRequest;

interface Shortener {
	public function make(StoreLinkRequest $request);
}