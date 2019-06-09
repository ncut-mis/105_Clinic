@extends('layouts.clinic')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
             <h3> <font face="微軟正黑體">現場掛號</font></h3>
            <small class="text-muted">Register Now</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header col-indigo" style="font-size:23px;">
                        <font face="微軟正黑體"> 目前門診</font>
                    </div>
                    <div class="body">
                    @foreach($doctor_section_datas as $doctor_section_data)
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile_with_icon_title"><i class="material-icons">person</i><b class="col-brown"> {{$doctor_section_data->doctor->staff->name}} 醫生</b></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="ta -pane" id="profile_with_icon_title"><p> <b>門診資訊如下:</b></p>
                                {{--<input class="form-control" id="register" name="register" value="{{$doctor_section_data->id}}"/>--}}
                                <p> <font face="微軟正黑體">門診時間:{{$doctor_section_data->start}}~{{$doctor_section_data->end}}</font></p>
                                <p> <font face="微軟正黑體">目前看診號碼:{{$doctor_section_data->current_no}} 號</font></p>
                                          @if($doctor_section_data->current_no-$doctor_section_data->next_register_no!==-1)
                                    <p> <font face="微軟正黑體">現在掛號需等待:{{$doctor_section_data->next_register_no-$doctor_section_data->current_no}}人</font></p>
                                          @else
                                         <p></p>
                                          @endif
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="body">
                                            <div class="button-demo js-modal-buttons">
                                                <button type="submit" data-color="" id="btn"  class="btn bg-brown waves-effect" style="position:absolute; left:700px; bottom:40px;"><font face="微軟正黑體">掛號</font></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <input class="form-control" id="choice_register" hidden name="register" value="{{$doctor_section_data->id}}" />

            <form action="{{ route('register.iccard.store',$doctor_section_data) }}" method="POST" role="form" id="choice_register" enctype="multipart/form-data" >
                {{ csrf_field() }}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"><font face="微軟正黑體"></font></h4>
                <span aria-hidden="true" class="close" data-dismiss="modal" aria-label="Close">&times;</span>
            </div>

            <div class="modal-body">

                <html>
                <head>
                    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
                </head>

                <body onload="ReaderCount();">
                <script type="text/javascript">

                    function ReaderCount(){

                        var NHICardReader = document.getElementById('NHICardReader');
                        var ReaderSelect = document.getElementById('reader_select');
                        ReaderSelect.options.length = 0;
                        var firstIndex = null;

                        for (var i=0; i<NHICardReader.ReaderCount; i++)
                        {
                            NHICardReader.ReaderIndex = i;
                            var ReaderItem = new Option(NHICardReader.ReaderName, i);
                            ReaderSelect.options.add(ReaderItem);

                            if (firstIndex == null && NHICardReader.CardPresent && NHICardReader.Read())
                            {
                                firstIndex = i;
                                ReaderSelect.value= firstIndex;
                                ExecRead(firstIndex);
                            }

                        }

                    }

                    function ExecRead(SelIndex)
                    {
                        var NHICardReader = document.getElementById('NHICardReader');
                        var ReaderSelect = document.getElementById('reader_select');

                        if (SelIndex == null && ReaderSelect.value != null && ReaderSelect.value >= 0){
                            NHICardReader.ReaderIndex = ReaderSelect.value;
                        }else if(SelIndex != null){
                            NHICardReader.ReaderIndex = SelIndex;
                        }else{
                            return;
                        }

                        NHICardReader.Refresh();

                        var iscard = false;
                        var Msg = '';
                        if (NHICardReader.CardPresent && NHICardReader.Read()){
                            iscard = true;
                            Msg = '使用 ' + NHICardReader.NHI_HolderName + (NHICardReader.NHI_Sex == 'M' ? '先生':'小姐') + ' 的全民健康保險IC卡掛號';
                        }else if(NHICardReader.CardPresent && !NHICardReader.Read()){
                            iscard = false;
                            Msg = '您可能插入了錯誤的卡，或將卡片插反了。';
                        }

                        document.getElementById('nhi_cardno').value = (iscard)?NHICardReader.NHI_CardNo:'';
                        document.getElementById('nhi_holdername').value = (iscard)?NHICardReader.NHI_HolderName:'';
                        document.getElementById('nhi_idno').value = (iscard)?NHICardReader.NHI_IDNO:'';
                        document.getElementById('nhi_birthdate').value = (iscard)?NHICardReader.NHI_BirthDate:'';
                        document.getElementById('nhi_sex').value = (iscard)?NHICardReader.NHI_Sex:'';
                        // document.getElementById('nhi_issuedate').value = (iscard)?NHICardReader.NHI_IssueDate:'';

                        if(Msg != '')
                            alert(Msg);
                    }
                </script>


                <h1 style="text-align:center;">請插入健保卡</H1>
                <hr>

                    <p>
                        <object id="NHICardReader" codeBase="NHICardReaderOCX.ocx#version=0,5,0,40"
                                classid="clsid:1BFA1079-2761-4FF6-8499-5D886F7D972E" width=0 align=center
                                height=0></object>



                    <div id="reader_select_block">選擇讀卡機:
                        <select id="reader_select" onchange="ExecRead(this.value);" style="position:absolute;left:180px;"></select>
                    </div><br>
                    <div>
                    <tr><td style="padding-right:auto">您的卡片序號: <input id="nhi_cardno" style="position:absolute; right:100px;" ></td></tr><br><br>

                    <tr><td>您的姓名: <input id="nhi_holdername" name="name" style="position:absolute; right:100px;"></td></tr><br><br>

                    <tr><td>您的身分證字號: <input id="nhi_idno" name="number" style="position:absolute; right:100px;"  placeholder="可自行輸入病患的ID" required></td></tr><br><br>

                    <tr><td>您的出生日期: <input id="nhi_birthdate" name="birthday" style="position:absolute; right:100px;"></td></tr><br><br>

                    <tr><td>您的性別: <input id="nhi_sex" style="position:absolute; right:100px;"><td></tr><br><br>

                    {{--<tr><td>您的卡片發卡日期: <input id="nhi_issuedate" style="position:absolute; right:100px;"></td></tr><br><br>--}}
                     <center>   <input onclick="ExecRead(reader_select.value);" value="讀取卡片" type="button"> </center>
                    </div>
                </body></html>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-raised g-bg-blue waves-effect" >
                   <font face="微軟正黑體">確認掛號</font>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('mdModal');
    // Get the button that opens the modal
    var btn = document.getElementById("btn");
    // Get the <span> element that closes the modal
    // // When the user clicks the button, open the modal
    btn.onclick = function() {
        document.getElementById("choice_register").value = document.getElementById("register").value;
        modal.style.display = "block"; }
</script>