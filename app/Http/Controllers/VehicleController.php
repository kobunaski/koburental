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
        $Vehicle = Vehicle::all();
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.view', ['Vehicle' => $Vehicle, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function viewClient()
    {
        $Vehicle = Vehicle::orderBy('name', 'asc')->paginate(6);
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        $Feedback = Feedback::all();
        $VehicleDetail = VehicleDetail::all();
        return view('client.vehicle.view', ['Feedback' => $Feedback, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
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

        return view('client.vehicle.viewdetail', ['average_rating' => $average_rating, 'User' => $User, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation, 'Feedback' => $Feedback]);
    }

    public function getAdd()
    {
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.add', ['VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function postAdd(Request $request)
    {
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

        $Vehicle = new Vehicle;

        $Vehicle->name = $request->name;
        $Vehicle->id_model = $request->id_model;
        $Vehicle->id_pickup_location = $request->id_pickup_location;
        $Vehicle->daily_price = $request->daily_price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image = $image;
        }

        $Vehicle->save();

        return redirect('admin/vehicle/view')->with('alert', 'Added new vehicle');
    }

    public function getEdit($id)
    {
        $Vehicle = Vehicle::find($id);
        $VehicleType = VehicleType::all();
        $Manufacture = Manufacture::all();
        $PickupLocation = PickupLocation::all();
        return view('admin.vehicle.edit', ['Vehicle' => $Vehicle, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function postEdit(Request $request, $id)
    {
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

        $Vehicle = Vehicle::find($id);

        $Vehicle->name = $request->name;
        $Vehicle->id_model = $request->id_model;
        $Vehicle->id_pickup_location = $request->id_pickup_location;
        $Vehicle->daily_price = $request->daily_price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $file->move('upload/image/vehicle_image', $image);
            $Vehicle->image = $image;
        }

        $Vehicle->save();

        return redirect('admin/vehicle/view')->with('alert', 'Model Edit Successful');
    }

    public function searchResult(Request $request)
    {
        $available_vehicle = $array_different = $array_available_vehicle = $array_available_vehicle_filter = $unavailable_vehicle = array();

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
        $end_price = $start_price = $pickup_date = $return_date = $seat = $fuel = $air_con = $bluetooth = $gearbox = null;

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
                    if ($item->daily_price >= $start_price && $item -> daily_price <= $end_price) {
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
                $air_con = $request->air_con;
                $bluetooth = $request->bluetooth;
                $gearbox = $request->gearbox;
                echo $start_price = filter_var($request->start_price, FILTER_SANITIZE_NUMBER_INT);
                echo $end_price = filter_var($request->end_price, FILTER_SANITIZE_NUMBER_INT);

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
                    if ($item->daily_price >= $start_price && $item -> daily_price <= $end_price) {
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
        }


        if ($id_pickup_location != 0 && isset($filter)) {
            $array = array_diff($array_available_vehicle_filter, $unavailable_vehicle);
            $array_different = array_intersect($array_available_vehicle, $array);
        } else if ($id_pickup_location != 0) {
            $array_different = $array_available_vehicle;
        } else if (isset($filter)) {
            $array_different = array_diff($array_available_vehicle_filter, $unavailable_vehicle);
        }

        return view('client.vehicle.search_result', ['start_price' => $start_price, 'end_price' => $end_price, 'filter' => $filter, 'seat' => $seat, 'fuel' => $fuel, 'air_con' => $air_con, 'bluetooth' => $bluetooth, 'array_different' => $array_different, 'return_date' => $return_date, 'pickup_date' => $pickup_date, 'array_available_vehicle' => $array_available_vehicle, 'id_pickup_location' => $id_pickup_location, 'Feedback' => $Feedback, 'Vehicle' => $Vehicle, 'VehicleDetail' => $VehicleDetail, 'VehicleType' => $VehicleType, 'Manufacture' => $Manufacture, 'PickupLocation' => $PickupLocation]);
    }

    public function getDelete($id)
    {
        $Vehicle = Vehicle::find($id);
        $Vehicle->delete();

        return redirect('admin/vehicle/view')->with('alert', 'Successfully deleted');
    }
}


