/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function validate_register_values()
{
    //alert("here");
    
    //return true;
    var f_name          = document.getElementById('f_name').value;
    var l_name          = document.getElementById('l_name').value;
    //alert("HEREE 22");
    var street_address  = document.getElementById('street_address').value;
    var city            = document.getElementById('city').value;
    var state           = document.getElementById('state').value;
    var zip             = document.getElementById('zip').value;
    var phone           = document.getElementById('phone').value;
    var email           = document.getElementById('email').value;
    //alert("gg");  
    if(f_name == '' || l_name == '' || street_address == '' || city == '' || state == '' || zip == '' || phone == '' || email == '')
    {
      alert("Fields mark with asterik are necessary fields and can't be empty.");
      return false;
    }
    else
    {
        return checkemail();
        //return true;
    }    
}


var testresults
function checkemail(){ //alert("two");
//var str=document.validation.emailcheck.value
var str=document.getElementById('email').value;
var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
if (filter.test(str))
testresults=true
else{
alert("Please input a valid email address!")
testresults=false
}
return (testresults)
}
