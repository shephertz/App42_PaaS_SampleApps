<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <title>User Input Form</title>
</head>
 
<body>
<h2>User Input Form</h2>
<form method="post" action="save">
  <fieldset>
    <legend>Personal Particular</legend>
    Name: <input type="text" name="username" maxLength="30"/><br /><br />
    Email: <input type="text" name="email" maxLength="30"/>
  </fieldset>
 
  <fieldset>
    <legend>What do you about this Page :</legend>
    <textarea rows="5" cols="30" name="description">Enter your instruction here...</textarea>
  </fieldset>
 
  <input type="submit" value="SEND" />
  <input type="reset" value="CLEAR" />
</form>
</body>
</html>