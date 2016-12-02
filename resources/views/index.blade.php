@extends('layouts.app')

@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-success msg">{{ Session::get('msg') }}</div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Список телефонов <span data-toggle="modal" data-target="#addTel"><button class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Добавить"><i class="fa fa-plus fa-lg"></i></button></span></div>
            <div class="panel-body">
                <ul class="list-group">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Имя
                            </th>
                            <th>
                                Фамилия
                            </th>
                            <th>
                                Отчество
                            </th>
                            <th>
                                Телефон
                            </th>
                            <th>
                                Управление
                            </th>
                        </tr>
                        </thead>
                        <tbody id="tbodyID">
                        @foreach($phones as $phone)
                            <tr id="rowTable{{$phone->id}}">
                                <td>{{ $phone->name }}</td>
                                <td>{{ $phone->lastname }}</td>
                                <td>{{ $phone->middlename }}</td>
                                <td>{{ $phone->tel }}</td>
                                <td><a href="/{{ $phone->id }}/edit"><button class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Редактировать"><i class="fa fa-edit fa-lg"></i></button></a> <button class="btn btn-danger btn-del" data-content="{{ $phone->id }}" data-toggle="tooltip" data-placement="right" id="deleteBtn" title="Удалить"><i class="fa fa-times-circle fa-lg"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div id="addTel" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Добавление нового телефона</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="forms-error" class="alert alert-danger" style="display: none;"></div>
                                    <form action="/" method="post">
                                        <div class="form-group">
                                            <label for="name">Имя:</label>
                                            <input type="text" name="name" id="txtName" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Фамилия:</label>
                                            <input type="text" name="lastname" id="txtLast" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Отчество:</label>
                                            <input type="text" name="middlename" id="txtMiddle" class="form-control">
                                        </div>
                                        <div class="form-group telGroup">
                                            <label for="name">Телефон: <a href="#" data-toggle="tooltip" id="addInptTel" data-placement="right" title="Добавить телефон"><i class="fa fa-plus-circle fa-lg"></i></a></label>
                                            <input type="number" placeholder="+380951475665" name="tel[]" id="txtTel" class="form-control phone">
                                        </div>
                                        <div class="form-group text-center">
                                           <button type="button" class="btn btn-success" id="addTelBtn">Добавить</button>
                                        </div>

                                    {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>
    </div>

    @include('scripts.main')
@stop