<!DOCTYPE html>
<html>
  <head>
    <title>New Student Application </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset ('css/bootstrap.css') }}" rel='stylesheet'/>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>.card-0 {
min-height: 100vh;
background: linear-gradient(-20deg, rgb(255, 255, 255) 50%, #0275d8 50%);
color: white;
border: 0px
}

p {
font-size: 15px;
line-height: 25px !important;
font-weight: 500
}

.container {
padding-top: 100px !important;
border-radius: 20px
}

.btn {
letter-spacing: 1px
}

select:active {
box-shadow: none !important;
outline-width: 0 !important
}

select:after {
box-shadow: none !important;
outline-width: 0 !important
}

input,
textarea {
padding: 10px 12px 10px 12px;
border: 1px solid lightgrey;
border-radius: 0px !important;
margin-bottom: 5px;
margin-top: 2px;
width: 100%;
box-sizing: border-box;
color: #2C3E50;
font-size: 14px;
letter-spacing: 1px;
resize: none
}

select:focus,
input:focus {
box-shadow: none !important;
border: 1px solid #2196F3 !important;
outline-width: 0 !important;
font-weight: 400
}

label {
margin-bottom: 2px;
font-weight: bolder;
font-size: 14px
}

input:focus,
textarea:focus {
-moz-box-shadow: none !important;
-webkit-box-shadow: none !important;
box-shadow: none !important;
border: 1px solid #304FFE;
outline-width: 0
}

button:focus {
-moz-box-shadow: none !important;
-webkit-box-shadow: none !important;
box-shadow: none !important;
outline-width: 0
}

.form-control {
height: calc(2em + .75rem + 3px)
}

.inner-card {
margin: 79px 0px 70px 0px
}

.card-0 {
margin-top: 90px;
margin-bottom: 100px
}

.card-1 {
border-radius: 17px;
color: black;
box-shadow: 2px 4px 15px 0px rgb(0, 0, 0, 0.5) !important
}

#file {
border: 2px dashed #92b0b3 !important
}

.color input {
background-color: #f1f1f1
}

.files:before {
position: absolute;
bottom: 60px;
left: 0;
width: 100%;
content: attr(data-before);
color: #000;
font-size: 12px;
font-weight: 600;
text-align: center
}

#file {
display: inline-block;
width: 100%;
padding: 95px 0 0 100%;
background: url('https://i.imgur.com/VXWKoBD.png') top center no-repeat #fff;
background-size: 55px 55px
}</style>
</head>

<body>


  <body oncontextmenu='return false' class='snippet-body'>


    <div class="container card-0 justify-content-center ">
<div class="card-body px-sm-4 px-0">
<div class="row justify-content-center mb-5">
<div class="col-md-10 col">
<h3 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left"> Start Student Application </h3>
<p class="mt-md-4 ml-md-0 ml-2 text-center text-sm-left"> Ensure you fill all field correctly...</p>
</div>
</div>
<div class="row justify-content-center round">
<div class="col-lg-10 col-md-12 ">
<div class="card shadow-lg card-1">
<div class="card-body inner-card">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-6 col-sm-12">

  <form  method="POST" action="/UniversityApp/Admission/lasued_apply">
    @csrf
<div class="form-group"> 
  <label for="inputEmail4">Programme Type</label> 
    <select class="form-control" name="programme">
    <option>DEGREE</option> 
  </select> 
</div>
  
  <div class="form-group"><label for="first-name">Surname</label>
      <input type="text" class="form-control" id="surname" name="surname" style="text-transform:uppercase" placeholder="Type your Surname" required> 
    </div>
    
    <div class="form-group"> <label for="phone">Middle Name</label> 
      <input type="text" class="form-control" id="middlename" name="middlename" style="text-transform:uppercase" placeholder="" required> 
    </div>

    <div class="form-group"> <label for="Mobile-Number">Mobile Number</label> 
      <input type="text" class="form-control" id="Mobile-Number" name="phoneno" placeholder=""> 
    </div>
    
</div>

<div class="col-lg-5 col-md-6 col-sm-12">
    <div class="form-group"> <label for="last-name">JambNo</label> 
      <input type="text" class="form-control" id="jambno" name="jambno" maxlength="10" style="text-transform:uppercase" placeholder="" required > 
    </div>
    <div class="form-group"> <label for="Company-Name">First Name</label> 
      <input type="text" class="form-control" id="firstname" name="firstname" style="text-transform:uppercase" placeholder="" required> 
    </div>
    
    <div class="form-group"> <label for="phone">Email</label> 
      <input type="email" class="form-control" id="email" name="email" style="text-transform:lowercase" placeholder="arubiewe@gmail.com" required > 
    </div>

    <label for="inputEmail4">Course to Study</label> 
    <select class="form-control" name="course">
    <option>BSc. Computer Science Education</option> 
    <option>BSc. Physics Education</option> 
  </select> 
    
    
    
 
    <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block mt-4" >Proceed</button>
   

   
    
</div>



<div class="row justify-content-center">

</div>
</div>
</div>

</form>
</div>
</div>
</div>
</div>

    </div>

    


</body>

  
</html>