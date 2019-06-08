@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4><font face="微軟正黑體"><strong>列印收據及處方箋</strong></font></h4>
            <small class="text-muted">Print receipt and prescriptions</small><br>
            <a href="{{ route('register.receipt') }}"><button class="btn-success">返回已看診名單</button></a>
        </div>
        <div id="print-receipt-detail">
        <form>
        <div class="container-fluid"><h3><font face="微軟正黑體">{{Auth::user()->clinic->name}}</font></h3>
            <div class="card">
                <table class="table table-hover">

                    <h4><font face="微軟正黑體">收據明細</font></h4>
                    <thead>
                    <tr>
                        <th width="20px" style="text-align:center"></th>
                        <th width="100px" style="text-align:center">看診日期</th>
                        <th width="100px" style="text-align:center">病患姓名</th>
                        <th width="100px" style="text-align:center">出生日期</th>
                        <th width="100px" style="text-align:center">身分證字號</th>
                        <th width="100px" style="text-align:center">看診醫生</th>
                        <th width="100px"  style="text-align:left">症狀</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($diagnosises as $diagnosis)
                        <tr>
                            <th style="text-align:center"></th>
                            <th style="text-align:center">{{$diagnosis->date}}</th>
                            <th style="text-align:center">{{$diagnosis->member_name}}</th>
                            <th style="text-align:center">{{$diagnosis->birthday}}</th>
                            <th style="text-align:center">{{$diagnosis->number}}</th>
                            <th style="text-align:center">{{$diagnosis->staff_name}}</th>
                            <th style="text-align:left">{{$diagnosis->symptom}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table><br>
                <table class="table table-hover responsive-table ">
                    <thead>
                    <tr>
                        <th width="800px" style="text-align:right">掛號費：150元</th>
                        {{--<th width="30px" style="text-align:right">基本自付：50元</th>--}}
                        {{--<th width="20px" style="text-align:right">藥品部分負擔：0元</th>--}}
                        {{--<th width="20px" style="text-align:right">※金額共計：200元</th>--}}
                    </tr>
                    <tr>
                        <th width="150px" style="text-align:right">基本自付：50元</th>
                    </tr>
                    <tr>
                        <th width="150px" style="text-align:right">藥品部分負擔：0元</th>
                    </tr>
                    <tr>
                        <th width="150px" style="text-align:right;text-decoration: overline">※金額共計：200元</th>
                    </tr>
                    </thead>
                </table>
                <div class="col-indigo" style="text-align:center">-----------------------------------------------------------------------------------------------------------------------------------</div>
                <br> <table class="table table-hover">
                    <h4><font face="微軟正黑體">處方箋明細</font></h4>
                    <thead>
                    <tr>
                        <th width="50px" style="text-align:center"></th>
                        <th width="100px" style="text-align:center">藥物名稱</th>
                        <th width="150px" style="text-align:center">服用次數</th>
                        <th width="100px" style="text-align:center">服用方式</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescriptions as $prescription)
                        <tr>
                            <th style="text-align:center"></th>
                            <th style="text-align:center">{{$prescription->medicine}}</th>
                            <th style="text-align:center">{{$prescription->dosage}}</th>
                            <th style="text-align:center">{{$prescription->note}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table><br>
                <tr><center> <td><h5><font face="微軟正黑體">******請至康康藥局領藥，並將處方箋明細交給藥局人員******</font></h5></td></center></tr>
            </div>
          </div>
                </form>
            </div>
                <table class="table table-hover">
                    <tr>
                        <td style="text-align:center"><button type="submit" class="bg-blue" onclick="printDiv('print-receipt-detail')">列印<br>收據及處方箋</button></td>
                    </tr>
                </table>

    </div>
</section>


<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }</script>