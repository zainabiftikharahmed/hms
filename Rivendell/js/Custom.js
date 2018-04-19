function CheckIfChar()
{
    var x = event.which;
    if((x<65||x>90)&&(x<97||x>122))
    {
        alert("Please Enter Characters Only");
        return false;
    }
}
function CheckIfNum()
{
    var x = event.which;
    if(x<48||x>57)
    {
        alert("Please Enter Numbers Only");
        return false;
    }
}
function CheckEmail(Mail)
{
    var x = Mail.value;
    var AtPos = x.search("@");
    var DotPos = x.search(".com");
    if (x == null)
        alert("This Field Cannot Be Left Empty");
    else if (AtPos < 1 || DotPos < 1 || DotPos <= AtPos + 1)
    {
        alert("Not a valid e-mail address");
        Mail.focus();
    }        
}
function CheckNull(field)
{
    if (field.value == null)
        alert("This Field Cannot Be Left Empty");
}
function CheckAllFilled()
{
    for (var i = 1; i < 9; i++)
    {
        if(!document.getElementById("TextBox" + i).value)
        {
            alert("Empty Field(s). Fill all Fields to See Total Amount");
            return false;
        }        
    }
    return true;
}
function RESET()
{
    for (var i = 1; i < 10; document.getElementById("TextBox" + i).value = null, i++);
    document.getElementById("DropDownList1").value = "Motor Bike";
    document.getElementById("DropDownList2").value = 1;
    location.reload();
}



function LoadDoc(){
             
             var name=document.getElementById("Email").value;
             var pass=document.getElementById("Password").value;
             alert(name);
             
         xmlhttp = null;
         var url = "LogIn";
         
         if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
           
         xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                if (xmlhttp.responseText !== null) {
                    var msg=xmlhttp.responseText.trim();
                    if(msg=="Username/Password Incorrect")
                       document.getElementById("Incorrect").innerHTML=msg;
                      else{
                          
                        document.getElementById("Incorrect").innerHTML="";
                        location.href = "Profile.jsp";
                    }
                                                
                }
               
            }
            
        };
        xmlhttp.open("POST", url, false);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("Email=" + name +"&Password="+pass);

        }
         }