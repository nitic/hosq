<!--<nav class=breadcrumbs>
  <span class="icon-location"></span>
  <ul>
    <li><a class=home href=index.html><span>ตำแหน่งปัจุบัน</span></a></li>
    <li>ห้องเวชระเบียน</li>
  </ul>
     <span class="float-right icon-user"> นิติ โชติแก้ว</span>
</nav>
-->

<div class="gcss-wrapper body-wrapper">
<main class="wrapper">
<div class="content">
   <div class="ggrid">
        <article class="block12 float-right">
            <div class=float-right>
                <h4 style="color:#333">สถานะการเชื่อมต่อ <span id="dot_connection_status"></span></h4>
            </div>
        </article>
        <article class="block11 float-left">
            <p>
                <h2><span class="icon-history">ส่งคิวผู้ป่วย</span></h2>
            </p>

         <div class=float-center>
              <div class="item">
                <div class="input-groups">
                   <div class="width20">
                      <label for="HN_number"><h3>HN</h3></label>
                      <span class="g-input icon-user" style="font-size:14pt">
                        <input id="txtHN" style="font-size:14pt" type="number" name="txtHN" title="หมายเลข HN">
                      </span>
                   </div>
                  <div class="width50">
                        <label for="show_arti_topic"><h3>ค้นหาชื่อสกุลผู้ป่วย</h3></label>
                        <span class="g-input icon-search" style="font-size:14pt">
                          <input name="show_arti_topic" style="font-size:14pt;" size="40" type="text" id="show_arti_topic" />
                          <input name="h_arti_id" type="hidden" id="h_arti_id" value="" />
                        </span>
                  </div>
                   <div class="width30">
                       <label for="send"><h3>&nbsp;</h3></label>
                       <span class="g-input">
                       <button id="addQueue" class="button large" style="height:43px">ส่งเข้าคิว</button>
                     </span>
                   </div>
                </div>
            </div>
        </div>
        <br>
        <hr style="display: block;height: 1px;border: 0;border-top: 3px solid #ccc;">
        <br>
        </article>
        <article class="block11 float-left">
          <p class=float-left>
              <span id="showDate" style="font-size:14pt;"><strong>วันที่ <?php echo date('d M Y'); ?></strong></span>
              &nbsp; &nbsp;<button id="refreshData" class="button light" title="รีเฟสข้อมูลตารางคิว"><span id="timer" class="icon-loop2">Refresh</span></button>
          </p>
            <table id="FooTable" class="table"></table>
        </article>
    </div>
<br><br><br><br>
</div>
</main>
</div>


<!-- Add Patient modal -->
<div id="modal_form" style="display:none;">
     <p>
       <div id="PatinetName" class=""></div>
       <hr>
     </p>
			<form method="post" id="ajax_frm" class="fixlabel" autocomplete="off" action="<?php echo base_url();?>Queue/add">
				<input id="HN_Number" type="hidden" name="HN_Number" >
       <fieldset>
           <div class="item">
             <div class="input-groups">
                 <div class="width50">
                   <label for="qdate">วันที่เข้าตรวจ</label>
                   <span class="g-input">
                       <input id="qdate" name="qdate" type="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                   </span>
                 </div>
                 <div class="width50">
                   <label for="qtime">เวลา</label>
                   <span class="g-input">
                       <select id="qtime" name="qtime">
                        <option value="now">เวลาปัจจุบัน</option>
                        <option value="09:00:00">09.00</option>
                        <option value="10:00:00">10.00</option>
                        <option value="11:00:00">11.00</option>
                        <option value="13:00:00">13.00</option>
                        <option value="14:00:00">14.00</option>
                        <option value="15:00:00">15.00</option>
                      </select>
                   </span>
                 </div>
           </div>
          </div>
          <div class="item">
             <label for="doctor_name">แพทย์ผู้ตรวจ</label>
             <span class="g-input">
                 <select id="doctor_name" name="doctor_name">
                  <option value="ไม่ระบุ">ไม่ระบุ</option>
                  <?php foreach($doctor_dropdown as $rows): ?>
              				<option value="<?php echo $rows->DoctorName;?>">
                        <?php echo $rows->DoctorName; ?>
                      </option>
          			   <?php endforeach; ?>
                </select>
             </span>
         </div>
         <div class="item">
            <label for="service_name">ผู้ให้บริการ</label>
            <span class="g-input">
                <select id="service_name" name="service_name">
                 <option value="ไม่ระบุ">ไม่ระบุ</option>
                 <?php foreach($service_dropdown as $rows): ?>
                     <option value="<?php echo $rows->DoctorName;?>">
                       <?php echo $rows->DoctorName; ?>
                     </option>
                  <?php endforeach; ?>
               </select>
            </span>
        </div>
			</fieldset>

			<fieldset class="submit">
				<button id="submit" class="button save" type="submit" value="สร้าง">บันทึกข้อมูล</button>
				<a class="button light" href="#" rel="modal:close">ยกเลิก</a>
			</fieldset>
			</form>
