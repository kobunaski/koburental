<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Feedback;
use App\Manufacture;
use App\PickupLocation;
use App\User;
use App\Vehicle;
use App\VehicleDetail;
use App\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    //
    public function view()
    {
        //Declare the objects that is needed to view
        $Vehicle = Vehicle::orderBy('created_at', 'desc')->get();
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();

        //Pass the declare objects to the view
        return view('admin.vehicle.view', [
            'Vehicle' => $Vehicle,
            'VehicleType' => $VehicleType,
            'Manufacture' => $Manufacture,
            'PickupLocation' => $PickupLocation
        ]);
    }

    public function viewClient(Request $request)
    {
        //Declare the needed arrays
        $available_vehicle = $array_different =
        $array_available_vehicle = $array_available_vehicle_filter = $unavailable_vehicle = array();

        //Declare the needed variables
        $end_price = $start_price = $pickup_date = $return_date =
        $seat = $fuel = $air_con = $bluetooth = $gearbox = null;

        //Get the values from the search and filter request
        $id_pickup_location = $request->pickup_location;
        $filter = $request->filter;
        $pickup_date = $request->pickup_date;
        $return_date = $request->return_date;
        $seat = $request->seat;
        $fuel = $request->fuel;
        $air_con = $request->air_con;
        $bluetooth = $request->bluetooth;
        $gearbox = $request->gearbox;

        //get the price
        $start_price = filter_var($request->start_price, FILTER_SANITIZE_NUMBER_INT);
        $end_price = filter_var($request->end_price, FILTER_SANITIZE_NUMBER_INT);

        //get the records from the model
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        $Feedback = Feedback::all();
        $VehicleDetail = VehicleDetail::all();

        if ($id_pickup_location == 0 && $filter == 0) {
            if ($pickup_date == '') {
                $Vehicle = Vehicle::paginate(6);
            } else {
                $array_available_vehicle = $this->time_limit($pickup_date, $return_date);
                $Vehicle = Vehicle::whereIn('id', $array_available_vehicle)->paginate(6);
            }
        } else if ($id_pickup_location != 0 && $filter == 0) {
            if ($pickup_date == '') {
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)->paginate(6);
            } else {
                $array_available_vehicle = $this->time_limit($pickup_date, $return_date);
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)->whereIn('id', $array_available_vehicle)->paginate(6);
            }
        } else if ($id_pickup_location == 0 && $filter != 0) {

            $array_different = $this->filtering($seat, $fuel, $air_con, $bluetooth, $start_price, $end_price);

            if ($pickup_date == '') {
                $Vehicle = Vehicle::whereIn('id', $array_different)->paginate(6);
            } else {
                $array_available_vehicle = $this->time_limit($pickup_date, $return_date);
                $Vehicle = Vehicle::whereIn('id', $array_different)->whereIn('id', $array_available_vehicle)->paginate(6);
            }
        } else if ($id_pickup_location != 0 && $filter != 0) {

            $array_different = $this->filtering($seat, $fuel, $air_con, $bluetooth, $start_price, $end_price);

            if ($pickup_date == '') {
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)->whereIn('id', $array_different)->paginate(6);
            } else {
                $array_available_vehicle = $this->time_limit($pickup_date, $return_date);
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)
                    ->whereIn('id', $array_different)
                    ->whereIn('id', $array_available_vehicle)->paginate(6);
            }
        }

        return view('client.vehicle.view', [
            'start_price' => $start_price,
            'end_price' => $end_price,
            'filter' => $filter,
            'seat' => $seat,
            'fuel' => $fuel,
            'air_con' => $air_con,
            'bluetooth' => $bluetooth,
            'array_different' => $array_different,
            'return_date' => $return_date,
            'pickup_date' => $pickup_date,
            'array_available_vehicle' => $array_available_vehicle,
            'id_pickup_location' => $id_pickup_location,
            'Feedback' => $Feedback, 'Vehicle' => $Vehicle,
            'VehicleDetail' => $VehicleDetail,
            'VehicleType' => $VehicleType,
            'Manufacture' => $Manufacture,
            'PickupLocation' => $PickupLocation
        ]);
    }

    public function viewDetailClient($id)
    {
        $Vehicle = Vehicle::find($id);
        $User = User::all();
        $VehicleDetail = VehicleDetail::all();
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        $Feedback = Feedback::all();
        $Booking = Booking::all();
        foreach ($Feedback as $item) {
            if ($id == $item->id_vehicle) {
                $rating[] = $item->rating;
            }
        }
        if (isset($rating)) {
            $average_rating = number_format(array_sum($rating) / count($rating), 1);
        } else {
            $average_rating = 0;
        }

        $Vehicle->view_count = ($Vehicle->view_count + 1);

        $Vehicle->save();

        return view('client.vehicle.viewdetail', [
            'average_rating' => $average_rating,
            'User' => $User, 'Vehicle' => $Vehicle,
            'VehicleDetail' => $VehicleDetail,
            'VehicleType' => $VehicleType,
            'Manufacture' => $Manufacture,
            'PickupLocation' => $PickupLocation,
            'Feedback' => $Feedback,
            'Booking' => $Booking
        ]);
    }

    public function getAdd()
    {
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.add', [
            'VehicleType' => $VehicleType,
            'Manufacture' => $Manufacture,
            'PickupLocation' => $PickupLocation
        ]);
    }

    public function postAdd(Request $request)
    {
        //This will validate the input form from the users
        $this->validate($request, [
            'name' => 'required',
            'id_model' => 'required',
            'id_pickup_location' => 'required',
            'daily_price' => 'required',
            'image' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',
        ], [
            'name.required' => 'User name field can\'t be empty',
            'id_model.required' => 'Model field can\'t be empty',
            'id_pickup_location.required' => 'Pickup Location field can\'t be empty',
            'daily_price.required' => 'Price field can\'t be empty',
            'image.required' => 'Image field can\'t be empty',
            'image2.required' => 'Image 2 field can\'t be empty',
            'image3.required' => 'Image 3 field can\'t be empty',
            'image4.required' => 'Image 4 field can\'t be empty',
        ]);

        //Create a new vehicle record
        $Vehicle = new Vehicle;

        //Get the data from the input form
        $Vehicle->name = $request->name;
        $Vehicle->id_model = $request->id_model;
        $Vehicle->id_pickup_location = $request->id_pickup_location;
        $Vehicle->daily_price = $request->daily_price;
        $Vehicle->view_count = 0;

        //Get the images from the input forms
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image = $image;
        }

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image2 = $image;
        }

        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image3 = $image;
        }

        if ($request->hasFile('image4')) {
            $file = $request->file('image4');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image4 = $image;
        }

        //Save the data to the database
        $Vehicle->save();

        //redirect to the view page will an alert success
        return redirect('admin/vehicle/view')->with('alert', 'Added new vehicle');
    }

    public function getEdit($id)
    {
        $Vehicle = Vehicle::find($id);
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.edit', [
            'Vehicle' => $Vehicle,
            'VehicleType' => $VehicleType,
            'Manufacture' => $Manufacture,
            'PickupLocation' => $PickupLocation
        ]);
    }

    public function postEdit(Request $request, $id)
    {
        //This will validate the input form from the users
        $this->validate($request, [
            'name' => 'required',
            'id_model' => 'required',
            'id_pickup_location' => 'required',
            'daily_price' => 'required',
        ], [
            'name.required' => 'User name field can\'t be empty',
            'id_model.required' => 'Model field can\'t be empty',
            'id_pickup_location.required' => 'Pickup Location field can\'t be empty',
            'daily_price.required' => 'Price field can\'t be empty',
        ]);
        //Find the id of the vehicle to edit the information
        $Vehicle = Vehicle::find($id);

        $Vehicle->name = $request->name;
        $Vehicle->id_model = $request->id_model;
        $Vehicle->id_pickup_location = $request->id_pickup_location;
        $Vehicle->daily_price = $request->daily_price;
        //save file image and move it the the image folder
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image = $image;
        }

        //the following are also image for the vehicle
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image2 = $image;
        }

        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image3 = $image;
        }

        if ($request->hasFile('image4')) {
            $file = $request->file('image4');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image4 = $image;
        }

        //save the information to the vehicle with the id above
        $Vehicle->save();

        //return to the view page with alert success
        return redirect('admin/vehicle/view')->with('alert', 'Model Edit Successful');
    }

    public function searchResult1(Request $request)
    {
        $available_vehicle = $array_different = $array_available_vehicle = $array_available_vehicle_filter = $unavailable_vehicle = array();
        $end_price = $start_price = $pickup_date = $return_date = $seat = $fuel = $air_con = $bluetooth = $gearbox = null;

        $id_pickup_location = $request->pickup_location;
        $filter = $request->filter;

        $Vehicle = Vehicle::all();
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        $Feedback = Feedback::all();
        $VehicleDetail = VehicleDetail::all();
        $VehicleAll = Vehicle::all();
        $Booking = Booking::all();

        if ($id_pickup_location != 0) {
            $pickup_date = $request->pickup_date;
            $time = strtotime($pickup_date);
            $new_pickup_date = date('Y-m-d', $time);

            $return_date = $request->return_date;
            $time2 = strtotime($return_date);
            $new_return_date = date('Y-m-d', $time2);

            foreach ($Booking as $item) {
                if ($new_pickup_date >= $item->pickup_day && $new_pickup_date <= $item->drop_day) {
                    $array_vehicle_pickup[] = $item->id_vehicle;
                } else if ($new_return_date >= $item->pickup_day && $new_return_date <= $item->drop_day) {
                    $array_vehicle_return[] = $item->id_vehicle;
                }
            }

            if (isset($array_vehicle_pickup)) {
                $array_vehicle_pickup_unique = array_unique($array_vehicle_pickup);
                foreach ($array_vehicle_pickup_unique as $item) {
                    $available_vehicle[$item] = $item;
                }
            }

            if (isset($array_vehicle_return)) {
                $array_vehicle_return_unique = array_unique($array_vehicle_return);
                sort($array_vehicle_return_unique);
                foreach ($array_vehicle_return_unique as $item) {
                    $available_vehicle[$item] = $item;
                }
            }

            foreach ($VehicleAll as $item) {
                if (isset($available_vehicle[$item->id])) {

                } else {
                    $array_available_vehicle[] = $item->id;
                }
            }

            if (isset($filter)) {
                $seat = $request->seat;
                $fuel = $request->fuel;
                $air_con = $request->air_con;
                $bluetooth = $request->bluetooth;
                $gearbox = $request->gearbox;
                $start_price = filter_var($request->start_price, FILTER_SANITIZE_NUMBER_INT);
                $end_price = filter_var($request->end_price, FILTER_SANITIZE_NUMBER_INT);

                if ($seat != 0) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->seat == $seat) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                if ($fuel != 0) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->fuel == $fuel) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                if (isset($air_con)) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->air_con == $air_con) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                if (isset($bluetooth)) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->bluetooth == $bluetooth) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                foreach ($Vehicle as $item) {
                    if ($item->daily_price >= $start_price && $item->daily_price <= $end_price) {
                        if (!isset($array_available_vehicle_filter[$item->id])) {
                            $array_available_vehicle_filter[$item->id] = $item->id;
                        }
                    } else {
                        if (!isset($unavailable_vehicle[$item->id])) {
                            $unavailable_vehicle[$item->id] = $item->id;
                        }
                    }
                }

