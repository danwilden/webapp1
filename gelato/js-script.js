// JavaScript Document


//  for select / deselect all

$('document').ready(function()
{
    $(".select-all").click(function ()
    {
        $('.chk-box').attr('checked', this.checked)
    });
        
    $(".chk-box").click(function()
    {
        if($(".chk-box").length == $(".chk-box:checked").length)
        {
            $(".select-all").attr("checked", "checked");
        }
        else
        {
            $(".select-all").removeAttr("checked");
        }
    });
});


//  for select / deselect all

//  dynamically redirects to specified page
function edit_records() 
{
 document.frm.action = "edit_mul.php";
 document.frm.submit();  
}
function delete_records() 
{
 document.frm.action = "delete_mul.php";
 document.frm.submit();
}
function update_records() 
{
 document.frm.action = "update_gel.php";
 document.frm.submit();
}
function produce_records() 
{
 document.frm.action = "gelprod.php";
 document.frm.submit();
}
function comp_inv() 
{
 document.frm.action = "gelcomp.php";
 document.frm.submit();
}
