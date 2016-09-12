<?php

namespace soweb\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;


class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->tipoUser != 'admin'){
            Session::flash('message-error','Sin privilegios');
            return redirect()->to('admin');
        }
        return $next($request);
    }
}
