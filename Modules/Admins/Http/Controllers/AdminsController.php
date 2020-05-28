<?php

namespace Modules\Admins\Http\Controllers;

use App\Admin;
use App\Helpers\Helpers;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminsController extends Controller
{
    /**
     * Page Login
     * Display a listing of the resource.
     * @method get
     */
    public function index()
    {
        try {
            if(Auth::guard(Helpers::guardSystem('admin'))->check()){
                return redirect()->route('success');
            }
            $data['common'] = Helpers::titleAction([__('message.login.title')]);
            return view('admins::login', compact('data'));
        }
        catch (\Exception $ex){
            abort('500');
        }
    }

    /**
     * Page Login
     * @param Request $request
     * @return JsonResponse
     * @method post
     */
    public function postLogin(Request $request){
        try {
            $data = $request->only('email', 'password');
            if(Admin::where('email', $data['email'])->exists()){
                if(Auth::guard('admins')->attempt($data)){
                    return \response()->json(route('success'), 200);
                }
                else{
                    return \response()->json(0, 500);
                }
            }
            else{
                return \response()->json(1, 500);
            }
        }
        catch (\Exception $e){
            abort('500');
        }

    }

    /**
     * Page success
     * @return Factory|View
     * @method get
     */
    public function success(){
        try {
            $data['common'] = Helpers::titleAction([__('message.success.title')]);
            return view('admins::success', compact('data'));
        }catch (\Exception $ex){
            abort('500');
        }
    }
}
