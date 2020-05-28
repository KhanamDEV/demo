<?php

namespace Modules\Admins\Http\Controllers;

use App\Admin;
use App\Helpers\Helpers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    /**
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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

    public function success(){
        try {
            $data['common'] = Helpers::titleAction([__('message.success.title')]);
            return view('admins::success', compact('data'));
        }catch (\Exception $ex){
            abort('500');
        }
    }
}
