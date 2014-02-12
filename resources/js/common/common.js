


/**************************************************************************************
 *  Dynamic popup window / imprompt function
 *  return addmore html
 **************************************************************************************/

function show_info(controller, id, width){
    if(width!='')  width =width; else width = '760';
    var text ='<div id="content_status" style="width:'+width+'px;"><div style="margin:60px;"><img src="<?php echo base_url(); ?>img/loadingAnimation.gif" align="absmiddle">&nbsp;Please wait... </div></div>';

    var url = base_url+'/'+controller+'/'+id;
    $.ajax({
        type: "POST",
        url: url,
        success: function(msg){
            $("#content_status").html(msg);
        }
    });
    var imprompu_content = '';
    imprompu_content += '<div class="impromptu_content">'+text+'</div>';
    imprompu_content += '';

    $.prompt(imprompu_content,{
        buttons:{
            Cancel:false
        },
        prefix:'brownJqi'

    });
    $('.brownJqibuttons').hide();
}


/**************************************************************************************
 *  Dynamic add more option function
 *  return addmore html
 **************************************************************************************/
function addMoreOption(name, total){
    var no =   $('.'+name+'_add_more_cancel').length+1;
    var max_add  = parseInt(total) - 1 ;
    var text = '<div id="'+name+'_add_more_container_'+no+'" class="add_more_container" > ';
    text += '<span class="add_more_input_container" ><input  type="text" name="'+name+'[]" value="" id="'+name+'_'+no+'" class="add_more_input" ></span>';
    text += ' <span class="'+name+'_add_more_cancel add_more_cancel"  id="'+name+'_cancel_'+no+'" onclick="addMoreOptionCancel(\''+name+'_add_more_container_'+no+'\', \''+no+'\', \''+name+'\')" >X</span>';
    text += '</div>';

    $('#'+name+'_add_more_panel').append(text);
    // i++;
    //var no =   $('.'+name+'_add_more_cancel').length;
    if(no >= max_add) {
        $('#'+name+'_add_more').hide();
        no=1;
    }
}
//    <div id="main_markets_add_more_panel">
//    <div class="add_more_container" id="add_more_container_1">
//    <span class="main_markets_add_more_input_container">
//    <input type="text" class="add_more_input" id="main_markets_1" value="<?php echo  $bsl_companies->main_markets; ?>" name="main_markets[]"></span>
//    </div>
//    </div>
//    <br clear="all"/><span id="main_markets_add_more" class="add_more" onclick="addMoreOption('main_markets');">Add More</span>
//

/**************************************************************************************
 *  Dynamic add more option cancel function
 *  return false
 **************************************************************************************/
function addMoreOptionCancel(getID, no, name)
{
    // alert('sda');
    $('#'+getID).remove();
    //var no =   $('.'+name+'_add_more_cancel').length;
    if(no <= 9) $('#'+name+'_add_more').show();
//no--;
}



jQuery.fn.wordCount = function(params, max){
    //alert(no);
    var p = {
        counterElement:params
    };
    var total_words;
    var left_words;
    if(params) {
        jQuery.extend(p, params);
    }
    //for each keypress function on text areas
    this.keypress(function()
    {
        total_words=this.value.split(/[\s\.\?]+/).length;
        left_words = max- total_words;
        if(total_words <= max) {

            jQuery('#'+p.counterElement).html(left_words+' words left');
        }
        else return false;
    });


};

/**************************************************************************************
 *  create alias function
 *  return formated alias
 **************************************************************************************/
function createAlias(value_id, alias_id, replace){
    $('#'+alias_id).empty();
    var  val = $('#'+value_id).val();
    val = $.trim(val);
    val = val.replace(/[^a-z0-9\s]/gi, '');
   // $('#'+value_id).val(val);
    // alert(val);
    val = val.toLowerCase()
    val=val.replace(" ", replace,'g');
    $('#'+alias_id).val(val);
}


/**************************************************************************************
 *  check number function
 *  return formated alias
 **************************************************************************************/
function checkNumber(textBox)
{
    while (textBox.value.length > 0 && isNaN(textBox.value)) {
        textBox.value = textBox.value.substring(0, textBox.value.length - 1)
    }
    textBox.value =textBox.value;

}
/**************************************************************************************
 *  image validation function
 *  return formated alias
 **************************************************************************************/
