// JavaScript Document

function validate_required(field,alerttxt)
{
  with (field)
  {
    if (value==null||value=="")
      {alert(alerttxt);return false}
    else {return true}
  }
}

function validate_email(field,alerttxt)
{
  with (field)
  {
    apos=value.indexOf("@")
    dotpos=value.lastIndexOf(".")
    if (apos<1||dotpos-apos<2)
      {alert(alerttxt);return false}
    else {return true}
  }
}

function validate_equal(field1,field2,alerttxt)
{
    if (field1.value==field2.value)
      {return true}
    else {alert(alerttxt);return false}
}

function validate_form(thisform)
{
  with (thisform)
  {
    if (validate_required(email,"Please enter an email address.")==false)
      {email.focus();return false}
    if (validate_email(email,"Please enter a valid e-mail address.")==false)
      {email.focus();return false}
    if (validate_required(conemail,"Please confirm your email address.")==false)
      {conemail.focus();return false}
    if (validate_email(conemail,"Please enter a valid e-mail address.")==false)
      {conemail.focus();return false}
    if (validate_equal(email,conemail,"The two email addresses are not the same.")==false)
      {conemail.focus();return false}
	if (email && conemail)
	   form1.submit
  }
}



