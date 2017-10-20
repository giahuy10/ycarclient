
<!doctype html>
<html lang="vi">
<head>
  <title>Ycar - Feeling Happy</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Ycar.vn-An toàn khi đi xa
Dịch vụ xe sân bay và xe đường dài uy tín, chất lượng. Chúng tôi cam kết phục vụ xe đời mới, cốp rộng và bồi hoàn vé khi lỡ chuyến bay">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/compress.css">
  <script src="js/jquery.js"></script>
 <script src="js/compress.js"></script>



  <!--[if lt ie 9]>
  <html class="lt-ie9">
  <div style=' clear: both; text-align:center; position: relative;'>
    <a href="https://windows.microsoft.com/en-us/internet-explorer/..">
      <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
           alt="you are using an outdated browser. for a faster, safer browsing experience, upgrade for free today."/>
    </a>
  </div>
  <script src="js/html5shiv.js"></script>
  <![endif]-->


</head>

<body>
<div class="page">



	 
  <!--========================================================
                            header
  =========================================================-->
  <header >
		<img src="images/BACKGROUND-TREN.png" alt="Ycar-Chuyên xe đường dài" class="hidden-phone"/>
		<img src="images/ycar-background-mobile.png" class="visible-phone" alt="Ycar-Chuyên xe đưa đón sân bay"/>
     <div class="container">
         <div class="row top">
			<div class="grid_6 menu-top">
				<a href="#home">Trang chủ</a>
				<a href="#pricing">Bảng giá</a>
				<a href="#cars" class="hidden-phone">Các loại xe</a>
				<a href="#cars" class="visible-phone">Xe</a>
				<a href="#promotion" id="btn-promotion">Ưu đãi</a>
			</div>
			<div class="grid_6 hotline right hidden-phone">
				<p>HotLine: <a href="tel:0917999941">0917 999941</a></p>
			</div>
	   </div>
     </div>
      
        <div class=" booking-header" id="home">
			
			 <div class="container">
				   
		<div class="row">
		
		 
		
          <div class="grid_3 hidden-phone" >
		    <img src="images/logo_ycar_final.png"  alt="Ycar - An toàn khi đi xa"  />  
			
	
        </div>
		 <div class="grid_3 input-block start">
			<div class="road-type">
				<div class="inline">
				<input type="radio" checked name="type_of_road" value="1" id="airport"/>
				<label for="airport" id="lable_airport" class="label-type_of_road airport_booking"> <i class="fa fa-plane" aria-hidden="true"></i> Xe sân bay</label>
				
				</div>
				<div class="inline">
				<input type="radio" name="type_of_road" value="2" id="longroad"/>
				<label for="longroad" id="lable_longroad"  class="label-type_of_road"> <i class="fa fa-road" aria-hidden="true"></i> Xe đường dài</label>
				</div>
				
			</div>
			<input id="origin-input" class="controls"  type="text" placeholder="Nhập điểm đi">
		  </div>
		  <div class="grid_1 input-block">
			 <div class="exchange" id="exchange" title="Đổi chiều"><i class="fa fa-exchange" aria-hidden="true"></i></div>
		  </div>
		  <div class="grid_3 input-block" >
		  <script>	
			
			$("#lable_longroad").click(function(){
			
				  $("#destination-input").val("");
				  $("#origin-input").val("");
			});
			
			
			$("#lable_airport").click(function(){
				
				 $("#destination-input").val("Sân bay Nội Bài, Sóc Sơn, Hanoi, Vietnam");
			});
			$("#exchange").click(function(){
			
				 var start_point = $("#origin-input").val();
				 var end_point = $("#destination-input").val();
				
					  $("#destination-input").val(start_point);
			
					  $("#origin-input").val(end_point);
				
			});
			
			
		  </script>
    <input id="destination-input" class="controls" type="text"
        value="Sân bay Nội Bài, Sóc Sơn, Hanoi, Vietnam" placeholder="Nhập điểm đến">
		   </div>
		   <div class="grid_2  input-block" >
		   <button class="btn" type="submit" id="testbutton">Đặt xe</button>
		    </div>
       </div>
	  
      </div>
	   <div class="grid_6 hotline on-mobile right visible-phone">
				<div class="left-mobile"> <img src="images/logo_ycar_final.png"  alt="Ycar - An toàn khi đi xa"  />  </div>
				<div class="right-mobile"><a href="tel:0917999941">0917 999941</a></div>
				<div class="clearfix"></div>
			</div>
	   </div>

  </header>
  
   
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcrOcaHxKGtFfZh8gbuk3DMJ3XVh6ATVY&libraries=places"
        ></script>
	 
		<script type="text/javascript">
		$(function(){
        google.maps.event.addDomListener(window, 'load', function () {
			
            var places = new google.maps.places.Autocomplete(document.getElementById('origin-input'));
			places.setComponentRestrictions(
            {'country': [ 'vn','vi']});
            google.maps.event.addListener(places, 'place_changed', function () {
				
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.A;
                var longitude = place.geometry.location.F;
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
               // alert(mesg);
            });
			 var places2 = new google.maps.places.Autocomplete(document.getElementById('destination-input'));
			 places2.setComponentRestrictions(
            {'country': [ 'vn','vi']});
            google.maps.event.addListener(places2, 'place_changed', function () {
                var place2 = places2.getPlace();
                var address2 = place2.formatted_address;
                var latitude2 = place2.geometry.location.A;
                var longitude2 = place2.geometry.location.F;
                var mesg2 = "Address: " + address2;
                mesg2 += "\nLatitude: " + latitude2;
                mesg2 += "\nLongitude: " + longitude2;
               // alert(mesg2);
            });
        });
		});
    </script>
	 
  <!--========================================================
                            content
  =========================================================-->
  <main>

    <section class="well bg-primary"> 
     
      <div class="container">        
        <div class="row wow fadeinleft">

          <div class="grid_6">
            <div class="box" data-equal-group='3'>
              <div class="box_aside fa-tachometer mg-add"></div>
                <div class="box_cnt box_cnt__no-flow">
                  <h4>
                    Cam kết đúng giờ	
                  </h4>
                  <p class="clr1">
                    Luôn đón quý khách đúng giờ. Ycar bồi hoàn 100% vé nếu làm lỡ chuyến, lỡ việc.
                  </p>
                </div>
            </div>  
          </div>
          <div class="grid_6">
            <div class="box" data-equal-group='3'>
              <div class="box_aside fa-thumbs-o-up mg-add"></div>
                <div class="box_cnt box_cnt__no-flow">
                  <h4>
                   Cam kết phục vụ
                  </h4>
                  <p class="clr1">
                   Luôn đáp ứng mọi nhu cầu của quý khách trong suốt quá trình di chuyển
                  </p>
                </div>
            </div>  
          </div>

        </div>  
        <div class="row wow fadeinright">  

          <div class="grid_6">
            <div class="box" data-equal-group='3'>
              <div class="box_aside fa-cab mg-add"></div>
                <div class="box_cnt box_cnt__no-flow">
                  <h4>
                    Cam kết minh bạch
                  </h4>
                  <p class="clr1">
                   Quý khách luôn biết trước các khoản chi phí phải chi trả cho dịch vụ
                  </p>
                </div>
            </div>  
          </div>
          <div class="grid_6">
            <div class="box" data-equal-group='3'>
              <div class="box_aside fa-suitcase mg-add"></div>
                <div class="box_cnt box_cnt__no-flow">
                  <h4>
