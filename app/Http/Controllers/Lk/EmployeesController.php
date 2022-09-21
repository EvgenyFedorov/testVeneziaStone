<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\Models\Lk\Employees;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{

    use ValidatesRequests;

    public function index()
    {
        $employees = Employees::where([['deleted_at', NULL]])->orderBy('created_at', 'DESC')->get();
        return view('index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $post = $request->all();

        $rules = [
            'name'       => 'required|string|max:25',
            'surName'    => 'required|string|max:25',
            'middleName' => 'required|string|max:25',
            'age'        => 'required|string|max:3',
            'salary'     => 'required|string|min:6|max:6',
        ];

        $validated = Validator::make($post, $rules);

        if($validated->passes()) {

            $createEmployee = new Employees();

            $createEmployee->uuid = Str::uuid();

            $createEmployee->name = $post['name'];
            $createEmployee->surName = $post['surName'];
            $createEmployee->middleName = $post['middleName'];

            $createEmployee->age = $post['age'];
            $createEmployee->children = isset($post['children']) && !empty($post['children']) ? $post['children'] : NULL;
            $createEmployee->salary = $post['salary'];
            $createEmployee->isCompanyCar = isset($post['isCompanyCar']) && !empty($post['isCompanyCar']) ? 1 : NULL;

            $createEmployee->save();

            return redirect('/');


        }else{

            return redirect('/');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
