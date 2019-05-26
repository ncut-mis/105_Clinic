@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Reister</h2>
            <a href="{{ route('register.create') }}"><button class="btn btn-success">新增預約</button></a>
            <button class="btn btn-success">取消預約</button>
            <button class="btn btn-success">更改預約</button>
        </div>
            <div class="container-fluid">
                <div class="card">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>時段</th>
                            <th>會員</th>
                            <th>號碼</th>
                            <th>掛號狀態</th>
                            <th>備註</th>
                            <th>日期</th>
                            <th width="100px">功能</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($registers as $register)
                        @foreach($sections as $section)
                        @foreach($members as $member)
                            @if($register->section_id===$section->id)
                                @if($register->member_id===$member->id)
                                    <form action="/register/{{$register->id}}/update" method="POST" >
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                    <tr>
                                        <th>{{$register->id}}</th>
                                        <th>{{$section->start}}</th>
                                        <th>{{$member->name}}</th>
                                        <th>{{$register->number}}</th>
                                        <th>{{$register->status}}</th>
                                        <th>{{$register->note}}</th>
                                        <th>{{$register->updated_at}}</th>

                                        <th>
                                            <button type="submit" class="btn btn-raised g-bg-cyan"> <font face="微軟正黑體">掛號</font></button>
                                        </th>
                                        </form>
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
    </div>
</section>