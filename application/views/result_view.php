<nav class=breadcrumbs>
  <span class="icon-location"></span>
  <ul>
    <li><a class=home href=index.html><span>ตำแหน่งปัจุบัน</span></a></li>
    <li>ห้องเวชระเบียน</li>
  </ul>
</nav>

<div class="gcss-wrapper body-wrapper">
<main class="wrapper">
<div class="content">
   <div class="ggrid">
        <article class="block12 float-right">
           <h2><span class="icon-checkmark">ผลการตรวจรักษา</span></h2></h2>
           <hr style="display: block;height: 1px;border: 0;border-top: 3px solid #ccc;">
        </article>

        <article class="block11 float-left">
          <p class=float-left>
              <span id="showDate" style="font-size:14pt;"><strong>วันที่ <?php echo date('d M Y'); ?></strong></span>
              &nbsp; &nbsp;<button id="refreshData" class="button light" title="รีเฟสข้อมูลตารางคิว"><span class="icon-loop2"></span></button>
              &nbsp; &nbsp;<button id="datePicker" class="button light" title="เลือกวันที่"><span class="icon-calendar">ปฏิทิน</span></button>
              &nbsp; &nbsp;<a id="detail" class="button light" href="#modal_form" rel="modal:open"><span class="icon-eye">รายละเอียด</span></a>
          </p>
          <table id="FooTable" class="table"></table>

            <table class="border fullwidth data">
                  <thead>
                     <tr>
                        <th>HN</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>แพทย์ผู้ตรวจ</th>
                        <th>จำนวนหัตถการ</th>
                        <th>จำนวนรายการยา</th>
                     </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>0002</td>
                        <td>นายนิติ โชติแก้ว</td>
                        <td>สมพร ชาญวินชกุล</td>
                        <td>2</td>
                        <td>1</td>
                      </tr>

                  </tbody>
            </table>
        </article>
    </div>
<br><br><br><br>
</div>
</main>
</div>


