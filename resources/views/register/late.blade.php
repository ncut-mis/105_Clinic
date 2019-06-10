@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4> <font face="微軟正黑體"><strong>過號名單</strong></font></h4>
            <small class="text-muted">Late Patients List</small><br>
            <a href="{{ route('register.index') }}"><button class="btn-success">返回掛號名單</button></a>
        </div>
        <div class="container-fluid">
            <div class="card">
                <table class="table table-hover responsive-table">
                    <thead>
                    <tr>
                        <th width="50px" style="text-align:center"></th>
                        <th width="125px" style="text-align:center">病患姓名</th>
                        <th width="150px" style="text-align:center">看診醫生</th>
                        <th width="125px" style="text-align:center">看診時段</th>
                        <th width="125px" style="text-align:center">候診號碼</th>
                        <th width="100x" style="text-align:center">備註</th>
                        <th width="150px">重新掛號</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registers as $register)
                        @if($register->clinic_id == Auth::user()->clinic->id )
                         @if($register->status === 3)
                              <tr>
                                  <th style="text-align:center"></th>
                                  <th style="text-align:center">{{$register->member_name}}</th>
                                  <th style="text-align:center">{{$register->staff_name}}</th>
                                  <th style="text-align:center">{{$register->start}}</th>
                                  <th style="text-align:center" class="bg-blush"><del>{{$register->reservation_no}}</del><br>已過號</th>
                                  <th style="text-align:center">{{$register->note}}</th>
                                  <th><form action="{{ route('register.late.reset_register',$register->id) }}" method="POST">
                                          {{ csrf_field() }}
                                          {{ method_field('PATCH') }}
                                          <button class="btn-secondary">重新排位</button></form></th>
                              </tr>
                         @endif
                         @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>