function CheckImage(fileImage)
{
    var img = fileImage;
    var ImgFile=document.getElementById(img);
    var ImgValue=ImgFile.value;
    if(ImgValue.lenght==0){
        return false;
    }
    if(ImgValue.length!=0)
    {
        if((ImgValue.indexOf(".jpg")!=-1)||(ImgValue.indexOf(".JPG")!=-1) ||(ImgValue.indexOf(".jpeg")!=-1))
        {
            document.getElementById(img).src=ImgValue;
            return true;
        }
        else
        {
            document.getElementById(img).value="";
            document.getElementById(img).focus();
            alert("Please select Image and format must be jpg");
            return false;
        }
    }
}

/**************************************************************************************
 *  Report create  function
 *  return formated alias
 **************************************************************************************/
//  print data
// JavaScript Document
/**
 *  Javascript Print Area
 *  Author: Rajesh Tandukar
 *  Url: http://www.tandukar.com
 */
function DoPrintableSections(wdth,hght,stylesheets,imgsdir,heading)
{
    //center('overlayss','mybox');  //load lightbix
    CreateVirtualCarrier1("ContentCarrier");

    var e = document.getElementById("print_area");
    var content = "";

    var cc = document.getElementById("ContentCarrier");
    cc.innerHTML = e.innerHTML;
    content = cc.innerHTML;

    OpenPreviewPage(content,wdth,'auto',stylesheets,imgsdir,heading);
    cc.innerHTML="";

}

function OpenPreviewPage(content,wdth,hght,stylesheets,imgsdir,heading) {

    PreviewPage=window.open('','PreviewPage','width='+wdth+',height='+hght+',menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');
    PreviewPage.document.open("text/html","replace");
    PreviewPage.document.writeln('<html><head><title>PrintPreview</title>'
        + ProcessStyleSheets1(stylesheets)
        + '</head><body align="center" onLoad="self.focus(),window.print()",window.close()"><div>'
        + heading
        + content
        +'<div></body></html>'
        );
    PreviewPage.document.close();
} //
function ProcessStyleSheets1(stylesheets){
    var ssh = stylesheets.split(";");
    var sshComplete = "";
    for(var i=0;i<ssh.length;i++){
        sshComplete = sshComplete + '<link href="' + ssh[i] + '" type="text/css" rel="stylesheet"/>' ;
    }
    return sshComplete;
}


function CreateVirtualCarrier1(carriername){
    //var vc = document.createElement('<div id="'+ carriername +'" style="width:600; height:200"></div>');
    var vc = document.createElement('div');
    vc.setAttribute('id',carriername);
    document.body.appendChild(vc);
}
function ClearInputs1(cc,Type,imgsdir){
    var d = cc.getElementsByTagName(Type);
    for(var j=0;j<d.length;j++){
        var prnt = d[j].parentNode;
        var newnode = document.createTextNode(d[j].value);
        if(Type == "select")
        {
            if(d[j].disabled == false){
                newnode = document.createTextNode(d[j].options[d[j].selectedIndex].innerText);
            }
        }
        if(Type == "INPUT")
        {
            if( d[j].type == "button" || d[j].type == "submit")
            {
            }
            if( d[j].type == "checkbox" || d[j].type == "radio")
            {
                var ctrStatus;
                if(d[j].checked == true){
                    ctrStatus = "on";
                }else{
                    ctrStatus = "off";
                }
                newnode = document.createElement("<IMG src='" + imgsdir + "/" + d[j].type + "_" + ctrStatus +  ".gif' />");
                prnt.insertBefore(newnode,d[j]);
            }
        }
        else{
            prnt.insertBefore(newnode,d[j]);
        }

        d[j].removeNode(true);
    }
    if (cc.getElementsByTagName(Type).length > 0 ){
        ClearInputs(cc,Type,imgsdir);
    }
}



function print_sample_report(){
    var heading = '';
    /*
	// palce heading empty if not needed.
	var heading = 'Candidwishes Thankyou Card Sent Reoprt';
     */
    DoPrintableSections(700,100,'css/custom.css','imgforlder',heading);
}



