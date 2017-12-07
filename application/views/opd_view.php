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
        <article class="block12 float-right">
           <br><h2><span class="icon-address-book">ผลการตรวจรักษา</span></h2><br>
           <hr style="display: block;height: 1px;border: 0;border-top: 3px solid #ccc;"><br>
        </article>
        <article class="block11">
            <div class="block6 float-left">
                  <span id="showDate" style="font-size:14pt;"></span>
                  &nbsp; &nbsp;<button id="refreshData" class="button light" style="color:#333" title="รีเฟสข้อมูลตารางคิว"><span id="timer" class="icon-loop2">Refresh</span></button>
            </div>
            <div class="block5 float-right">
               <button id="datePicker" class="button light" title="เลือกวันที่"><span class="icon-calendar">ปฏิทิน</span></button>
            </div>
        </article>
        <article class="block11 float-left">
            <br>
            <table id="FooTable" class="table" data-sorting="true"></table>
        </article>

    </div>
<br><br><br><br>
</div>
</main>
</div>

<script type="text/javascript">

var picker = new Pikaday(
    {
        field: document.getElementById('datePicker'),
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
              //var date_url = BASE_URL + 'apoitment/index/' + this.toString('YYYY-MM-DD');
              //window.location.href = date_url;
              loadData(this.toString('YYYY-MM-DD'));
        }
  });


function show(opd_number){
   alert(opd_number);
}


// โหลดข้อมุลแสดงในตาราง
function loadData(OPDdate){

      var dataURL;
      var dateHtml;
      moment.locale('th');

      if (OPDdate) {
          dataURL = BASE_URL + "opd/getOpdByDate/"+OPDdate;
          dateHtml  = "วันที่ " + moment(OPDdate).format("D MMMM YYYY");
          $('#showDate').html(dateHtml);
      }
      else {
          var today = moment().format('YYYY-MM-DD');
          dataURL = BASE_URL + "opd/getOpdByDate/"+today;
          dateHtml  = "วันที่ " + moment(today).format("D MMMM YYYY");
          $('#showDate').html(dateHtml);
      }


      $('.table').html("");
      $('.table').footable({
        "columns": [
          { "name": "fk_HN", "title": "หมายเลข HN" },
          { "name": "PatientName", "title": "ชื่อ-นามสกุล" },
          { "name": "Doctor", "title": "ชื่อแพทย์ผู้ตรวจ" },
          { "name": "Therapy", "title": "จำนวนหัตถการ" },
          { "name": "Medicine", "title": "จำนวนรายการยา" },
          { "name": "pk_OPD", "title": "รายละเอียด",
             "formatter": function(value, options, rowData){
                             // return '<a class="detail" href="opd/get/'+value+'">รายละเอียด</a>';
                                return '<a class="button green" href="'+BASE_URL+'opd/modal_detail/'+value+'" rel="modal:open"><span class="icon-eye">View</span></a>';

                          }
           }
        ],
         "rows": $.get(dataURL)
      });

}

$(function() {
  // โหลดตาราง OPD
  loadData();

  // กำหนดเวลารีเฟส
  var count = 60;

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

// end
});


</script>
