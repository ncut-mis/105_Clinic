@extends('layouts.clinic')

@section('title', '藥物資訊')

<section class="content">

    <div class="container-fluid">
        <div class="block-header">
            <h3>藥物資訊</h3>
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
                    <tr>
                        <form action="/medicine/{{$medicine->id}}/update" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                             <td> <input type="text" name="medicine" id="medicine-name" class="form-control" placeholder="{{$medicine->medicine}}" value=""></td>
                            <td>
                                <button type="submit" class="btn btn-default">更新藥品</button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>