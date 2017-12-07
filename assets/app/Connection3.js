var Connection3 = (function(){

  function Connection3(url) {

      this.open = false;

      this.socket = new WebSocket("ws://" + url);
      this.setupConnectionEvents();
    }

  Connection3.prototype = {
    setupConnectionEvents : function () {
          var self = this;

          self.socket.onopen = function(evt) { self.connectionOpen(evt); };
          self.socket.onmessage = function(evt) { self.connectionMessage(evt); };
          self.socket.onclose = function(evt) { self.connectionClose(evt); };
      },

      connectionOpen : function(evt){
          this.open = true;
          this.addSystemMessage("Connected");

          var status = '<img src="'+BASE_URL+'assets/img/online.gif" title="เชื่อมต่อสำเร็จ">';
          $('#dot_connection_status').html(status);
    },
      connectionMessage : function(evt){
          var data = JSON.parse(evt.data);

          this.addChatMessage(data.msg);
      },
      connectionClose : function(evt){
          this.open = false;
          this.addSystemMessage("Disconnected");
      },

      sendMsg : function(message){

          this.socket.send(JSON.stringify({
              msg : message
          }));
      },

      addChatMessage : function(data){

        //console.log(data); // debug

        switch(data.broadType){
          case Broadcast.POST : this.addNewPost(data); break;
          default : console.log("nothing to do");
        }
      },

      addNewPost : function(data){

        var newPost = data.data;

        // ไม่ได้ใช้
        newHtml = "<tr>"+
                  "<td>"+ newPost.CheckInDate + "</td>" +
                  "<td>"+ newPost.pk_HN + "</td>" +
                  "<td>"+ newPost.PatientName + "</td>" +
                  "<td>"+ newPost.DoctorName + "</td>" +
                  "<td>"+ newPost.Status + "</td>" +
                  "</tr>";

        //$('#qtables > tbody:last-child').append(newHtml);
        // โหลดตารางคิวผู้ป่วย
        loadData();

      },

      addSystemMessage : function(msg){
          // this.chatwindow.innerHTML += "<p>" + msg + "</p>";
      }
    };

    return Connection3;

})();
