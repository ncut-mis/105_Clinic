@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4>過號名單</h4>
            <a href="{{ route('register.index') }}"><button class="btn-success">返回掛號名單</button></a>
        </div>
        <div class="container-fluid">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50px" style="text-align:center"></th>
                        <th width="125px" style="text-align:center">會員</th>
                        <th width="150px" style="text-align:center">看診醫生</th>
                        <th width="125px" style="text-align:center">時段</th>
                        <th width="125px" style="text-align:center">號碼</th>
                        <th style="text-align:center">備註</th>
                        <th width="150px">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registers as $register)
                         @if($register->status === 3)
                              <tr>
                                  <th style="text-align:center"></th>
                                  <th style="text-align:center">{{$register->member_name}}</th>
                                  <th style="text-align:center">{{$register->staff_name}}</th>
                                  <th style="text-align:center">{{$register->start}}</th>
                                  <th style="text-align:center">{{$register->reservation_no}}</th>
                                  <th>{{$register->note}}</th>
                                  <th><form action="{{ route('register.late.reset_register',$register->id) }}" method="POST">
                                          {{ csrf_field() }}
                                          {{ method_field('PATCH') }}
                                          <button class="btn-secondary">重新排位</button></form></th>
                              </tr>
                         @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>