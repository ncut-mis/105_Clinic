@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4>收據明細</h4>
            <a href="{{ route('register.receipt') }}"><button class="btn-success">返回已看診名單</button></a>
        </div>
        <div class="container-fluid">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50px" style="text-align:center"></th>
                        <th width="100px" style="text-align:center">會員</th>
                        <th width="150px" style="text-align:center">看診醫生</th>
                        <th style="text-align:center">症狀</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($diagnosises as $diagnosis)
                        <tr>
                            <th style="text-align:center"></th>
                            <th style="text-align:center">{{$diagnosis->member_name}}</th>
                            <th style="text-align:center">{{$diagnosis->staff_name}}</th>
                            <th style="text-align:left">{{$diagnosis->symptom}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50px" style="text-align:center"></th>
                        <th width="100px" style="text-align:center">藥名</th>
                        <th width="150px" style="text-align:center">使用次數</th>
                        <th style="text-align:center">用藥方式</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescriptions as $prescription)
                        <tr>
                            <th style="text-align:center"></th>
                            <th style="text-align:center">{{$prescription->medicine}}</th>
                            <th style="text-align:center">{{$prescription->dosage}}</th>
                            <th style="text-align:left">{{$prescription->note}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</section>