@extends('layouts.clinic')

@section('title', '每週看診時段管理')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3>醫生每週預定看診時段管理</h3>
        </div>

        <div>
            <form action="/per_week_section/store" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">

                    <div class="col-sm-4">

                        <div>
                            <label>醫生姓名：</label>
                            <select name="doctor_id" id="doctor_id" required="" autofocus>
                                <option value="0" readonly>--Doctor--</option>
                                @foreach($staffs as $staff)
                                    @foreach($doctors as $doctor)
                                        @if($doctor->staff_id===$staff->id)
                                    <option value="{{$doctor->id}}">{{$staff->name}}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>星期：</label>
                            <select name="weekday" required="" autofocus>
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
                            <input  name="start_time" class="form-control bg-white" placeholder="請輸入開始時間" required="" autofocus>
                        </div>
                        <div class="form-group">
                            <label>結束時間：</label>
                            <input name="end_time" class="form-control bg-white" placeholder="請輸入結束時間" required="" autofocus>
                        </div>
                        <div class="form-group">
                            <label>開始看診日期：</label>
                            {{--<input name="from" class="form-control" placeholder="請輸入開始日期">--}}
                            <input type="date"   name="from" id="from" placeholder="看診日期" required="" autofocus>
                        </div>

                    </div>

                </div>

                <div class="text-right">
                    <button style="color:white;" type="submit" class=" btn bg-green">新增</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>醫生姓名</th>
                    <th>星期</th>
                    <th>開始時間</th>
                    <th>結束時間</th>
                    <th>看診日期</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($staffs as $staff)
                @foreach($doctors as $doctor)
                    @foreach($per_week_sections as $per_week_section)
                        @if($staff->id===$doctor->staff_id)
                        @if($doctor->id===$per_week_section->doctor_id)
                    <tr>
                        <td>{{$staff->name}}</td>
                        <td>{{$per_week_section->weekday}}</td>
                        <td>{{$per_week_section->start_time}}</td>
                        <td>{{$per_week_section->end_time}}</td>
                        <td>{{$per_week_section->from}}</td>
                        <td>
                            <a class="btn btn-link bg-blue" href="{{ route('per_week_section.edit',[$per_week_section,$staff])}}">修改時段</a>
                            <form action="/per_week_section/{{ $per_week_section->id}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-link bg-red">刪除時段</button>
                            </form>
                        </td>
                    </tr>
                        @endif
                    @endif
                    @endforeach
                @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</section>