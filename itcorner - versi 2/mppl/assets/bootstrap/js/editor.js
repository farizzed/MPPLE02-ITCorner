/*
Rich Text Editor using iframe
Fariz Aulia Pradipta
*/

//Window onload ketika halaman telah dibuka
window.onload = function()
{
  //Ambil isian iframe yang dipilih
  var oFrame = document.getElementById("richTextField");

  //Style default elemen editor pada iframe
  window.frames['richTextField'].document.body.style.fontSize = 18;

  oFrame.contentWindow.document.onclick = function() //Ketika iframe diklik
  {
    document.getElementById("richTextField").focus();
    $('#richTextField').contents().find('body').focus();
    
    //cek state text align rata kiri pada isian
    var justifyleftstate = oFrame.contentWindow.document.queryCommandValue("justifyleft");
    if(justifyleftstate == 'true')
    {
      document.getElementById("align-left").className += " active";
      document.getElementById("align-center").className = document.getElementById("align-center").className.replace( /(?:^|\s)active(?!\S)/g , '' );
      document.getElementById("align-right").className = document.getElementById("align-right").className.replace( /(?:^|\s)active(?!\S)/g , '' );
    }

    //cek state text align rata tengah pada isian
    var justifycenterstate = oFrame.contentWindow.document.queryCommandValue("justifycenter");
    if(justifycenterstate == 'true')
    {
      document.getElementById("align-center").className += " active";
      document.getElementById("align-left").className = document.getElementById("align-left").className.replace( /(?:^|\s)active(?!\S)/g , '' );
      document.getElementById("align-right").className = document.getElementById("align-right").className.replace( /(?:^|\s)active(?!\S)/g , '' );
    }

    //cek state text align rata kanan pada isian
    var justifyrightstate = oFrame.contentWindow.document.queryCommandValue("justifyright");
    if(justifyrightstate == 'true')
    {
      document.getElementById("align-right").className += " active";
      document.getElementById("align-center").className = document.getElementById("align-center").className.replace( /(?:^|\s)active(?!\S)/g , '' );
      document.getElementById("align-left").className = document.getElementById("align-left").className.replace( /(?:^|\s)active(?!\S)/g , '' );
    }

    //cek state bold pada isian
    var boldstate = oFrame.contentWindow.document.queryCommandValue("bold");
    var boldstateMoz = oFrame.contentWindow.document.queryCommandState("bold");
    if(boldstate == 'true' || boldstateMoz == 'true')
    {
      document.getElementById("bold").className += " active";
    }
    else
    {
      document.getElementById("bold").className = document.getElementById("bold").className.replace( /(?:^|\s)active(?!\S)/g , '' )
    }

    //cek state italic pada isian
    var italicstate = oFrame.contentWindow.document.queryCommandValue("italic");
    if(italicstate == 'true')
    {
      document.getElementById("italic").className += " active";
    }
    else
    {
      document.getElementById("italic").className = document.getElementById("bold").className.replace( /(?:^|\s)active(?!\S)/g , '' )
    }

    //cek state underline pada isian
    var underlinestate = oFrame.contentWindow.document.queryCommandValue("underline");
    if(underlinestate == 'true')
    {
      document.getElementById("underline").className += " active";
    }
    else
    {
      document.getElementById("underline").className = document.getElementById("underline").className.replace( /(?:^|\s)active(?!\S)/g , '' )
    }

    //cek fontsize pada isian
    var fontsizestate = oFrame.contentWindow.document.queryCommandValue("fontsize");
    if(fontsizestate == '1')
    {
      document.getElementById("ukuran").selectedIndex = "0";
    }
    else if(fontsizestate == '2')
    {
      document.getElementById("ukuran").selectedIndex = "1";
    }
    else if(fontsizestate == '3')
    {
      document.getElementById("ukuran").selectedIndex = "2";
    }
    else if(fontsizestate == '4')
    {
      document.getElementById("ukuran").selectedIndex = "3";
    }
    else if(fontsizestate == '5')
    {
      document.getElementById("ukuran").selectedIndex = "4";
    }
    else if(fontsizestate == '6')
    {
      document.getElementById("ukuran").selectedIndex = "5";
    }
    else if(fontsizestate == '7')
    {
      document.getElementById("ukuran").selectedIndex = "6";
    }

    //cek state underline pada isian
    var orderliststate = oFrame.contentWindow.document.queryCommandValue("insertorderedlist");
    if(orderliststate == 'true')
    {
      document.getElementById("unordered").className = document.getElementById("unordered").className.replace( /(?:^|\s)active(?!\S)/g , '' );
      document.getElementById("ordered").className += " active";
    }
    else
    {
      document.getElementById("ordered").className = document.getElementById("ordered").className.replace( /(?:^|\s)active(?!\S)/g , '' );
    }

    //cek state underline pada isian
    var unorderliststate = oFrame.contentWindow.document.queryCommandValue("insertunorderedlist");
    if(unorderliststate == 'true')
    {
      document.getElementById("ordered").className = document.getElementById("ordered").className.replace( /(?:^|\s)active(?!\S)/g , '' );
      document.getElementById("unordered").className += " active";
    }
    else
    {
      document.getElementById("unordered").className = document.getElementById("unordered").className.replace( /(?:^|\s)active(?!\S)/g , '' );
    }
  };

  //Fungsi paste as plain text pada editor iframe
  oFrame.contentWindow.document.onpaste = function onPaste(e)
  {
    e.preventDefault(); //Menghentikan fungsi paste dari keyboard atau mouse
    var text = (e.originalEvent || e).clipboardData.getData('text'); //Ambil plain text dari clipboard
    richTextField.document.execCommand('insertText', false, text); //Plain text dimasukkan kedalam editor iframe
  }
};

