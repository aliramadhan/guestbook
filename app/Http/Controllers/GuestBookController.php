<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestBook;
use Alert;

class GuestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestbooks = GuestBook::all();
        return view('GuestBook.index',compact('guestbooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #get Province and City from api
        $urlProv = 'https://d.kapanlaginetwork.com/banner/test/province.json';
        $urlCity = 'https://d.kapanlaginetwork.com/banner/test/city.json';
        $provinces = json_decode(file_get_contents($urlProv));
        $cities = json_decode(file_get_contents($urlCity));

        return view('GuestBook.create', compact('provinces','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #validation
        $this->validate($request,[
            "first_name" => "required",
            "last_name" => "required",
            "organization" => "required",
            "address" => "required",
            "province" => "required",
            "city" => "required",
            "phone" => "required|numeric",
        ]);

        #insert into database
        $guestbook = new GuestBook;
        $guestbook->first_name = $request->first_name;
        $guestbook->last_name = $request->last_name;
        $guestbook->organization = $request->organization;
        $guestbook->address = $request->address;
        $guestbook->province = $request->province;
        $guestbook->city = $request->city;
        $guestbook->phone = $request->phone;
        $guestbook->save();

        #redirect and send alert success
        Alert::success('Add Guest Book', 'new Guestbook added successfully.');
        return redirect()->route('guestbook.index');

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
        $guestbook = Guestbook::findOrFail($id);

        #get Province and City from api
        $urlProv = 'https://d.kapanlaginetwork.com/banner/test/province.json';
        $urlCity = 'https://d.kapanlaginetwork.com/banner/test/city.json';
        $provinces = json_decode(file_get_contents($urlProv));
        $cities = json_decode(file_get_contents($urlCity));

        return view('GuestBook.edit',compact('guestbook','provinces','cities'));
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
        $guestbook = Guestbook::findOrFail($id);

        #validation
        $this->validate($request,[
            "first_name" => "required",
            "last_name" => "required",
            "organization" => "required",
            "address" => "required",
            "province" => "required",
            "city" => "required",
            "phone" => "required|numeric",
        ]);

        #insert into database
        $guestbook->first_name = $request->first_name;
        $guestbook->last_name = $request->last_name;
        $guestbook->organization = $request->organization;
        $guestbook->address = $request->address;
        $guestbook->province = $request->province;
        $guestbook->city = $request->city;
        $guestbook->phone = $request->phone;
        $guestbook->save();

        #redirect and send alert success
        Alert::success('Update Guest Book', $guestbook->first_name.' updated successfully.');
        return redirect()->route('guestbook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guestbook = Guestbook::findOrFail($id);
        $message = $guestbook->first_name.' deleted successfully.';

        #delete
        $guestbook->delete();

        #redirect and send alert success
        Alert::success('Delete Guest Book', $message);
        return redirect()->route('guestbook.index');
    }

    public function trash()
    {
        $guestbooks = GuestBook::onlyTrashed()->get();

        return view('GuestBook.trashed',compact('guestbooks'));
    }

    public function restore($id) {
        $guestbook = GuestBook::withTrashed()->findOrFail($id);

        if ($guestbook->trashed()) {
            #restore
            $guestbook->restore();

            #redirect and send alert success
            Alert::success('Restore Guest Book', $guestbook->first_name.' restored successfully.');
            return redirect()->route('guestbook.trash');

        }else {

            #redirect and send alert success
            Alert::success('Info', 'not found.');
            return redirect()->route('guestbook.trash');
        }
    }

    public function deletePermanent($id){
        
        $guestbook = GuestBook::withTrashed()->findOrFail($id);

        if (!$guestbook->trashed()) {
        
            #redirect and send alert success
            Alert::success('Info', 'not found.');
            return redirect()->route('guestbook.trash');
        
        }else {
            #delete permanently
            $guestbook->forceDelete();

            #redirect and send alert success
            Alert::success('Destroy Guest Book', $guestbook->first_name.' deleted permanent successfully.');
            return redirect()->route('guestbook.trash');
        }
    }
}
