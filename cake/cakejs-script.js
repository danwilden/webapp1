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
 document.frm.action = "edit_mul_cake.php";
 document.frm.submit();  
}
function delete_records() 
{
 document.frm.action = "del_cake.php";
 document.frm.submit();
}
function update_records() 
{
 document.frm.action = "update_cake.php";
 document.frm.submit();
}
function produce_records() 
{
 document.frm.action = "cakeprod.php";
 document.frm.submit();
}
function comp_inv() 
{
 document.frm.action = "cakecomp.php";
 document.frm.submit();
}
function update_status() 
{
 document.frm.action = "update_cakes.php";
 document.frm.submit();
}