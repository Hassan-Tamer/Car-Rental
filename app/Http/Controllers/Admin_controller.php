<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Customer;
use Hash;
use Illuminate\Routing\Controller;
use Session;
use App\Models\Car;
use App\Models\car_status;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\QueryException;


class Admin_controller extends Controller
{
    public function add()
    {
        $query2 = "SELECT office_id from office;";
        $res2 = DB::select($query2);
        return view('admin.Add', ['offs' => $res2]);
    }

    public function update()
    {
        $query2 = "SELECT plate_number from car;";
        $res2 = DB::select($query2);
        return view('admin.Update', ['plates' => $res2]);
    }

    public function update_car(Request $request)
    {
        $request->validate([
            'plateNumber_update' => 'required',
            'status' => 'required|in:available,out_of_service'
        ]);


        $stat = $request->input('status');
        $car_plate = $request->input('plateNumber_update');

        $update_car_query = "UPDATE car SET current_status = ? WHERE plate_number = ? ";
        DB::update($update_car_query, [$stat, $car_plate]);
        $msg = "*Status updated successfully";

        $carInsert = "INSERT into car_status values(?, ?, ?) ON DUPLICATE KEY UPDATE status=?";
        DB::insert($carInsert, [
            $car_plate,
            $stat,
            now()->format("Y-m-d"),
            $stat,
        ]);
        return back()->with('success', $msg);
    }

    public function delete_car(Request $request)
    {
        $request->validate([
            'plateNumber_delete' => 'required'
        ]);

        $delete_car_query = "DELETE FROM car WHERE plate_number = ?";
        $res = DB::delete($delete_car_query, [$request->input('plateNumber_delete')]);

        if ($res) {
            $msg = "*Car with plate number: " . $request->input('plateNumber_delete') . " deleted successfully.";
            return back()->with('success', $msg);
        } else {
            $msg = "*Car with plate number " . $request->input('plateNumber_delete') . " not found.";
            return back()->with('fail', $msg);
        }
    }


    public function users()
    {
        $query = "SELECT * FROM customer";
        $users = DB::select($query);
        return view('admin.Users', ['users' => $users]);
    }

    public function add_car(Request $request)
    {
        $request->validate([
            'plateNumber' => 'required',
            'color' => 'required',
            'year' => 'required',
            'model' => 'required',
            'office_id' => 'required',
            'price' => 'required',
            'current_status' => 'required'
        ]);


        DB::beginTransaction();

        try {
            $query_car = "INSERT INTO car (plate_number, year, model, color, office_id, price, current_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

            $query_car_status = "INSERT INTO car_status (plate_number, `date`, `status`) 
                VALUES (?, ?, ?)";

            $res = DB::insert($query_car, [
                $request->plateNumber,
                $request->year,
                $request->model,
                $request->color,
                $request->office_id,
                $request->price,
                $request->current_status
            ]);

            $res2 = DB::insert($query_car_status, [
                $request->plateNumber,
                Carbon::now(),
                $request->current_status
            ]);

            if ($res && $res2) {
                DB::commit();
                return back()->with('success', 'You have added a car successfully');
            } else {
                DB::rollBack();
                return back()->with('fail', 'Something went wrong');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('fail', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function register()
    {
        $query2 = "SELECT office_id from office;";
        $res2 = DB::select($query2);
        return view("admin.Register", ['offs' => $res2]);
    }

    public function view_tab()
    {
        $query = "SELECT DISTINCT color FROM car;";
        $ress = DB::select($query);
        $query2 = "SELECT office_id from office;";
        $res2 = DB::select($query2);

        //dd($ress);
        return view("admin.View", ['res' => $ress, 'offs' => $res2]);
    }

    public function register_admin(Request $request)
    {

        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'officeID' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|confirmed|min:6|max:12',
            'ssn' => 'required'
        ]);

        try {
            $query = "INSERT INTO `admin` (ssn, fname, lname, office_id , email , `password`) VALUES (?, ?, ?, ?, ?, ?)";
            $res = DB::insert($query, [
                $request->ssn,
                $request->f_name,
                $request->l_name,
                $request->officeID,
                $request->email,
                    // bcrypt($request->password)
                ($request->password)
            ]);

            if ($res) {
                return back()->with('success', 'You have registered successfully');
            } else {
                return back()->with('fail', 'Something went wrong');
            }
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return back()->with('fail', 'Failed to add admin. SSN exists.');
            } else if ($errorCode == 1452) {
                return back()->with('fail', 'Failed to add admin. Office ID does not exist.');
            } else {
                return back()->with('fail', 'Failed to add admin. Error: ' . $e->getMessage());
            }
        }
    }

    public function originalPage(Request $request)
    {
        return $this->users();
    }

    public function search(Request $request)
    {
        $srch = $request->input('search');
        $searchQuery = '%' . $srch . '%';

        $query = "SELECT * FROM customer WHERE (fname LIKE ? 
    OR lname LIKE ? OR email LIKE ? OR phone_number LIKE ? 
    OR SSN LIKE ?)";
        $users = DB::select($query, [$searchQuery, $searchQuery, $searchQuery, $searchQuery, $searchQuery]);

        return view('admin.Users', compact('users'));
    }