oDoc = document.getElementById("richTextField");

//Inisialisasi editor iframe
function iFrameOn()
{
  richTextField.document.designMode = 'On';
  $('#richTextField').contents().find('body').css("word-wrap", "break-word","margin:.67em 0");
}

//Fungsi focus atau blur ketika editor iframe diakses
/*oDoc.addEventListener("focus", editorFocus, true);
oDoc.addEventListener("blur", editorBlur, true);*/
function editorFocus()
{
  document.getElementById("richTextField").className = document.getElementById("richTextField").className.replace( /(?:^|\s)editor(?!\S)/g , 'editor-focus' );
  document.getElementById("richTextField").className = document.getElementById("richTextField").className.replace( /(?:^|\s)editor-danger(?!\S)/g , 'editor-danger-focus' );
}
function editorBlur()
{
  document.getElementById("richTextField").className = document.getElementById("richTextField").className.replace( /(?:^|\s)editor-focus(?!\S)/g , 'editor' );
  document.getElementById("richTextField").className = document.getElementById("richTextField").className.replace( /(?:^|\s)editor-danger-focus(?!\S)/g , 'editor-danger' );
}

//Fungsi formatting
function iAlignLeft()
{
  richTextField.document.execCommand('justifyleft',false,null);
  document.getElementById("align-center").className = document.getElementById("align-center").className.replace( /(?:^|\s)active(?!\S)/g , '' );
  document.getElementById("align-right").className = document.getElementById("align-right").className.replace( /(?:^|\s)active(?!\S)/g , '' );
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iAlignCenter()
{
  richTextField.document.execCommand('justifycenter',false,null);
  document.getElementById("align-left").className = document.getElementById("align-left").className.replace( /(?:^|\s)active(?!\S)/g , '' );
  document.getElementById("align-right").className = document.getElementById("align-right").className.replace( /(?:^|\s)active(?!\S)/g , '' );
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iAlignRight()
{
  richTextField.document.execCommand('justifyright',false,null);
  document.getElementById("align-center").className = document.getElementById("align-center").className.replace( /(?:^|\s)active(?!\S)/g , '' );
  document.getElementById("align-left").className = document.getElementById("align-left").className.replace( /(?:^|\s)active(?!\S)/g , '' );
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iBold()
{
  richTextField.document.execCommand('bold',false,null);
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iUnderline()
{
  richTextField.document.execCommand('underline',false,null);
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iItalic()
{
  richTextField.document.execCommand('italic',false,null);
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iFontSize(size)
{
  richTextField.document.execCommand('FontSize',false,size);
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iForeColor()
{
  var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
  richTextField.document.execCommand('ForeColor',false,color);
}

function iHorizontalRule()
{
  richTextField.document.execCommand('inserthorizontalrule',false,null);
}

function iUnorderedList()
{
  richTextField.document.execCommand("insertunorderedlist", false,null);
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iOrderedList()
{
  richTextField.document.execCommand("InsertorderedList", false,null);
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iLink()
{
  var x = document.getElementById("link").value;
  var urlRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
  if(!urlRegExp.test(x))
  {
    alert("URL tidak valid. Silahkan isi dengan benar.");
  }
  else
  {
    richTextField.document.execCommand("CreateLink", false, x);
    $('#modalLink').modal('hide');

    document.getElementById("richTextField").focus();
    $('#richTextField').contents().find('body').focus();
  }
}

function iUnLink()
{
  richTextField.document.execCommand("Unlink", false, null);
  document.getElementById("richTextField").focus();
  $('#richTextField').contents().find('body').focus();
}

function iImage()
{
  var x = document.getElementById("urlimg").value;
  var img = new Image();
  img.src = x;
  x.height='100%';
  x.width='100%';
  img.onerror = function()
  {
    alert("URL gambar tidak valid atau tidak bisa dimuat. Silahkan isi dengan benar.");
  };
  img.onload = function()
  {
    var fontsize = oDoc.contentWindow.document.queryCommandValue("fontsize");
    richTextField.document.execCommand('insertimage', false, x);
    $('#modalGambar').modal('hide');

    richTextField.document.execCommand('FontSize',false,fontsize);
    document.getElementById("richTextField").focus();
    $('#richTextField').contents().find('body').focus();
  };
}

//Mengecek apakah inputan kosong pada editor
$('#kirim').on('submit', function(e)
{
  var isError;
  if ($('#judul').val()=='')
  {
    document.getElementById('isianjudul').className += ' has-error';
    isError = true;
  }
  if (window.frames['richTextField'].document.body.innerHTML=='')
  {
    document.getElementById("richTextField").className = document.getElementById("richTextField").className.replace( /(?:^|\s)editor(?!\S)/g , 'editor-danger' );
    isError = true;
    $('#richTextField').contents().find('body').focus();
  }
  if(isError == true)
  {
    e.preventDefault();
    $('#errormsg').text('Isian tidak boleh kosong').show();
  }
});

//Copy isi editor iframe dan paste kedalam hidden textarea 'kirim'. Kemudian, submit formnya
$('form').submit(function ()
{
    window.onbeforeunload = null;
    var theForm = document.getElementById("kirim");
    theForm.elements["isi"].value = window.frames['richTextField'].document.body.innerHTML;
});

//Notifikasi meninggalkan halaman jika pengguna ingin berpindah halaman namun belum men-submit isi
window.onbeforeunload = function()
{
  if (window.frames['richTextField'].document.body.innerHTML != "" || document.getElementById("judul").value != "")
  {
    return 'Artikel belum dipublikasi. Isian akan hilang jika anda beralih dari halaman ini.'
  }
};