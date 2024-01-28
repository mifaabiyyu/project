<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Imports\ImportEmployee;
use App\Models\MasterData\Employee;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee   = Employee::query()->with('get_status', 'get_division');

        if ($request->filled('status')) {
            $employee->where('status', $request->status);
        }

        if ($request->filled('company')) {
            $employee->where('company_id', $request->company);
        }
                
        if ($request->filled('date')) {
            $date = explode('-', $request->date);
            $start = date('Y-m-d', strtotime($date[0]));
            $end = date('Y-m-d', strtotime($date[1]));
            $employee->whereBetween('start_work', [$start, $end]);
        }

        if ($request->filled('division')) {
            $employee->where('division_id', $request->division);
        }

        if ($request->filled('q')) {
            $employee->where('name','LIKE',"%$request->q%");
        }


        return DataTables::eloquent($employee)->make(true);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'gender'        => 'required',
            'nik'           => 'required|unique:employees,nik,',
            'division'      => 'required',
            'position'      => 'required',
            'company'       => 'required',
            'status'        => 'required',
            'bpjs_tk'       => 'required',
            'bpjs_ks'       => 'required',
        ]);

        $imageName = '';

        if ($request->hasFile('photo')) {
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/employee'), $imageName);
        }

        $code = IdGenerator::generate([
            'table' => (new Employee())->getTable(),
            'field' => 'code',
            'length' => 10,
            'prefix' => 'KRYWN' . '-',
            'reset_on_prefix_change' => true
        ]);

        $create     = Employee::create([
            'code'          => $code,
            'name'          => $request->name,
            'gender'        => $request->gender,
            'date_birth'    => $request->date_birth,
            'address'       => $request->address,
            'education'     => $request->education,
            'phone'         => $request->phone,
            'photo'         => $imageName,
            'description'   => $request->description,
            'status'        => $request->status,
            'company_id'    => $request->company,
            'unit_id'       => $request->unit,
            'division_id'   => $request->division,
            'shift_id'      => $request->shift,
            'email'         => $request->email,
            'nik'           => $request->nik,
            'position'      => $request->position,
            'start_work'    => $request->start_work,
            'bpjs_tk'       => $request->bpjs_tk,
            'bpjs_ks'       => $request->bpjs_ks,
        ]);

        $response   = [
            'message'   => 'Employee created successfully !',
            'data'      => $create
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findData   = Employee::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found !'], 422);
        }

        $response   = [
            'message'   => 'Data fetched successfully !',
            'data'      => $findData
        ];

        return response()->json($response, 200);
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
        $findData   = Employee::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found !'], 422);
        }

        $request->validate([
            'name'          => 'required',
            'gender'        => 'required',
            'nik'           => 'required|unique:employees,nik,' . $id,
            'division'      => 'required',
            'position'      => 'required',
            'company'       => 'required',
        ]);

        $imageName  = $findData->photo;

        if($request->hasFile('photo'))
        {
            if ($imageName != null && file_exists(public_path('images/employee/') . $findData->photo)) {
                unlink("images/employee/" . $findData->photo);
            }
            $imageName = date("Ymd").time().rand().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/employee'), $imageName);
        }

        $findData->update([
            'name'          => $request->name,
            'gender'        => $request->gender,
            'date_birth'    => $request->date_birth,
            'address'       => $request->address,
            'education'     => $request->education,
            'phone'         => $request->phone,
            'photo'         => $imageName,
            'description'   => $request->description,
            'status'        => $request->status,
            'company_id'    => $request->company,
            'unit_id'       => $request->unit,
            'division_id'   => $request->division,
            'shift_id'      => $request->shift,
            'email'         => $request->email,
            'nik'           => $request->nik,
            'position'      => $request->position,
            'start_work'    => $request->start_work,
            'bpjs_tk'       => $request->bpjs_tk,
            'bpjs_ks'       => $request->bpjs_ks,
        ]);

        $updated   = Employee::find($id);

        $response   = [
            'message'   => 'Employee updated successfully !',
            'data'      => $updated
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findData   = Employee::find($id);

        if (!$findData) {
            return response()->json(['message'  => 'Data not found !'], 422);
        }

        $file = public_path('images/employee/') . $findData->photo;

        if (file_exists($file)) {
            @unlink($file);
        }
        $findData->delete();

        $response   = [
            'message'   => 'Employee deleted successfully !',
        ];

        return response()->json($response, 200);
    }

    public function download_excel()
    {
        return response()->download(public_path('format-excel/template_employee.xlsx'));
    }

    public function upload_excel(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx'
        ]);
        
        try {
            $file = $request->file('excel');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('import-excel/employee',$nama_file);
    
            $import = new ImportEmployee;
    
            Excel::import($import, public_path('/import-excel/employee/'. $nama_file));
    
            File::delete('import-excel/employee/'. $nama_file);
            
            $response = [
                'message' => 'Employee imported successfully',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 422);
        }
    }
}
