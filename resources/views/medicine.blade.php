@extends('layouts.clinic')

@section('title', '藥物資訊')

<section class="content">

    <div class="container-fluid">
        <div class="block-header">
                <h3><font face="微軟正黑體">藥物管理</font></h3>
                <small class="text-muted">Medicines Management</small><br>
        </div>

    <div>
        <form action="/medicine/store" method="POST" class="form-horizontal">
        {{ csrf_field() }}

            <div class="form-group">
                <label for="medicine-name" class="col-indigo"><h4><strong>新增藥物</strong></h4></label>

                <div class="col-sm-4">
                    <div class="modal-col-white">
                    <input type="text" name="medicine" id="medicine-name" class="form-control" placeholder="請輸入藥品名稱">
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button style="color:white;" type="submit" class="btn  btn-raised bg-teal"><strong>新增</strong></button>
            </div>
        </form>
    </div>
    </div>


    <div class="container-fluid">
    <div class="card">
        <table class="table table-hover">
            <thead>
            <tr>
                <th width="400">藥物名稱</th>
                <th width="100">備註</th>
                <th width="200">修改/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($medicines as $medicine)
            <tr>
                <td><font face="微軟正黑體">{{$medicine->medicine}}</font></td>
                <td></td>
                <td>
                    <a class="btn btn-link bg-blue" href="{{ route('medicine.edit', $medicine)}}">修改藥品</a>
                    <form action="/medicine/{{ $medicine->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-link bg-red">刪除藥品</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
</section>