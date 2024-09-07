<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Get the selected status from the query parameters
        $status = $request->query('status');

        // If no status is selected, enforce 'Unpaid' status
        if (!$status) {
            return redirect()->route('installment.index', ['projectid' => $request->projectid, 'status' => 'Unpaid']);
        }

        // Otherwise, proceed with the request
        return $next($request);
    }
}
