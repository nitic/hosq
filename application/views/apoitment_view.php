<!--<nav class=breadcrumbs>
  <span class="icon-location"></span>
  <ul>
    <li><a class=home href=index.html><span>ตำแหน่งปัจุบัน</span></a></li>
    <li>ห้องเวชระเบียน</li>
  </ul>
</nav>
-->

<div class="gcss-wrapper body-wrapper">
<main class="wrapper">
<div class="content">
   <div class="ggrid">
        <article class="block10">
          <p>
            <h2><span class="icon-user-plus">เพิ่มข้อมูลการจอง</span></h2></h2>
          </p>
          <form method="post" id="reserved_frm" onkeypress="return event.keyCode != 13;" style="margin-left:30px" class=fixlabel autocomplete="off" action="<?php echo base_url();?>apoitment/add">
           <fieldset>
               <div class="item">
                 <div class="input-groups">
                     <div class="width20">
                       <label for="txtHN">HN</label>
                       <span class="g-input">
                           <input id="txtHN" name="txtHN" type="number" >
                       </span>
                     </div>
                     <div class="width30">
                       <label for="show_arti_topic">ชื่อ-นามสกุล</label>
                       <span class="g-input">
                           <input name="show_arti_topic" type="text" id="show_arti_topic" />
                           <input name="h_arti_id" type="hidden" id="h_arti_id" value="" />
                       </span>
                     </div>
                     <div class="width20">
                       <label for="txtPhone">หมายเลขโทรศัพท์</label>
                       <span class="g-input">
                           <input id="txtPhone" name="txtPhone" type="number">
                       </span>
                     </div>
                     <div class="width30">
                         <label for="doctor_id">แพทย์ผู้ตรวจ / ผู้ให้บริการ</label>
                         <span class="g-input">
                             <select id="doctor_id" name="doctor_id">
                              <option value="0">ไม่ระบุ</option>
                              <?php foreach($doctor_dropdown as $rows): ?>
                                 <option value="<?php echo $rows->pk_id;?>">
                                    <?php echo $rows->DoctorName; ?>
                                  </option>
                              <?php endforeach; ?>
                            </select>
                         </span>
                      </div>
               </div>
              </div>
              <div class="item">
                 <div class="input-groups">
                    <div class="width20">
                       <label for="ReservedDate">วันที่เข้ารับบริการ</label>
                       <span class="g-input">
                          <input id="ReservedDate" class="date-picker" name="ReservedDate" type="text" value="<?php echo $date_today; ?>" >
                       </span>
                    </div>
                     <div class="width30">
                         <label for="Reservedtime">ช่วงเวลา</label>
                         <span class="g-input">
                             <select id="Reservedtime" name="Reservedtime">
                              <option value="09:00:00">9.00 - 10.00</option>
                              <option value="10:00:00">10.00 - 11.00</option>
                              <option value="11:00:00">11.00 - 12.00</option>
                              <option value="13:00:00">13.00 - 14.00</option>
                              <option value="14:00:00">14.00 - 15.00</option>
                              <option value="15:00:00">15.00 - 16.00</option>
                            </select>
                         </span>
                     </div>
                     <div class="width20">
                         <label for="hour">จำนวนชั่วโมง</label>
                         <span class="g-input">
                             <select id="hour" name="hour">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                            </select>
                         </span>
                      </div>
                      <div class="width30">
                          <label for="create_name">ลงชื่อผู้รับจอง</label>
                          <span class="g-input">
                              <select id="create_name" name="create_name">
                               <option value="<?php echo $this->session->userdata('FullName'); ?>"><?php echo $this->session->userdata('FullName'); ?></option>
                               <?php
                                   foreach($doctor_dropdown as $rows):
                                   if($rows->pk_id != 73): //ไม่แสดง เวรนวดประจำวัน
                                ?>
                                  <option value="<?php echo $rows->DoctorName; ?>">
                                     <?php echo $rows->DoctorName; ?>
                                   </option>
                               <?php endif; endforeach; ?>
                             </select>
                          </span>
                       </div>
                 </div>
             </div>
         </fieldset>

         <fieldset class="submit">
           <button id="submit" class="button save" type="submit" value="สร้าง">บันทึกข้อมูล</button>
           <a id="cancle" class="button light" href="#">ล้างข้อมูล</a>
         </fieldset>
         <p>(*นัดผู้ป่วยทุกครั้งกรุณาขอเบอร์โทรศัพท์ติดต่อกลับและแจ้งผู้ป่วยให้มาก่อนเวลา 30 นาทีด้วยค่ะ)</p>
         </form>

        </article>


       <hr style="display: block;height: 1px;border: 0;border-top: 3px solid #ccc;"><br>
       <h2><span class="icon-calendar">ตารางนัดผู้ป่วย</span></h2><br>
        <article class="block11">
          <div class="block6 float-left">
              <span id="showDate" style="font-size:12pt;"><strong><?php

              $thaidate = new \Rundiz\Thaidate\Thaidate();
              echo $thaidate->date('วันlที่ j F Y',strtotime($date_today));
              //echo dateTH($date_today);

              ?></strong></span>

          </div>
          <div class="block6 float-right">
            <?php
                $yesterday_url = base_url()."apoitment/index/". date('Y-m-d',strtotime($date_today . "-1 days"));
                $tomorrow_url = base_url()."apoitment/index/". date('Y-m-d',strtotime($date_today . "+1 days"));
             ?>
            <a class="button light" title="วันที่ผ่านมา" href="<?php echo $yesterday_url; ?>">&nbsp;<span class="icon-arrow-left2"></span></a>
            <a class="button light" title="วันถัดไป" href="<?php echo $tomorrow_url; ?>">&nbsp;<span class="icon-arrow-right2"></span></a>
            &nbsp;<button id="datePicker" class="button light" title="เลือกวันที่"><span class="icon-calendar">ปฏิทิน</span></button>
          </div>
          <div>
                 <br><br>

                 <section class=gtab>
                	<input class=tab-1 id=tab-1 name=gtab type=radio value="tab1"
                  <?php if(isset($_COOKIE["current_tab"]) && ($_COOKIE["current_tab"] == "tab1")) {
                        echo "checked";
                   } ?> >
                	<label for=tab-1>แพทย์ผู้ตรวจ</label>
                	<input class=tab-2 id=tab-2 name=gtab type=radio value="tab2"
                  <?php if(isset($_COOKIE["current_tab"]) && ($_COOKIE["current_tab"] == "tab2")) {
                        echo  "checked";
                       }
                       elseif(!isset($_COOKIE["current_tab"])){ // not isset $_COOKIE["current_tab"]
                         echo "checked";
                       }
                   ?> >
                	<label for=tab-2>ผู้ช่วยแพทย์</label>

                	<div class=tab_content>
                		<article class="item tab-1">

                            <table id="table1" class="border fullwidth data">
                              <thead>
                                <tr>
                                  <th rowspan="2">ชื่อแพทย์ผู้ตรวจ</th>
                                  <th colspan="6">เวลา</th>
                                </tr>
                                <tr>
                                  <th>9.00 - 10.00</th>
                                  <th>10.00 - 11.00</th>
                                  <th>11.00 - 12.00</th>
                                  <th>13.00 - 14.00</th>
                                  <th>14.00 - 15.00</th>
                                  <th>15.00 - 16.00</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    $time_duration = array('09:00:00','10:00:00','11:00:00','13:00:00','14:00:00','15:00:00');


                                //    echo "<pre>";
                                  //  print_r($doctor_table);
                                    foreach ($doctor_table as $key => $value) {
                                          echo '<tr style="height:80px">';
                                          echo '<td style="width:200px">'.$value['DoctorName']."</td>";

                                          foreach ($time_duration as $time) {
                                                echo ' <td id="'.$key.'#'.$time.'" style="width:130px">';

                                                if (isset($value["Apo"]) && !empty($value["Apo"])) {

                                                    foreach ($value["Apo"] as $apoKey => $apo) {
                                                             if ($apo['Time'] == $time) {

                                                               $HNnumber = (empty($apo['HN']))? '': "HN ".$apo['HN'];
                                                               $FirstName = explode(" ", $apo['PatientName']);
                                                               $numHour = ($apo['Hour'] > 1)? '<em class="term3">('.$apo['Hour'].' ชม.)</em> ' : '';

                                                               echo '<a id="'.$apoKey.'" class="button light center" title="'.$HNnumber." ".$apo['PatientName'].' (ผู้รับจอง: '.$apo['Detail'].')" style="width:120px;height:50px;margin-bottom:5px;">';
                                                               echo $HNnumber." ".$FirstName[0];
                                                               echo "<br>".$apo['MobilePhone']." ".$numHour;
                                                               echo '</a>';
                                                             }
                                                    }

                                                }

                                                echo "</td>";
                                          }

                                          echo "</tr>";

                                    }

                                 ?>
                              </tbody>
                            </table>
                		</article>

                		<article class="item tab-2">
                        <table class="border fullwidth data">
                          <thead>
                            <tr>
                              <th rowspan="2">ชื่อผู้ให้บริการ</th>
                              <th colspan="6">เวลา</th>
                            </tr>
                            <tr>
                              <th>9.00 - 10.00</th>
                              <th>10.00 - 11.00</th>
                              <th>11.00 - 12.00</th>
                              <th>13.00 - 14.00</th>
                              <th>14.00 - 15.00</th>
                              <th>15.00 - 16.00</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                foreach ($service_table as $key => $value) {
                                      echo '<tr style="height:80px">';
                                      echo '<td style="width:200px">'.$value['DoctorName']."</td>";

                                      foreach ($time_duration as $time) {
                                            echo ' <td id="'.$key.'#'.$time.'" style="width:130px">';

                                            if (isset($value["Apo"]) && !empty($value["Apo"])) {
                                                foreach ($value["Apo"] as $apoKey => $apo) {
                                                         if ($apo['Time'] == $time) {

                                                           $HNnumber = (empty($apo['HN']))? '': "HN ".$apo['HN'];
                                                           $FirstName = explode(" ", $apo['PatientName']);
                                                           $numHour = ($apo['Hour'] > 1)? '<em class="term3">('.$apo['Hour'].' ชม.)</em> ' : '';

                                                           echo '<a id="'.$apoKey.'" class="button light center" title="'.$HNnumber." ".$apo['PatientName'].' (ผู้รับจอง: '.$apo['Detail'].')" style="width:120px;height:50px;margin-bottom:5px;">';
                                                           echo $HNnumber." ".$FirstName[0];
                                                           echo "<br>".$apo['MobilePhone']." ".$numHour;
                                                           echo '</a>';
                                                         }
                                                }
                                            }
                                            echo "</td>";
                                      }

                                      echo "</tr>";
                                } // end foreach

                                foreach ($nobody_table as $key => $value) {
                                      echo '<tr style="height:80px">';
                                      echo '<td style="width:200px"><em class="term0">'.$value['DoctorName']."</em></td>";

                                      foreach ($time_duration as $time) {
                                            echo '<td id="0#'.$time.'" style="width:130px">';

                                            if (isset($value["Apo"]) && !empty($value["Apo"])) {
                                                foreach ($value["Apo"] as $apoKey => $apo) {
                                                         if ($apo['Time'] == $time) {

                                                           $HNnumber = (empty($apo['HN']))? '': "HN ".$apo['HN'];
                                                           $FirstName = explode(" ", $apo['PatientName']);
                                                           $numHour = ($apo['Hour'] > 1)? '<em class="term3">('.$apo['Hour'].' ชม.)</em> ' : '';

                                                           echo '<a id="'.$apoKey.'" class="button light center" title="'.$HNnumber." ".$apo['PatientName'].' (ผู้รับจอง: '.$apo['Detail'].')" style="width:120px;height:50px;margin-bottom:5px;">';
                                                           echo $HNnumber." ".$FirstName[0];
                                                           echo "<br>".$apo['MobilePhone']." ".$numHour;
                                                           echo '</a>';
                                                         }
                                                }
                                            }
                                            echo "</td>";
                                      }

                                      echo "</tr>";
                                  }
                             ?>
                          </tbody>
                        </table>
                		</article>

                	</div>
                </section>

          </div>
        </article>
    </div>
