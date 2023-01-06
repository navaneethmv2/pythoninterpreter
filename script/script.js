let editor;
var inputs = $("#input");
var file_name= $("#save");
window.onload = function(){
    editor = ace.edit("compiler");
    editor.session.setMode("ace/mode/python");
}

$("#run").click(function(){
    console.log("run");
    $.ajax({
        url:"server.php",
        method:"POST",
        data:{
            code: editor.getSession().getValue(),
            input: inputs.val()
        },
        success:function(response){
            $(".output").text(response);
            
        }
    })
})

$("#clear").click(function(){
    console.log("clear");
    editor.session.setValue('');
})

$("#saving").click(function(){
    var output = $('#output').text()
    $.ajax({
        url:"sqlserver.php",
        method:"POST",
        data:{
            code: editor.getSession().getValue(),
            input: inputs.val(),
            filename: file_name.val(),
            outputs:output
        },
        success:function(response){
            $(".output").text(response);
        }
    })
})

