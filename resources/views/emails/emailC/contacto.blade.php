<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Codice Email</title>
  <style type="text/css">
    body {
  margin: 0;
  padding: 0;
  min-width: 100% !important;
}
img {
  height: auto;
}
.content {
  width: 100%;
  max-width: 600px;
}
.header {
  padding: 20px 30px 20px 30px;
}
.innerpadding {
  padding: 30px 30px 30px 30px;
}

.bottompadding {
  padding-bottom: 30px;
}

.paddingimagen {
  text-align: center;
  padding: 10px 10px 10px 10px;
}

.borderbottom {
  border-bottom: 1px solid #3F1E9F;
}
.subhead {
  font-size: 15px;
  color: #ffffff;
  font-family: sans-serif;
  letter-spacing: 10px;
}
.h1,
.h2,
.bodycopy {
  color: #0E2349;
  font-family: sans-serif;
}
.h1 {
  font-size: 33px;
  line-height: 38px;
  font-weight: bold;
}
.h2 {
  padding: 0 0 15px 0;
  font-size: 24px;
  line-height: 28px;
  font-weight: bold;
}
.justify{
  text-align: justify;
}
.center{
  text-align: center;
}
.bodycopy {
  font-size: 16px;
  line-height: 22px;
}
.button {
  text-align: center;
  font-size: 18px;
  font-family: sans-serif;
  font-weight: bold;
  padding: 0 30px 0 30px;
}
.button a {
  color: #ffffff;
  text-decoration: none;
}
.footer {
  padding: 20px 30px 15px 30px;
}
.footercopy {
  font-family: sans-serif;
  font-size: 14px;
  color: #ffffff;
}
.footercopy a {
  color: #ffffff;
  text-decoration: underline;
}

@media only screen and (max-width: 550px),
  screen and (max-device-width: 550px) {
  body[yahoo] .hide {
    display: none !important;
  }
  body[yahoo] .buttonwrapper {
    background-color: transparent !important;
  }
  body[yahoo] .button {
    padding: 0px !important;
  }
  body[yahoo] .button a {
    background-color: #e05443;
    padding: 15px 15px 13px !important;
  }
  body[yahoo] .unsubscribe {
    display: block;
    margin-top: 20px;
    padding: 10px 50px;
    background: #2f3942;
    border-radius: 5px;
    text-decoration: none !important;
    font-weight: bold;
  }
}

  </style>
</head>

<body yahoo bgcolor="#BEB4DF">
<table width="100%" bgcolor="#BEB4DF" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td class="bottompadding">
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td bgcolor="#3F1E9F" class="header">
          <table width="300" align="center" border="0" cellpadding="0" cellspacing="0">  
            <tr>
              <td class="paddingimagen">
                <img class="fix" src="{{asset('images/logoCodice.png')}}" width="160" height="160" align="center" border="0" alt="" />
              </td>
            </tr>
            <tr>
              <td class="paddingimagen">
                <img class="fix" src="{{asset('images/nombreCodiceWB.png')}}" width="400" height="100" border="0" align="center" alt="" />
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h1 paddingimagen">
                ¡Han recibido un nuevo correo!
                <hr>
              </td>
            </tr>
            <tr>
              <td class="h2 justify">
               Desde: <strong>{{$contacto['email']}}</>
              </td>
            </tr>
            <tr>
              <td class="h2 justify">
                Asunto: <strong>{{$contacto['asunto']}}</strong>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="bottompadding borderbottom">
          <table class="col520" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#AB9FD6" style="width: 100%; max-width: 520px;">  
            <tr>
              <td class="innerpadding">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="h2">
                        Mensaje:
                    </td>
                  </tr>
                  <tr>
                    <td class="bodycopy justify">
                      {{$contacto['mensaje']}} 
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="footer borderbottom" bgcolor="#3F1E9F">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">  
            <tr>
              <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="footercopy center">
                      CoDiCE 2021
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </body>
</html>
