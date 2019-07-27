@extends('layouts.doctor')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
             <div class="" style="font-size: 20px;">
                <font face="微軟正黑體"><strong>掛號搜尋</strong></font>
            </div>
            <small class="text-muted">Register Search</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="">
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th style="font-size: 20px">候診號碼</th>
                                    <th style="font-size: 20px">姓名</th>
                                    <th style="font-size: 20px">狀態</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($registers as $register)
                                @foreach($members as $member)
                                    @if($register->member_id===$member->id)
                                <tr>
                                    @if($register->reservation_no == (int)$register->reservation_no)
                                    <td style="font-size: 20px">{{$register->reservation_no}}</td>
                                    @else
                                        <td style="font-size: 20px"><font face="微軟正黑體">過號病患已重新再掛號</font></td>
                                    @endif
                                    <td style="font-size: 20px"><font face="微軟正黑體">{{$member->name}}</font></td>
                                    @if($register->status===0)
                                        <td style="font-size: 20px"><font face="微軟正黑體">候診中</font></td>
                                        @elseif($register->status===1)
                                        <td style="font-size: 20px"><font face="微軟正黑體">看診中</font></td>
                                        @elseif($register->status===2)
                                        <td style="font-size: 20px"><font face="微軟正黑體">已看診</font></td>
                                        @elseif($register->status===3)
                                        <td style="font-size: 20px"><font face="微軟正黑體">已過號</font></td>
                                        @elseif($register->status===4)
                                        <td style="font-size: 20px"><font face="微軟正黑體">取消掛號</font></td>
                                    @endif
                                    @if($register->status===0)
                                        <td><a href="{{ route('search.diagnosis',[$register->id,$register->member_id])}}"><button type="button" class="btn btn-link waves-effect bg-green" style="font-size: 16px">看診</button></a></td>
                                    @elseif($register->status===1)
                                        <td><a href="{{ route('search.diagnosis',[$register->id,$register->member_id])}}"><button type="button" class="btn btn-link waves-effect bg-green" style="font-size: 16px">看診</button></a></td>
                                    @elseif($register->status===2)
                                        <td><button type="button" class="btn btn-link waves-effect bg-red" style="font-size: 16px" disabled>看診</button></td>
                                    @elseif($register->status===3)
                                        <td><a href="{{ route('search.diagnosis',[$register->id,$register->member_id])}}"><button type="button" class="btn btn-link waves-effect bg-green" style="font-size: 16px">看診</button></a></td>
                                    @elseif($register->status===4)
                                        <td><button type="button" class="btn btn-link waves-effect bg-red" style="font-size: 16px" disabled>看診</button></td>
                                    @endif
                                </tr>
                                    @endif
                                @endforeach
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

