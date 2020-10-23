
  $(document).ready(function(){
    $("#section_poll_type").hide();
    // option number change
    $("#option_num").change(function(){
      var option_num_val = $("#option_num").val();
      $("#options").html("");
      $("#option_type option:selected").removeAttr("selected");
      if(option_num_val !=""){
        $("#section_poll_type").show();
      }
      else {
        $("#section_poll_type").hide();
      }
    });
    // option type change
    $("#option_type").change(function() {
      var option_type = $("#option_type").val();
      var option_num_val = $("#option_num").val();
      if(option_type=="checkbox") {
        generateCheckboxOptions(option_num_val)
      }
      else if(option_type=="radio") {
        generateRadio(option_num_val)
      }
      else if(option_type=="textbox") {
        generateTextbox(option_num_val)
      }
      else if(option_type=="textarea") {
        generateTextarea(option_num_val)
      }
    });
  });
  function generateCheckboxOptions(options_number) {
    $("#options").html("");
    for(i=1; i<= options_number; i++) {
      str = '<div class="form-group col-md-6"><label for="option'+i+'">Option '+i+':</label> <input type="text" placeholder="Enter Option" name="options[]" class="form-control" id="option'+i+'"></div>';
      $("#options").append(str);
    }
    hrline = '<hr>'
    $("#options").append(hrline)
  }
  function generateRadio(options_number) {
    $("#options").html("");
    for(i=1; i<= options_number; i++) {
      str = '<div class="form-group col-md-6"><label for="option'+i+'">Option '+i+':</label> <input type="text" placeholder="Enter Option" name="options[]" class="form-control" id="option'+i+'"></div>';
      $("#options").append(str)
    }
    hrline = '<hr>'
    $("#options").append(hrline)
  }
  function generateTextbox(options_number) {
    $("#options").html("");
  }
  function generateTextarea(options_number) {
    $("#options").html("");
  } 
