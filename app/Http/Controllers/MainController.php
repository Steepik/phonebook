<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhonebookRequest;
use Illuminate\Http\Request;
use App\Phone_book;

class MainController extends Controller
{

    public function index()
    {
        $phones = Phone_book::orderBy('id', 'desc')->get();

        return view('index', compact('phones'));
    }

    /**
     * @param PhonebookRequest $request
     * @return string
     */
    public function store(PhonebookRequest $request)
    {
        if($request->ajax())
        {
            //Удаляем пустые элементы массива и объединяем элементы массива в строку
            $tel = $request->input('tel');
            $tel = array_diff($tel, array(''));
            $tel_string = implode(" | ", $tel);

            $result = Phone_book::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'middlename' => $request->input('middlename'),
                'tel' => $tel_string
            ]);

            return json_encode(array('result' => 'success'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $info = Phone_book::findOrFail($id);

        return view('show', compact('info'));
    }

    /**
     * @param $id
     * @param PhonebookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, PhonebookRequest $request)
    {
        $info = Phone_book::findOrFail($id);

        $info->update($request->all());

        return redirect('/')->with('msg', 'Запись была сохранена');
    }

    /**
     * @param $id
     * @param Request $request
     * @return string
     */
    public function destroy($id, Request $request)
    {
        if($request->ajax())
        {
            $record = Phone_book::findOrFail($id);

            if($record->delete())
            {
                return json_encode(array('msg' => 'success'));
            }
        }
    }

}
