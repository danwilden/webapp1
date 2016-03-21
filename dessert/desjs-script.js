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
 document.frm.action = "des_edit.php";
 document.frm.submit();  
}
function delete_records() 
{
 document.frm.action = "des_delete.php";
 document.frm.submit();
}
function update_records() 
{
 document.frm.action = "update_des.php";
 document.frm.submit();
}
function produce_records() 
{
 document.frm.action = "desprod.php";
 document.frm.submit();
}
function comp_inv() 
{
 document.frm.action = "descomp.php";
 document.frm.submit();
}
function update_status() 
{
 document.frm.action = "update_dess.php";
 document.frm.submit();
}