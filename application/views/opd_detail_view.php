<style media="screen">
  .modal{
    max-width: 800px;
    padding-top: 30px;
    padding-right: 60px;
    padding-bottom: 30px;
  }
</style>

<?php
//echo "<pre>";
//print_r($opd_data);
?>

<?php foreach ($opd_main as $obj): ?>
    <div class="ggrid" >
        <article class="block12">
           <div class="float-left">
              <h2><span class="fa fa-wheelchair"> รายละเอียดผลการตรวจ</span></h2>
           </div>
           <div class="float-right">
              <h2>OPD No.<?php echo $obj->pk_OPD; ?></h2>
           </div>
        </article>

        <article class="block12 float-left">
              <hr style="display: block;height: 1px;border: 0;border-top: 1px solid #ccc;">
                <div class="item">
                  <div class="input-groups" style="line-height: 2em;">
                      <div class="width50">
                        <label for="pk_OPD">ผู้ป่วย</label>
                        <span class="g-input icon-credit-card">
                            <input  name="pk_OPD" type="text" value="HN <?php  echo $obj->fk_HN." ".$obj->PatientName; ?>"  readonly>
                        </span>
                      </div>
                      <div class="width50">
                        <label for="Cure_date">วันที่เข้าตรวจ</label>
                        <span class="g-input icon-calendar">
                            <input name="Cure_date" type="text" value="<?php
                            $thaidate = new \Rundiz\Thaidate\Thaidate();
                            echo $thaidate->date('j F Y',strtotime($obj->Cure_date));
                            ?>" readonly>
                        </span>
                      </div>
                </div>
               </div>
               <div class="item">
                 <div class="input-groups" style="line-height: 2em;">
                     <div class="width30">
                       <label for="Weight">น้ำหนัก (kg.)</label>
                       <span class="g-input">
                           <input name="weight" type="text" value="<?php echo $obj->Weight; ?>" readonly>
                       </span>
                     </div>
                     <div class="width30">
                       <label for="Pressure">ความดัน (mmHg.)</label>
                       <span class="g-input ">
                           <input name="Pressure" type="text" value="<?php echo $obj->Pressure; ?>" readonly>
                       </span>
                     </div>
                     <div class="width30">
                       <label for="Temperature">อุณหภูมิ (C.)</label>
                       <span class="g-input ">
                           <input name="Temperature" type="text"  value="<?php echo $obj->Temperature; ?>" readonly>
                       </span>
                     </div>
               </div>
               <div class="input-groups" style="line-height: 2em;">
                   <div class="width30">
                     <label for="Height">ส่วนสูง (cm.)</label>
                     <span class="g-input ">
                         <input name="Height" type="text"  value="<?php echo $obj->Height; ?>" readonly>
                     </span>
                   </div>
                   <div class="width30">
                     <label for="Pulse">ชีพจร (bpm.)</label>
                     <span class="g-input ">
                         <input name="Pulse" type="text"  value="<?php echo $obj->Pulse; ?>" readonly>
                     </span>
                   </div>
                   <div class="width30">
                     <label for="Breathe">การหายใจ (bpm.)</label>
                     <span class="g-input">
                         <input name="Breathe" type="text"  value="<?php echo $obj->Breathe; ?>" readonly>
                     </span>
                   </div>
              </div>
              </div>
                <div class="item">
                  <div class="input-groups" style="line-height: 2em;">
                      <div class="width50">
                        <label for="Symptom">อาการสำคัญ</label>
                        <span class="g-input">
                            <input id="Symptom" name="Symptom" type="text"  value="<?php echo $obj->Symptom; ?>" readonly>
                        </span>
                      </div>
                      <div class="width15">
                        <label for="DiseaseCode">ผลการวินิจฉัยโรค</label>
                        <span class="g-input">
                            <input name="DiseaseCode" type="text"  value="<?php echo $obj->DiseaseCode; ?>" readonly>
                        </span>
                      </div>
                      <div class="width35">
                        <label for="DiseaseName">&nbsp;</label>
                        <span class="g-input">
                            <input name="DiseaseName" type="text"  value="<?php echo $obj->DiseaseName; ?>" readonly>
                        </span>
                      </div>
                </div>
               </div>
               <div class="item">
                 <div class="input-groups" style="line-height: 2em;">
                     <div class="width50">
                       <label for="SymptomToday">อาการปัจจุบัน</label>
                       <span class="g-input">
                           <input name="SymptomToday" type="text"  value="<?php echo $obj->SymptomToday; ?>" readonly>
                       </span>
                     </div>
                     <div class="width50">
                       <label for="DiseasePresent">โรคของแผนปัจจุบัน</label>
                       <span class="g-input">
                           <input name="DiseasePresent" type="text"  value="<?php echo $obj->DiseasePresent; ?>" readonly>
                       </span>
                     </div>
                 </div>
              </div>
              <div class="item" style="line-height: 2em;">
                 <label for="Doctor">ลงชื่อแพทย์</label>
                 <span class="g-input icon-user-check">
                     <input name="Doctor" type="text"  value="<?php echo $obj->Doctor; ?>" readonly>
                 </span>
             </div>
  <?php endforeach; ?>
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
                      <?php
                            if (count($opd_therapy) > 0) {
                                 foreach ($opd_therapy as $obj) {
                                     echo "<tr>";
                                     echo "<td>".$obj->fk_therapy_code."</td>";
                                     echo "<td>".$obj->name."</td>";
                                     echo "<td>".number_format($obj->Cost,2)."</td>";
                                     echo "<td>".$obj->ServiceName."</td>";
                                     echo "<td>".$obj->Time."</td>";
                                     echo "</tr>";
                                 }
                            }
                            else {
                                echo '<tr><td class="center" colspan="5">No Data</td></tr>';
                            }
                       ?>
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
                       <?php
                             if (count($opd_medicine) > 0) {
                                  foreach ($opd_medicine as $obj) {
                                      echo "<tr>";
                                      echo "<td>".$obj->MedCode."</td>";
                                      echo "<td>".$obj->MedName."</td>";
                                      echo "<td>".number_format($obj->Amount)."</td>";
                                      echo "<td>".$obj->Unit."</td>";
                                      echo "<td>".number_format($obj->TotalPrice,2)."</td>";
                                      echo "<td>".$obj->MethodCode."</td>";
                                      echo "</tr>";
                                  }
                             }
                             else {
                                 echo '<tr><td class="center" colspan="6">No Data</td></tr>';
                             }
                        ?>
                     </tbody>
               </table>
               </span>
           </div>
        </article>
  </div>
