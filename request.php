<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=Shift_JIS>
<META http-equiv="Content-Style-Type" content="text/css">
<meta name="Keywords" content="��,����,�V��,�`�r�`,���T�C�N��" lang="ja">
<meta name="Description" content="���̒����V���i�`�r�`�j�̃��T�C�N��">
<meta name="Robots" content="index,follow">
<TITLE>���̃��T�C�N���E�䂸��t</TITLE>
<link rel="stylesheet" type="text/css" href="./css/top.css">
</HEAD>
<body class="page">
<div id="back1">
<div class="header">
  
  <p><a href="kaisha1.html">��ЊT�v</a>
     <a href="kobutu.html">�Õ��c�Ɩ@�̕\�L</a>
     <a href="tokusho1.html">�����@�̕\�L</a></p>
  <p class="cl"><img src="./pic/yuzuri1.jpg" alt="�k�|��������" width="120" height="50" class="pos">
                �����V���̃��T�C�N���E�T�[�r�X
                <img src="./pic/tel.gif" alt="tel" width="120" height="50" class="pos2">
  </p>
</div>

<ul class="navi">
  <li class="bk"><a href="index.php">�z�[��</a></li>
  <li><a href="system.html">�����p�ē�</a></li>
  <li><a href="yuzu1.html">�䂸�肽��</a></li>
  <li><a href="https://www.asa-kashiwa.net/cgi-bin/remisecart/main.cgi?mode=cart&sid=1">�f�ڏ��i</a></li>
  <li><a href="q_a.html">�p���`</a></li>
  <li><a href="policy1.html">���p�K��</a></li>
</ul>

<p class="moji">�����⍇���R�[�i�[</p>


<div id="body">
  <div class="menu">
  	 <div class="box">
       <h2></h2>
         <p><a href="http://www.asahi.com/event/" target="_blank">
              <img src="../imgs/asahicom_event.gif" alt="�����V��" height="40" width="120" border="0"></a>
            <a href="http://www.asapre.jp" target="_blank">
              <img src="../imgs/asapre.jpg" alt="�����Ղ�" width="120" height="40" class="pos"></a>
            <a href="http://www.asa-kashiwa.net">
              <img src="../imgs/asa-kashiwa.gif" alt="�`�r�`" width="120" height="40" class="pos"></a>
            <a href="http//www.reysol.jp" target="_blank">
              <img src="../imgs/Reysol_3.jpg" alt="���C�\��" width="120" height="40" class="pos"></a>
         </p>
     </div>
     
  </div>
  <div class="main">
    <div class="content1">
	  <?php
	    // POST�f�[�^�𷰂ƒl�ɕ���
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    	foreach($_POST as $k => $v) {
	    		$v = htmlspecialchars($v);
	    		
	    		// magic_quotes_gpc�̒l��ON�Ȃ�\�폜
				if ( get_magic_quotes_gpc() ) {
					$v = stripslashes($v);
				}
	    		$$k = $v;
	    	}
	    } 
	    $ssl = 'https://www.asa-kashiwa.net/';
	    // ��ʐ؂�ւ�
	    switch (@$id) {
	      case 0:
	      	scr_ent();			// ���͉��
	      	break;
	      case 1:
	      	scr_check();		// ���e�m�F���
	      	break;
	      case 2:
	      	scr_sub();			// ���[�����M���
	      	break;
	      default:
	      	scr_ent();
	    }
	    
	    function scr_ent() {
	    // ���͉��
	      global $name;
	      global $address;
	      global $email;
	      global $comment;
	      global $ssl;
	     
	    ?> 
	  <h3>�����₪������܂����牺�L�A���⍇����ʂ��ǂ���</h3>
	  ��Ұٱ��ڽ�́A���p�œ��͂��ĉ������B
	  <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
	  
	    <table class="pos1">
	      <tr><th>�����O</th>
	          <td><input type="text" name="name" value="<?php print "$name"; ?>" size="20"></td></tr>
	      <tr><th>�Z��</th>
	          <td><input type="text" name="address" value="<?php print "$address"; ?>" size="50"></td></tr>
	      <tr><th>���[���A�h���X</th>
	          <td><input type="text" name="email" value="<?php print "$email"; ?>" size="30"></td></tr>
	      <tr><th class="pos">�R�����g</th>
	          <td><textarea name="comment" cols="50" rows="11"><?php print "$comment"; ?></textarea></td></tr>
	      <tr><td><input type="submit" value="�m�F����"></td></tr>
	    </table>
	    <input type="hidden" name="id" value="1">
	  </form>
	  
	  <?php
	  }
	  
	  // ���͓��e�m�F
	  function scr_check() {
	   
	    global $name;
	    global $address;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    $err = 0;
        if ($name == "") {
	    	echo "<p>���O����͂��ĉ������B</p>";
	    	$err = 1;
	    }
	    if ($address == "") {
	    	echo "<p>�Z������͂��ĉ������B</p>";
	    	$err = 1;
	    }
	    if ($email == "") {
	    	echo "<p>���[���A�h���X����͂��ĉ������B</p>";
	    	$err = 1;
	    } else {
	    	if (!is_mail($email)) {
	    		echo "<p>���������[���A�h���X����͂��ĉ������B</p>";
	    		$err = 1;
	    	}
	    }
	    
	    if ($err) {
	    	scr_err();
	    	exit();
	    }
	    
	    // ���s����
		$comment1 = nl2br($comment);

	  ?>
	  
	    <h2>�ȉ��̓��e�ŊԈႢ�Ȃ��ł��傤���H</h2>
	    <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
	      <table border="1" cellspacing="0" cellpadding="10px" frame="hsides" rules="rows" class="tab">
            <col width="200"><col width="320">
            <tr><th>���O</th><td><?php print "$name"; ?></td></tr>
            <tr><th>�Z��</th><td><?php print "$address"; ?></td></tr>
            <tr><th>���[���A�h���X</th><td><?php print "$email"; ?></td></tr>
            <tr><th>�R�����g</th><td><?php print "$comment1"; ?></td></tr>
          </table>
          <p>���e�ɊԈႢ���������<b>�h���M�{�^���h</b>���N���b�N���ĉ������B</p>
          <p><input type="submit" value="���M����">
          </p>
          <input type="hidden" name="id" value="2">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          
        </form>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          
          <p><input type="submit" value="��������">
             </p>
             
        </form>
      
      <?php 
      }
      
      // email address check
      function is_mail($email) {
      	
      	if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
      		return TRUE;
      	} else {
      		return FALSE;
      	}
      }
      
      // ���͍��ڂɋ󗓂��������ꍇ
      function scr_err() {
        global $name;
	    global $address;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    // ���s����
		$comment1 = nl2br($comment);
      ?>
        <h2>������x�A���͂������ĉ������B</h2>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment1" ?>">
          <p><input type="submit" value="���͉�ʂ�"></p>
        </form>
      <?php
      }
      
      
      function scr_sub() {
      	// ���[���g�ݗ��āE���M
      	global $name;
	    global $address;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    // ���s����
		$comment1 = nl2br($comment);
	  ?>
	  
	    <h1>���⍇���L�������܂����B<h1>
	    <p class="moji1">�ȉ��̓��e�Ń��[���𑗐M���܂����B</p>
	    <table border="1" cellspacing="0" cellpadding="10px" frame="hsides" rules="rows" class="tab">
	      <col width="200px"><col width="320">
	      <tr><th>�����O�F</th><td><?php print $name ?></td></tr>
	      <tr><th>���Z���FM</th><td><?php print $address ?></td></tr>
	      <tr><th>���[���A�h���X�F</th><td><?php print $email ?></td></tr>
	      <tr><th>���e�F</th><td><?php print $comment1 ?></td></tr>
	    </table>
	    
	  <?php
	    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
	    $header .="From: $email";
	    
	    $to = 'yuzuriha@asa-kashiwa.net';
	    //$to = 'tsuruki@asa-kashiwa.net';
		
		// IIS�ւ̈ڊǂɂ�镶�������h�~�ׂ̈ɑ}��
	    mb_language("Japanese");
        mb_internal_encoding ("UTF-8");
	     
	    $title = mb_convert_encoding("�䂸��t�ւ̂��⍇��","UTF-8","auto");
	    $date  = date("Y/m/d H:i:s (D)");
	    $naiyo = "���e�����F$date\n�����O�F$name\n���Z���F$address\n���[���A�h���X�F$email\n"
				."-----------------------------------\n���e�F\n$comment\n";
	    
        
	    if ($name != "" && $address != "" && $email != "") {
	        if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"auto"), $header)) {
	    		print "  ";
	    	} else {
	    		print "**** ���[�����M���s�ł��B  ****";
	    	}
	    }
	    
	    // iFAX�ւ̑��M
	    $header  = "Content-Type:text/plain;charset=iso-2022-jp\n";
	    $header .= "From: f-market@asa-kashiwa.net";
	       
	    $to ='0471603477@olink.ne.jp';
	         
	    $naiyo = "#userid=5002688250\n#passwd=sch0112f\n"
	             ."���e�����F$date\n�����O�F$name\n���Z���F$address\n���[���A�h���X�F$email\n"
                 ."-----------------------------------\n���e�F\n$comment\n";
        
	        
	    if ($name != "" && $address != "" && $email != "") {
	       if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"auto"), $header)) {
	          print "  ";
	       } else {
	          print "**** ���[�����M���s�ł��B  ****";
	       }
	    }
	   }
	   
	   ?>

	
	</div>
	  <p class="no2">�L������t�̔�������Ё@���T�C�N�����@�k�|�l�h�r�n</p>
	  <p class="no1">Tel : (04)7164-3732</p>
    
  </div>
</div>
</div>
<div class="footer">
  
  <address>&#169; 2010 - 2010, �L������t�̔�(��)�@ All Rights Reserved.</address>
</div>

</BODY>
</HTML>
