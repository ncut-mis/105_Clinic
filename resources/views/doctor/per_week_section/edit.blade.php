@extends('layouts.clinic')

@section('title', '每週時段管理')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3>每週預定看診時段管理</h3>
        </div>
        <div class="container-fluid">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width=100>醫生姓名</th>
                        <th>星期</th>
                        <th>開始時間</th>
                        <th>結束時間</th>
                        <th>看診日期</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <form action="/per_week_section/{{$per_week_section->id}}/update" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <td> <label type="text" name="name" id="name" class="form-control"  value="{{$staff->doctor_id}}" disabled>{{$staff->name}}</label></td>
                            <td> <input type="text" name="weekday" id="weekday" class="form-control" placeholder="{{$per_week_section->weekday}}" value=""></td>
                            <td> <input type="text" name="start_time" id="start_time" class="form-control" placeholder="{{$per_week_section->start_time}}" value=""></td>
                            <td> <input type="text" name="end_time" id="end_time" class="form-control" placeholder="{{$per_week_section->end_time}}" value=""></td>
                            <td> <input type="text" name="from" id="from" class="form-control" placeholder="{{$per_week_section->from}}" value=""></td>

                            <td>
                                <button type="submit" class="btn bg-deep-purple">更新時段</button>
                            </td>
                        </form>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


</section>