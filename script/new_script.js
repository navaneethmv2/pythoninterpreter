let editor;
var inputs = $("#input");
window.onload = function(){
    editor = ace.edit("compiler");
    editor.getSession().setMode("ace/mode/html");
    editor.setValue(`
    print("hello")
    
    `)
}

$(document).ready(function(){
    $(document).on('click',"#run",function(){
        var code=editor.getValue();
        $("#output").html(code);
    })
});
