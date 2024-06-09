<?php
namespace App\Repositories;

class ResponseRepository
{
    public function __construct()
    {
        $this->createStatusCode = config('httpstatus.created');
        $this->successStatusCode = config('httpstatus.success');
        $this->badRequestStatusCode = config('httpstatus.badRequest');
        $this->notFoundStatusCode = config('httpstatus.badRequest');
        $this->unauthorizedStatusCode = config('httpstatus.unauthorized');
        $this->successMsg = trans('message.successMsg');
        $this->createSuccessMsg = trans('message.createSuccessMsg');
        $this->updateSuccessMsg = trans('message.updateSuccessMsg');
        $this->deletedsuccessMsg = trans('message.deleteSuccessMsg');
        $this->alreadyRegister = trans('message.alreadyRegister');
        $this->notFoundMsg = trans('message.notFoundMsg');
        $this->unauthorisedMsg = trans('message.notFoundMsg');
        $this->badRequestMsg = trans('message.badRequestMsg');
        $this->overNewsfeedMediaUploadLimit = trans('message.overNewsfeedMediaUploadLimit');
        $this->akoneyaMediaFolder  = config('enums.akoneyaMediaFolder');
    }

    public function jsonResponse($data, $statusCode, $message)
    {
        return response()->json([
            'result' => $data,
            'statusCode' => $statusCode,
            'message'=> $message
        ], $statusCode);
    }
    public function successResponse($data, $successStatusCode, $message)
    {
        return $this->jsonResponse($data, $successStatusCode, $message);
    }
    public function failResponse($data, $failStatusCode, $message)
    {
        return $this->jsonResponse($data, $failStatusCode, $message);
    }
}
