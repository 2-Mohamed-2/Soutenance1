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
            // $session_user = DB::select('select deconnexion from session_users where id='.$session_id.' order by created_at DESC limit 1');;
            
            // dd($session_user);
                        
            foreach ($users as $test) {

                $now = Carbon::now();
                $ok = Carbon::create($test->created_at);
                
                $diff = abs( strtotime($now) - strtotime($test->created_at) ); 

                $session_exp = config('session.lifetime') * 60 ;

                $te = $ok->addMinutes(config('session.lifetime'));

                // if ($diff >> $session_exp) { 

                    // $mo = '2023-03-26 15:13:29';  
                    // dd($doc);
                    SessionUser::whereId($session_id)->update([
                        'deconnexion' => $te,
                    ]);
                    
                // }
    
            }
        }

        return $next($request);
        // abort(403 );
    }
}