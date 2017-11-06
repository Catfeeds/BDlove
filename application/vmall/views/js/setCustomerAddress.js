$(function(){
    var addr,addrIds;
    if(sessionStorage.receiveAddressJson){
       addr = JSON.parse(sessionStorage.receiveAddressJson);
       $(".rName").val(addr.personName);
       $(".rMobile").val(addr.mobile);
       $(".addrDetail").val(addr.detail);
       $("#remove").data("id",addr.id);
       if(addr.district){
         $("#addressPicker").val(addr.province+" "+addr.city+" "+addr.district);
       }
       if(addr.districtId){
        addrIds = [addr.provinceId,addr.cityId,addr.districtId];
         $("#addressPicker").attr("data-id",JSON.stringify(addrIds));
       }
       if(addr.defaultAddr == 1){
        $("#setDefault").prop("checked",true);
       }
    }else{
      $("#remove").hide();
    }

    $("#submit").on("click",function(){
      var pickerData = $("#addressPicker").val() ? $("#addressPicker").val().split(" ") : ["","",""],
          pickerIds = $("#addressPicker").attr("data-saveid") ? JSON.parse($("#addressPicker").attr("data-saveid")) : addrIds;
      addressData = {
        personName:$.trim($(".rName").val()),
        mobile:$.trim($(".rMobile").val()),
        country:"中国",
        province:pickerData[0],
        city:pickerData[1],
        district:pickerData[2],
        provinceId:pickerIds[0],
        cityId:pickerIds[1],
        districtId:pickerIds[2],
        detail:$.trim($(".addrDetail").val()),
        defaultAddr:$("#setDefault").prop("checked") ? 1 : 0
      };
      if(!addressData.personName){
        mobileAlert("请填写收货人姓名");
        return false;
      }
      if(!addressData.mobile){
        mobileAlert("请填写收货人手机");
        return false;
      }
      if(!/^1[34578][0-9]{1}\d{8}$/.test(addressData.mobile)){
          mobileAlert("请输入正确的手机号码");
          return false;
      }
      
    });
    $("#giveup").on("click",function(){
      if(confirm("确认不保存退出？")){
        history.go(-1);
      }
    });
    $("#remove").on("click",function(){
      if(confirm("确认删除该地址？")){
        var id = $(this).data("id");
        $.getJSON("deleteCustomerAddress.json?id="+id,function(data){
          if(data.status=="0"){
            updateAddress(data);
          }
        })
      }
    });
   
    var myApp = new Framework7();
    var loc = new mLocation();
    locationPickerInit();
    function locationPickerInit(){
      // console.log(existVaule)
      var locPicker = myApp.picker({
        input: '#addressPicker',
          // rotateEffect: true, //3D效果
          formatValue: function (picker, values, displayValues) {
              return displayValues[0]+" "+displayValues[1]+" "+displayValues[2];
          },
          cols: [
              {
                  textAlign: 'left',
                  values: loc.find("0").key,
                  displayValues: loc.find("0").val,
                  width:"25%",
                  onChange: function (picker, v) {
                    if(picker.cols[1].replaceValues){
                      var arr = loc.find("0,"+v);
                        picker.cols[1].replaceValues(arr.key,arr.val);
                      }
                       if(picker.cols[2].replaceValues){
                          var town = loc.find("0,"+v,'key').key,
                              arr2 = loc.find("0,"+v+","+town[0]);
                          picker.cols[2].replaceValues(arr2.key,arr2.val);
                      }
                  }
              },
              {
                  textAlign: 'left',
                  values: loc.find('0,1').key,
                  displayValues: loc.find("0,1").val,
                  width:"35%",
                  onChange: function (picker, v) {
                      if(picker.cols[2].replaceValues){
                        var arr = loc.find("0,"+picker.cols[0].value+","+v);
                          picker.cols[2].replaceValues(arr.key,arr.val);
                      }
                  }
              },
              {
                  textAlign: 'left',
                  values: loc.find('0,1,3586').key,
                  displayValues: loc.find("0,1,3586").val,
                  width:"40%"
              }
          ],
          onChange:function(p,vs,dvs){
            p.input.attr("data-saveid",JSON.stringify(vs));
          },
          onOpen:function(p){
            $("#addressPicker").focus();
            if(p.input.attr("data-id")){
              locPicker.setValue(JSON.parse(p.input.attr("data-id")));
            }
          }
      });
    }
});