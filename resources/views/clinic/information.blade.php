@extends('layouts.clinic')
<section class="content">
    <form action="/clinic/information" method="POST" enctype="multipart/form-data" >
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    <div class="container-fluid">
        <div class="block-header">
            <h2>編輯診所資訊</h2>
            <small class="text-muted">Edit Information</small>
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card bg-lime">
					<div class="header bg-lime">
						<h2>基本資料<br> <small>Basic Information</small> </h2>
					</div>

					<div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label type="text" class="form-control"><h3>診所名稱</h3></label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="{{Auth::user()->clinic->name}}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label type="text" class="form-control"><h3>診所電話</h3></label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @if(Auth::user()->clinic->tel===null)
                                            <input type="text" class="form-control" placeholder="Add Telephone" name="tel">
                                        @else
                                            <input type="text" class="form-control" value="{{Auth::user()->clinic->tel}}" name="tel">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label type="text" class="form-control"><h3>診所地址</h3></label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @if(Auth::user()->clinic->address===null)
                                            <input type="text" class="form-control" placeholder="Add Address" name="address">
                                        @else
                                            <input type="text" class="form-control" value="{{Auth::user()->clinic->address}}" name="address">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label type="text" class="form-control"><h3>可預約天數</h3></label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @if(Auth::user()->clinic->reservable_day===null)
                                            <input type="text" class="form-control" placeholder="Add Reservable Day" name="reservable_day">
                                        @else
                                            <input type="text" class="form-control" value="{{Auth::user()->clinic->reservable_day}}" name="reservable_day">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="dz-message">
                                    <h3><font face="微軟正黑體"><i class="material-icons col-indigo">photo</i>上傳診所環境照片</font></h3>
                                </div>
                                <div class="fallback">
                                    <input name="photo" type="file" accept ="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
        <div class="row clearfix">
			<div class="col-md-12">
				<div class="card bg-pink">
					<div class="header bg-pink">
						<h2>診所營業時間<small>Opening hour</small> </h2>
					</div>
					<div class="body">
                        <div class="row clearfix">
                            <textarea class="form-control bg-blush" name="per_week_sections" style="width:1000px;height:200px;">{{Auth::user()->clinic->per_week_sections}}</textarea>
                        </div>
                    </div>
                    </div>
				</div>
			</div>
				 <div class="col-sm-12">
                    <button type="submit" class="btn btn-raised g-bg-cyan">更新</button>
                </div>
          </div>
      </form>
   </section>
