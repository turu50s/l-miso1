<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=EUC-JP">
<META http-equiv="Content-Style-Type" content="text/css">
<meta name="Keywords" content="��,ī��,��ʹ,���ӣ�,�ꥵ������" lang="ja">
<meta name="Description" content="���ī����ʹ�ʣ��ӣ��ˤΥꥵ������">
<meta name="Robots" content="index,follow">
<TITLE>��Υꥵ�����롦�椺����</TITLE>
<link rel="stylesheet" type="text/css" href="./css/top.css">
</HEAD>
<body class="page">
<div id="back1">
<div class="header">
  
  <p><a href="kaisha1.html">��ҳ���</a>
     <a href="kobutu.html">��ʪ�Ķ�ˡ��ɽ��</a>
     <a href="tokusho1.html">�þ�ˡ��ɽ��</a></p>
  <p class="cl"><img src="./pic/yuzuri1.jpg" alt="�̡ݣ����" width="120" height="50" class="pos">
                ī����ʹ�Υꥵ�����롦�����ӥ�
                <img src="./pic/tel.gif" alt="tel" width="120" height="50" class="pos2">
  </p>
</div>

<ul class="navi">
  <li class="bk"><a href="index.php">�ۡ���</a></li>
  <li><a href="system.html">�����Ѱ���</a></li>
  <li><a href="yuzu1.html">�椺�ꤿ��</a></li>
  <li><a href="https://www.asa-kashiwa.net/cgi-bin/remisecart/main.cgi?mode=cart&sid=1">�Ǻܾ���</a></li>
  <li><a href="q_a.html">�ѡ���</a></li>
  <li><a href="policy1.html">���ѵ���</a></li>
</ul>

<p class="moji">���������ե�����</p>