<br><br><br><br>
</div>
</main>
</div>


<!-- Add seach modal -->
<div id="apoitment_modal" style="display:none; max-width:300px">
  <article class=" float-left">
      <form id="form1" name="form1" method="post" action="<?php echo base_url();?>Apoitment/delete">
          <fieldset>
             <div class="item">
                <div id="showPatient"></div>
                <input name="apo_cancle_id" id="apo_cancle_id" type="hidden"  />
                <input name="cancle_date" type="hidden" value="<?php echo $date_today; ?>" />
            </div>
        </fieldset>
        <fieldset class="submit">
          <button type="submit" class="button rosy"><span class="icon-cross">ยกเลิกการจอง</span></button>
        </fieldset>
        </form>
     </form>
  </article>
</div>



<script type="text/javascript">

function resetForm($form) {
	 	$form.find('input:text, input:password, input:hidden, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox')
				 .removeAttr('checked').removeAttr('selected');
}


// กดปุ่มตกลง ส่งค่า HN
function show_results(mobilePhone){
   var value = $('#h_arti_id').val();
   $('#txtHN').val(value);
   $('#txtPhone').val(mobilePhone);
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

		var  searchUrl = BASE_URL + 'patient/searchForReserved/';
		return searchUrl +encodeURIComponent(this.value);
    });
}

// เรียกใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");


/************************************************/

var picker = [];
picker = new Pikaday(
    {
        field: document.getElementById('datePicker'),
      //  trigger: document.getElementById('datePicker'),
        firstDay: 1,
        format: 'D/M/YYYY',
        //yearRange: [2010,2030],
        i18n: {
              previousMonth : 'Previous Month',
              nextMonth     : 'Next Month',
              months        : ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              weekdays      : ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
              weekdaysShort : ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.']
          },
        onSelect: function() {
              var date_url = BASE_URL + 'apoitment/index/' + this.toString('YYYY-MM-DD');
              window.location.href = date_url;
              //console.log(this.toString('YYYY-MM-DD'));
        }
    });


$('.date-picker').each(function(idx) {
    picker[idx] = new Pikaday({ field: this,
      i18n: {
            previousMonth : 'Previous Month',
            nextMonth     : 'Next Month',
            months        : ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            weekdays      : ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
            weekdaysShort : ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.']
        }

     });
});


$(function() {

  $("td").click(function() {        // function_tr
      var str = ($(this).attr('id'));
      if (typeof str != "undefined") {
         var res = str.split("#");
         $("#Reservedtime").val(res[1]);
         $("#doctor_id").val(res[0]);
       }
  });


  $("td a").click(function() {        // function_tr
      var apo_id = ($(this).attr('id'));
      var patientName = ($(this).attr('title'));
      $('#apo_cancle_id').val(apo_id);
      $('#showPatient').html('<h3>'+patientName+'</h3>');
      $('#apoitment_modal').modal();
  });

  $("input[name='gtab']").click(function() {
      var tab = ($(this).val());
    //  $.cookie("current_tab", tab); // Sample 1
     document.cookie = "current_tab="+tab;
  });

  /* ช่อง HN กดปุ่ม enter event */
  $("#txtHN").keyup(function(e){
    var code = e.which; // recommended to use e.which, it's normalized across browsers
    if(code==13)e.preventDefault();
    if(code==32||code==13||code==188||code==186){
        $("#show_arti_topic").focus();
    } // missing closing if brace
 });


  $("#txtHN").blur(function(){
        var checkURL = BASE_URL + "Patient/getOnePatinetByHN/" + $( this ).val();
        var fullName;
        var phoneNumber;
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

                         if(obj.MobilePhone != null){
                         phoneNumber = obj.MobilePhone.replace(/\D/g,'');
                         }
                      });
                    $('#show_arti_topic').val(fullName);
                    $('#txtPhone').val(phoneNumber);
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
      });

      $("#cancle").click(function() {
          $('#txtHN').val('');
          $('#txtPhone').val('');
          $('#doctor_id').prop('selectedIndex',0);
          $('#Reservedtime').prop('selectedIndex',0);
          $('#hour').prop('selectedIndex',0);
          $('#create_name').prop('selectedIndex',0);
          $('#show_arti_topic').val('');
          $('#show_arti_topic').focus();
      });

// end
});


</script>
