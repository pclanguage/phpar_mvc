//for add

$().ready(function() {
    $('.systems').click(function(){
        $(this).hide('slow');
    });

});
$().ready(function() {
    var  table_column_number= $("table th").length;

    $("table tr").each(function(){
        $(this).find("th:eq(0)").css({
            "width": '20px'
        });
    });
  
    $("table tr th").each(function(){
        var action = $(this).text();
        if(action.match('Action')) {
            $(this).css({
                "width": '105px',
                "color":"#798C09",
                "text-align": 'center'
            });
        }
        if(action.match('Status')) {
            $(this).css({
                "width": '90px'
            });
        }
        
    });

    $("table tr").each(function(){
        $(this).find("td:last").css({
            "text-align": 'right'
        });
    });
    
    
    //
    //
    // $("td:last-child").css({"width": '15px'});
  

    $('.rowPerPage').change(function(){
        document.frmSearch.submit();
    });


    // Box show hide
    $('.printIcon').click(function(){
        $('.onclick_show_box').toggle();
    });

    $(document).mouseup(function(e) {
        $(".onclick_show_box").hide();
    });
    
    $('.close').click(function(){
        $(".onclick_show_box").hide();
    });
    
    
    $(".onclick_show_box").mouseup(function() {
        return false
    });
    
    $('.print').click(function(){
        var select = $(this).attr('tabindex');
        var report_type = $(this).attr('title');
        var txt = "";
        txt +='<div id="status" style="width:796px; float: left; overflow: auto; height: 450px; "> <div style="margin:60px;"><img src="'+base_url+'includes/images/loader1.gif" align="absmiddle">&nbsp;Checking availability... </div></div>';
        $.ajax({
            type: "POST",
            url: base_url+select,
            data: "report_type="+report_type,
            success: function(msg){
                $("#status").html(msg);
            }
        });
        
        $.prompt(txt,{
            buttons:{
                Cancel:true
            }
        });
    });

});
//function
function searchClear(actionPath){
    window.location = actionPath+"index/clear/";
}
function actionButton(actionPath, id, offset, method){

    //list
    $(".btnActionList").click(function() {
        // alert('selectr');
        window.location = actionPath + method+"/"+offset;
    });
    // add
    $(".btnActionAdd").click(function() {
        window.location = actionPath + "add/";
    });

    //for view
    $(".btnActionView").click(function() {
        goTo(actionPath, 'view', id,offset);
    });
    //for Edit
    $(".btnActionEdit").click(function() {
        goTo(actionPath, 'edit', id,offset);
    });
    //for delete
    $(".btnActionDelete").click(function(){ 
        goTo(actionPath, 'delete', id,offset);
    });
}
    
// at least one checked from list
function  goTo(actionPath, action, id,offset){
    var txt_delete = 'Do you want to delete this Item(s)?';

    if(id!='0'){
        if(action=='delete'){

            $.prompt(txt_delete,{
                buttons:{
                    Yes:true,
                    Cancel:false
                },
                callback: function(v,m,f){
                    if(v){
                        window.location = actionPath + action + "/"+id+"/"+offset;
                    }
                    else{}
                }
            });
        }
        else
            window.location = actionPath + action + "/"+id+"/"+offset;
    }
    else{
        check = 0;
        $(".checkbox").each( function() {
            if($(this).attr("checked")==true){
                check++;
                id=$(this).val();
            }
        });
        if(check>0) {
            if(action=='delete' && check==1){
               
                $.prompt(txt_delete,{
                    buttons:{
                        Yes:true,
                        Cancel:false
                    },
                    callback: function(v,m,f){
                        if(v){
                            window.location = actionPath + action + "/"+id+"/"+offset;
                        }
                        else{}
                    }
                });

            //                if(confirm('Are you sure want to delete this Item(s)?')){
            //                    window.location = actionPath + action + "/"+id+"/"+offset;
            //                }
            }
            else if(action=='delete' && check>1){
                $.prompt(txt_delete,{
                    buttons:{
                        Yes:true,
                        Cancel:false
                    },
                    callback: function(v,m,f){
                        if(v){
                            $("#frmList").submit();
                        }
                        else{}
                    }
                });
            //                if(confirm('Are you sure want to delete this person?')){
            //                    $("#frmList").submit();
            //                }
            }
            else {
                window.location = actionPath + action + "/"+id+"/"+offset;
            }
        }
        else {
            var txt = ' Select at list one item from list  ';
            $.prompt(txt,{
                buttons:{
                    OK:true
                }
            });
        }
    }

}

// other common function
function checkNumber(textBox)
{
    while (textBox.value.length > 0 && isNaN(textBox.value)) {
        textBox.value = textBox.value.substring(0, textBox.value.length - 1)
    }
    textBox.value =textBox.value;

}

