<?php
namespace App\Helpers;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;

class NotificationHelper
{
    public static function notifySuccess(string $message): array
    {
        return [
            'alert-type' => 'success',
            'message' => $message,
        ];
    }

    public static function notifyWarning(string $message): array
    {
        return [
            'alert-type' => 'warning',
            'message' => $message,
        ];
    }

    public static function notifyErrorList(MessageBag $errors): array
    {
        $message = '<ul>';
        foreach ($errors->all() as $error) {
            $message .= "<li>$error</li>";
        }
        $message .= "</ul>";

        return [
            'alert-type' => 'error',
            'message' => $message,
        ];
    }

    public static function notifyError(Exception $e): array
    {
        Log::error("Error at {$e->getFile()} line {$e->getLine()}: {$e->getMessage()}");
        return [
            'alert-type' => 'error',
            'message' => "Something went wrong",
        ];
    }

    public function notifyInfo(string $message): array
    {
        return [
            'alert-type' => 'info',
            'message' => $message,
        ];
    }
}