</div>


<script type="text/javascript">

// โหลดข้อมุลแสดงในตาราง
function loadData(){
      var dataURL = BASE_URL + "queue/getall";

      $('.table').html("");
      $('.table').footable({
        "columns": [
          { "name": "CheckInTime", "title": "เวลา"},
          { "name": "pk_HN", "title": "หมายเลข HN" },
          { "name": "PatientName", "title": "ชื่อ-นามสกุล" },
          { "name": "Doctor_name", "title": "แพทย์ผู้ตรวจ" },
          { "name": "Service_name", "title": "ผู้ให้บริการ" },
          { "name": "OPDStatus", "title": "สถานะ",
             "formatter": function(value, options, rowData){
                             if(value == 0)
                             return '<em class="term3">รอตรวจ</em>';
                             else return '<em class="term6">ตรวจเสร็จแล้ว</em>';
                          }
           },
           { "name": "Qid", "title": "ยกเลิกคิว",
              "formatter": function(value, options, rowData){
                                  return '<a onclick="deleteQueue('+value+')" ><span class="icon-bin"></span></a>';
                           }
            }
        ],
         "rows": $.get(dataURL)
      });
}

function find_Patient(HN_Number){
  var checkURL = BASE_URL + "Patient/getOnePatinetByHN/" + HN_Number;
  var fullName;
  $.ajax(
    {
        url : checkURL,
        type: "POST",
        dataType : 'json',
        success:function(data, textStatus, jqXHR)
        {
            if(data.length == 1) {
                $.each(data, function(idx, obj) {
                   fullName = obj.FirstName+" "+obj.LastName;

                });
              $('#show_arti_topic').val(fullName);
            }
            else{
                alert('ไม่พบข้อมูลผู้ป่วย');
                return false;
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //alert('ไม่พบหมายเลข HN');
            return false;
        }
    });
}


function deleteQueue(queueID){
      console.log(queueID);
}

function showAddQueueBox(HN_Number){
  var checkURL = BASE_URL + "Patient/getOnePatinetByHN/" + HN_Number;
  var html;
  $.ajax(
    {
        url : checkURL,
        type: "POST",
        dataType : 'json',
        success:function(data, textStatus, jqXHR)
        {
            //data: return data json from server
            //console.log(data.length);
            if(data.length == 1) {
                $.each(data, function(idx, obj) {
                 //console.log(obj.name);
                 $("#HN_Number").val(obj.pk_HN);
                 html = "<h2>HN 000"+obj.pk_HN+" "+obj.TitleName+obj.FirstName+" "+obj.LastName+"</h2>"
                });
              $('#PatinetName').html(html);
              $('#qtime').prop('selectedIndex',0);
              $('#doctor_name').prop('selectedIndex',0);
              $('#service_name').prop('selectedIndex',0);
              $('#modal_form').modal();
            }
            else{
                alert('ไม่พบข้อมูลผู้ป่วย');
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            alert('กรุณาป้อนหมายเลข HN ก่อนคลิกปุ่มส่งเข้าคิว!');
            $('#txtHN').focus();
        }
    });

}


// เมื่อเลือกผลการค้นหา ส่งค่า HN
function set_hn_results(HN_Number){
  var value = $('#h_arti_id').val();
  $('#txtHN').val(value);
}


// Search Tools ทำการค้นหา
function make_autocom(autoObj,showObj){
	var mkAutoObj=autoObj;
	var mkSerValObj=showObj;
	new Autocomplete(mkAutoObj, function() {
		this.setValue = function(id) {
			document.getElementById(mkSerValObj).value = id;
		}
		if ( this.isModified )
			this.setValue("");
		if ( this.value.length < 1 && this.isNotClick )
			return ;

		var  searchUrl = BASE_URL + 'patient/search/';
		return searchUrl +encodeURIComponent(this.value);
    });
}

// เรียกใช้งาน Autocomplete
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");


/************************************************/
//เปิดการใช้งาน web socket
var conn = new Connection3(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);

$(function() {

  var status = '<img src="'+BASE_URL+'assets/img/offline.png" title="ยังไม่เชื่อมต่อ">';
  $('#dot_connection_status').html(status);

  moment.locale('th');
  var today = "วันที่ " + moment().format("D MMMM YYYY");
  $('#showDate').html(today);


  $('#addQueue').click(function() {
    var HNnubmer = parseInt($('#txtHN').val());
    var checkURL = BASE_URL + "queue/checkYouInQueueToday/" + HNnubmer;
    $.ajax(
      {
          url : checkURL,
          type: "POST",
          dataType : 'text',
          success:function(data, textStatus, jqXHR)
          {
              var num = parseInt(data);
              if (num > 0){
                      if(confirm("ผู้ป่วยคนนี้มีการส่งเข้าคิววันนี้แล้ว เป็นจำนวน " + num + " ครั้ง คุณยืนยันที่จะส่งเข้าคิวอีกหรือไม่ ?")){
                            showAddQueueBox(HNnubmer);
                            return true;
                            $(this).dialog("close");
                      }
                        else{
                            return false;
                            $(this).dialog("close");
                      }
                }
               else{
                  showAddQueueBox(HNnubmer);
                  return true;
               }
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              return false;
          }
      });
  });

     /* บันทึกข้อมูล */
     $("#ajax_frm").submit(function(e){

       var postData = $(this).serializeArray();
       var formURL = $(this).attr("action");
        //console.log(postData);

       $.ajax({
         type : "POST",
         dataType : "json",
         url : formURL,
         data : postData,
       }).done(function(data){

         if(data.status == "success")
         {
          // เรียกใช้ websocket
          var typeData = { broadType : Broadcast.POST, data : data.postData};
          conn.sendMsg(typeData);

          $('#txtHN').val('');
          $('#show_arti_topic').val('');
          $('#show_arti_topic').focus();

           $.modal.close();
         }
       });
        e.preventDefault();

     });

  /* ช่อง HN กรณี blur event */
  $("#txtHN").blur(function(){
       find_Patient($( this ).val());
  });

  /* ช่อง HN กดปุ่ม enter event */
  $("#txtHN").keyup(function(e){
    var code = e.which; // recommended to use e.which, it's normalized across browsers
    if(code==13)e.preventDefault();
    if(code==32||code==13||code==188||code==186){
        find_Patient($(this).val());
    } // missing closing if brace
 });

  /* ช่องค้นหาผู้ป่วย กรณีกดปุ่ม backspace */
  $('#show_arti_topic').keyup(function(e){
    if(e.keyCode == 8){
        $('#txtHN').val('');
     }
  });


  $('#show_arti_topic').focus();


  // กำหนดเวลารีเฟส
  var count = 60;

   /* ปุ่มรีเฟสตาราง */
  $('#refreshData').click(function() {
      loadData();
      count = 60;
  });

  // กำหนดให้ทำงนทุกๆ 10 วิ (1000 = 1 วิ)
  setInterval(function(){
       if(count == 0){
           count = 60;
           loadData();
       }
       count--;
       $('#timer').html(count+' s');

  },1000);

  // โหลดตารางคิวผู้ป่วย
  loadData();

// end
});


</script>