Cam kết chất lượng                  </h4>
                  <p class="clr1">
                 Xe đời mới với khoang hành lý rộng sẽ giúp quý khách thoải mái hơn trong mỗi chuyến đi
                  </p>
                </div>
            </div>  
          </div>
          
        </div>
      </div>

    </section> 

   

    
   


    <section class="well2" id="pricing"> 
      
        

        <h1 class="center pricing-title">Bảng giá xe sân bay và xe đường dài</h1>

    <p class="center">  (<i>* Quý khách lưu ý, bảng giá chỉ mang tính chất tham khảo và có thể thay đổi tùy vào thời điểm.</i>)</p>
			<table class="table hidden-phone table-bordered text-center pricing-table"><colgroup><col width="165" /> <col span="2" width="183" /> <col width="164" /> <col span="2" width="136" /> <col span="2" width="143" /> <col width="201" /> </colgroup>
				<tbody>
				<tr>
				<th width="165" >DỊCH VỤ</th>
				<th width="183">NỘI DUNG</th>
				<th colspan="2" width="347">XE 5 CHỖ</th>
				<th colspan="2" width="272">XE 7 CHỖ</th>
				<th colspan="2" width="286">XE 16 CHỖ</th>
				<th width="201">LƯU Ý</th>
				</tr>
				<tr>
				<td rowspan="3" width="165" ><b>XE ĐI SÂN BAY</b></td>
				<td width="183">HN - NỘI BÀI</td>
				<td colspan="2" width="347">160.000 - 220.000đ</td>
				<td colspan="2" width="272">180.000 - 250.000đ</td>
				<td colspan="2" rowspan="2" width="286">400.000 - 500.000đ</td>
				<td rowspan="3" width="201">Giá đã bao gồm thời gian chờ tối đa là 1h</td>
				</tr>
				<tr>
				<td width="183" >NỘI BÀI - HÀ NỘI</td>
				<td colspan="2" width="347">250.000 - 320.000đ</td>
				<td colspan="2" width="272">280.000 - 350.000đ</td>
				</tr>
				<tr>
				<td width="183">2 CHIỀU</td>
				<td colspan="2" width="347">420.000 - 500.000đ</td>
				<td colspan="2" width="272">450.000 - 550.000đ</td>
				<td colspan="2" width="286">800.000đ</td>
				</tr>
				<tr>
				<td rowspan="5" width="165" ><b>XE ĐI TỈNH</b></td>
				<td width="183">Tính theo KM</td>
				<td width="183">1 chiều</td>
				<td width="164">2 chiều</td>
				<td width="136">1 chiều</td>
				<td width="136">2 chiều</td>
				<td width="143">1 chiều</td>
				<td width="143">2 chiều</td>
				<td rowspan="5" width="201">Giá đã bao gồm thời gian chờ tối đa là 4h. </td>
				</tr>
				<tr>
				<td width="183" >Dưới 50km </td>
				<td width="183">10.000vnđ/1km</td>
				<td width="164">8.000vnđ/1km</td>
				<td width="136">12.000vnđ/1km</td>
				<td width="136">9.000vnđ/1km</td>
				<td width="143">14.000vnđ/1km</td>
				<td width="143">11.000vnđ/1km</td>
				</tr>
				<tr>
				<td width="183" >50 - 100 km</td>
				<td width="183">9.500vnđ/1km</td>
				<td width="164">6.500vnđ/1km</td>
				<td width="136">11.000vnđ/1km</td>
				<td width="136">7.500vnđ/1km</td>
				<td width="143">13.000vnđ/1km</td>
				<td width="143">10.000vnđ/1km</td>
				</tr>
				<tr>
				<td width="183" >Trên 100 km</td>
				<td width="183">9.000vnđ/1km</td>
				<td width="164">6.000vnđ/1km</td>
				<td width="136">10.000vnđ/1km</td>
				<td width="136">7.000vnđ/1km</td>
				<td width="143">12.000vnđ/1km</td>
				<td width="143">9.000vnđ/1km</td>
				</tr>
				<tr>
				<td width="183">Trên 200 km</td>
				<td width="183">8.000vnđ/1km</td>
				<td width="164">5.000vnđ/1km</td>
				<td width="136">9.000vnđ/1km</td>
				<td width="136">6.000vnđ/1km</td>
				<td width="143">10.000vnđ/1km</td>
				<td width="143">7.000vnđ/1km</td>
				</tr>
				</tbody>
				</table>
				
				
				<table  class="table visible-phone table-bordered text-center pricing-table"><colgroup><col width="165" /> <col span="2" width="183" /> </colgroup>
