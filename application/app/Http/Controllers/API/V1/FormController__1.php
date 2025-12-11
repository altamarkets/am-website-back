<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\FormSubmitRequest__1;
use App\Services\FormService;

class FormController__1 extends Controller
{
    private $formService;

    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }
    public function submit(FormSubmitRequest__1 $request)
    {
        $this->formService->submit($request->ip(), $request->all());
    }
}
