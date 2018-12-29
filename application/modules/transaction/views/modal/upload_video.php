<style>
	.review-form {
        min-height: 150px;
    }

.custom-file-upload-hidden {
  display: none;
  visibility: hidden;
  position: absolute;
  left: -9999px;
}

.custom-file-upload {
  display: block;
  width: auto;
  font-size: 16px;
  *margin-top: 30px;
}
.custom-file-upload label {
  display: block;
  margin-bottom: 5px;
}

.file-upload-wrapper {
  position: relative;
  margin-bottom: 5px;
}

.file-upload-input {
  width: 400px;
  color: #aaa;
  font-size: 12px;
  padding: 0px 17px;
  border: none;
  background-color: #f5f5f5;
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  -webkit-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
  float: left;
  /* IE 9 Fix */
}
.file-upload-input:hover, .file-upload-input:focus {
  background-color: #f5f5f5;
  outline: none;
}

.file-upload-button {
  cursor: pointer;
  display: inline-block;
  color: #fff;
  font-size: 12px;
  text-transform: uppercase;
  *padding: 5px 20px;
  border: none;
  margin-left: -1px;
  background-color: #fdb714;
  float: left;
  /* IE 9 Fix */
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  -webkit-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
.file-upload-button:hover {
  background-color: #fdb714;
}
</style>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Upload Materi Video</h4>
</div>
<div class="modal-body">
<?php
	$attributes = array('class' => 'review-form dropzone', 'id' => 'my-awesome-dropzone');
	echo form_open_multipart('transaction/upload_materi_video/'.$param2, $attributes);
?>
        <input type="hidden" name="user_id" id="userId" value="<?= $this->session->userdata('user_id') ?>">
        <input type="hidden" name="session_id" id="session" value="<?= $param2 ?>">
        <div class="no-padding no-float">
            
            <div class="row form-group">
            	<div class="col-sms-12 col-sm-12">
            		<label>File</label>
            		<div class="custom-file-upload full-width" style="line-height: 34px;">
<!-- 	                    <input type="file" class="input-text" name="userfile"><input type="text" class="custom-fileinput input-text">
 -->	                    <input type="file" name="video" style="z-index: 99999; color: black">
	                </div>
            	</div>
            </div>
            <hr>
            <div class="row from-group">
                <div class="col-sms-12 col-sm-12">
                    <button type="submit" name="submit" value="Submit" id="btnReview" class="load-more button green full-width btn-large fourty-space">SUBMIT</button>
                </div>
            </div>

        </div>
    </form>

</div>

<script>
	//Reference:
//https://www.onextrapixel.com/2012/12/10/how-to-create-a-custom-file-input-with-jquery-css3-and-php/
(function($) {
  // Browser supports HTML5 multiple file?
  var multipleSupport = typeof tjq("<input/>")[0].multiple !== "undefined",
    isIE = /msie/i.test(navigator.userAgent);

  tjq.fn.customFile = function() {
    return this.each(function() {
      var $file = tjq(this).addClass("custom-file-upload-hidden"), // the original file input
        $wrap = tjq('<div class="file-upload-wrapper">'),
        $input = tjq('<input type="text" class="file-upload-input" />'),
        // Button that will be used in non-IE browsers
        $button = tjq(
          '<button type="button" class="file-upload-button">Select a File</button>'
        ),
        // Hack for IE
        $label = tjq(
          '<label class="file-upload-button" for="' +
            $file[0].id +
            '">Select a File</label>'
        );

      // Hide by shifting to the left so we
      // can still trigger events
      $file.css({
        position: "absolute",
        left: "-9999px"
      });

      $wrap.insertAfter($file).append($file, $input, isIE ? $label : $button);

      // Prevent focus
      $file.attr("tabIndex", -1);
      $button.attr("tabIndex", -1);

      $button.click(function() {
        $file.focus().click(); // Open dialog
      });

      $file.change(function() {
        var files = [],
          fileArr,
          filename;

        // If multiple is supported then extract
        // all filenames from the file array
        if (multipleSupport) {
          fileArr = $file[0].files;
          for (var i = 0, len = fileArr.length; i < len; i++) {
            files.push(fileArr[i].name);
          }
          filename = files.join(", ");

          // If not supported then just take the value
          // and remove the path to just show the filename
        } else {
          filename = $file
            .val()
            .split("\\")
            .pop();
        }

        $input
          .val(filename) // Set the value
          .attr("title", filename) // Show filename in title tootlip
          .focus(); // Regain focus
      });

      $input.on({
        blur: function() {
          $file.trigger("blur");
        },
        keydown: function(e) {
          if (e.which === 13) {
            // Enter
            if (!isIE) {
              $file.trigger("click");
            }
          } else if (e.which === 8 || e.which === 46) {
            // Backspace & Del
            // On some browsers the value is read-only
            // with this trick we remove the old input and add
            // a clean clone with all the original events attached
            $file.replaceWith(($file = $file.clone(true)));
            $file.trigger("change");
            $input.val("");
          } else if (e.which === 9) {
            // TAB
            return;
          } else {
            // All other keys
            return false;
          }
        }
      });
    });
  };

  // Old browser fallback
  if (!multipleSupport) {
    tjq(document).on("change", "input.customfile", function() {
      var $this = tjq(this),
        // Create a unique ID so we
        // can attach the label to the input
        uniqId = "customfile_" + new Date().getTime(),
        $wrap = $this.parent(),
        // Filter empty input
        $inputs = $wrap
          .siblings()
          .find(".file-upload-input")
          .filter(function() {
            return !this.value;
          }),
        $file = tjq(
          '<input type="file" id="' +
            uniqId +
            '" name="' +
            $this.attr("name") +
            '"/>'
        );

      // 1ms timeout so it runs after all other events
      // that modify the value have triggered
      setTimeout(function() {
        // Add a new input
        if ($this.val()) {
          // Check for empty fields to prevent
          // creating new inputs when changing files
          if (!$inputs.length) {
            $wrap.after($file);
            $file.customFile();
          }
          // Remove and reorganize inputs
        } else {
          $inputs.parent().remove();
          // Move the input so it's always last on the list
          $wrap.appendTo($wrap.parent());
          $wrap.find("input").focus();
        }
      }, 1);
    });
  }
})(jQuery);

tjq("input[type=file]").customFile();

</script>