<?php 

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class PreventAccountAccess
{
    public function handle($request, Closure $next)
    {
        
       
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the user has the appropriate role to access the requested account
        if ($user && $user->role_id != 1) {
            // Redirect or throw an exception to handle unauthorized access
            return 'Unauthorized access.';
            return redirect('/home')->with('error', 'Unauthorized access.');
        }
       
        return $next($request);
    }
}

?>