//                if (isset($gearbox)) {
//                    foreach ($VehicleDetail as $item) {
//                        if ($item->gearbox == $gearbox) {
//                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
//                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
//                            }
//                        } else {
//                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
//                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
//                            }
//                        }
//                    }
//                }
            }
        } else {
            if (isset($filter)) {
                $seat = $request->seat;
                $fuel = $request->fuel;
                echo $air_con = $request->air_con;
                $bluetooth = $request->bluetooth;
                $gearbox = $request->gearbox;
                $start_price = filter_var($request->start_price, FILTER_SANITIZE_NUMBER_INT);
                $end_price = filter_var($request->end_price, FILTER_SANITIZE_NUMBER_INT);

                if ($seat != 0) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->seat == $seat) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                if ($fuel != 0) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->fuel == $fuel) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                if (isset($air_con)) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->air_con == $air_con) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                if (isset($bluetooth)) {
                    foreach ($VehicleDetail as $item) {
                        if ($item->bluetooth == $bluetooth) {
                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                            }
                        } else {
                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                            }
                        }
                    }
                }

                foreach ($Vehicle as $item) {
                    if ($item->daily_price >= $start_price && $item->daily_price <= $end_price) {
                        if (!isset($array_available_vehicle_filter[$item->id])) {
                            $array_available_vehicle_filter[$item->id] = $item->id;
                        }
                    } else {
                        if (!isset($unavailable_vehicle[$item->id])) {
                            $unavailable_vehicle[$item->id] = $item->id;
                        }
                    }
                }
            }
        }

        if ($id_pickup_location != 0 && isset($filter)) {
            $array = array_diff($array_available_vehicle_filter, $unavailable_vehicle);
            $array_different = array_intersect($array_available_vehicle, $array);
        } else if ($id_pickup_location != 0) {
            $array_different = $array_available_vehicle;
        } else if (isset($filter)) {
            $array_different = array_diff($array_available_vehicle_filter, $unavailable_vehicle);
        }

        //return view('client.vehicle.search_result', ['start_price' => $start_price, 'end_price' => $end_price, 'filter' => $filter, 'seat' => $seat, 'fuel' => $fuel, 'air_con' => $air_con, 'bluetooth' => $bluetooth, 'array_different' => $array_different, 'return_date' => $return_date, 'pickup_date' => $pickup_date, 'array_available_vehicle' => $array_available_vehicle, 'id_pickup_location' => $id_pickup_location, 'Feedback' => $Feedback, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function searchResult(Request $request)
    {
        $available_vehicle = $array_different = $array_available_vehicle = $array_available_vehicle_filter = $unavailable_vehicle = array();
        $end_price = $start_price = $pickup_date = $return_date = $seat = $fuel = $air_con = $bluetooth = $gearbox = null;

        $id_pickup_location = $request->pickup_location;
        $filter = $request->filter;
        $pickup_date = $request->pickup_date;
        $return_date = $request->return_date;
        $seat = $request->seat;
        $fuel = $request->fuel;
        $air_con = $request->air_con;
        $bluetooth = $request->bluetooth;
        $gearbox = $request->gearbox;
        $start_price = filter_var($request->start_price, FILTER_SANITIZE_NUMBER_INT);
        $end_price = filter_var($request->end_price, FILTER_SANITIZE_NUMBER_INT);

        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        $Feedback = Feedback::all();
        $VehicleDetail = VehicleDetail::all();
        $VehicleAll = Vehicle::all();
        $Booking = Booking::all();

        if ($id_pickup_location == 0 && $filter == 0) {
            $Vehicle = Vehicle::paginate(6);
        } else if ($id_pickup_location != 0 && $filter == 0) {
            if ($pickup_date == '') {
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)->paginate(6);
            } else {
                $array_available_vehicle = $this->time_limit($pickup_date, $return_date);
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)->whereIn('id', $array_available_vehicle)->paginate(6);
            }
        } else if ($id_pickup_location == 0 && $filter != 0) {

            $array_different = $this->filtering($seat, $fuel, $air_con, $bluetooth, $start_price, $end_price);

            if ($pickup_date == '') {
                $Vehicle = Vehicle::whereIn('id', $array_different)->paginate(6);
            } else {
                $array_available_vehicle = $this->time_limit($pickup_date, $return_date);
                $Vehicle = Vehicle::whereIn('id', $array_different)->whereIn('id', $array_available_vehicle)->paginate(6);
            }
        } else if ($id_pickup_location != 0 && $filter != 0) {

            $array_different = $this->filtering($seat, $fuel, $air_con, $bluetooth, $start_price, $end_price);

            if ($pickup_date == '') {
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)->whereIn('id', $array_different)->paginate(6);
            } else {
                $array_available_vehicle = $this->time_limit($pickup_date, $return_date);
                $Vehicle = Vehicle::where('id_pickup_location', '=', $id_pickup_location)->whereIn('id', $array_different)->whereIn('id', $array_available_vehicle)->paginate(6);
            }
        }

        return view('client.vehicle.search_result1', ['start_price' => $start_price, 'end_price' => $end_price, 'filter' => $filter, 'seat' => $seat, 'fuel' => $fuel, 'air_con' => $air_con, 'bluetooth' => $bluetooth, 'array_different' => $array_different, 'return_date' => $return_date, 'pickup_date' => $pickup_date, 'array_available_vehicle' => $array_available_vehicle, 'id_pickup_location' => $id_pickup_location, 'Feedback' => $Feedback, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    function time_limit($pickup_date, $return_date)
    {
        $Booking = Booking::all();
        $VehicleAll = Vehicle::all();
        $time = strtotime($pickup_date);
        $new_pickup_date = date('Y-m-d', $time);
        $time2 = strtotime($return_date);
        $new_return_date = date('Y-m-d', $time2);

        foreach ($Booking as $item) {
            //If the pickup date and return date is in the Booking table
            //Then i will get the id of that vehicle.
            //These are the vehicles that is not available
            if ($new_pickup_date >= $item->pickup_date && $new_pickup_date <= $item->return_date) {
                $array_vehicle_pickup[] = $item->id_vehicle;
            } else if ($new_return_date >= $item->pickup_date && $new_return_date <= $item->return_date) {
                $array_vehicle_return[] = $item->id_vehicle;
            }
        }

        if (isset($array_vehicle_pickup)) {
            //If array from the pickup date in the Booking table
            //has the ids of the vehicles, i will unique those id
            $array_vehicle_pickup_unique = array_unique($array_vehicle_pickup);

            //After unique the id, i will get the id of those vehicle
            //and get it to the index of that id with the value of itself.
            foreach ($array_vehicle_pickup_unique as $item) {
                $available_vehicle[$item] = $item;
            }
        }

        if (isset($array_vehicle_return)) {
            //If the array from return date in the Booking table
            //has the ids of the vehicles, i will unique those id
            $array_vehicle_return_unique = array_unique($array_vehicle_return);
            sort($array_vehicle_return_unique);

            //After unique the id, i will get the id of those vehicle
            //and get it to the index of that id with the value of itself.
            foreach ($array_vehicle_return_unique as $item) {
                $available_vehicle[$item] = $item;
            }
        }

        //If the id of in the array above is set
        //then i won't do anything because those are the vehicle that is unavailable.
        //And the array_available_vehicle is the array of the vehicle that is
        //available during those days.
        foreach ($VehicleAll as $item) {
            if (isset($available_vehicle[$item->id])) {

            } else {
                $array_available_vehicle[] = $item->id;
            }
        }
        //return the array of available vehicles
        return $array_available_vehicle;
    }

    function filtering($seat, $fuel, $air_con, $bluetooth, $start_price, $end_price)
    {
        $VehicleDetail = VehicleDetail::all();
        $VehicleAll = Vehicle::all();
        $array_available_vehicle_filter = $unavailable_vehicle = array();

        //It will validate the seat from the database.
        //If the users search for the number of seats,
        //it will validate in the table detail and get the id of the vehicle that has
        //the user's desired number of seats to the array_available_vehicle_filter array.
        //if the Vehicle doesn't have that many number of seats, its id will be stored in
        //unavailable_vehicle array.
        if ($seat != 0) {
            foreach ($VehicleDetail as $item) {
                if ($item->seat == $seat) {
                    if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                        $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                    }
                } else {
                    if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                        $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                    }
                }
            }
        }
        //This is the same as seat
        if ($fuel != 0) {
            foreach ($VehicleDetail as $item) {
                if ($item->fuel == $fuel) {
                    if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                        $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                    }
                } else {
                    if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                        $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                    }
                }
            }
        }
        //This is the same as seat
        if (isset($air_con)) {
            foreach ($VehicleDetail as $item) {
                if ($item->air_con == $air_con) {
                    if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                        $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                    }
                } else {
                    if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                        $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                    }
                }
            }
        }
        //This is the same as seat
        if (isset($bluetooth)) {
            foreach ($VehicleDetail as $item) {
                if ($item->bluetooth == $bluetooth) {
                    if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
                        $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
                    }
                } else {
                    if (!isset($unavailable_vehicle[$item->id_vehicle])) {
                        $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
                    }
                }
            }
        }
        //This is the same as seat
        foreach ($VehicleAll as $item) {
            if ($item->daily_price >= $start_price && $item->daily_price <= $end_price) {
                if (!isset($array_available_vehicle_filter[$item->id])) {
                    $array_available_vehicle_filter[$item->id] = $item->id;
                }
            } else {
                if (!isset($unavailable_vehicle[$item->id])) {
                    $unavailable_vehicle[$item->id] = $item->id;
                }
            }
        }

        //Get the final array of vehicle ids that are fit the filter request from the users.
        $array_different = array_diff($array_available_vehicle_filter, $unavailable_vehicle);

        return $array_different;

//                if (isset($gearbox)) {
//                    foreach ($VehicleDetail as $item) {
//                        if ($item->gearbox == $gearbox) {
//                            if (!isset($array_available_vehicle_filter[$item->id_vehicle])) {
//                                $array_available_vehicle_filter[$item->id_vehicle] = $item->id_vehicle;
//                            }
//                        } else {
//                            if (!isset($unavailable_vehicle[$item->id_vehicle])) {
//                                $unavailable_vehicle[$item->id_vehicle] = $item->id_vehicle;
//                            }
//                        }
//                    }
//                }
    }

    public function getDelete($id)
    {
        $Vehicle = Vehicle::find($id);
        $Vehicle->delete();

        return redirect('admin/vehicle/view')->with('alert', 'Successfully deleted');
    }
}


