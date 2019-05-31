@extends('layouts.clinic')

@section('title', '每週時段管理')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3>預定每週時段管理資訊</h3>
        </div>
        <div class="container-fluid">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>醫生編號</th>
                        <th>星期</th>
                        <th>開始時間</th>
                        <th>結束時間</th>
                        <th>看診日期</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <form action="/per_week_section/{{$doctor->id}}/update" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <td> <input type="text" name="doctor_id" id="doctor_id-name" class="form-control" placeholder="{{$doctor->id}}" value=""></td>
                            <td> <input type="text" name="doctor_id" id="doctor_id-name" class="form-control" placeholder="{{$per_week_section->weekday}}" value=""></td>
                            <td> <input type="text" name="doctor_id" id="doctor_id-name" class="form-control" placeholder="{{$per_week_section->start_time}}" value=""></td>
                            <td> <input type="text" name="doctor_id" id="doctor_id-name" class="form-control" placeholder="{{$per_week_section->end_time}}" value=""></td>
                            <td> <input type="text" name="doctor_id" id="doctor_id-name" class="form-control" placeholder="{{$per_week_section->from}}" value=""></td>

                            <td>
                                <button type="submit" class="btn btn-default">更新時段</button>
                            </td>
                        </form>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


</section>