<tbody>

<tr>
<th width="165" height="24">NỘI DUNG</th>
<th colspan="2" width="366">XE 5 CHỖ</th>
</tr>
<tr>
<td width="165" height="24">HN - NỘI BÀI</td>
<td colspan="2" width="366">160.000 - 220.000đ</td>
</tr>
<tr>
<td width="165" height="24">NỘI BÀI - HÀ NỘI</td>
<td colspan="2" width="366">200.000 - 300.000đ</td>
</tr>
<tr>
<td width="165" height="24">2 CHIỀU</td>
<td colspan="2" width="366">400.000 - 500.000đ</td>
</tr>
<tr>
<td width="165" height="24">Tính theo KM</td>
<td width="183">1 chiều</td>
<td width="183">2 chiều</td>
</tr>
<tr>
<td width="165" height="24">Dưới 50km </td>
<td width="183">10.000vnđ/1km</td>
<td width="183">8.000vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">50km - 100km</td>
<td width="183">9.500vnđ/1km</td>
<td width="183">6.500vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">Trên 100 km</td>
<td width="183">9.000vnđ/1km</td>
<td width="183">6.000vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">Trên 200 km</td>
<td width="183">8.000vnđ/1km</td>
<td width="183">5.000vnđ/1km</td>
</tr>
<tr>
<th width="165" height="24">NỘI DUNG</th>
<th colspan="2" width="366">XE 7 CHỖ</th>
</tr>
<tr>
<td width="165" height="24">HN - NỘI BÀI</td>
<td colspan="2" width="366">150.000 - 250.000đ</td>
</tr>
<tr>
<td width="165" height="24">NỘI BÀI - HÀ NỘI</td>
<td colspan="2" width="366">250.000 - 350.000đ</td>
</tr>
<tr>
<td width="165" height="24">2 CHIỀU</td>
<td colspan="2" width="366">450.000 - 550.000đ</td>
</tr>
<tr>
<td width="165" height="24">Tính theo KM</td>
<td width="183">1 chiều</td>
<td width="183">2 chiều</td>
</tr>
<tr>
<td width="165" height="24">Dưới 50km </td>
<td width="183">12.000vnđ/1km</td>
<td width="183">9.000vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">50km - 100km </td>
<td width="183">11.000vnđ/1km</td>
<td width="183">7.500vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">Trên 100 km</td>
<td width="183">10.000vnđ/1km</td>
<td width="183">7.000vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">Trên 200 km</td>
<td width="183">9.000vnđ/1km</td>
<td width="183">6.000vnđ/1km</td>
</tr>
<tr>
<th width="165" height="24">NỘI DUNG</th>
<th colspan="2" width="366">XE 16 CHỖ</th>
</tr>
<tr>
<td width="165" height="24">HN - NỘI BÀI</td>
<td colspan="2" rowspan="2" width="366">400.000 - 500.000đ</td>
</tr>
<tr>
<td width="165" height="24">NỘI BÀI - HÀ NỘI</td>
</tr>
<tr>
<td width="165" height="24">2 CHIỀU</td>
<td colspan="2" width="366">800.000đ</td>
</tr>
<tr>
<td width="165" height="24">Tính theo KM</td>
<td width="183">1 chiều</td>
<td width="183">2 chiều</td>
</tr>
<tr>
<td width="165" height="24">Dưới 50km </td>
<td width="183">14.000vnđ/1km</td>
<td width="183">10.000vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">Trên 100 km</td>
<td width="183">12.000vnđ/1km</td>
<td width="183">9.000vnđ/1km</td>
</tr>
<tr>
<td width="165" height="24">Trên 200 km</td>
<td width="183">10.000vnđ/1km</td>
<td width="183">7.000vnđ/1km</td>
</tr>
</tbody>
</table>
				
				<div class="text-center">
				<br/>
					
					<a href="#home" id="airport_booking" class="btn airport_booking">Đặt xe</a><br/>
					
				</div>	
         

    

    </section>  

   <section class="well well_ins1  center background-bottom" >

        <div class="container">
          <h2>
            An toàn của quý khách là sứ mệnh của chúng tôi
          </h2>          
          <p>
           Ycar.vn nói không với rượu bia, đi nhanh vượt ẩu
          </p>      
        </div> 

    </section>
	<section id="cars" class="well2 center">
		<div class="container">
			<h3>Các loại xe</h3>
			<p>YCar.vn cam kết phục vụ quý khách với các dòng xe đời mới cốp rộng.</p>
			<div class="hidden-phone">
					<div class="row mySlides">
					<div class="grid_3">
						<img src="images/mazda1.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/mazda2.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/mazda3.png" alt="inova 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/mazda4.png" alt="inova 7 chỗ"/>
					</div>
				</div>
				<div class="row mySlides">
					<div class="grid_3">
						<img src="images/fortuner7-1.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/fortuner7-2.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/inova7-1.png" alt="inova 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/inova7-2.png" alt="inova 7 chỗ"/>
					</div>
				</div>
				<div class="row mySlides">
					<div class="grid_3">
						<img src="images/16cho-1.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/16cho-2.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/16cho-4.png" alt="inova 7 chỗ"/>
					</div>
					<div class="grid_3">
						<img src="images/16cho-5.png" alt="inova 7 chỗ"/>
					</div>
				</div>
			 <img class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)" alt="pre" src="images/bullet-1[1652].png" />
				<img class="w3-button w3-black w3-display-right" onclick="plusDivs(1)"  alt="next" src="images/bullet-2[1653].png"/>
			</div>
			<div class="visible-phone">
					<div class="mySlidesPhone">
						<img src="images/mazda1.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/mazda2.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/mazda3.png" alt="inova 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/mazda4.png" alt="inova 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/fortuner7-1.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/fortuner7-2.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class=" mySlidesPhone">
						<img src="images/inova7-1.png" alt="inova 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/inova7-2.png" alt="inova 7 chỗ"/>
					</div>
				
					<div class="mySlidesPhone">
						<img src="images/16cho-1.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/16cho-2.png" alt="fortuner 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/16cho-4.png" alt="inova 7 chỗ"/>
					</div>
					<div class="mySlidesPhone">
						<img src="images/16cho-5.png" alt="inova 7 chỗ"/>
					</div>
				
				
	
				 <img class="w3-button w3-black w3-display-left" onclick="plusDivsphone(-1)" alt="pre" src="images/bullet-1[1652].png" />
				<img class="w3-button w3-black w3-display-right" onclick="plusDivsphone(1)"  alt="next" src="images/bullet-2[1653].png"/>
				
			</div>	
		

 
  

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
  
  
}