    public function search_car_admin(Request $request)
    {
        $conditions = "";

        $office = $request->query('office');
        if (!empty($office)) {
            // $conditions['office_id'] = $office;
            $conditions .= "office_id = $office";
        }

        $color = $request->query('color');
        if (!empty($color)) {
            // $conditions['color'] = $color;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "color = '$color'";

        }

        $year = $request->query('year');
        if (!empty($year)) {
            // $conditions['year'] = $year;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "year = $year";
        }

        $model = $request->query('model');
        if (!empty($model)) {
            // $conditions['model'] = $model;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "model = '$model'";
        }

        $price = $request->query('price');
        if (!empty($price)) {
            // $conditions['price'] = $price;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "price = $price";
        }

        $current_status = $request->query('current_status');
        if (!empty($current_status)) {
            // $conditions['current_status'] = $current_status;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "current_status = '$current_status'";
        }

        $plate = $request->query('plate');
        if (!empty($plate)) {
            // $conditions['plate'] = $plate;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "plate_number LIKE '%$plate%' ";
        }

        $query = "SELECT * FROM car";
        if (!empty($conditions)) {
            $query .= " WHERE $conditions";
        }

        $results = DB::select($query);

        return view('admin.ViewCars_advancedSearch', compact('results'));
    }

    public function originalPage_car(Request $request)
    {
        return $this->search_car_admin($request);
    }

    // **********************REPORTS************************

    // **********************TAB1************************
    public function Reservations(Request $request)
    {
        $query = "SELECT * FROM car
                NATURAL JOIN rent
                NATURAL JOIN customer
                NATURAL JOIN office";
        $results = DB::select($query);
        return view("admin.Reservations", [
            "results" => $results
        ]);
    }


    public function Reservations_apply(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');

        $query = "SELECT * FROM car
        NATURAL JOIN rent
        NATURAL JOIN customer
        NATURAL JOIN office
        WHERE start_date >= '$start_date' AND end_date <= '$end_date'";

        $results = DB::select($query);
        return view(
            'admin.Reservations',
            [
                "results" => $results,
                "start_date" => $start_date,
                "end_date" => $end_date
            ]
        );
    }

    // **********************TAB2************************
    public function carReservation(Request $request)
    {
        $query = "SELECT * FROM car
        NATURAL JOIN rent
        NATURAL JOIN customer
        NATURAL JOIN office";

        $results = DB::select($query);
        return view("admin.carReservation", [
            "results" => $results
        ]);
    }

    public function carReservations_apply(Request $request)
    {
        $validationRules = [
            'plateNumber' => 'nullable', // Allow plate number to be null
        ];

        // Check if either start_date or end_date is provided, and add them to validation rules accordingly
        if ($request-> start_date and $request->end_date) {
            $validationRules['start_date'] = 'required';
            $validationRules['end_date'] = 'required';
        }
        else{
            $validationRules = ['plateNumber' => 'required',
                                'start_date' => 'nullable',
                                'end_date' => 'nullable',
        ];
        }
        //dd($validationRules);
        // Validate the request
        $request->validate($validationRules);

        // Get the input data
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $plate = $request->plateNumber;
        //dd($plate);
        // Format the dates
        $start_date = $start_date ? Carbon::parse($start_date)->format('Y-m-d') : null;
        $end_date = $end_date ? Carbon::parse($end_date)->format('Y-m-d') : null;

        // Build the base query
        $query = "SELECT * FROM car
        NATURAL JOIN rent
        NATURAL JOIN customer
        NATURAL JOIN office
        WHERE 1"; // 1 is always true to start the query

        // Modify the query based on the presence of start_date and end_date
        if ($start_date && $end_date) {
            $query .= " AND start_date >= '$start_date' AND end_date <= '$end_date'";
        }

        // Add condition for plate_number if provided
        if ($plate) {
            $query .= " AND car.plate_number = '$plate'";
        }
        //dd($plate);
        // Execute the query
        $results = DB::select($query);

        // Return the results to the view
        return view(
            'admin.carReservation',
            [
                "results" => $results,
                "start_date" => $start_date,
                "end_date" => $end_date,
                "plateNumber" => $plate
            ]
        );

    }