<!-- Add Patient modal -->
<div id="modal_form" style="display:none;max-width: 800px;padding-top: 30px;padding-right: 60px;padding-bottom: 30px;">
    <div class="ggrid" >
        <article class="block12 float-left">
             <h2><span class="icon-address-book">HN 0002 นายนิติ โชติแก้ว</span></h2>
             <hr style="display: block;height: 1px;border: 0;border-top: 1px solid #ccc;">
        </article>
        <article class="block12 float-left">
                <div class="item">
                  <div class="input-groups" style="line-height: 2em;">
                      <div class="width50">
                        <label for="qdate">OPD No.</label>
                        <span class="g-input icon-credit-card">
                            <input id="qdate" name="qdate" type="text" value="035037" readonly>
                        </span>
                      </div>
                      <div class="width50">
                        <label for="qtime">วันที่เข้าตรวจ</label>
                        <span class="g-input icon-calendar">
                            <input name="qdate" type="text" value="13/10/2017" readonly>
                        </span>
                      </div>
                </div>
               </div>
               <div class="item">
                 <div class="input-groups" style="line-height: 2em;">
                     <div class="width30">
                       <label for="qdate">น้ำหนัก (kg.)</label>
                       <span class="g-input">
                           <input id="qdate" name="qdate" type="text" value="035037" readonly>
                       </span>
                     </div>
                     <div class="width30">
                       <label for="qtime">ความดัน (mmHg.)</label>
                       <span class="g-input ">
                           <input name="qdate" type="text" value="" readonly>
                       </span>
                     </div>
                     <div class="width30">
                       <label for="qtime">อุณหภูมิ (C.)</label>
                       <span class="g-input ">
                           <input name="qdate" type="text" value="" readonly>
                       </span>
                     </div>
               </div>
               <div class="input-groups" style="line-height: 2em;">
                   <div class="width30">
                     <label for="qtime">ส่วนสูง (cm.)</label>
                     <span class="g-input ">
                         <input name="qdate" type="text" value="" readonly>
                     </span>
                   </div>
                   <div class="width30">
                     <label for="qtime">ชีพจร (bpm.)</label>
                     <span class="g-input ">
                         <input name="qdate" type="text" value="" readonly>
                     </span>
                   </div>
                   <div class="width30">
                     <label for="qtime">การหายใจ (bpm.)</label>
                     <span class="g-input">
                         <input name="qdate" type="text" value="" readonly>
                     </span>
                   </div>
             </div>
              </div>
                <div class="item">
                  <div class="input-groups" style="line-height: 2em;">
                      <div class="width50">
                        <label for="qdate">อาการสำคัญ</label>
                        <span class="g-input">
                            <input id="qdate" name="qdate" type="text" value="ปวดหลัง" readonly>
                        </span>
                      </div>
                      <div class="width15">
                        <label for="qtime">ผลการวินิจฉัยโรค</label>
                        <span class="g-input">
                            <input name="qdate" type="text" value="U75.01" readonly>
                        </span>
                      </div>
                      <div class="width35">
                        <label for="qtime">&nbsp;</label>
                        <span class="g-input">
                            <input name="qdate" type="text"  value="ปวดหลัง" readonly>
                        </span>
                      </div>
                </div>
               </div>
               <div class="item">
                 <div class="input-groups" style="line-height: 2em;">
                     <div class="width50">
                       <label for="qdate">อาการปัจจุบัน</label>
                       <span class="g-input">
                           <input id="qdate" name="qdate" type="text" value="ปวดหลัง" readonly>
                       </span>
                     </div>
                     <div class="width50">
                       <label for="qtime">โรคของแผนปัจจุบัน</label>
                       <span class="g-input">
                           <input name="qdate" type="text" value="ปวดหลัง" readonly>
                       </span>
                     </div>
                 </div>
              </div>
              <div class="item" style="line-height: 2em;">
                 <label for="service_id">ลงชื่อแพทย์</label>
                 <span class="g-input icon-user-check">
                     <input name="qdate" type="text" value="กวิน กปิลกาญจน์" readonly>
                 </span>
             </div>

        </article>
        <article class="block12 float-left" style="line-height: 2em;">
            <div class="item">
               <label for="service_id">รายการหัตถการ</label>
               <span class="g-input">
                 <table class="fullwidth ">
                     <thead>
                        <tr>
                           <th>รหัส</th>
                           <th>ชื่อหัตถการ</th>
                           <th>ราคา</th>
                           <th>ผู้ใหบริการ</th>
                           <th>เวลา(นาที)</th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                           <td>590-78-11</td>
                           <td>นวดสุขภาพทั่วร่างกาย</td>
                           <td>600.00</td>
                           <td>อัครเดช รัตนาจารย์</td>
                           <td>60</td>
                         </tr>
                         <tr>
                           <td>590-78-20</td>
                           <td>ประคบสมุนไพรที่หลัง</td>
                           <td>200.00</td>
                           <td>อัครเดช รัตนาจารย์</td>
                           <td>60</td>
                         </tr>
                     </tbody>
               </table>
               </span>
           </div>
        </article>
        <article class="block12 float-left">
            <div class="item">
               <label for="service_id">รายการจ่ายยา</label>
               <span class="g-input">
                 <table class="border horiz-table fullwidth">
                     <thead>
                        <tr>
                           <th>รหัส</th>
                           <th>ชื่อยา</th>
                           <th>จำนวน</th>
                           <th>หน่วย</th>
                           <th>ราคารวม</th>
                           <th>วิธีใช้</th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                           <td>3016</td>
                           <td>บำรุงโลหิต</td>
                           <td>200</td>
                           <td>แคปซูล</td>
                           <td>200.00</td>
                           <td>1*3ac</td>
                         </tr>
                         <tr>
                           <td>3016</td>
                           <td>บำรุงโลหิต</td>
                           <td>200</td>
                           <td>แคปซูล</td>
                           <td>200.00</td>
                           <td>1*3ac</td>
                         </tr>
                         <tr>
                           <td>3016</td>
                           <td>บำรุงโลหิต</td>
                           <td>200</td>
                           <td>แคปซูล</td>
                           <td>200.00</td>
                           <td>1*3ac</td>
                         </tr>
                     </tbody>
               </table>
               </span>
           </div>
        </article>

    </div>
</div>


<script type="text/javascript">

// โหลดข้อมุลแสดงในตาราง
function loadData(){
      var dataURL = BASE_URL + "opd/get";
      jQuery(function($){
      $('.table').footable({
        "columns": [
          { "name": "fk_HN", "title": "หมายเลข HN" },
          { "name": "PatientName", "title": "ชื่อ-นามสกุล" },
          { "name": "Doctor", "title": "แพทย์ผู้ตรวจ" },
          { "name": "Therapy", "title": "จำนวนหัตถการ" },
          { "name": "Medicine", "title": "จำนวนรายการยา" }
        ],
         "rows": $.get(dataURL)
      });
     });
}



$(function() {

  moment.locale('th');
  var today = "วันที่ " + moment().format("D MMMM YYYY");
  $('#showDate').html(today);



// end
});


</script>