<div id="body">
  <div class="menu">
  	 <div class="box">
       <h2></h2>
         <p><a href="http://www.asahi.com/event/" target="_blank">
              <img src="../imgs/asahicom_event.gif" alt="ī����ʹ" height="40" width="120" border="0"></a>
            <a href="http://www.asapre.jp" target="_blank">
              <img src="../imgs/asapre.jpg" alt="�����פ�" width="120" height="40" class="pos"></a>
            <a href="http://www.asa-kashiwa.net">
              <img src="../imgs/asa-kashiwa.gif" alt="���ӣ�" width="120" height="40" class="pos"></a>
            <a href="http//www.reysol.jp" target="_blank">
              <img src="../imgs/Reysol_3.jpg" alt="�쥤����" width="120" height="40" class="pos"></a>
         </p>
     </div>
     
  </div>
  <div class="main">
    <div class="content3">
	  <?php
	    // POST�ǡ����򎷎����ͤ�ʬ��
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    	foreach($_POST as $k => $v) {
	    		$v = htmlspecialchars($v);
	    		
	    		// magic_quotes_gpc���ͤ�ON�ʤ�\���
				if ( get_magic_quotes_gpc() ) {
					$v = stripslashes($v);
				}
	    		$$k = $v;
	    	}
	    } 
	    $ssl = 'https://cp.in-plus.jp/ssl/102//asa-kashiwa.net/';
	    // �����ڤ��ؤ�
	    switch (@$id) {
	      case 0:
	      	scr_ent();			// ���ϲ���
	      	break;
	      case 1:
	      	scr_check();		// ���Ƴ�ǧ����
	      	break;
	      case 2:
	      	scr_sub();			// �᡼����������
	      	break;
	      default:
	      	scr_ent();
	    }
	    
	    function scr_ent() {
	      // ���ϲ���
	      global $name;
	      global $address;
	      global $age;
	      global $work;
	      global $tel;
	      global $email;
	      global $comment;
	      global $ssl;
	     
	    ?> 
	  <h3>�ʲ��ι��ܤˤ������ξ塢�������Ʋ�������</h3>
	  ���Ҏ��َ��Ďގڎ��ϡ�Ⱦ�Ѥ����Ϥ��Ʋ�������
	  <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
	  
	    
	    <table class="pos1">
	      <tr><th>��̾��</th>
	          <td><input type="text" name="name" value="<?php print "$name"; ?>" size="20"></td></tr>
	      <tr><th>����</th>
	          <td><input type="text" name="address" value="<?php print "$address"; ?>" size="50"></td></tr>
	      <tr><th>ǯ��</th>
	          <td><input type="text" name="age" value="<?php print "$age"; ?>" size="5">��</td></tr>
	      <tr><th>����</th>
	          <td><input type="text" name="work" value="<?php print "$work"; ?>" size="40"></td></tr>
	      <tr><th>�����ֹ�</th>
	          <td><input type="text" name="tel" value="<?php print "$tel"; ?>" size="14"></td></tr>
	      <tr><th>�᡼�륢�ɥ쥹</th>
	          <td><input type="text" name="email" value="<?php print "$email"; ?>" size="30"></td></tr>
	      
	      <tr><th class="pos">���ꤿ������</th><th>(�����ˡ�����̾����ħ�����Τ���ʤ����򤴵�����������)</th></tr>
	      <tr><td></td><td><textarea name="comment" cols="50" rows="9">
	          <?php print "$comment"; ?></textarea></td></tr>
	      <tr><td><input type="submit" value="��ǧ����"></td></tr>
	    </table>
	    <input type="hidden" name="id" value="1">
	  </form>
	  
	  <?php
	  }
	  
	  // �������Ƴ�ǧ
	  function scr_check() {
	   
	    global $name;
	    global $address;
	    global $age;
	    global $work;
	    global $tel;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    $err = 0;
        if ($name == "") {
	    	echo "<p>̾�������Ϥ��Ʋ�������</p>";
	    	$err = 1;
	    }
	    if ($address == "") {
	    	echo "<p>��������Ϥ��Ʋ�������</p>";
	    	$err = 1;
	    }
	    if ($tel == "") {
	    	echo "<p>�����ֹ�����Ϥ��Ʋ�������</p>";
	    	$err = 1;
	    }
	    if ($email == "") {
	    	echo "<p>�᡼�륢�ɥ쥹�����Ϥ��Ʋ�������</p>";
	    	$err = 1;
	    } else {
	    	if (!is_mail($email)) {
	    		echo "<p>�������᡼�륢�ɥ쥹�����Ϥ��Ʋ�������</p>";
	    		$err = 1;
	    	}
	    }
	    
	    if ($err) {
	    	scr_err();
	    	exit();
	    }
	    
	    // ���Խ���
		$comment1 = nl2br($comment);

	  ?>
	  
	    <h2>�ʲ������ƤǴְ㤤�ʤ��Ǥ��礦����</h2>
	    <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
	      <table border="1" cellspacing="0" cellpadding="10px" frame="hsides" rules="rows" class="tab">
            <col width="200"><col width="320">
            <tr><th>̾��</th><td><?php print "$name"; ?></td></tr>
            <tr><th>����</th><td><?php print "$address"; ?></td></tr>
            <tr><th>ǯ��</th><td><?php print "$age"; ?></td></tr>
            <tr><th>����</th><td><?php print "$work"; ?></td></tr>
            <tr><th>�����ֹ�</th><td><?php print "$tel"; ?></td></tr>
            <tr><th>�᡼�륢�ɥ쥹</th><td><?php print "$email"; ?></td></tr>
            <tr><th>������</th><td><?php print "$comment1"; ?></td></tr>
          </table>
          <p>���Ƥ˴ְ㤤��̵�����<b>�������ܥ����</b>�򥯥�å����Ʋ�������</p>
          <p><input type="submit" value="��������"></p>
          
          <input type="hidden" name="id" value="2">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="age" value="<?php print "$age" ?>">
          <input type="hidden" name="work" value="<?php print "$work" ?>">
          <input type="hidden" name="tel" value="<?php print "$tel" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          
        </form>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="age" value="<?php print "$age" ?>">
          <input type="hidden" name="work" value="<?php print "$work" ?>">
          <input type="hidden" name="tel" value="<?php print "$tel" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          
          <p><input type="submit" value="��������"></p>
             
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
      
      // ���Ϲ��ܤ˶��󤬤��ä����
      function scr_err() {
        global $name;
	    global $address;
	    global $age;
	    global $work;
	    global $tel;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    // ���Խ���
		$comment1 = nl2br($comment);
      ?>
        <h2>�⤦���١����Ϥ�ľ���Ʋ�������</h2>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="POST">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="address" value="<?php print "$address" ?>">
          <input type="hidden" name="age" value="<?php print "$age" ?>">
          <input type="hidden" name="work" value="<?php print "$work" ?>">
          <input type="hidden" name="tel" value="<?php print "$tel" ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment1" ?>">
          <p><input type="submit" value="���ϲ��̤�"></p>
        </form>
      <?php
      }
      
      
      function scr_sub() {
      	// �᡼���Ȥ�Ω�ơ�����
      	global $name;
	    global $address;
	    global $age;
	    global $work;
	    global $tel;
	    global $email;
	    global $comment;
	    global $ssl;
	    
	    // ���Խ���
		$comment1 = nl2br($comment);
	  ?>
	  
	    <h1>����礻ͭ�񤦸�¤��ޤ�����<h1>
	    <p class="moji1">�ʲ������Ƥǥ᡼����������ޤ�����</p>
	    <table border="1" cellspacing="0" cellpadding="10px" frame="hsides" rules="rows" class="tab">
	      <col width="200px"><col width="320">
	      <tr><th>��̾����</th><td><?php print $name ?></td></tr>
	      <tr><th>�����ꡧ</th><td><?php print $address ?></td></tr>
	      <tr><th>��ǯ��</th><td><?php print $age ?>��</td></tr>
	      <tr><th>�����ȡ�</th><td><?php print $work ?></td></tr>
	      <tr><th>�������ֹ桧</th><td><?php print $tel ?></td></tr>
	      <tr><th>�᡼�륢�ɥ쥹��</th><td><?php print $email ?></td></tr>
	      <tr><th>�������ơ�</th><td><?php print $comment1 ?></td></tr>
	    </table>
	    
	  <?php
	    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
	    $header .= "From: $email";
	    
	    $to = "yuzuriha@asa-kashiwa.net";
	    // $to = "tsuruki@asa-kashiwa.net";
	    
	    mb_language("Japanese");
        mb_internal_encoding ("euc-jp");
     
	     
	    $title = mb_convert_encoding("�椺���դؤΤ�������","EUC-JP","auto");
	    $date  = date("Y/m/d H:i:s (D)");
	    $age   = mb_convert_kana($age, 'n');
	    $tel   = mb_convert_kana($tel, 'n');
	    $naiyo = "��ƻ��֡�$date\n��̾����$name\n�����ꡧ$address\n��ǯ��$age\n�����ȡ�$work\n�������ֹ桧$tel\n�᡼�륢�ɥ쥹��$email\n"
				."-----------------------------------\n�������ơ�\n$comment\n";
	    
	    if ($name != "" && $address != "" && $tel != "" && $email != "") {
	    	if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"auto"), $header)) {
	    		print "  ";
	    	} else {
	    		print "**** �᡼���������ԤǤ���  ****";
	    	}
	    }
	  
	   
	    // iFAX�ؤ�����
	    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
	    $header .= "From: f-market@asa-kashiwa.net";
	       
	    $to = "0471603477@olink.ne.jp";
	    
	    $date  = date("Y/m/d H:i:s (D)");
        
	    $title = mb_convert_encoding("�椺���դؤΤ�������","EUC-JP","auto");
	    
	    $naiyo = "#userid=5002688250\n#passwd=sch0112f\n"
	            ."��ƻ��֡�$date\n��̾����$name\n�����ꡧ$address\n��ǯ��$age\n�����ȡ�$work\n�������ֹ桧$tel\n�᡼�륢�ɥ쥹��$email\n"
                ."-----------------------------------\n�������ơ�\n$comment\n";
        
	    if ($name != "" && $address != "" && $email != "") {
	       if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"auto"), $header)) {
	          print "  ";
	       } else {
	          print "**** FAX�������ԤǤ���  ****";
	       }
	    }
      }
	   ?>

	
	</div>
	  <p class="no2">����Ʋ�������������ҡ��ꥵ�����������̡ݣͣɣӣ�</p>
	  <p class="no1">Tel : (04)7164-3732</p>
    
  </div>
</div>
</div>
<div class="footer">
  
  <address>&#169; 2010 - 2010, ����Ʋ��������(��)�� All Rights Reserved.</address>
</div>

</BODY>
</HTML>
