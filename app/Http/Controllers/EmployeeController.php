<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //menampilkan form tambah data employee
    public function addEmployee() {
        return view('employee.add-employee');

    }


    //menyimpan data employee ke database
    public function storeEmployee(Request $request) {
        $employee = new Employee;
        $employee->nama=$request->nama;
        $employee->alamat=$request->alamat;
        $employee->no_hp=$request->no_hp;
        $employee->posisi=$request->posisi;

        $employee_name = $employee->nama;

        if (is_null($employee->nama) || is_null($employee->alamat)) {
            return redirect()->route('add.employee')->with([
                'error' => 'Silakan lengkapi semua data',
                'nama' => $employee->nama,
                'alamat' => $employee->alamat,
                'no_hp' => $employee->no_hp,
                'posisi' => $employee->posisi
            ]);
        }

        //agar no hp tidak duplicate
        if (Employee::where('no_hp', $employee->no_hp)->exists()) {
            return redirect()->route('add.employee')->with([
                'error' => 'No HP ' . $employee->no_hp . ' sudah terdaftar',
                'nama' => $employee->nama,
                'alamat' => $employee->alamat,
                'no_hp' => $employee->no_hp,
                'posisi' => $employee->posisi
            ]);
        }

        $employee->save();
        
        return redirect()->route('all.employee')->with([
            'success' => $employee_name . ' berhasil ditambahkan'
        ]);
    }


    //menampilkan semua data employee
    public function allEmployee() {
        $employees = Employee::all();
        return view('employee.all-employee', compact('employees'));
    }   

    //menampilkan form edit data employee
    public function editEmployee($id) {
        $employee = Employee::findOrfail($id);
        return view('employee.edit-employee', compact('employee'));
    }

    //mengupdate data employee yang ada di database
    public function updateEmployee(Request $request, $id) {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'posisi' => 'required'
        ]);

        $employee = Employee::findOrFail($id);

       //agar no hp tidak duplicate
        $no_hp = Employee::where('id', $id)->pluck('no_hp')->first();

        $id = $employee->id;
        if ($no_hp != $request->no_hp && Employee::where('no_hp', $request->no_hp)->exists()) {
            return redirect()->route('edit.employee', $id)->with([
                'error' => 'No HP ' . $request->no_hp . ' sudah terdaftar'
            ]);
        }        

        $employee->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'posisi' => $request->posisi
        ]);

        $employee_name = $request->nama;

        if ($employee) {
            return redirect()
                ->route('all.employee')
                ->with([
                    'success' => 'Data ' . $employee_name . ' berhasil diupdate'
                ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Terjadi kesalahan'
            ]);
        }
    }

    //konfirmasi delete data karyawan
    public function confirmDeleteEmployee($id) {

        $employee = Employee::findOrfail($id);
        return view('employee.confirm-delete-employee', compact('employee'));
    }

    //delete data karyawan
    public function deleteEmployee($id) {
        $employee = Employee::findOrFail($id);
        $employee_name = $employee->nama;
        $employee->delete();

        if ($employee) {
            return redirect()
                ->route('all.employee')
                ->with([
                    'success' => 'Data ' . $employee_name . ' berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('all.employee')
                ->with([
                    'error' => 'Terjadi kesalahan'
                ]);
        }
    }

}