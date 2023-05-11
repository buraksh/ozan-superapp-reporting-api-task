<?php

namespace App\Logging;

class RequestDataProcessor
{
    /**
     * Adds additional request data to the log message.
     *
     * @param array $record
     *
     * @return array
     */
    public function __invoke($record)
    {
        $request = request();

        $record['extra'] = array_merge($record['extra'], [
            'user_id'    => auth()->id(),
            'method'     => $request->method(),
            'url'        => $request->getRequestUri(),
            'ip'         => $request->ip(),
            'user_agent' => $request->userAgent(),
            'inputs'     => $request->input(),
        ]);

        return $record;
    }
}
