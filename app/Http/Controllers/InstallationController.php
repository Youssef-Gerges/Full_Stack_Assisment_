<?php

namespace App\Http\Controllers;

use App\Http\Requests\MigrateRequest;
use App\Services\ResponseFormatter;

class InstallationController extends Controller
{
    public function migrate(MigrateRequest $request)
    {
        try {

            \Artisan::call('module:migrate ' . $request['module']);
            return ResponseFormatter::success(__('Module successfully migrated.'));

        } catch (\Throwable $exception) {

            return ResponseFormatter::error($exception->getMessage());

        }
    }
}

