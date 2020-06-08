
          <div class="col-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Directory</h3>
              </div>
              <div class="card-body">
                <?php
                  $dir = "application/controllers/";
                  $a = scandir($dir);
                  $sum = count($a);
                  for ($i=2; $i < $sum ; $i++) { 
                    echo $a[$i]."<br>";
                  }
                  $cv = file_get_contents($dir."Build.txt");
                ?>
              </div>
            </div>
          </div>

          <div class="col-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Editor</h3>
              </div>
              <div class="card-body">
                <textarea class="codemirror-textarea" id="code-editor" height="600"></textarea>
                <hr>
                <div>
                    <button class="btn btn-dark btn-sm" id="setor">Run</button>
                    <button class="btn btn-dark btn-sm" id="clear">Clear</button>
                    <button class="btn btn-dark btn-sm" id="refresh">Refresh</button><span id="error"></span>
                </div>
              </div>
            </div>
              
            <!-- /.card -->
          </div>
          <script type="text/javascript">
            $(function() {
              var codeEditorElement = $(".codemirror-textarea")[0];
                var editor = CodeMirror.fromTextArea(codeEditorElement, {
                    mode: "application/x-httpd-php",
                    lineNumbers: true,
                    matchBrackets: true,
                    theme: "monokai",
                    lineWiseCopyCut: true,
                    undoDepth: 200
                  });
                editor.setValue(cb);

                $(document).on('click', '#setor', function(e) {
                  e.preventDefault();
                  $.ajax({
                    url: '<?=base_url()."assets/editor/code-editable.php"?>',
                    type: 'json',
                    success:function(response){
                      console.log("response:  "+response);
                      editor.setValue(response) ;
                    },
                    error:function(){
                      console.log("error: "+response);
                      }
                  });
                });
              

              $(document).on('click', '#run', function(e){
                e.preventDefault();
                $("#error").html("").hide();
                var editorCode = editor.getValue();
                if(editorCode != ''){
                  $.ajax({
                    url: 'file-write.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {"input":editorCode},
                    success:function(response){
                    },
                    complete:function(){
                      $.ajax({
                        url: 'assets/editorcode-editable.php',
                        type: 'GET',
                        success:function(response){
                          console.log("response:  "+response);
                          editor.setValue(response) ;
                        },
                        error:function(){
                          console.log("error: "+response);
                          }
                        }); 
                      }
                    });
                } else{
                  $("#error").html("Code should not be empty").show();
                }

              });

              $(document).on('click', '#clear', function(e){
                e.preventDefault();
                $("#error").html("").hide();
                editor.setValue('');
              });

              $(document).on('click', '#refresh', function(e){
                e.preventDefault();
                $("#error").html("").hide();
                location.reload();
              });
            });
          </script>
        