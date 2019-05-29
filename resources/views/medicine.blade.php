@extends('layouts.clinic')

@section('title', '藥物資訊')

<section class="content">

    <div class="container-fluid">
        <div class="block-header">
            <h3>藥物資訊</h3>
        </div>

    <div>
        <form action="/medicine/store" method="POST" class="form-horizontal">
        {{ csrf_field() }}

            <div class="form-group">
                <label for="medicine-name"><h4>輸入藥品</h4></label>

                <div class="col-sm-4">
                    <div class="modal-col-white">
                    <input type="text" name="medicine" id="medicine-name" class="form-control" placeholder="請輸入藥品">
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button style="color:white;" type="submit" class="btn btn-success">新增</button>
            </div>
        </form>
    </div>
    </div>


    <div class="container-fluid">
    <div class="card">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>藥物名稱</th>
                <th>備註</th>
            </tr>
            </thead>
            <tbody>
            @foreach($medicines as $medicine)
            <tr>
                <td>{{$medicine->medicine}}</td>
                <td>
                    <a class="btn btn-link" href="{{ route('medicine.edit', $medicine->id) }}">修改藥品</a>
                    /
                    <form action="/medicine/{{ $medicine->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-link">刪除藥品</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
</section>