<?php

namespace App\Controllers;

use Framework\Database;

class ErrorController {
    public static function notFound($message = "Resource not found") {

        http_response_code(404);
        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }

    public static function unauthorized($message = "You are not authorized to view this resource") {

        http_response_code(403);
        loadView('error', [
            'status' => '403',
            'message' => $message
        ]);
    }
}
