@extends('layouts.clinic')

@section('title', '每週時段管理')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3>預定每週時段管理資訊</h3>
        </div>

        <div>
            <form action="/per_week_section/store" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">

                    <div class="col-sm-4">

                        <div>
                            <label>醫生編號：</label>
                            <select name="doctor_id" id="doctor_id" autofocus>
                                <option value="0" readonly>Doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>星期：</label>
                            <select name="weekday">
                                <option value="星期一">星期一</option>
                                <option value="星期二">星期二</option>
                                <option value="星期三">星期三</option>
                                <option value="星期四">星期四</option>
                                <option value="星期五">星期五</option>
                                <option value="星期六">星期六</option>
                                <option value="星期日">星期日</option>　
                            </select>
                        </div>
                        <div>
                            <label>開始時間：</label>
                            <input name="start_time" class="form-control" placeholder="請輸入開始時間">
                        </div>
                        <div class="form-group">
                            <label>結束時間：</label>
                            <input name="end_time" class="form-control" placeholder="請輸入結束時間">
                        </div>
                        <div class="form-group">
                            <label>開始看診日期：</label>
                            {{--<input name="from" class="form-control" placeholder="請輸入開始日期">--}}
                            <input type="date"   name="from" id="from" placeholder="看診日期" required="" autofocus>
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
                    <th>醫生編號</th>
                    <th>星期</th>
                    <th>開始時間</th>
                    <th>結束時間</th>
                    <th>看診日期</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    @foreach($per_week_sections as $per_week_section)
                    <tr>
                        <td>{{$doctor->id}}</td>
                        <td>{{$per_week_section->weekday}}</td>
                        <td>{{$per_week_section->start_time}}</td>
                        <td>{{$per_week_section->end_time}}</td>
                        <td>{{$per_week_section->from}}</td>
                        <td>
                            <a class="btn btn-link" href="{{ route('per_week_section.edit', $doctor->id) }}">修改時段</a>
                            /
                            <form action="/per_week_section/{{ $doctor->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-link">刪除時段</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</section>