    // **********************TAB3************************
    public function carStatus(Request $request)
    {
        $query = "SELECT * FROM car_status
        NATURAL JOIN car
        NATURAL JOIN office
        ";

        $results = DB::select($query);
        return view("admin.carStatus", [
            "results" => $results
        ]);
    }

    public function carStatus_apply(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ]);

        $date = $request->date;

        $date = Carbon::parse($date)->format('Y-m-d');

        $query = "SELECT * 
          FROM car_status
          NATURAL JOIN car
          NATURAL JOIN office
          WHERE date LIKE '%" . $date . "%'";

        $results = DB::select($query);
        return view(
            'admin.carStatus',
            [
                "results" => $results,
                "date" => $date,
            ]
        );
    }
    // **********************TAB4************************
    public function customerReservation(Request $request)
    {
        $query = "
        SELECT * FROM customer
        NATURAL JOIN rent
        NATURAL JOIN car
        NATURAL JOIN office;
        ";

        $results = DB::select($query);
        return view("admin.customerReservation", [
            "results" => $results
        ]);
    }

    public function customerReservation_apply(Request $request)
    {
        $srch = $request->input('search');
        $searchQuery = '%' . $srch . '%';

        $query = "
    SELECT * FROM customer
        NATURAL JOIN rent
        NATURAL JOIN car
        NATURAL JOIN office
    WHERE (fname LIKE '$searchQuery' 
        OR lname LIKE '$searchQuery' 
        OR email LIKE '$searchQuery' 
        OR phone_number LIKE '$searchQuery' 
        OR SSN LIKE '$searchQuery')
        ";

        $results = DB::select($query);
        return view("admin.customerReservation", [
            "results" => $results
        ]);
    }

    // **********************TAB5************************
    public function payements(Request $request)
    {
        $query = "SELECT DATE(start_date) AS payment_day, SUM(amount_paid) AS total_payment
        FROM rent
        GROUP BY DATE(start_date)
        ORDER BY payment_day";

        $results = DB::select($query);
        return view("admin.payements", [
            "results" => $results
        ]);
    }

    public function payements_apply(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $start_date = Carbon::parse($start_date)->format('Y-m-d');
        $end_date = Carbon::parse($end_date)->format('Y-m-d');

        $query = "SELECT DATE(start_date) AS payment_day, SUM(amount_paid) AS total_payment
        FROM rent
        WHERE start_date BETWEEN '$start_date' AND '$end_date'
        GROUP BY DATE(start_date)
        ORDER BY payment_day";

        $results = DB::select($query);
        return view(
            'admin.payements',
            [
                "results" => $results,
                "start_date" => $start_date,
                "end_date" => $end_date
            ]
        );
    }


    public function add_office(Request $request){
        // $request->validate([
        //     'country' => 'required',
        //     'city' => 'required',
        //     'district' => 'required',
        // ]);


            return view("admin.add_office");
            // $query = "INSERT INTO office (country, city, district) 
            //     VALUES (?, ?, ?)";

            // $res = DB::insert($query, [
            //     $request->country,
            //     $request->city,
            //     $request->district,
             
            // ]);


            // if ($res) {
            //     return back()->with('success', 'You have added an office successfully');
            // } else {
            //     return back()->with('fail', 'Something went wrong');
            // }
       
    
}

public function add_office_apply(Request $request)
{
    $request->validate([
            'country' => 'required',
            'city' => 'required',
            'district' => 'required',
        ]);


        
        $query = "INSERT INTO office (country, city, district) 
            VALUES (?, ?, ?)";

        $res = DB::insert($query, [
            $request->country,
            $request->city,
            $request->district,
         
        ]);


        if ($res) {
            return back()->with('success', 'You have added an office successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
}

}