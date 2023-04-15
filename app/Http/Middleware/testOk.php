<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\SessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class testOk
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $request->session()->put('test_id', $request->user()->id);

        if (Auth::check()) {
            
            $id = Auth::user()->id;            

            $users = DB::select('select created_at from activity_logs where user_id='.$id.' order by created_at DESC limit 1');

            $session_id = session()->get('session_id');
                        
            foreach ($users as $test) {

                $ok = Carbon::create($test->created_at);
                
                $te = $ok->addMinutes(config('session.lifetime'));

                SessionUser::whereId($session_id)->update([
                    'deconnexion' => $te,
                ]);
    
            }
        }

        return $next($request);
        // abort(403 );
    }
}