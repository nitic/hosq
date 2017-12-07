<form id="form1" name="form1" method="post" action="" class="form-horizontal">
                <fieldset>
                   <div class="item">
                      <label for="show_arti_topic">พิมพ์ชื่อผู้ป่วย</label>
                      <span class="g-input">
                        <input name="show_arti_topic" style="font-size:11pt" type="text" id="show_arti_topic" />
                        <input name="h_arti_id" type="hidden" id="h_arti_id" value="" />
                      </span>
                  </div>
              </fieldset>
              <fieldset class="submit">
                <button type="button" class="button save" onclick="search_results()">ตกลง</button>
        				<a class="button light" href="#" rel="modal:close">ปิด</a>
        			</fieldset>
        			</form>
           </form>

<script type="text/javascript">

// Show search result
function search_results(){

  var value = $('#h_arti_id').val();
  $('#txtHN').val(value);
  $('#txtHN').focus();

  $('#show_arti_topic').val('');
  $.modal.close();
}

// Search Tools
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

		var  searchUrl = BASE_URL + 'test/get/';
		return searchUrl +encodeURIComponent(this.value);
    });
}

// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
$(document).ready(function(){
    make_autocom("show_arti_topic","h_arti_id");
});

</script>