var slideIndexphone = 1;

showDivsphone(slideIndexphone);

function plusDivsphone(n) {
  showDivsphone(slideIndexphone += n);
}

function showDivsphone(n) {
  var i;
  var x = document.getElementsByClassName("mySlidesPhone");

  if (n > x.length) {slideIndexphone = 1}    
  if (n < 1) {slideIndexphone = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndexphone-1].style.display = "block";  
}
</script>
		</div>
	</section>

  </main>

  <!--========================================================
                            footer
  =========================================================-->
  <footer class="">
    <div class="container">
	<div class="row">
		<div class="grid_6">
			
			<img src="images/logo_ycar_final.png"  alt="logo"  />  
			
			 
				
			  
		</div>
		<div class="grid_6 footer-contact right">
			<h3>Liên hệ</h3>
				<br/>
				<span>CÔNG TY CỔ PHẦN ĐẦU TƯ LTD VIỆT NAM.</span><br/>
Địa chỉ: Tầng 9 - 52 Bà Triệu - Hoàn Kiếm - Hà Nội<br/>
Điện thoại: 024-37476106. Fax: 024-37476105<br/>
Hotline: <a href="tel:0917999941">0917 999941</a><br/>
Mã số thuế: 0105985643
						</div>
	</div>

    
  

    
      
     

        

      <div class="rights center">
	  
	   <div class="social text-center">
                                <ul>
                                    <li><a class="wow fadeInUp animated" href="https://twitter.com/" ><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="wow fadeInUp animated" href="https://www.facebook.com/ycar.vn/" target="_blank" data-wow-delay="0.2s" ><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="wow fadeInUp animated" href="https://plus.google.com/" data-wow-delay="0.4s" ><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="wow fadeInUp animated" href="https://instagram.com/" data-wow-delay="0.6s" ><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>	</div>
      <!-- {%footer_link} -->
    </div>

      


  </footer>

</div>


