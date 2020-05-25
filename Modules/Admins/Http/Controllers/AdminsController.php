<?php

namespace Modules\Admins\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        try {
            return view('admins::layouts.sign-in');
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
            if(Auth::attempt($data)){
                return \response()->json(route('success'), 200);
            }
            return \response()->json('', 500);
        }
        catch (\Exception $e){
            abort('500');
        }
    }

    public function success(){
        try {
            return view('admins::layouts.master');
        }catch (\Exception $e){
            abort('500');
        }
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admins::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admins::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admins::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