<script>
		var dis_global;
		
		function format_number(x) {
			num = x.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+" vnđ";
			return num;
		}

		function update_price(){
			
				var vars = get_current_var();
				var current_price = get_final_price(vars.start,vars.end,vars.dist_value,vars.car_type,vars.way,vars.time,vars.vat,vars.add_loc1,vars.add_loc2,vars.coupon);
				//var price_5; var price_7;
				//$("#total_price").val(current_price);
				//document.getElementById("total_price_text").innerHTML = format_number(current_price);
				
		}
		function checkcoupont(coupon,car_type,way,start_point,end_point,pick_up_time) {
				/*
				var res = coupon.toLowerCase();
				var sale_price = 0;
				document.getElementById("coupon_result").innerHTML = "";
				if (res == "ycarair" ) {
					if (pick_up_time > 22 || pick_up_time < 5) {
						document.getElementById("coupon_result").innerHTML = "<span class='error'>Mã YCarAir không áp dụng trong thời gian từ 22h tối đến 5h sáng!</span>";
					}else if (start_point!=1 && end_point!=1){
						"<span class='error'>Mã YCarAir chỉ áp dụng cho xe đưa đón sân bay!</span>";
					}else {
						if (car_type == 1 && way == 1){
							if (start_point == 1) {
								sale_price = 200000;
								//$("#total_sale_price").val(200000);
								document.getElementById("coupon_result").innerHTML = "Chuyến đi này chỉ còn 200.000 vnđ ";
							}else {
								//$("#total_sale_price").val(100000);
								document.getElementById("coupon_result").innerHTML = "Chuyến đi này chỉ còn 100.000 vnđ ";
								sale_price = 100000;
							}
							
						}else if (car_type == 1 && way == 2){
							sale_price = 300000;
							document.getElementById("coupon_result").innerHTML = "Chuyến đi này chỉ còn 300.000 vnđ ";
							
						}else {
						
							document.getElementById("coupon_result").innerHTML = "<span class='error'>Mã YCarAir không áp dụng cho xe 7 chỗ!</span>";
						}
					}
					
					
				} 
				
				if (res=="ycartrip"){
					if (start_point!=1 && end_point!=1){
						document.getElementById("coupon_result").innerHTML = "Chuyến đi này được giảm 30%! ";
						sale_price = 1;
					}else {
						document.getElementById("coupon_result").innerHTML = "<span class='error'>Mã YCarTrip không áp dụng cho xe đưa đón sân bay!</span>";
					
					}
					
				}
				*/
				return 0;
				
										
		}
		function get_current_var(){
				var coupon = $("#coupon").val();
				var car_type = $('input[name=car_type]:checked').val();
				if(document.getElementById('invoice').checked) {
					var vat = 1;
				}else {
					var vat = 0;
				}
					var add_loc = 0;
					var loc_1 = "";
					var loc_2 = "";
				if(document.getElementById('add_location').checked) {
					 loc_1 = document.getElementById('add_location_1').value;	
					 loc_2 = document.getElementById('add_location_2').value;	
					
				}
				var time = $("#pick_up_time").val();
				var res = time.split(" ");
				var hour = res[1].split(":");
				var pick_up_time = Number(hour[0]);
				
				var car_type = $('input[name=car_type]:checked').val();
				car_type =Number(car_type);
				//ar car_type = $('input[name=car_type]:checked').val();
				var way = $('input[name=way]:checked').val();
				way =Number(way);
				var origins = document.getElementById('origin-input').value;	
				var destinations = document.getElementById('destination-input').value;
				var start_point = check_location(origins);
				var end_point = check_location(destinations);
				var distance_value = get_distance(origins,destinations,myFunction);
				
				console.log("global:"+dis_global);
				var sale_price = checkcoupont(coupon,car_type,way,start_point,end_point,pick_up_time);
				
				
				var car = {start:start_point,end:end_point,dist_value:dis_global,car_type:car_type,way:way,time:pick_up_time,vat:vat,add_loc:add_loc,add_loc1:loc_1,add_loc2:loc_2,coupon:sale_price};
			//	console.log(car);
				
				return car;
			}
			function myFunction(xhttp) {
				  dis_global = xhttp;
				}
			function get_distance(origins,destinations,cfunc) {
					 var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							//console.log(this.status);
							//console.log(this.responseText);
							cfunc (this.responseText);
							
						}
					};
					//return xmlhttp.onreadystatechange;
					//console.log(origins);
					xmlhttp.open("GET", "distance.php?start=" + origins+"&end="+destinations, true);
					xmlhttp.send();
					 
				
			}
		function check_location(location){
				if (location == "Sân bay Nội Bài, Sóc Sơn, Hanoi, Vietnam" || location == "Noi Bai International Airport, Sóc Sơn, Hanoi, Vietnam" || location == "Noi Bai International Terminal 2, Phú Cường, Hanoi, Vietnam" )
					return 1;
				else
					return 2;
			}
			function get_final_price(start,end,dist_value,type_car,way,time,vat,add_loc1,add_loc2,coupon){
					var origins = document.getElementById('origin-input').value;	
				var destinations = document.getElementById('destination-input').value;
					var service = new google.maps.DistanceMatrixService();
					 service.getDistanceMatrix({
						  origins: [origins],
						  destinations: [destinations],
						  travelMode: google.maps.TravelMode.DRIVING,
						  unitSystem: google.maps.UnitSystem.METRIC,
						  avoidHighways: false,
						  avoidTolls: false
						},
						function(response, status) {
						  var dvTest = document.getElementById("dvDistance");
						//  dvTest.innerHTML += "getDistanceMatrix's callback.<br />";

						  if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
							for (var i = 0; i < response.rows.length; i++) {
							  for (var j = 0; j < response.rows[i].elements.length; j++) {
								var distance = response.rows[i].elements[j].distance.text;
								//var duration = response.rows[i].elements[j].duration.text;
								var dvDistance = document.getElementById("distance");
								dvDistance.innerHTML =  distance;
								var dvDuration = document.getElementById("time");
								//dvDuration.innerHTML =  duration;
								document.getElementById("distance_km").value = response.rows[i].elements[j].distance.value;
								//document.getElementById("time_h").value = response.rows[i].elements[j].duration.value;
								var dist_value = response.rows[i].elements[j].distance.value;
								
								dist_value = Math.round(dist_value/1000);
								$("#distance_booking").val(dist_value);
								if (dist_value < 15) {
									dist_value = 15;
								}
								console.log("check distance:"+dist_value);
						
						if (end == 1 ) {
										if (dist_value < 20) {
											var price_array = [
												[160000,400000],
												[180000,440000]
																							
											]
										
										}else if (dist_value < 25) {
											var price_array = [
												[180000,440000],
												[200000,480000]
																							
											]
											
										}else if (dist_value < 30) {
											var price_array = [
												[200000,480000],
												[220000,500000]
																							
											]
											
										}
										else if (dist_value < 37) {
											var price_array = [
												[220000,500000],
												[250000,550000]
																							
											]
											
										}else {
											price_5_1 = 220000+(dist_value-37)*10000;
											price_5_2 = 520000+(dist_value-37)*10000;
											price_7_1 = 250000+(dist_value-37)*10000;
											price_7_2 = 550000+(dist_value-37)*10000;
											var price_array = [
												[price_5_1,price_5_2],
												[price_7_1,price_7_2]
																							
											]
										}
										 $("#flight_number_block").show();
									
								}else if (start == 1) {
										//dist_value = dist_value+0.05*dist_value;
										
										if (dist_value < 20) {
											var price_array = [
												[240000,400000],
												[260000,440000]
																							
											]
											
										}else if (dist_value < 25) {
											var price_array = [
												[260000,440000],
												[280000,480000]
																							
											]
											
										}else if (dist_value < 30) {
											var price_array = [
												[280000,480000],
												[300000,500000]
																							
											]
											
										}
										else if (dist_value < 37) {
											var price_array = [
												[300000,500000],
												[330000,550000]
																							
											]
										
										}else {
											price_5_1 = 300000+(dist_value-37)*10000;
											price_5_2 = 500000+(dist_value-37)*10000;
											price_7_1 = 330000+(dist_value-37)*10000;
											price_7_2 = 550000+(dist_value-37)*10000;
											var price_array = [
												[price_5_1,price_5_2],
												[price_7_1,price_7_2]
																							
											]
										}
										
										
										 $("#flight_number_block").show();
								}else {
									//dist_value = dist_value+0.1*dist_value;
									$("#flight_number_block").hide();
									if (dist_value < 50) {
										price_5_1 = dist_value*10000;
										price_5_2 = 2*dist_value*8000;
										price_7_1 = dist_value*12000;
										price_7_2 = 2*dist_value*9000;
										var price_array = [
												[price_5_1,price_5_2],
												[price_7_1,price_7_2]
																							
											]
									}else if (dist_value < 100){
										price_5_1 = dist_value*9500;
										price_5_2 = 2*dist_value*6500;
										price_7_1 = dist_value*11000;
										price_7_2 = 2*dist_value*7500;
										var price_array = [
												[price_5_1,price_5_2],
												[price_7_1,price_7_2]
																							
											]
									}else if (dist_value < 200){
										price_5_1 = dist_value*9000;
										price_5_2 = 2*dist_value*6000;
										price_7_1 = dist_value*10000;
										price_7_2 = 2*dist_value*7000;
										var price_array = [
												[price_5_1,price_5_2],
												[price_7_1,price_7_2]
																							
											]
									}else {
										price_5_1 = dist_value*8000;
										price_5_2 = 2*dist_value*5000;
										price_7_1 = dist_value*9000;
										price_7_2 = 2*dist_value*6000;
										var price_array = [
												[price_5_1,price_5_2],
												[price_7_1,price_7_2]
																							
											]
									}
								}
								//console.log(type_car);
						type_car = type_car-1;
						way = way-1;
						var sale_price = 0;
						if (coupon) {
							
								sale_price = coupon;
							
						}
						curent_price = price_array[type_car][way];
						if (end == 1 || start == 1 ) {
							if (time>22 || time < 5) {
								curent_price = curent_price*1.3;
							}
						}
						if (add_loc1) {
							curent_price = curent_price+30000;
							if (coupon) 
								sale_price = sale_price+30000;
						}
						if (add_loc2) {
							curent_price = curent_price+30000;
							if (coupon) 
								sale_price = sale_price+30000;
						}
						
						if (vat==1) {
							if (sale_price > 0)
							sale_price = sale_price+ curent_price*0.1;
							curent_price=curent_price*1.1;
							
						}
						if (coupon == 1) {
								var sale_price = curent_price*0.7;
								
							}
						if (sale_price > 0) {
							$("#total_sale_price_block").show();
							$("#total_price_block").addClass("active_sale");
						}else {
							$("#total_sale_price_block").hide();
							$("#total_price_block").removeClass("active_sale");
						}
						$("#total_sale_price").val(sale_price);
						document.getElementById("total_sale_price_text").innerHTML = format_number(sale_price);
						console.log("price:"+curent_price);
						$("#total_price").val(curent_price);
						document.getElementById("total_price_text").innerHTML = format_number(curent_price);
						 }
						}
						}}
						);
			}
			
			
			
					
			
		$(document).ready(function(){
			
			
			
			
			$("#testbutton").click(function(){
				//var type_of_road = $('input[name=type_of_road]:checked').val();
				
				var origins = document.getElementById('origin-input').value;	
				var destinations = document.getElementById('destination-input').value;
				if (origins && destinations) {
					document.getElementById("start_point").value = origins;
					document.getElementById("end_point").value = destinations;
					
					// SHOW locations
					var start = document.getElementById("start");
								start.innerHTML = origins;
					var end = document.getElementById("end");
								end.innerHTML = destinations;	
					// GET DISTANCE FROM 2 locations			
								var start_point = check_location(origins);
								var end_point = check_location(destinations);
							
								var vars = get_current_var();
								//console.log(vars);
								
								
								var current_price = get_final_price(vars.start,vars.end,vars.dist_value,vars.car_type,vars.way,vars.time,vars.vat,vars.add_loc1,vars.add_loc2);
								//var price_5; var price_7;
								//$("#total_price").val(current_price);
								//document.getElementById("total_price_text").innerHTML = format_number(current_price);
								
								
								
					// Get the modal
					var modal = document.getElementById('myModal');

					// Get the button that opens the modal
					var btn = document.getElementById("myBtn");

					// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close")[0];

					// When the user clicks the button, open the modal 
					
					modal.style.display = "block";
					

					// When the user clicks on <span> (x), close the modal
					span.onclick = function() {
						modal.style.display = "none";
						$("#coupon").val("");
							 document.getElementById("coupon_result").innerHTML=" ";
							
					}

					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
							 $("#coupon").val("");
							 document.getElementById("coupon_result").innerHTML=" ";
							
						}
					}
				}else {
					alert("Vui lòng nhập điểm đi và điểm đến");
				}	
			});
		});
	</script>
			<!-- Modal -->
		<div class="modal" id="myModal">
		
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Báo giá</h5>
				<span class="close">&times;</span>
			  </div>
			  <form action="xulytest.php" method="post" id="ajaxform">
			  <div class="modal-body">
				<div class="row" id="booking_detail">
					 <div class="grid_6">
							<ul>
								<li> <b><span id="start"></span></b> &rarr; 
								<b><span id="end"></span></b></li>
								<li>Quãng đường dự kiến: <b><span id="distance"></span></b></li>
								<input type="hidden" id="distance_booking" name="distance_booking" value="" />
								<input type="hidden" id="type_of_car" name="type_of_car" value="5 chỗ 1 chiều" />
								<input type="hidden" id="type_of_way" name="type_of_way" value="1" />
								<li></li>
								<div class="radio-form">
									<div class="grid_6">
									<input type="radio" name="car_type" id="car_typ_1" onclick="update_price()" value="1" checked/><label for="car_typ_1">Xe 5 chỗ</label>
									<input type="radio" name="car_type" id="car_typ_2" onclick="update_price()" value="2"/> <label for="car_typ_2">Xe 7 chỗ</label>
									</div>
									<div class="grid_6">
									<input type="radio" checked name="way" id="way_1" onclick="update_price()" value="1"/>  <label for="way_1">1 chiều</label>
									<input type="radio" name="way" id="way_2" onclick="update_price()" value="2"/> <label for="way_2">2 chiều</label>
									</div>
								</div>
								<input type="text" name="ref" placeholder="SĐT người giới thiệu" style="width:200px;"/>
								<br/>
								<input type="text" name="coupon" id="coupon" onkeyup="update_price()" placeholder="Mã giảm giá" style="width:200px;"/>
								<br/>
								
								<div class="clearfix"></div>
							
							
								
							</ul>
					 </div>
					  <div class="grid_6">
						<div id="field_available">
							<div class="grid_6">
								<input type="text" name="name" placeholder="Tên khách hàng" required />
							</div>
							<div class="grid_6">
									<input type="number" name="phone" placeholder="Số điện thoại" required />
							</div>
							<div class="clearfix"></div>
							<div class="grid_6">
								<label>Thời gian đi:</label>
								
								<input type="text" name="date" id="pick_up_time" onchange="update_price();" value="<?php echo date('Y-m-d H:i')?>" required class="calendar"/>
							</div>
							<div class="grid_6" id="flight_number_block" style="display:none">
								<label>Mã chuyến bay</label>
								<input type="text" name="flight_number" placeholder="Mã chuyến bay" id="flight_number" />
							</div>
							
						
							
							
							
								
							
						
						
							
							<div class="clearfix"></div>
						
								
							<label>Ghi chú</label>
							<textarea name="comment"></textarea>
							<script>
								
								
							</script>
						
						</div>
						
					 </div>
					 <script>
						function show(id){
							$("#"+id).toggle();
						}
					 </script>
					 <div class="clearfix"></div>
					 <div id="coupon_result"></div>
					  <div class="clearfix"></div>
							<input type="checkbox" name="invoice" id="invoice" onclick="show('invoice_block');update_price();" value="1"/> Lấy hóa đơn (+10%VAT)
								<div id="invoice_block" style="display:none;">
									<div class="grid_6">
									<input type="text" name="company" placeholder="Tên Công Ty"/><br/>
									<input type="text" name="mst" placeholder="MST"/><br/>
									</div>
									<div class="grid_6">
									<input type="text" name="address" placeholder="Địa chỉ"/><br/>
									<input type="text" name="address_inoivce" placeholder="Địa chỉ nhận hóa đơn"/>
									</div>
								</div>
								<div class="clearfix"></div>
							<input type="checkbox" name="add_location" id="add_location" onclick="show('add_location_block');update_price();" value="1"/> Thêm điểm đón/trả (30.000vnđ/điểm)
								<div id="add_location_block" style="display:none;">
								<div class="grid_6">
									<input type="text" name="address_1" placeholder="Điểm thứ nhất" id="add_location_1" onkeyup="update_price();"/>
								</div>	
								<div class="grid_6">	
									<input type="text" name="address_2" placeholder="Điểm thứ hai" id="add_location_2" onkeyup="update_price();"/>
									</div>	
									
								</div>	
					<div class="clearfix"></div>
						<div class="grid_6">
							<div id="total_price_block">
							Giá: <span id="total_price_text"></span><input type="hidden" value="" name="total_price"  id="total_price" />
							</div>
						</div>
						<div class="grid_6">
							<div id="total_sale_price_block" style="display:none;">
							Giá khuyến mại:	<span id="total_sale_price_text"></span><input type="hidden" value="" name="total_sale_price"  id="total_sale_price" />
						</div>
							
						</div>
						<div class="clearfix"></div>
						
					
						<div class="clearfix"></div>
						<div class="center">
							<button type="submit" class="btn btn-primary btn-booking">Đặt xe</button>	
						</div>	
				</div>
				<div id="booking_message" style="display:none;">
					<img src="images/logo_ycar_final.png" style="width:150px; height: auto;" alt="Ycar - An toàn khi đi xa"/> <br/>
							Chúng tôi đã nhận được thông tin đặt xe của quý khách. Chúng tôi sẽ liên lạc lại với quý khách trong thời gian sớm nhất!<br/>
							<a href="index.php" style="color:#002D6F; text-decoration: underline;" >Kết thúc!</a>
						</div>	
				<div id="booking">
					
						<input type="hidden" id="start_point" name="start_point" value=""/>	
						<input type="hidden" id="end_point" name="end_point" value=""/>	
						<input type="hidden" id="distance_km"name="distance_km" value=""/>	
						<input type="hidden" id="time_h" name="time_h" value=""/>	
						<input type="hidden" id="et_price" name="et_price" value=""/>	
						<input type="hidden" id="ref_url" name="ref_url" value="<?php echo $_SERVER["HTTP_REFERER"]?>"/>
					
				</div>
				</form>
			  </div>
			
			</div>
		
		</div>
	
	
	
	<script>
	/*
		var modal = document.getElementById('promotion');
		if(localStorage.getItem('popState') != 'shown'){
			modal.style.display = "block";
			localStorage.setItem('popState','shown')
		}
		// Get the button that opens the modal
		var btn = document.getElementById("btn-promotion");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[1];

		// When the user clicks on the button, open the modal 
		btn.onclick = function() {
			modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
				
			}
		}
		*/
	
	</script>	
		</div>
		<script>
			//callback handler for form submit
			
			$("#ajaxform").submit(function(e)
			{
				 var data = $('form#ajaxform').serialize();
					//su dung ham $.ajax()
					$.ajax({
					type : 'POST', //kiểu post
					url  : 'xulytest.php', //gửi dữ liệu sang trang submit.php
					data : data,
					success :  function(data)
						   {                       
								if(data == 'false')
								{
									alert('Sai tên hoặc mật khẩu');
								}else{
									var field_available = document.getElementById('booking_detail');
									var booking_message = document.getElementById('booking_message');
									field_available.style.display = "none";
									booking_message.style.display = "block";
									document.getElementById("exampleModalLabel").innerHTML="Đặt chuyến thành công";
									setTimeout(function() {
										location.reload();
									}, 4000);
									
								}
						   }
					});
					return false;
			});
			 
		
		</script>
		<script type="text/javascript">
$(function() {
    $('input[name="date"]').daterangepicker({
		 timePicker: true,
		 timePicker24Hour: true,
        timePickerIncrement: 15,
		locale: {
		  format: 'YYYY-MM-DD HH:mm',
		  cancelLabel: 'Xóa',
		  applyLabel: 'Chọn'
		},
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
       // alert("You are " + years + " years old.");
    });
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-106773073-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '483103472056712'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=483103472056712&ev=PageView
&noscript=1"/>
</noscript> 
<!-- End Facebook Pixel Code -->

</body>
</html>